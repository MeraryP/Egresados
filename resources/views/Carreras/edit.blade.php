@extends('layouts.madre');

@section('title', 'Carrera')

@section('content')


<form method="POST" action ="{{ route('carrera.update',['id'=>$carrera->id])}}">
@method('put')
    @csrf

   
<div class="mb-3">
    <label for="" class="form-label">Nombre de la carrera</label>
    <input type="text" name="carrera" id="carrera" class="form-control" value="{{ $carrera->Carrera }}">
</div>

<button type="submit" class="btn btn-primary" tabindex="4"><span class="fas fa-user-plus"></span>Guardar cambios</button>
<a href="/carreras" class="btn btn-secondary" tabindex="5"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>

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