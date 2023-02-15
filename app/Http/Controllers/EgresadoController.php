<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;


class EgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $egresados =DB::table('egresados')
        ->select('id','identidad','nombre','fecha_nacimiento','genero','carreras','año_egresado')
        ->where('nombre' ,'LIKE','%'.$texto.'%')
        ->orwhere('identidad' ,'LIKE','%'.$texto.'%')
        ->paginate(5);
        return view ('egresado/index',compact('egresados', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $request->validate([
        
            'identidad'=>'required',
            'nombre'=>'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'fecha'=>'required|date',
            'egreso'=>'required|numeric',
        ]);

        $egresado = Egresado::find($id);
        $egresado->identidad = $request->get('identidad');
        $egresado->nombre = $request->get('nombre');
        $egresado->fecha_nacimiento = $request->get('fecha');
        $egresado->genero = $request->get('genero');
        $egresado->carreras = $request->get('carrera');
        $egresado->año_egresado = $request->get('egreso');


        $egresado->save();

        if($egresado){
            return redirect('/egresados')->with('mensaje', 'El egresado fue modificado exitosamente.');
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
        return redirect('/egresados')->with('mensaje', 'Egresado fue borrado completamente');
    }
}
