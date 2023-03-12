@extends('layouts.app')

@section('title', 'Datos de usuario')

@section('content')
<style>
    .form-control{
        border-top-left-radius: 5px !important;
        border-bottom-left-radius: 5px !important;
        border-top-right-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
        padding-left: 5px !important;
    }
</style>

        <center><h1></h1></center>

        <br>
        <br>
        
        <div class="input-group mb-3">
        <label for="" style="width:20%">Nombre Completo:</label>
            <input type="text" class="form-control" value="{{auth()->user()->name}}" disabled>
        </div>

        <div class="input-group mb-3">
            <label for="" style="width:20%">Nombre de usuario:</label>
            <input type="text" class="form-control" value="{{auth()->user()->username}}" disabled>
        </div>

        <div class="input-group mb-3">
            <label for="" style="width:20%">Correo electronico:</label>
            <input type="text" class="form-control" value="{{auth()->user()->correo}}" disabled>
        </div>

        <div class="input-group mb-3">
            <label for="" style="width:20%">Fecha de nacimiento:</label>
            <input type="text" class="form-control" value="{{auth()->user()->nacimiento}}" disabled>
        </div>

        <div class="input-group mb-3">
            <label for="" style="width:20%">Identidad:</label>
            <input type="text" class="form-control" value="{{auth()->user()->identidad}}" disabled>
        </div>

        <div class="input-group mb-3">
            <label for="" style="width:20%">Teléfono:</label>
            <input type="text" class="form-control" value="{{auth()->user()->telefono}}" disabled>
        </div>

      
        <br>
        <a type="button" class="btn btn-primary"href="/contrasenia" ><i class="fa fa-key" aria-hidden="true"></i>
          Cambiar Contraseña
        </a>
        
       
       <a type="button" class="btn btn-danger" href="../"   ><i class="fa fa-reply-all" aria-hidden="true"></i>
            Volver a inicio
        </a>

       

@stop