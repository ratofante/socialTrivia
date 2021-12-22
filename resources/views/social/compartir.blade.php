@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="card">
        <div class="card-head">
            Enhorabuena!
        </div>
        <div class="card-body">
            Instrucciones!
        </div>
    </div>
    <div class="compartir-form">
        <form action="/social" method="POST" id="compartir-form">
            @csrf
            <div class="mb-3">
                <label for="pregunta" class="form-label">Pregunta: </label>
                <input type="text" name="pregunta" id="pregunta" class="form-control" placeholder="Tu pregunta.." aria-describedby="helpId">
                <small id="helpId" class="text-muted">Escribe la pregunta que quieras ingresar en la Trivia</small>
            </div>
            <div class="mb-3">
                <label for="respuesta" class="form-label">Respuesta correcta: </label>
                <input type="text" name="respuesta" id="respuesta" class="form-control" placeholder="..." aria-describedby="helpId">
                <small id="helpId" class="text-muted">Asegúrate de chequear que la información sea correcta</small>
            </div>
            <div class="mb-3">
              <label for="opcion_1" class="form-label">Opcion 1</label>
              <input type="text" name="opcion_1" id="opcion_1" class="form-control" placeholder="..." aria-describedby="helpId">
              <small id="helpId" class="text-muted">1eera respuesta incorrecta</small>
            </div>
            <div class="mb-3">
                <label for="opcion_2" class="form-label">Opcion 2</label>
                <input type="text" name="opcion_2" id="opcion_2" class="form-control" placeholder="..." aria-describedby="helpId">
                <small id="helpId" class="text-muted">2da respuesta incorrecta</small>
              </div>
              <div class="mb-3">
                <label for="opcion_3" class="form-label">Opcion 3</label>
                <input type="text" name="opcion_3" id="opcion_3" class="form-control" placeholder="..." aria-describedby="helpId">
                <small id="helpId" class="text-muted">3ra respuesta incorrecta</small>
              </div>
              <button type="submit" class="btn-custom p-1 bg-gray-500">Compartir</button>
        </form>
    </div>
</div>


@endsection
