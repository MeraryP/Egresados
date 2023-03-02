@extends('layouts.madre')

@section('title', 'Crear Carrera')

@section('content')



<form action ="/carreras"  method="POST">
    @csrf
<div class="mb-3">
    <label for="" class="form-label">Nombre de la carrera</label>
    <input type="text" name="carrera" id="carrera" class="form-control" tabindex="1">
</div>

<button type="submit" class="btn btn-primary" tabindex="4"><span class="fas fa-user-plus"></span> Guardar</button>
<a href="/carreras" class="btn btn-secondary" tabindex="5"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>


</form>

@endsection