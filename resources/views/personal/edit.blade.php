@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Editar personal</h1>
        <form method="POST" action="{{route('personal.update',$personal->idpersonal)}}">
        @method('put')
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Id</label>
                <input type="text" class="form-control" id="idpostulante" aria-describedby="emailHelp" name="idpostulante" 
                value="{{$personal->idpersonal}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dni:</label>
                <input type="number" class="form-control" id="dni" aria-describedby="emailHelp" name="dni"
                min="10000000" max="99999999" value="{{$personal->dni}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" name="apellidos" 
                value="{{$personal->apellidos}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" name="nombres" 
                value="{{$personal->nombres}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento:</label>
                <input type="date" class="form-control" id="fechanac" aria-describedby="emailHelp" name="fechanac" 
                value="{{$personal->fechanac}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Ingreso:</label>
                <input type="date" class="form-control" id="fechaIng" aria-describedby="emailHelp" name="fechaIng" 
                value="{{$personal->fechaIng}}">
            </div>
            <div class="form-group">
                <label class="control-label">PUESTO:</label>
               <select class="form-control" id="idpuesto" name="idpuesto">
                @foreach ($puesto as $itempuesto)
                    <option value="{{$itempuesto['idpuesto']}}"  {{$itempuesto->idpuesto == $personal->idpuesto ? 'selected' :''}}> {{$itempuesto['nombre']}}</option>
                @endforeach
               </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sueldo:</label>
                <input type="number" class="form-control" id="sueldo" aria-describedby="emailHelp" name="sueldo"
                value="{{$personal->sueldo}}">
              </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection