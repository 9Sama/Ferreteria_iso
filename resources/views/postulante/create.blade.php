@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Nuevo postulante</h1>
        <form method="POST" action="{{route('postulante.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dni</label>
            <input type="number" class="form-control" id="dni" aria-describedby="emailHelp" name="dni">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" name="apellidos" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" name="nombres">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Grado Estudios</label>
            <input type="text" class="form-control" id="gradoEstudios" aria-describedby="emailHelp" name="gradoEstudios">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Centro Estudios</label>
            <input type="text" class="form-control" id="centroEstudios" aria-describedby="emailHelp" name="centroEstudios">
        </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection