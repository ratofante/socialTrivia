@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="welcome">Bienvenido @auth {{  Auth::user()->name }} !@else Señor desconocido !@endauth</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 d-flex flex-column justify-content-center align-items-center mt-5">
            <!-- MENU BOTONES -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn-square btn-custom" data-bs-toggle="modal" data-bs-target="#juegoRapido">
                                Juego rápido
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="juegoRapido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Juego Rápido</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Comienza un juego rápido de 10 preguntas.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary link-btn">
                                                <a href="/trivia">
                                                    Jugar!
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn-square btn-custom" data-bs-toggle="modal" data-bs-target="#podio">
                                Podio
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="podio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Podio</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Ve los mejores resultados de Social Trivia
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary link-btn">
                                                <a href="/podio">
                                                    Ver Podio
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Button trigger modal -->
                            <button type="button" class="btn-square btn-custom" data-bs-toggle="modal" data-bs-target="#informacion">
                                Social Trivia
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="informacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Informacion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Acerca de Social Trivia el projecto, el sitio y colaboradores.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary link-btn">
                                                <a href="/about">
                                                    Más Información
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            <!-- GREETINGS -->
            <div class="d-none d-sm-flex col-sm-6 mt-5">
                        <div id="homePanel" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#homePanel" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#homePanel" data-bs-slide-to="1"></li>
                                <li data-bs-target="#homePanel" data-bs-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                            @auth

                            @endauth
                                <div class="carousel-item active">
                                    <h3>Mejor puntuación</h3>
                                    <p>Intenta superar a {{ $homePanel['top1']['username'] }}.</p>
                                    <p>Puntuación: {{ $homePanel['top1']['resultado'] }}</p>
                                </div>
                                <div class="carousel-item">
                                    <h3>Última Pregunta agregada</h3>
                                    <p>{{ $homePanel['ultimoIngreso']['pregunta'] }}</p>
                                </div>
                                <div class="carousel-item">
                                    <h3>Próximas preguntas</h3>
                                    <p>{{ $homePanel['puntuacionAlta']['pregunta'] }}</p>
                                    <p>Puntuación: {{ $homePanel['puntuacionAlta']['puntuacion'] }}</p>
                                </div>
                            </div>
                            <button class="carousel-control-prev d-none d-lg-inline" type="button" data-bs-target="#homePanel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next d-none d-lg-inline" type="button" data-bs-target="#homePanel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                        </div>
            </div>
        </div>
    </div>

@endsection
