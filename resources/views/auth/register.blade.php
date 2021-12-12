@extends('layouts.app')
@section('title', 'Register - SocialTrivia')
@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Registrarse</h1>

    <form class="mt-4" method="post" action="">
        @csrf
        <input type="text" class="border boder-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Ingresa tu nombre" id="name" name="name">

        @error('name')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror

        <input type="email" class="border boder-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Ingresa tu correo electronico" id="email" name="email">

        @error('email')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror

        <input type="password" class="border boder-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Ingresa una contraseña" id="password" name="password">

        @error('password')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror

        <input type="password" class="border boder-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Repite tu contraseña" id="password-confirmation" name="password-confirmation">

        <button type="submit" class="rounded-md bg-purple-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-purple-600">Enviar</button>

    </form>

</div>
    
@endsection