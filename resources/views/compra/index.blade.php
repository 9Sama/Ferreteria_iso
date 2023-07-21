@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Listado de Compras</h1>
        <a href="{{ route('compras.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Compra</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Impuesto</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->fecha }}</td>
                        <td>{{ $compra->serie_comprobante }}-{{ $compra->num_comprobante }}</td>
                        <td>{{ $compra->nombre }}</td>
                        <td>{{ $compra->impuesto }}</td>
                        <td>{{ $compra->total }}</td>
                        <td>{{ $compra->estado }}</td>
                        <td>
                            <a href="{{ route('compras.show', $compra->idingreso) }}" class="btn btn-info btn-sm">
                                Mostrar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
