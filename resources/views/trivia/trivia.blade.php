@extends('layouts.app')

@section('content')
    
<div class="container m-auto p-2">
    @foreach ($preguntas as $pregunta)
    <table class="table">
        <thead>
            <tr>
                <th scope="col" colspan="4">{{ $pregunta['pregunta'] }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pregunta['opciones'] as $opciones)
            <tr>
                <td>
                    {{ $opciones['texto'] }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</div>



@endsection