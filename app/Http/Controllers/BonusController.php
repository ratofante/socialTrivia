<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use App\Models\Trivia;
use Illuminate\Support\Facades\Session;

class BonusController extends Controller
{
    public function check(Request $request){
        //Sacamos datos ingresados y pasamos session-bonus.
        $trivia = Session::get('trivia');
        $respuestaUsuario = $request->input('respuesta');
        $bonus = Session::get('bonus');

        //Chequeamos si contestó bien
        foreach($bonus['opciones'] as $opcion)
        {
            if($opcion['valor'] === true)
            {
                if($opcion['texto'] === $respuestaUsuario)
                {
                    $trivia['resultado'] += 0.50;
                }
                else
                {
                    $registro = array(
                        'pregunta' => $bonus['pregunta'],
                        'input' => $respuestaUsuario,
                        'respuesta' => $opcion['texto'],
                    );

                    $trivia['evaluacion'] = [];
                    array_push($trivia['evaluacion'], $registro);
                    array_push($trivia['sumario'], $registro);
                }
            }
        }
        //Seteamos bonus a false para que no vuelva a arrancar.
        $trivia['bonus'] = false;
        //Ingresamos puntuación con registro a session-trivia.
        Session::put('trivia', $trivia);

        //Chequeamos el voto
        if($request->input('voto') === 'si')
        {
            $bonus['puntuacion'] += 5;
        }
        elseif($request->input('voto') === 'no')
        {
            $bonus['puntuacion'] -= 5;
        }

        //Registramos el voto en SOCIAL
        $id = $bonus['id'];

        Social::where('id', $id)
            ->update([
                'puntuacion' => $bonus['puntuacion']
            ]);

        //Chequeamos puntuación y cambio de categoria
        if($bonus['puntuacion'] === 100)
        {
            //var_dump($bonus);
            Social::where('id', $bonus['id'])
                ->update(['categoria' => '1']);

            //Actualmente, existe el siguiente problema:
            // Tomo los datos de $bonus pero $bonus tiene las respuestas random!
            // Entonces opciones[0] no corresponde necesariamente a la respuesta.
            // Habría que simplemente hacer una query que saque los datos con la ID,
            // pasarle los datos ya ordenados (o sin desordenar).

            //ESTO DEBERIA RESOLVERLO, pero me falta chequear.
            $ingresoTrivia = Social::select('pregunta', 'respuesta', 'opcion_1', 'opcion_2','opcion_3')
                ->where('id','=',$bonus['id'])
                ->get()
                ->toArray();
            Trivia::create([
                'pregunta' => $ingresoTrivia['pregunta'],
                'respuesta' => $ingresoTrivia['respuesta'],
                'opcion_1' => $ingresoTrivia['opcion_1'],
                'opcion_2' => $ingresoTrivia['opcion_2'],
                'opcion_3' => $ingresoTrivia['opcion_3']
            ]);
        }
        elseif($bonus['puntuacion'] === 0)
        {
            Social::where('id', $bonus['id'])
                ->update(['categoria' => '0']);
        }
        return redirect('/trivia');
    }

}
