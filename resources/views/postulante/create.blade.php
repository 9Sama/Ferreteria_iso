@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Nuevo postulante</h1>
        <form method="POST" action="{{route('postulante.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dni:</label>
            <input type="number" class="form-control @error('dni') is-invalid  @enderror" id="dni" aria-describedby="emailHelp" name="dni" min="10000000" max="99999999">
            @error('dni')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellidos:</label>
            <input type="text" class="form-control @error('apellidos') is-invalid  @enderror" id="apellidos" aria-describedby="emailHelp" name="apellidos" >
            @error('apellidos')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombres:</label>
            <input type="text" class="form-control @error('nombres') is-invalid  @enderror" id="nombres" aria-describedby="emailHelp" name="nombres">
            @error('nombres')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">Direccion:</label>
            <input type="text" class="form-control @error('direccion') is-invalid  @enderror" id="direccion" aria-describedby="emailHelp" name="direccion" >
            @error('direccion')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">Fecha Nacimiento:</label>
            <input type="date" class="form-control @error('fechanac') is-invalid  @enderror" id="fechanac" aria-describedby="emailHelp" name="fechanac" >
            @error('fechanac')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular:</label>
            <input type="number" class="form-control @error('celular') is-invalid  @enderror" id="celular" aria-describedby="emailHelp" name="celular" min="100000000" max="999999999">
            @error('celular')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Grado Estudios:</label>
            <input type="text" class="form-control @error('gradoEstudios') is-invalid  @enderror" id="gradoEstudios" aria-describedby="emailHelp" name="gradoEstudios">
            @error('gradoEstudios')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Centro Estudios:</label>
            <input type="text" class="form-control @error('centroEstudios') is-invalid  @enderror" id="centroEstudios" aria-describedby="emailHelp" name="centroEstudios">
            @error('centroEstudios')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection