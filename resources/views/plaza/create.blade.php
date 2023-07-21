@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Nueva plaza</h1>
        <form method="POST" action="{{route('plaza.store')}}">
        @csrf
        <div class="form-group">
            <label class="control-label">PUESTO:</label>
           <select class="form-control @error('idpuesto') is-invalid  @enderror" id="idpuesto" name="idpuesto" >
            @foreach ($puesto as $itempuesto)
                <option value="{{$itempuesto['idpuesto']}}"> {{$itempuesto['nombre']}}</option>
            @endforeach
           </select>
           @error('idpuesto')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cantidad:</label>
            <input type="number" class="form-control @error('cantidad') is-invalid  @enderror" id="cantidad" name="cantidad">
            @error('cantidad')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion convocatoria</label>
            <textarea class="form-control @error('cantidad') is-invalid  @enderror" name="convocatoria" id="convocatoria" cols="10" rows="5"></textarea>
            @error('convocatoria')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
          </form>
    </div>
@endsection