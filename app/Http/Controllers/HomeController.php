<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podio;
use App\Models\Social;

class HomeController extends Controller
{


    /* middleware se asegura de que solo los usuarios auth
    puedan accedera los métodos del controlador. De otro modo
    son redireccionados a login.
    Desactivado por ahora.

    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    public function index()
    {
        $top1 = Podio::select('username', 'resultado')
            ->orderBy('resultado', 'desc')
            ->orderBy('created_at', 'asc')
            ->first()
            ->toArray();
        $ultimoIngreso = Social::select('pregunta')
            ->orderBy('created_at', 'desc')
            ->first()
            ->toArray();
        $puntuacionAlta = Social::select('pregunta', 'puntuacion')
            ->orderBy('puntuacion', 'desc')
            ->orderBy('created_at', 'asc')
            ->first()
            ->toArray();

        $homeData = array(
            'top1' => $top1,
            'ultimoIngreso' => $ultimoIngreso,
            'puntuacionAlta' => $puntuacionAlta);
        //var_dump($homeData);
        return view('home.index',[
            'homePanel' => $homeData
        ]);
    }
    public function about()
    {
        return view('home.about');
    }
}
