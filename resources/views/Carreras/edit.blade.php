@extends('adminlte::page');

@section('title', 'Carrera')

@section('content')
<h2>Editar registro</h2>

<form method="POST" action ="{{ route('carrera.update',['id'=>$carrera->id])}}">
@method('put')
    @csrf

   
<div class="mb-3">
    <label for="" class="form-label">Nombre de la carrera</label>
    <input type="text" name="carrera" id="carrera" class="form-control" value="{{ $carrera->Carrera }}">
</div>

<button type="submit" class="btn btn-primary" tabindex="4"><span class="fas fa-user-plus"></span> Guardar cambios</button>
<a href="/carreras" class="btn btn-secondary" tabindex="5"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>

</form>


@endsection