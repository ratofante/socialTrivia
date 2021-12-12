@extends('layouts.app')

@section('content')


<div class="container m-auto p2">
    <p class="conteo">
        Pregunta {{ $trivia['conteo']+1 }} de {{ $trivia['totalPreguntas'] }}
    </p>
</div>
<div class="container m-auto p-2">
    <form action="/trivia" method="POST" id="triviaForm">
      @csrf
        <div class="form-group">

          <label for="exampleFormControlSelect2">
            {{ $trivia[$trivia['conteo']]['pregunta'] }}
          </label>

          <select name="respuesta" form="triviaForm" multiple class="form-control" id="exampleFormControlSelect2">

            @foreach ($trivia[$trivia['conteo']]['opciones'] as $opcion)

            <option value="{{ $opcion['texto'] }}">{{ $opcion['texto'] }}</option> 

            @endforeach

          </select>

        </div>
        <div class="container m-auto p-2">
          <button type="submit p-3 bg-secondary">
              Respuesta
          </button>
        </div>  
      </form>

      <div class="container">
        <p>n° respuestas correctas: {{ $trivia['resultado'] }}</p>
      </div>
  
</div>



@endsection

