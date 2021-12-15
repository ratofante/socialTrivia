@extends('layouts.app')

@section('content')

<div class="card my-5 mx-1">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title bg-gray-500">Terminaste!</h4>
        <p class="card-text">Tu resultado es: {{ $trivia['resultado'] }} de {{ $trivia['totalPreguntas'] }}</p>
    </div>
</div>

<div class="container">
    <form action="">
        <label for="name">Tu nombre:</label><input id="name"class="p-2 bg-primary" name="name" type="text" placeholder="Tu nombre..">
        <input type="hidden" value="{{ $trivia['resultado'] }}">
        <button type="submit">registrar resultado</button>
    </form>
</div>


@foreach ($trivia['sumario'] as $registro)
<div class="container my-2 mx-auto p-2">
<h3>{{ $registro['pregunta'] }}<h3>
<p> Tu respuesta: {{ $registro['input'] }}</p>
<p> Respuesta correcta: {{ $registro['respuesta'] }}</p>
</div>
@endforeach

@endsection