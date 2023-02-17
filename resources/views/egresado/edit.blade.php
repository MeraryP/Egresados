@extends('layout.plantillaegresados');

@section('contenido')
<h2>Editar registro</h2>

@if ($errors->any())
    <div class="alert alert-danger">
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

      <div class="mb-3">
        <label for="">Género</label>
        <select class="custom-select" name="genero" id="genero" value="{{ $egresado->genero }}">
        <option {{ $egresado->genero == "Femenino" ? "selected" : ""  }}>Femenino</option>
        <option {{ $egresado->genero == "Masculino" ? "selected" : ""  }}>Masculino</option>
      </select>
      </div>

      <div class="mb-3">
        <label for="">Carrera</label>
        <select id="combo2" class="custom-select" name="carrera" id="carrera" value="{{ $egresado->carreras }}">
        <option {{ $egresado->carreras == "Bachillerato en Ciencias y Letras" ? "selected" : "" }}>Bachillerato en Ciencias y Letras</option>
        <option {{ $egresado->carreras == "Bachillerato en Ciencias y Humanidades" ? "selected" : "" }}>Bachillerato en Ciencias y Humanidades</option>
        <option {{ $egresado->carreras == "Perito Mercantil y Contador Público" ? "selected" : "" }}>Perito Mercantil y Contador Público</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="">Año de Egreso</label>
        <input type="number" class="form-control" name="egreso"  id="egreso" placeholder="####" value="{{ $egresado->año_egresado }}">
      </div>

<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>     
<a href="/egresados" class="btn btn-secondary" tabindex="5">Cancelar</a>

</form>

@endsection