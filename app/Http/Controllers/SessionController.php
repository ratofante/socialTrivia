<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function create2()
    {
        return view('auth.login');
    }

    public function store()
    {
        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message'=>'El usuario y/o contraseña es incorrecta'
            ]);
        }
        return redirect ()->to('/inicio');
    }

    /*public function store(){
        $credentials=request()->only('email','password');
        dump($credentials);
        if(auth()->attempt($credentials)){
            request()->session()->regenerate();
            return redirect()->to('/inicio');
        }
        return redirect()->to('/inicio/login');
    }*/

    public function destroy()
    {
        auth()->logout();
        return redirect ()->to('/inicio');
    }
}
