<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\Session;

class BonusController extends Controller
{
    public function check(Request $request){
        $trivia = Session::get('trivia');
        $respuestaUsuario = $request->input('respuesta');
        $bonus = Session::get('bonus');
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
                    array_push($trivia['evaluacion'], $registro);
                }
            }
        }
        $trivia['bonus'] = false;
        Session::put('trivia', $trivia);
        return redirect('/trivia');
    }
}
