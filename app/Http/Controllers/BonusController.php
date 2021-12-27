<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
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
        return redirect('/trivia');
    }
}
