@extends('adminlte::page');

@section('title', 'Egresado')

@section('content')

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>

@endif

<script>
    function quitarerror(){
    const elements = document.getElementsByClassName('alert');
    while (elements[0]){
        elements[0].parentNode.removeChild(elements[0]);
    }
}

setTimeout(quitarerror, 3000);
</script>

<h1>Egresados <a href="egresado/create" class="btn btn-primary">Crear</a></h1>
<div class="contrainer">

<div  aling="center">
<div class="">
        <form action="{{route('egresado.index')}}"  method="get">
        <div class="form-row">
        <div class="col-sm-6 ">
            <input type="text" class="form-control" name="texto" value='{{$texto}}' >    
        </div>
        <div class="col-sm-2 ">
        <button type="submit" class="btn btn-primary" value="Buscar" style="width:45%"><i class="fa fa-search" aria-hidden="true"></i></button>
        <a type="button" href="/egresado" class="btn btn-danger"  style="width:45%"><i class="fa fa-magic" aria-hidden="true"></i></a>
        </div>
        </div>
        </form>
    </div>
    </div>

<table class = "table ">
<thead  class="thead-dark">
<tr>
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
            
            
            <td>{{$egresado->identidad}}</td>
            <td>{{$egresado->nombre}}</td>
            <td>{{$egresado->fecha_nacimiento}}</td>
            <td>{{$egresado->genero->name}}</td>
            <td>{{$egresado->carreras->Carrera}}</td>
            <td>{{$egresado->año_egresado}}</td>
           
           

            <td>
                <form action="{{route ('egresado.destroy',$egresado->id)}}" method="POST"> 
                <a href="/egresado/{{$egresado->id}}/edit" class="btn btn-info">Editar</a>
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


