@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Listado de Plazas</h1>
    <a href="{{route('plaza.create')}}" class="btn btn-primary">Nuevo registro</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Puesto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($plaza as $itempuesto)
        <tr>
            <td>{{$itempuesto->idplaza}}</td>
            <td>{{$itempuesto->puesto->nombre}}</td>
            <td>{{$itempuesto->cantidad}}</td>
            <td>
                <a href="{{route('plaza.edit',$itempuesto->idplaza)}}" class="btn btn-info btn-sm"> Editar</a>
                <a href="{{route('plaza.confirmar',$itempuesto->idplaza)}}" class="btn btn-danger btn-sm"> Eliminar</a>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
</div>
    
@endsection