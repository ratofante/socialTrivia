@extends('layouts.app')

@section('content')
    
<div class="container m-auto p-2">
    @foreach ($preguntas as $pregunta)
    <table class="table">
        <thead>
            <tr>
                <th scope="col" colspan="4">{{ $pregunta->pregunta }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $pregunta->respuesta }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ $pregunta->opcion_1 }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ $pregunta->opcion_2 }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ $pregunta->opcion_3 }}
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach
</div>



@endsection