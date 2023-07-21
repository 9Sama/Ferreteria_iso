@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Listado de ventas</h1>
        <a href="{{ route('ventas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva venta</a>

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
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->fecha_hora }}</td>
                        <td>{{ $venta->serie_comprobante }}-{{ $venta->num_comprobante }}</td>
                        <td>{{ $venta->nombre }}</td>
                        <td>{{ $venta->impuesto }}</td>
                        <td>{{ $venta->total }}</td>
                        <td>{{ $venta->estado }}</td>
                        <td>
                            <a href="{{ route('ventas.show', $venta->idventa) }}" class="btn btn-info btn-sm">
                                Mostrar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
