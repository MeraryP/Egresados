@extends('layouts.madre');

@section('title', 'Carrera')

@section('content')
<script>
    var msg = '{{Session::get('mensaje')}}';
    var exist = '{{Session::has('mensaje')}}';
    if(exist){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: msg,
            showConfirmButton: false,
            toast: true,
            background: '#0be004ab',
            timer: 3500
        })
    }

</script>

<script>
    function quitarerror(){
    const elements = document.getElementsByClassName('alert');
    while (elements[0]){
        elements[0].parentNode.removeChild(elements[0]);
    }
}

setTimeout(quitarerror, 3000);
</script>
<br>
<div align="right">
 <a href="carreras/create" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> Crear</a>
</div>
<br>


<table class = "table table-sm table-bordered">

    <thead class="thead-dark"  >
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Carrera</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

    <tbody>
        
    @foreach ($carreras as $n=>$carrera)
        <tr>
            <th scope="row">{{++$n }}</th>
       
            <td>{{$carrera->Carrera}}</td>

            <td>
                <form action="{{route ('carreras.destroy',$carrera->id )}}" method="POST"> 
                <a type="button" href="/carreras/{{$carrera->id}}/edit" class="btn btn-info">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                @csrf
              
                </form>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>


<!-- Navbar -->
    <!-- Left navbar links -->
    <nav class="main-header navbar navbar-expand navbar-white">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
               <h1>Carreras</h1>
      </li>
@endsection 