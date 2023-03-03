<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\CarreraController;
use App\Models\Egresado;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $graficos = Egresado::select('año_egresado', DB::raw('count(*)as cantidad'))->groupby ('año_egresado')->orderby('año_egresado')->get();
        return view('welcome')->with('graficos', $graficos);

    }
}
