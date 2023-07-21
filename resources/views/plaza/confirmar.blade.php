@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Desea eliminar plaza? Plaza del puesto: {{$plaza->puesto->nombre}}</h1>
        <form method="POST" action="{{route('plaza.destroy',$plaza->idplaza)}}">
        @method('delete')
        @csrf
            <button type="submit" class="btn btn-danger">Confirmar</button>
            <a href="javascript:history.back()" class="btn btn-primary">Cancelar</a>
          </form>
    </div>
@endsection