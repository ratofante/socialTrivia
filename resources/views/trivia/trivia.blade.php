@extends('layouts.app')

@section('content')


<div class="container m-auto p2">
    <p class="conteo">
        Pregunta {{ $trivia['conteo']+1 }} de {{ $trivia['totalPreguntas'] }}
    </p>
</div>
<div class="container m-auto p-2">
    <form>
        <div class="form-group">
          <label for="exampleFormControlSelect2">
            {{ $trivia[$trivia['conteo']]['pregunta'] }}
          </label>
          <select multiple class="form-control" id="exampleFormControlSelect2">
            @foreach ($trivia[$trivia['conteo']]['opciones'] as $opcion)
            <option>{{ $opcion['texto'] }}</option>  
            @endforeach
          </select>
        </div>
      </form>
</div>



@endsection

