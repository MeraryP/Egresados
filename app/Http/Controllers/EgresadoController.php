<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use Illuminate\Support\Facades\DB;
use App\Models\Genero;
use App\Models\Carrera;


class EgresadoController extends Controller
{
    public function index(Request $request)
    {
        
        $texto=trim($request->get('texto'));
        $egresados =Egresado::
        where('nombre' ,'LIKE','%'.$texto.'%')
        ->orwhere('identidad' ,'LIKE','%'.$texto.'%')
        ->paginate(10);
        return view ('egresado/index',compact('egresados', 'texto'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all();
        $generos = Genero::all();
        return view ('egresado.create', compact('generos'),compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_actual = date("d-m-Y");
        $max = date('d-m-Y',strtotime($fecha_actual."- 15 year"));
        $minima = date('d-m-Y',strtotime($fecha_actual."- 60 year"));
        $maxima = date("d-m-Y",strtotime($max."+ 1 days"));
        $anio = date("Y");
        $this->validate($request,[
           
            'identidad'=>'required|unique:egresados,identidad|max:15|regex:([0-9]{4}-[0-9]{4}-[0-9]{5})',
            'nombre'=>'required|regex:/^([A-Za-zÁÉÍÓÚáéíóúñÑ]+)(\s[A-Za-zÁÉÍÓÚáéíóúñÑ]+)*$/|max:100',
            'fecha'=>'required|date|before:'.$maxima.'|after:'.$minima,
            'gene_id'=>'required|exists:generos,id',
            'carre_id'=>'required|exists:carreras,id',
            'egreso'=>'required|numeric|min:1970|before:'.($anio + 1),
            
           
        ]);
     
        $egresados = new Egresado();
        $egresados->identidad = $request->get('identidad');
        $egresados->nombre = $request->get('nombre');
        $egresados->fecha_nacimiento = $request->get('fecha');
        $egresados->gene_id = $request->get('gene_id');
        $egresados->carre_id = $request->get('carre_id');
        $egresados->año_egresado = $request->get('egreso');


        $egresados->save();

        if($egresados){
            return redirect('/egresado')->with('mensaje', 'El egresado fue creado exitosamente.');
        }else{
            //retornar con un mensaje de error.
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $carreras = Carrera::all();
        $generos = Genero::all();
        $egresado = Egresado::findOrfail($id);
        return view('egresado.edit', compact('generos'),compact('carreras'))->with('egresado', $egresado);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $fecha_actual = date("d-m-Y");
        $max = date('d-m-Y',strtotime($fecha_actual."- 15 year"));
        $minima = date('d-m-Y',strtotime($fecha_actual."- 60 year"));
        $maxima = date("d-m-Y",strtotime($max."+ 1 days"));
        $anio = date("Y");

        $request->validate([
        
            'identidad'=>'required|max:15|regex:([0-9]{4}-[0-9]{4}-[0-9]{5})',
            'nombre'=>'required|regex:/^([A-Za-zÁÉÍÓÚáéíóúñÑ]+)(\s[A-Za-zÁÉÍÓÚáéíóúñÑ]+)*$/|max:100',
            'fecha'=>'required|date|before:'.$maxima.'|after:'.$minima,
            'gene_id'=>'required|exists:generos,id',
            'carre_id'=>'required|exists:carreras,id',
            'egreso'=>'required|numeric|min:1970|before:'.($anio + 1),
        ]);

        $egresado = Egresado::find($id);
        $egresado->identidad = $request->get('identidad');
        $egresado->nombre = $request->get('nombre');
        $egresado->fecha_nacimiento = $request->get('fecha');
        $egresado->gene_id = $request->get('gene_id');
        $egresado->carre_id = $request->get('carre_id');
        $egresado->año_egresado = $request->get('egreso');


        $egresado->save();

        if($egresado){
            return redirect('/egresado')->with('mensaje', 'El egresado fue modificado exitosamente.');
        }else{
            //retornar con un mensaje de error.
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $egresado = Egresado::find($id);
        $egresado->delete();
        return redirect('/egresado')->with('mensaje', 'Egresado fue borrado completamente');
    }
}


