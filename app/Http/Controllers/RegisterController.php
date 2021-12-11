<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function create2()
    {
        return view('auth.register');
    }

    public function store()
    {
       /* $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]
        );*/
        $user =  User::create(request(['name', 'email', 'password']));
        Auth()->login($user);
        return redirect()->to('/inicio');
    }
}
