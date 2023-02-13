<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

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
Route::get('/egresados',[EgresadoController::class, 'index'])->name('egresado.index');

Route::get('/egresados/{id}', [EgresadoController::class, 'show'])
->name('egresado.mostrar')->where('id', '[0-9]+');
