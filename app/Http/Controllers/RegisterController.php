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

    public function store(Request $request)
    {
       /* $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]
        );*/
        $pass = md5($request->input('password'));
        $email = $request->input('email');
        $name = $request->input('name');

        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>md5($request->input('password'))
        ]);

        //$user =  User::create(request(['name', 'email', 'password']));
        Auth()->login($user);
        return redirect()->to('/inicio');
    }
}
