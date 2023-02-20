@extends('adminlte::page')

@section('title', 'Listado de usuario')

@section('content')

<center><h1>Listado de usuario</h1></center>

<table class = "table table-dark table-striped mt-4">
<thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Correo electronico</th>
            <th scope="col">Telefono</th>
            <th scope="col">Identidad</th>
            
            
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $m=>$users)
        <tr>
            <th scope="row">{{++$m + ($usuarios->perPage()*($usuarios->currentPage()-1))}}</th>
            <td>{{$users->name}}</td>
            <td>{{$users->username}}</td>
            <td>{{$users->nacimiento}}</td>
            <td>{{$users->correo}}</td>
            <td>{{$users->telefono}}</td>
            <td>{{$users->identidad}}</td>
           
           

            <td>
                @if($users->estado == 0)
                    <a type="button" href="{{route('user.desactivar',['id'=>$users->id])}}" class="btn btn-danger">
                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </a>
                @else
                    <a type="button" href="{{route('user.activar',['id'=>$users->id])}}" class="btn btn-success">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$usuarios->links()}}
@stop