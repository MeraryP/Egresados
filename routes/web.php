<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\Controller;
=======
use App\Http\Controllers\EstudianteController;
>>>>>>> 96bf77070d5d70105ec0612324b1c191c4f72a7d

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

<<<<<<< HEAD

Route::resource('/egresados', 'App\Http\Controllers\EgresadoController');
=======
>>>>>>> 96bf77070d5d70105ec0612324b1c191c4f72a7d
