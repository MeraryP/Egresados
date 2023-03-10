@extends('layouts.app')

@section('title', 'Egresados')


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

<div class="contrainer">



<div  align="center" >
    <form action="{{route('egresado.index')}}"  method="get">
    <div >
    <div class="col-sm-5 " style="float:left">
        <input type="text" class="form-control" name="texto" value='{{$texto}}' >    
    </div>
    <div class="col-sm-2 " style="float:left">
    <button type="submit" class="btn btn-primary" title="Buscar Egresado" value="Buscar" style="width:45%;height:45px" ><i class="fa fa-search" aria-hidden="true"></i></button>
    <a type="button" href="./egresado" class="btn btn-danger" title="Limpiar busqueda" style="width:45%;height:45px"><i class="fa fa-magic" aria-hidden="true"></i></a>
    </div>
    <div align="right" style="float:right">
    <a href="egresado/create" title="Crear Registro" class="btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i> Crear</a>
    </div>
    </div>
    </form>

</div>
<br>
<br>
<br>
<table class = "table table-sm table-bordered ">
<thead  class="thead-dark">
<tr>
            <th scope="col">No</th>
            <th scope="col">Identidad</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Carrera</th>
            <th scope="col">Año de Egreso</th>
            
            
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>

    <tbody>
    

        @foreach ($egresados as  $n=>$egresado)
        <tr>
            
            <th scope="row">{{++$n + ($egresados->perPage()*($egresados->currentPage()-1))}}</th>
            <td>{{$egresado->identidad}}</td>
            <td>{{$egresado->nombre}}</td>
            <td>{{$egresado->carreras->Carrera}}</td>
            <td>{{$egresado->año_egresado}}</td>
           
           

            <td>
            <a type="button" style="width:25%;height:35px" title="Editar registro" href="./egresado/{{$egresado->id}}/edit" class="btn btn-info" >
                <i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                <button type="bottom" style="width:25%;height:35px" onClick="borrar{{$egresado->id}}()" title="Eliminar registro" class="btn btn-danger">
               <i class="fa fa-window-close" aria-hidden="true"></i></button>
                <form action="{{route ('egresado.destroy',$egresado->id)}}" method="POST" id="eliminar{{$egresado->id}}"> 
                
                @csrf
                @method('DELETE')       
               
               <script>
                function borrar{{$egresado->id}}(){
                    Swal.fire({
  title: 'Eliminar Egresado',
  text: '¿Desea eliminar al egresado seleccionado?',
  icon: 'error',
  showCancelButton: true,
  confirmButtonText: 'Si',
  cancelButtonText: `No`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.value) {
    document.getElementById('eliminar{{$egresado->id}}').submit();
  } else {
    
  }
})
                }

                </script>

               </form>
             </td>
        </tr>

        @endforeach
    </tbody>

  </table>
  {{$egresados->links()}}

 

@endsection 