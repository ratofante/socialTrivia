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
            @if($pregunta->categoria == 1)
                <tr class="bg-custom-light bg-info">
            @elseif ($pregunta->categoria == 0)
                <tr class="bg-custom-light bg-warning">
            @else
                <tr class="bg-custom-light">
            @endif
                    <td>{{ $pregunta->pregunta }} {{ $pregunta->categoria }}</td>
                    <td class="text-center"> {{ $pregunta->puntuacion }}</td>
                    <td class="text-center"> {{ $pregunta->created_at }}</td>
                </tr>
        @endforeach
    </tbody>
</table>
@endsection
