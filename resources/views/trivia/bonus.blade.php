@extends('layouts.app')

@section('content')

<div class="container m-auto mt-5 p-2">
    <form action="/bonus" method="POST" id="triviaForm" class="card">
      @csrf
        <div class="form-group card-body pb-0">

          <h3>Bonus!</h3>
          <p>Contesta y evalúa esta pregunta para ganar más puntaje</p>

          <div class="card-header">
            <label for="exampleFormControlSelect2">

              <h4 class="text-center w-100 mb-0">{{ $bonus['pregunta'] }} </h4>
             </label>
          </div>



          <div class="card-body px-1">
            <select name="respuesta" form="triviaForm" multiple class="form-control" id="exampleFormControlSelect2">

              @foreach ($bonus['opciones'] as $opcion)
              <!-- opcion texto -->
              <option value="{{ $opcion['texto'] }}">{{ $opcion['texto'] }}</option>

              @endforeach

            </select>
          </div>


        </div>
        <div class="container w-100 d-flex justify-content-center p-2">
          <button type="submit" class="btn-custom p-1 bg-gray-500">
              Responder
          </button>
        </div>
        <div class="container">
          <p class="mb-1 text-left">n° respuestas correctas: {{ $trivia['resultado'] }}</p>
        </div>
      </form>



</div>



@endsection