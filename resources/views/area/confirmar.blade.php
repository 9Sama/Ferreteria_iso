@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Desea eliminar area? Nombre: {{$area->nombre}}</h1>
        <form method="POST" action="{{route('area.destroy',$area->idarea)}}">
        @method('delete')
        @csrf
            <button type="submit" class="btn btn-danger">Confirmar</button>
            <a href="javascript:history.back()" class="btn btn-primary">Cancelar</a>
          </form>
    </div>
@endsection