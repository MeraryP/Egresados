@extends('adminlte::page');

@section('title','Egresado')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
      <h1>danis</h1>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form  method="POST" action="{{ route('egresado.update',['id'=>$egresado->id])}}">
    @method('put')
    @csrf
<div class="mb-3">
    <label for="" class="form-label">Identidad</label>
    <input type="text" name="identidad" id="identidad" class="form-control" placeholder="0000-0000-00000" value="{{ $egresado->identidad }}">
</div>
<div class="mb-3">
        <label for="" class="form-label">Nombre Completo</label>
        <input type="text"  name="nombre"  id="nombre" class="form-control"placeholder="Nombre Completo del Estudiante" value="{{ $egresado->nombre }}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Fecha de Nacimiento</label>
        <input type="text" name="fecha"  id="fecha"  class="form-control" placeholder="0000-00-00" value="{{ $egresado->fecha_nacimiento }}">
      </div>

      
      <div class="for-group">
        <label for="">Género</label>
        <select class="form-control" name="gene_id">
        <option style="display:none" value="{{$egresado->gene_id}}"> {{$egresado->genero->name}}</option>
        @foreach ($generos as $genero)
        <option value="{{$genero->id}}">{{$genero->name}}</option>
        @endforeach      
      </select>
      </div>

       
      <div class="mb-3">
      <label for="">Carrera</label>
      <select class="form-control" name="carre_id">
      <option style="display:none"value="{{$egresado->carre_id}}"> {{$egresado->carreras->Carrera}}</option> 
        @foreach ($carreras as $carrera)
        <option value="{{$carrera->id}}">{{$carrera->Carrera}}</option>
        @endforeach      
      </select>
      </div> 

      <div class="mb-3">
        <label for="">Año de Egreso</label>
        <input type="number" class="form-control" name="egreso"  id="egreso" placeholder="####" value="{{ $egresado->año_egresado }}">
      </div>

<button type="submit" class="btn btn-primary" tabindex="4"><span class="fas fa-user-plus"></span> Guardar cambios</button>     
<a href="/egresado" class="btn btn-secondary" tabindex="5"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h1>Editar Registro</h1>
      </li>
      
      

</form>

@endsection