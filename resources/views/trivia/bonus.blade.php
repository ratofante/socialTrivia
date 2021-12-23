@extends('layouts.app')

@section('content')

<div class="container m-auto mt-5 p-2">
    <form action="/bonus" method="POST" id="triviaForm" class="card">
    @csrf
        <div class="form-group card-body pb-0">
            <h3>Bonus!</h3>
            <p>Contesta y evalúa esta pregunta para ganar más puntaje</p>

            <!-- PREGUNTAS -->
            <div class="card-header">
                <label for="exampleFormControlSelect2">
                    <h4 class="text-center w-100 mb-0">{{ $bonus['pregunta'] }} </h4>
                </label>
            </div>


            <!-- ALTERNATIVAS -->
            <div class="card-body px-1">
                <select name="respuesta" form="triviaForm" multiple class="form-control" id="exampleFormControlSelect2">
                    @foreach ($bonus['opciones'] as $opcion)
                    <!-- opcion texto -->
                    <option value="{{ $opcion['texto'] }}">{{ $opcion['texto'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

            <!-- VOTO A LA PREGUNTA -->
        <div class="form-check mx-3 my-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="voto" id="si" value="si" checked>
            Me gustó la pregunta
            </label>
        </div>
        <div class="form-check mx-3 my-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="voto" id="no" value="no">
                No me gustó la pregunta
            </label>
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
