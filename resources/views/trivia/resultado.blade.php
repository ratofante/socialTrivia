@extends('layouts.app');

@section('content')
<h2>Terminaste!</h2>
<p>Tu resultado es: {{ $trivia['resultado'] }} de {{ $trivia['totalPreguntas'] }}</p>
@endsection