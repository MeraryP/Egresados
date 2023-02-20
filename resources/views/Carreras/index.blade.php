
@extends('adminlte::page');

@section('title', 'Carrera')

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

<h1>Carreras <a href="carreras/create" class="btn btn-primary">Crear</a></h1>


<table class = "table ">

    <thead class="thead-dark">
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
                <a type="button" href="/carreras/{{$carrera->id}}/edit" class="btn btn-info">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                @csrf
                @method('DELETE')
                <a type="button" class="btn btn-danger" onClick="return confirm('Esta seguro de eliminar el Registro')">
                <i class="fa fa-window-close" aria-hidden="true"></i>
            </a>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection 