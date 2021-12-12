<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TriviaController;
<<<<<<< HEAD
use App\Http\Controllers\PodioController;

=======
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
>>>>>>> 39e36829735fcf35a8f2d2153b9e450be989cfd2

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

<<<<<<< HEAD
Route::resource('/trivia', TriviaController::class);

Route::resource('/podio', PodioController::class);
=======
/**
 * Routes /inicio
 * Crear / registrar usuario
 */

Route::get('/inicio', function () {
    return view('sesiones.inicio');
});//->middleware('auth');

Route::get('/inicio/register', [RegisterController::class, 'create2'])
//->middleware('guest')
->name('register.index');

Route::post('/inicio/register', [RegisterController::class, 'store'])
->name('register.store');

Route::get('/inicio/login', [SessionController::class, 'create2'])
//->middleware('guest')
->name('login.index');

Route::post('/inicio/login', [SessionController::class, 'store'])
->name('login.store');

Route::get('/inicio/logout', [SessionController::class, 'destroy'])
//->middleware('auth')
->name('login.destroy');

/****
 * 
 * Routes Trivia
 * 
 */
Route::resource('/trivia', TriviaController::class);
>>>>>>> 39e36829735fcf35a8f2d2153b9e450be989cfd2
