@extends('layout.plantillaegresados');

@section('contenido')
<h2>Crear registro</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action ="/egresados"  method="POST">
    @csrf
<div class="mb-3">
    <label for="" class="form-label">Identidad</label>
    <input type="text" name="identidad" id="identidad" class="form-control" placeholder="0000-0000-00000">
</div>
<div class="mb-3">
        <label for="" class="form-label">Nombre Completo</label>
        <input type="text"  name="nombre"  id="nombre" class="form-control"placeholder="Nombre Completo del Estudiante">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Fecha de Nacimiento</label>
        <input type="text" name="fecha"  id="fecha"  class="form-control" placeholder="0000-00-00">
      </div>

      <div class="mb-3">
        <label for="">Género</label>
        <select class="custom-select" name="genero" id="genero">
        <option>Femenino</option>
        <option>Masculino</option>
      </select>
      </div>

      <div class="mb-3">
        <label for="">Carrera</label>
        <select id="combo2" class="custom-select" name="carrera" id="carrera">  
        <option>Bachillerato en Ciencias y Letras</option>
        <option>Bachillerato en Ciencias y Humanidades</option>
       
        </select>
      </div>
      <div class="mb-3">
        <label for="">Año de Egreso</label>
        <input type="number" class="form-control" name="egreso"  id="egreso" placeholder="####">
      </div>

<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>     
<a href="/egresados" class="btn btn-secondary" tabindex="5">Cancelar</a>


</form>

@endsection