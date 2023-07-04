@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Editar area</h1>
        <form method="POST" action="{{route('area.update',$area->idarea)}}">
        @method('put')
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Id</label>
                <input type="text" class="form-control" id="idarea" aria-describedby="emailHelp" name="idarea" 
                value="{{$area->idarea}}" disabled>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre"
              value="{{$area->nombre}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Descripcion</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$area->descripcion}}">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection