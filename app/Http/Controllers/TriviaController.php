<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;
use App\Models\Podio;
use App\Models\Social;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $trivia = [];
    public $bonus = [];

    public function index()
    {
        //var_dump(Session::get('trivia'));

        //Chequeamos si ya comenzó una partida.

        if(Session::get('trivia') !== null)
        {
            $trivia = Session::get('trivia');

            if($trivia['bonus'] != false && $trivia['bonus']===$trivia['conteo'])
            {
                //Es un usuario logueado y llegó el momento del bonus.
                //Se le comparte una pregunta de Socials para que responda y evalúe.

                $pregunta = Social::select('id','user_id','pregunta', 'respuesta', 'opcion_1', 'opcion_2','opcion_3', 'puntuacion')
                ->inRandomOrder()
                ->first()
                ->toArray();
                $pregunta = $pregunta;


                //var_dump($pregunta);

                $this->bonus['pregunta'] = $pregunta['pregunta'];
                $this->bonus['opciones'] = array(
                    'opcion1' => array(
                        'texto' => $pregunta['respuesta'],
                        'valor' => true
                    ),
                    'opcion2' => array(
                        'texto' => $pregunta['opcion_1'],
                        'valor' => false
                    ),
                    'opcion3' => array(
                        'texto' => $pregunta['opcion_2'],
                        'valor' => false
                    ),
                    'opcion4' => array(
                        'texto' => $pregunta['opcion_3'],
                        'valor' => false
                    )
                );
                shuffle($this->bonus['opciones']);

                $this->bonus['id'] = $pregunta['id'];
                $this->bonus['user_id'] = $pregunta['user_id'];
                $this->bonus['puntuacion'] = $pregunta['puntuacion'];

                Session::put('bonus', $this->bonus);

                return view('trivia.bonus', [
                    'bonus' => session('bonus'),
                    'trivia' => session('trivia')
                ]);
            }

            //Chequeamos si el juego terminó (conteo = 10) o continua (conteo < 10)

            if(isset($trivia['conteo']) && $trivia['conteo'] === 10)
            {
                //Borramos la trivia de la sessión.

                session()->forget('trivia');

                // Insertamos el resultado en el podio para usuarios logueados.

                if(Auth::check())
                {
                    Podio::insert([
                        'user_id' => Auth::user()->id,
                        'username' => Auth::user()->name,
                        'resultado' => $trivia['resultado']
                    ]);
                }
                $ponderado = round($trivia['resultado'], 0, PHP_ROUND_HALF_DOWN);
                //var_dump($trivia['resultado']);
                //var_dump($ponderado);
                switch (true) {
                    case ($ponderado <= 0):
                        $trivia['comentario'] = "Uy! Solo esperamos que haya sido un error. Vuelve a intentarlo";
                        $trivia['premio'] = false;
                        break;
                    case ($ponderado <= 3.0):
                        $trivia['comentario'] = "Muy mal. Pero por algo se comienza. Revisa tus respuestas y quizás aprendas algo más";
                        $trivia['premio'] = false;
                        break;
                    case ($ponderado <= 5.0);
                        $trivia['comentario'] = "Mediocre. Pero vemos esperanzas en que puedas mejorar";
                        $trivia['premio'] = false;
                        break;
                    case ($ponderado <= 6.0);
                        $trivia['comentario'] = "No es muy buen resultado pero con un poco de práctica puedes mejorar";
                        $trivia['premio'] = false;
                        break;
                    case ($ponderado <= 8.0);
                        $trivia['comentario'] = "Bien! Estás acercándote a los mejores resultados. No pares ahora!";
                        $trivia['premio'] = false;
                        break;
                    case ($ponderado >= 9.0);
                        $trivia['comentario'] = "Excelente! Queremos que compartas tu sabiduría con nosotros.";
                        $trivia['premio'] = true;
                        break;
                }


                // Devolvemos trivia.resultado con los datos del juego:

                return view('trivia.resultado', [
                    'trivia' => $trivia
                ]);
            }
            if(isset($trivia['conteo']) && $trivia['conteo'] !== 0)
            {
                return view('trivia.trivia',[
                    'trivia' => session('trivia')
                ]);
            }
        }
            //10 PREGUNTAS RANDOM CON SELECT

            $totalPreguntas = 10;
            $preguntas = Trivia::select('pregunta', 'respuesta', 'opcion_1', 'opcion_2','opcion_3')
                ->inRandomOrder()
                ->limit($totalPreguntas)
                ->get()
                ->toArray();

            // Iniciación de la Trivia.

            Session::put('trivia', $this->setTrivia($preguntas, $totalPreguntas));

            return view('trivia.trivia', [
                'trivia' => session('trivia')
            ]);

    }

    /*****
     *
     *
     *
     */
    public function check(Request $request)
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Obtenemos la trivia guardada en Session
        $trivia = Session::get('trivia');

        // Obetenemos el input/respuesta del usuario
        $respuestaUsuario = $request->input('respuesta');

        // Usamos 'conteo' para ubicar el index correspondiente
        $i = $trivia['conteo'];

        // recorremos las opciones para ubicar la respuesta correcta
        foreach($trivia[$i]['opciones'] as $opcion)
        {
            if ($opcion['valor'] === true) {

                $respuestaCorrecta = $opcion['texto'];

                //Chequeamos si la respuesta del usuario es correcta
                // Si es correcta, +1 a resultado
                // Si no es correcta, creamos un array-registro y lo guardamos en sumario.
                if($respuestaUsuario === $respuestaCorrecta)
                {
                    $trivia['resultado'] += 1;
                }
                else
                {
                    $trivia['resultado'] -= 0.25;
                    $registro = array(
                        'pregunta' => $trivia[$i]['pregunta'],
                        'input' => $respuestaUsuario,
                        'respuesta' => $respuestaCorrecta
                    );
                    array_push($trivia['sumario'], $registro);
                }
            }
        }

        // sumamos +1 a conteo, volvemos a guardar trivia, mandamos siguiente pregunta.
        $trivia['conteo']++;
        Session::put('trivia', $trivia);

        return redirect('/trivia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /******************
     * Uso interno en el controlador.
     * Recibe
     *
     *
     *
     */
    public function setTrivia($preguntas, $totalPreguntas)
    {
        for($i=0; $i<count($preguntas); $i++)
        {
            $this->trivia[$i] = array(
                'pregunta' => $preguntas[$i]['pregunta'],
                'opciones' => array(
                    'opcion_1' => array(
                        'texto' => $preguntas[$i]['respuesta'],
                        'valor' => true
                    ),
                    'opcion_2' => array(
                        'texto' => $preguntas[$i]['opcion_1'],
                        'valor' => false
                    ),
                    'opcion_3' => array (
                        'texto' => $preguntas[$i]['opcion_2'],
                        'valor' => false
                    ),
                    'opcion_4' => array (
                        'texto' => $preguntas[$i]['opcion_3'],
                        'valor' => false
                    )
                )
            );
            shuffle($this->trivia[$i]['opciones']);
        }
        $this->trivia['totalPreguntas'] = $totalPreguntas;
        $this->trivia['resultado'] = 0;
        $this->trivia['conteo'] = 0;
        if(Auth::check() === true)
        {
            $this->trivia['bonus'] = rand(5,9);
        }
        else
        {
            $this->trivia['bonus'] = false;
        }
        $this->trivia['sumario'] = [];

        return $this->trivia;
    }
}
