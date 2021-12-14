@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container button-box mt-3">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
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
            </div>
            <div class="col-md-6 d-flex justify-content-center">
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
            </div>
            <div class="col-md-6 d-flex justify-content-center">
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
        </div>
    </div>
</div>

@endsection
