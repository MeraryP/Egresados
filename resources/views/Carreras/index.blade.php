@extends('layout.plantillabase');

@section('contenido')

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

<h1>Carreras <a href="carreras/create" class="btn btn-primary">Crear</a></h1>


<table class = "table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Carrera</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        
        @foreach ($carreras as $carrera)
        <tr>
            <td>{{$carrera->id}}</td>
            <td>{{$carrera->Carrera}}</td>

            <td>
                <form action="{{route ('carreras.destroy',$carrera->id )}}" method="POST"> 
                <a href="/carreras/{{$carrera->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection 