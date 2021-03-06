<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\PodioController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\BonusController;

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
Route::get('/about', [HomeController::class, 'about']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('/trivia', TriviaController::class);

Route::resource('/podio', PodioController::class);

Route::resource('/social', SocialController::class);

Route::post('/bonus', [BonusController::class, 'check']);




