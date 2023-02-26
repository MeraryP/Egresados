@extends('adminlte::page')

@section('title', 'Datos de usuario')

@section('content')

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
            <label for="" style="width:20%">Telefono:</label>
            <input type="text" class="form-control" value="{{auth()->user()->telefono}}" disabled>
        </div>

        <div class="input-group mb-3">
        <label for="" style="width:20%">Contraseña:</label>
            <input type="password"  class="form-control" value="{{auth()->user()->password}}" disabled>
        </div>

        <a type="button" class="btn btn-danger" href="/">
            Volver a inicio
        </a>

        <nav class="main-header navbar navbar-expand navbar-white">
       <!-- Left navbar links -->
       <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
            <h1>Datos del Usuario</h1>
       </li>

@stop