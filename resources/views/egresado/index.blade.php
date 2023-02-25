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
<br>
<br>
<div class="contrainer">

<div  align="center">
    <form action="{{route('egresado.index')}}"  method="get">
    <div class="form-row">
    <div class="col-sm-5 ">
        <input type="text" class="form-control" name="texto" value='{{$texto}}' >    
    </div>
    <div class="col-sm-2 ">
    <button type="submit" class="btn btn-primary" value="Buscar" style="width:45%" ><i class="fa fa-search" aria-hidden="true"></i></button>
    <a type="button" href="/egresado" class="btn btn-danger"  style="width:45%"><i class="fa fa-magic" aria-hidden="true"></i></a>
    </div>
    </div>
    <div align="right">
    <a href="egresado/create"  class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> Crear</a>
    </div>
    </form>

</div>

<table class = "table table-sm table-bordered ">
<thead  class="thead-dark">
<tr>
            <th scope="col">No</th>
            <th scope="col">Identidad</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Género</th>
            <th scope="col">Carrera</th>
            <th scope="col">Año de Egreso</th>
            
            
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>

    <tbody>
    

        @foreach ($egresados as  $n=>$egresado)
        <tr>
            
            <th scope="row">{{++$n + ($egresados->perPage()*($egresados->currentPage()-1))}}</th>
            <td>{{$egresado->identidad}}</td>
            <td>{{$egresado->nombre}}</td>
            <td>{{$egresado->fecha_nacimiento}}</td>
            <td>{{$egresado->genero->name}}</td>
            <td>{{$egresado->carreras->Carrera}}</td>
            <td>{{$egresado->año_egresado}}</td>
           
           

            <td>
                <form action="{{route ('egresado.destroy',$egresado->id)}}" method="POST"> 
                <a type="button" href="/egresado/{{$egresado->id}}/edit" class="btn btn-info">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                @csrf
                @method('DELETE')       
               <button type="submit" class="btn btn-danger" onClick="return confirm('Esta seguro de eliminar el Registro')">
               <i class="fa fa-window-close" aria-hidden="true"></i></button>

               </form>
             </td>
        </tr>

        @endforeach
    </tbody>



  </table>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h1>Egresados</h1>
      </li>
{{$egresados->links()}}

@endsection 