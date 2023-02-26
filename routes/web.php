<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;


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

Route::middleware("auth")->group(function () {
   
    
   

        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');

        Route::resource('carreras', 'App\Http\Controllers\CarreraController');

       Route::resource('/egresado', 'App\Http\Controllers\EgresadoController');

        Route::put('/egresado/{id}/editar', [EgresadoController::class, 'update'])
        ->name('egresado.update')->where('id','[0-9]+');

        Route::put('/carreras/{id}/editar', [CarreraController::class, 'update'])
       ->name('carrera.update')->where('id','[0-9]+');
        
    
        //ruta  formulario cambiar contraseña
        Route::get('/contrasenia',[UserController::class, 'formularioclave'])
        ->name('contrasenia.cambiar');
    
        //ruta guardar guardar contraseña
        Route::post('/contrasenia',[UserController::class, 'guardarclave'])
            ->name('contrasenia.cambiada');
    
        Route::get('/usuario',[UserController::class, 'usuario'])
        ->name('usuario.datos');
    
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    });
    


Auth::routes(["register" => false]);
