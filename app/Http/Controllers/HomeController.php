<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home.index');
    }
    public function about()
    {
        return view('home.about');
    }
}
