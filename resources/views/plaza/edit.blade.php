@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Editar plaza</h1>
        <form method="POST" action="{{route('plaza.update',$plaza->idplaza)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id</label>
            <input type="text" class="form-control" id="idplaza" aria-describedby="emailHelp" name="idplaza" 
            value="{{$plaza->idplaza}}" disabled>
        </div>
        <div class="form-group">
            <label class="control-label">PUESTO:</label>
           <select class="form-control" id="idpuesto" name="idpuesto">
            @foreach ($puesto as $itempuesto)
                <option value="{{$itempuesto['idpuesto']}}"  {{$itempuesto->idpuesto == $plaza->idpuesto ? 'selected' :''}}> {{$itempuesto['nombre']}}</option>
            @endforeach
           </select>
        </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" aria-describedby="emailHelp" name="cantidad" 
                value="{{$plaza->cantidad}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion convocatoria</label>
                <textarea class="form-control" name="convocatoria" id="convocatoria" cols="10" rows="5">{{$plaza->convocatoria}}"</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection