@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Nueva area</h1>
        <form method="POST" action="{{route('area.store')}}">
        @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre</label>
              <input type="text" class="form-control @error('nombre') is-invalid  @enderror" id="nombre" aria-describedby="emailHelp" name="nombre">
              @error('nombre')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Descripcion</label>
              <input type="text" class="form-control @error('descripcion') is-invalid  @enderror" id="descripcion" name="descripcion">
              @error('descripcion')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection