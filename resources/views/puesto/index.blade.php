@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Listado de Puestos</h1>
    <a href="{{route('puesto.create')}}" class="btn btn-primary">Nuevo registro</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Puesto</th>
            <th scope="col">Área</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($puesto as $itempuesto)
        <tr>
            <td>{{$itempuesto->idpuesto}}</td>
            <td>{{$itempuesto->nombre}}</td>
            <td>{{$itempuesto->area->nombre}}</td>
            <td>{{$itempuesto->descripcion}}</td>
            <td>
                <a href="{{route('puesto.edit',$itempuesto->idpuesto)}}" class="btn btn-info btn-sm"> Editar</a>
                <a href="{{route('puesto.confirmar',$itempuesto->idpuesto)}}" class="btn btn-danger btn-sm"> Eliminar</a>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
</div>
    
@endsection