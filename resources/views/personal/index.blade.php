@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Listado de Personal</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Dni</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Nombres</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Fecha Ingreso</th>
            <th scope="col">Sueldo</th>
            <th scope="col">Puesto</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($personal as $itempersonal)
        <tr>
            <td>{{$itempersonal->idpersonal}}</td>
            <td>{{$itempersonal->dni}}</td>
            <td>{{$itempersonal->apellidos}}</td>
            <td>{{$itempersonal->nombres}}</td>
            <td>{{$itempersonal->fechanac}}</td>
            <td>{{$itempersonal->fechaIng}}</td>
            <td>{{$itempersonal->sueldo}}</td>
            <td>{{$itempersonal->puesto->nombre}}</td>
            <td>
                <a href="{{route('personal.edit',$itempersonal->idpersonal)}}" class="btn btn-info btn-sm"> Editar</a>
                <a href="{{route('personal.confirmar',$itempersonal->idpersonal)}}" class="btn btn-danger btn-sm"> Eliminar</a>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
</div>
    
@endsection