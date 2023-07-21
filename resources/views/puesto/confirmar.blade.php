@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Desea eliminar puesto? Nombre: {{$puesto->nombre}}</h1>
        <form method="POST" action="{{route('puesto.destroy',$puesto->idpuesto)}}">
        @method('delete')
        @csrf
            <button type="submit" class="btn btn-danger">Confirmar</button>
            <a href="javascript:history.back()" class="btn btn-primary">Cancelar</a>
          </form>
    </div>
@endsection