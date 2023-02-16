@extends('layout.plantillabase');

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

<form action ="/carreras"  method="POST">
    @csrf
<div class="mb-3">
    <label for="" class="form-label">Nombre de la carrera</label>
    <input type="text" name="carrera" id="carrera" class="form-control" tabindex="1">
</div>

<button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
<a href="/carreras" class="btn btn-secondary" tabindex="5">Cancelar</a>


</form>

@endsection