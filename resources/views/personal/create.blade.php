@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Nuevo personal</h1>
        <form method="POST" action="{{route('personal.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Idpostulante:</label>
            <input type="number" class="form-control" id="idpostulante" aria-describedby="emailHelp" name="idpostulante"
             value="{{$postulante->idpostulante}}">
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dni:</label>
            <input type="number" class="form-control" id="dni" aria-describedby="emailHelp" name="dni"
            min="10000000" max="99999999" value="{{$postulante->dni}}">
            @error('dni')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" name="apellidos" 
            value="{{$postulante->apellidos}}">
            @error('apellidos')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombres:</label>
            <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" name="nombres" 
            value="{{$postulante->nombres}}">
            @error('nombres')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccion:</label>
            <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp" name="direccion" 
            value="{{$postulante->direccion}}">
            @error('direccion')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento:</label>
            <input type="date" class="form-control" id="fechanac" aria-describedby="emailHelp" name="fechanac" 
            value="{{$postulante->fechanac}}">
            @error('fechanac')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Celular:</label>
            <input type="number" class="form-control" id="celular" aria-describedby="emailHelp" name="celular" min="100000000" max="999999999"
            value="{{$postulante->celular}}">
            @error('celular')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Grado Estudios:</label>
            <input type="text" class="form-control" id="gradoEstudios" aria-describedby="emailHelp" name="gradoEstudios" 
            value="{{$postulante->gradoEstudios}}">
            @error('gradoEstudios')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Centro Estudios:</label>
            <input type="text" class="form-control" id="centroEstudios" aria-describedby="emailHelp" name="centroEstudios" 
            value="{{$postulante->centroEstudios}}">
            @error('centroEstudios')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Puesto:</label>
            <select class="form-control @error('idpuesto') is-invalid  @enderror" id="idpuesto" name="idpuesto" >
                @foreach ($puesto as $itempuesto)
                    <option value="{{$itempuesto['idpuesto']}}"> {{$itempuesto['nombre']}}</option>
                @endforeach
               </select>
            @error('idpuesto')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">Fecha Ingreso:</label>
            <input type="date" class="form-control @error('fechaIng') is-invalid  @enderror" id="fechaIng" aria-describedby="emailHelp" name="fechaIng" >
            @error('fechaIng')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sueldo:</label>
            <input type="number" class="form-control @error('sueldo') is-invalid  @enderror" id="sueldo" aria-describedby="emailHelp" name="sueldo">
            @error('sueldo')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection