<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\Controller;

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('carreras', 'App\Http\Controllers\CarreraController');

Route::resource('/egresados', 'App\Http\Controllers\EgresadoController');

Route::put('/egresados/{id}/editar', [EgresadoController::class, 'update'])
->name('egresado.update')->where('id','[0-9]+');

Route::put('/carreras/{id}/editar', [CarreraController::class, 'update'])
->name('carrera.update')->where('id','[0-9]+');
 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
