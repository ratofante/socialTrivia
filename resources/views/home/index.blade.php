@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <button class="rounded-pill m-auto p-3">
                <a href="/trivia">
                    Jugar
                </a>
                <span class="">

                </span>
            </button>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <button class="rounded-pill m-auto p-3">
                <a href="/usuarios">
                    Loggin
                </a>
            </button>
        </div>
    </div>
</div>

@endsection