@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Registrar ventas</h1>

        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">Datos</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <label for="fecha">Fecha</label>
                                        <input type="date" class="form-control" name="fecha">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Comprobante</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select name="tipo_comprobante" class="form-control">
                                            <option value="">Seleccione ...</option>
                                            <option value="Boleta">Boleta</option>
                                            <option value="Factura">Factura</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="serie_comprobante"
                                            placeholder="serie: FF01 F001">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="num_comprobante"
                                            placeholder="número: 001">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier">Cliente</label>
                                <select name="idpersona" class="form-control" required>
                                    <option value="">Seleccione ...</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->idpersona }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="products">Agregar Productos</label>
                                <select name="idarticulo" id="select-idarticulo" class="form-control"
                                    onchange="addProductOrder();">
                                    <option value="">Seleccione productos</option>
                                    @foreach ($articulos as $articulo)
                                        <option
                                            value="{{ $articulo->idarticulo }}_{{ $articulo->codigo }}_{{ $articulo->nombre }}_{{ $articulo->precio_venta }}">
                                            {{ $articulo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">Productos</div>
                        <div class="card-body">
                            <table id="product_detail" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-success btn-round"
                                id="btnSubmit">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/product_sale.js') }}"></script>
@endsection
