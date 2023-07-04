@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Listado de Postulante</h1>
    <a href="{{route('postulante.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Nuevo registro</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Dni</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Nombres</th>
            <th scope="col">Grado Estudios</th>
            <th scope="col">Centro Estudios</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($postulante as $itempostulante)
        <tr>
            <td>{{$itempostulante->idpostulante}}</td>
            <td>{{$itempostulante->dni}}</td>
            <td>{{$itempostulante->apellidos}}</td>
            <td>{{$itempostulante->nombres}}</td>
            <td>{{$itempostulante->gradoEstudios}}</td>
            <td>{{$itempostulante->centroEstudios}}</td>
            <td>
                <a href="{{route('postulante.edit',$itempostulante->idpostulante)}}" class="btn btn-info btn-sm"> Editar</a>
                <a href="{{route('postulante.confirmar',$itempostulante->idpostulante)}}" class="btn btn-danger btn-sm"> Eliminar</a>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
</div>
    
@endsection