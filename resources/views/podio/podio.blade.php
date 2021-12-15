@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$titulo}}</h1>
    <table class="table">
        <thead class="thead bg-light">
            <tr>
                <th scope="col" class="text-center">Posición</th>
                <th scope="col" class="text-center">Usuario</th>
                <th scope="col" class="text-center">Resultado</th>
                <th scope="col" class="text-center">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 5; $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$podio[$i]->username}}</td>
                <td class="text-center">{{$podio[$i]->resultado}}</td>
                <td>{{$podio[$i]->fecha}}</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
    
@endsection