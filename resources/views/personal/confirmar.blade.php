@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Desea eliminar personal? Dni: {{$personal->dni}}</h1>
        <form method="POST" action="{{route('personal.destroy',$personal->idpersonal)}}">
        @method('delete')
        @csrf
            <button type="submit" class="btn btn-danger">Confirmar</button>
            <a href="javascript:history.back()" class="btn btn-primary"> Cancelar</a>
          </form>
    </div>
@endsection