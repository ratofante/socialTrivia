@extends('layouts.app')

@section('content')

<div class="card my-5 mx-5">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title bg-gray-500">
            Terminaste @auth {{  Auth::user()->name }} @else Señor desconocido @endauth!
        </h4>
        <p class="card-text">Tu resultado es: {{ $trivia['resultado'] }} de {{ $trivia['totalPreguntas'] }}</p>
    </div>
</div>

<div class="card my-5 mx-5">
    <div class="card">
        @auth
            <p class="resultado-text p-2">Tu puntuación será guardada en tus resultados.</p>
            <a href="/podio/{{ Auth::user()->id }}" class="p-2 acceso-podio">
                Ver mis resultados
            </a>
        @else
            <form action="/podio" method="POST">
                @csrf
                <label for="name">Tu nombre:</label><input id="name"class="p-2 bg-primary" name="name" type="text" placeholder="Tu nombre..">
                <input name="resultado" type="hidden" value="{{ $trivia['resultado'] }}">
                <button type="submit">registrar resultado</button>
            </form>
        @endauth
    </div>
</div>


@foreach ($trivia['sumario'] as $registro)
<div class="container resultado">
    <div class="card-header bg-custom-dark">
        <h3>{{ $registro['pregunta'] }}</h3>
    </div>
    <div class="card-body bg-custom-light">
        <p> Tu respuesta: {{ $registro['input'] }}</p>
        <p> <b class="custom-bold">Respuesta correcta:</b> {{ $registro['respuesta'] }}</p>
    </div>
</div>
@endforeach

@endsection
