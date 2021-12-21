@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-3 font-weight-bolder">{{$titulo}}</h1>
    <table class="table podio-table">
        <thead class="thead bg-custom-dark">
            <tr>
                <th scope="col" class="text-center">Posición</th>
                <th scope="col" class="text-center">Usuario</th>
                <th scope="col" class="text-center">Resultado</th>
                <th scope="col" class="text-center d-none d-sm-block">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @php ($i=1)
            @foreach ($podio as $score)
            <tr class="bg-custom-light">
                <th class="text-md-center" scope="row">{{$i}}</th>
                <td class="text-center">{{$score->username}}</td>
                <td class="text-center">{{$score->resultado}}</td>
                <td class="text-center d-none d-sm-block">{{$score->created_at}}</td>
            </tr>
            @php ($i++)
            @endforeach
        </tbody>
    </table>
</div>

@endsection
