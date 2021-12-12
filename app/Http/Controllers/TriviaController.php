<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trivia;
use Illuminate\Support\Facades\Session;

class TriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $trivia = [];

    public function index()
    {
        if(Session::get('trivia') !== null)
        {
            $trivia = Session::get('trivia');

            if($trivia['conteo'] === 10)
            {
                return view('trivia.resultado', [
                    'trivia' => session('trivia')
                ]);                
            }
            if($trivia['conteo'] !== 0)
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
        
        Session::put('trivia', $this->setTrivia($preguntas, $totalPreguntas));

        //var_dump(session('trivia'));
        //var_dump(session('trivia'));
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
        $this->trivia['sumario'] = [];

        return $this->trivia;      
    }
}
