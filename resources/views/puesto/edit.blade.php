@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Editar postulante</h1>
        <form method="POST" action="{{route('puesto.update',$puesto->idpuesto)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id</label>
            <input type="text" class="form-control" id="idpostulante" aria-describedby="emailHelp" name="idpostulante" 
            value="{{$puesto->idpuesto}}" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">AREA:</label>
           <select class="form-control" id="idarea" name="idarea">
            @foreach ($area as $itemarea)
                <option value="{{$itemarea['idarea']}}"  {{$itemarea->idarea == $puesto->idarea ? 'selected' :''}}> {{$itemarea['nombre']}}</option>
            @endforeach
           </select>
        </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" name="nombre" 
                value="{{$puesto->nombre}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" aria-describedby="emailHelp" name="descripcion" 
                value="{{$puesto->descripcion}}">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection