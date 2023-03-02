@extends('layouts.madre')

@section('title','Editar Egresado')

@section('content')



<form  method="POST" action="{{ route('egresado.update',['id'=>$egresado->id])}}">
    @method('put')
    @csrf


<div class="mb-3">
    <label for="" class="form-label">Identidad</label>
    <input type="text" maxlength="15" pattern="[0-9]{4}-[0-9]{4}-[0-9]{5}" 
    title="Ingrese número de Identidad separado por guiones"
    name="identidad" id="identidad" class="form-control @error('identidad') is-invalid @enderror"  placeholder="0000-0000-00000" 
    value="{{ $egresado->identidad }}"
    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

    @error('identidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
</div>
       <div class="mb-3">
        <label for="" class="form-label">Nombre Completo</label>
        <input type="text"  name="nombre"  id="nombre"  class="form-control @error('nombre') is-invalid @enderror"   placeholder="Nombre Completo del Estudiante" value="{{ $egresado->nombre }}"
        title="Ingrese el nombre completo del egresado">
        @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>



      <div class="mb-3">
        <label for="" class="form-label">Fecha de Nacimiento</label>
        <input type="text" name="fecha"  id="fecha"  class="form-control @error('fecha') is-invalid @enderror" placeholder="0000-00-00" value="{{ $egresado->fecha_nacimiento }}"
        title="Ingrese la fecha de nacimiento ">
        @error('fecha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
        <input type="number"  class="form-control @error('egreso') is-invalid @enderror"  name="egreso"  id="egreso" placeholder="####" value="{{ $egresado->año_egresado }}"
        title="Ingrese el año de egreso">
        @error('egreso')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>

<button type="submit" class="btn btn-primary" tabindex="4"><span class="fas fa-user-plus"></span> Guardar cambios</button>     
<a href="/egresado" class="btn btn-danger" tabindex="5"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>



      
      

</form>

@endsection