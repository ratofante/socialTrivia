@extends('layouts.app')

@section('content')

<div class="container button-box">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <button type="button" class="btn-square">
                <a href="/trivia">
                    Jugar
                </a>
                <span>
                    <i class="bi bi-arrow-right-circle fa-4x"></i>
                </span>
            </button>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <button type="button" class="btn-square">
                <a href="">
                    Podio
                </a>
                <span>
                    <i class="bi bi-arrow-right-circle"></i>
                </span>
            </button>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <button type="button" class="btn-square">
                <a href="/inicio/login">
                    Registrarse
                </a>
                <span>
                    <i class="bi bi-arrow-right-circle"></i>
                </span>
            </button>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <button type="button" class="btn-square">
                <a href="">
                    Información
                </a>
                <span>
                    <i class="bi bi-arrow-right-circle"></i>
                </span>
            </button>
        </div>
    </div>
</div>

@endsection