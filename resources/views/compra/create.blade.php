@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Registrar Compras</h1>

        <form action="{{ route('compras.store') }}" method="POST">
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
                                <label for="fecha">Comprabante</label>
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
                                <label for="supplier">Proveedor</label>
                                <select name="idpersona" class="form-control" required>
                                    <option value="">Seleccione ...</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->idpersona }}">{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="products">Agregar Productos</label>
                                <select name="idarticulo" id="select-idarticulo" class="form-control"
                                    onchange="addProductOrder();">
                                    <option value="">Producto nuevo</option>
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
    <script src="{{ asset('js/product_add.js') }}"></script>
    <script>
        document.getElementById('options').addEventListener('change', function() {
            var selectedOption = this.value;
            if (selectedOption === "0") {
                alert('Primero debes seleccionar una opción diferente a la opción 0.');
                this.selectedIndex = 0; // Selecciona el primer elemento (Seleccione una opción)
            }
        });
    </script>
@endsection
