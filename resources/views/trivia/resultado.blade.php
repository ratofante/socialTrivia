@extends('layouts.app');

@section('content')
<h2>Terminaste!</h2>

<form action="">

    <label for="name">Tu nombre:</label><input id="name"class="p-2 bg-primary" name="name" type="text" placeholder="Tu nombre..">
    <input type="hidden" value="{{ $trivia['resultado'] }}">

    <button type="submit">registrar resultado</button>
</form>

<p>Tu resultado es: {{ $trivia['resultado'] }} de {{ $trivia['totalPreguntas'] }}</p>


@foreach ($trivia['sumario'] as $registro)
<div class="container my-2 mx-auto p-2">
<h3>{{ $registro['pregunta'] }}<h3>
<p> Tu respuesta: {{ $registro['input'] }}</p>
<p> Respuesta correcta: {{ $registro['respuesta'] }}</p>
</div>
    
@endforeach

@endsection