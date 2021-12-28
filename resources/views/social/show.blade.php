@extends('layouts.app')

@section('content')
<table class="table podio-table">
    <thead class="thead bg-custom-dark">
        <tr>
            <th>Pregunta</th>
            <th class="text-center">Puntuacion</th>
            <th class="text-center">Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($preguntas as $pregunta)
        <tr class="bg-custom-light">
            <td>{{ $pregunta->pregunta }}</td>
            <td class="text-center"> {{ $pregunta->puntuacion }}</td>
            <td class="text-center"> {{ $pregunta->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
