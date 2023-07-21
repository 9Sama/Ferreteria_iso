@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Listado de Areas</h1>
    <a href="{{route('area.create')}}" class="btn btn-primary">Nuevo registro</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($area as $itemarea)
        <tr>
            <td>{{$itemarea->idarea}}</td>
            <td>{{$itemarea->nombre}}</td>
            <td>{{$itemarea->descripcion}}</td>
            <td>
                <a href="{{route('area.edit',$itemarea->idarea)}}" class="btn btn-info btn-sm"> Editar</a>
                <a href="{{route('area.confirmar',$itemarea->idarea)}}" class="btn btn-danger btn-sm"> Eliminar</a>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
</div>
    
@endsection