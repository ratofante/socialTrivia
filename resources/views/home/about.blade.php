@extends('layouts.app')

@section('content')

<h5 id="aboutHeader">Acerca del proyecto</h5>

  <div class="accordion" id="accordionAbout">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            ¿Qué puedo hacer en Social Trivia?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionAbout">
        <div class="accordion-body">
            Social Trivia es una app en la cual puedes <b>(1)</b> Participar en la trivia contestando 10 preguntas al azar, <b>(2)</b> Si obtienes un puntaje alto, puedes compartir tus conocimientos sumando una pregunta a la Trivia. <b>(3)</b> Tus preguntas serán votadas por otros participantes, si obtiene suficientes puntos, ingresa oficialmente como parte de la trivia.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            ¿Por qué una Trivia social?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionAbout">
        <div class="accordion-body">
            La idea de una trivia construida por los aportes de sus usarios es interesante. Ya sea por lo que podamos observar socialmente como por los desafíos que pueda plantear a la hora de diseñar y programar, Social Trivia es un lindo punto de partida.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Marco Institucional
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionAbout">
        <div class="accordion-body">
            Social Trivia es un proyecto presentado para la beca otorgada por <a href="https://www.neoris.com/argentina" class="aboutLink">Neoris</a> junto con la <a href="https://utn.edu.ar/es/" class="aboutLink">UTN</a>. Muchos agradecimientos a los profesores a cargo del curso y a <a href="https://www.neoris.com/argentina" class="aboutLink">Neoris</a> por la oportunidad.
        </div>
      </div>
    </div>
  </div>
@endsection
