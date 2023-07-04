@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Editar postulante</h1>
        <form method="POST" action="{{route('postulante.update',$postulante->idpostulante)}}">
        @method('put')
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Id</label>
                <input type="text" class="form-control" id="idpostulante" aria-describedby="emailHelp" name="idpostulante" 
                value="{{$postulante->idpostulante}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dni</label>
                <input type="number" class="form-control" id="dni" aria-describedby="emailHelp" name="dni"
                value="{{$postulante->dni}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" name="apellidos" 
                value="{{$postulante->apellidos}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" name="nombres" 
                value="{{$postulante->nombres}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Grado Estudios</label>
                <input type="text" class="form-control" id="gradoEstudios" aria-describedby="emailHelp" name="gradoEstudios" 
                value="{{$postulante->gradoEstudios}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Centro Estudios</label>
                <input type="text" class="form-control" id="centroEstudios" aria-describedby="emailHelp" name="centroEstudios" 
                value="{{$postulante->centroEstudios}}">
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection