@extends('layout.plantillaegresados');

@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>

@endif

<h1>Egresados<a href="egresados/create" class="btn btn-primary">Crear</a></h1>
<br></br>

<div class="contrainer">

<div class="row" aling="center">
<div class="">
        <form action="{{route('egresados.index')}}"  method="get">
        <div class="form-row">
        <div class="col-sm-4 ">
            <input type="text" class="form-control" name="texto" value='{{$texto}}'>    
        </div>
        <div class="col-auto ">
        <input type="submit" class="btn btn-primary" value="Buscar">
        </div>
        </div>
        </form>
    </div>
    </div>

<table class = "table table-dark table-striped mt-4" class="pagination">
<thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Número de Identidad</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Género</th>
            <th scope="col">Carrera</th>
            <th scope="col">Año de Egreso</th>
            
            
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>

    <tbody>
    

        @foreach ($egresados as $egresado)
        <tr>
            <th scope="row">{{$egresado->id }}</th>
            <td>{{$egresado->identidad}}</td>
            <td>{{$egresado->nombre}}</td>
            <td>{{$egresado->fecha_nacimiento}}</td>
            <td>{{$egresado->genero}}</td>
            <td>{{$egresado->carreras}}</td>
            <td>{{$egresado->año_egresado}}</td>
           
           

            <td>
                <form action="{{route ('egresados.destroy',$egresado->id)}}" method="POST"> 
                <a href="/egresados/{{$egresado->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>


        @endforeach
    </tbody>
 
</table>
{{$egresados->links()}}

@endsection 