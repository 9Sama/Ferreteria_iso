@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Gestión de Almacen</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
            Nuevo Producto
        </button>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
            Nueva Categoría
        </button>

        <!-- Modal Product-->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('almacen.products.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Categoría: </label>
                                <select name="idcategoria" class="form-control">
                                    <option value="">Seleccione ...</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Codigo: </label>
                                <input class="form-control" type="text" name="codigo">
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input class="form-control" type="text" name="nombre">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Precio de Venta: </label>
                                        <input class="form-control" type="text" name="precio_venta">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Stock: </label>
                                        <input class="form-control" type="text" name="stock">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea class="form-control" name="descripcion"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('almacen.categories.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nombre">Nombre: </label>
                                <input class="form-control" type="text" name="nombre">
                            </div>

                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea class="form-control" name="descripcion"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row card">
            <table class="table" style="font-size: 25px">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->codigo }}</td>
                            <td>{{ $articulo->nombre }}</td>
                            <td>{{ $articulo->categoria }}</td>
                            <td>{{ $articulo->stock }}</td>
                            <td>{{ $articulo->precio_venta }}</td>

                            @if ($articulo->estado == 4 || $articulo->estado == 3 || $articulo->estado == 2 || $articulo->estado == 1)
                                <td>
                                    No necesita cambios
                                </td>
                            @else
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#btnRegistrar{{ $articulo->idarticulo }}">
                                        <h2>Registrar</h2>
                                    </button>
                                </td>
                            @endif
                        </tr>

                        <!-- Modal btnRegistrar-->
                        <div class="modal fade" id="btnRegistrar{{ $articulo->idarticulo }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <form action="{{ route('almacen.register', $articulo->idarticulo) }}" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registrar proucto</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            @method('PUT')
                                            <div class="from-group">
                                                <label for="nombre">Categoría: </label>
                                                <select name="idcategoria" class="form-control" required>
                                                    <option value="">Seleccione ...</option>
                                                    @foreach ($categorias as $categoria)
                                                        <option value="{{ $categoria->idcategoria }}">
                                                            {{ $categoria->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>

                                            <div class="from-group">
                                                <label for="nombre">Nombre: </label>
                                                <input type="text" class="form-control" name="nombre"
                                                    value="{{ $articulo->nombre }}">
                                            </div>
                                            <br>

                                            <div class="from-group">
                                                <label for="nombre">Stock: </label>
                                                <input type="text" class="form-control" name="stock"
                                                    value="{{ $articulo->stock }}">
                                            </div>
                                            <br>

                                            <div class="from-group mb-1">
                                                <label for="nombre">(*) Descripción:</label>
                                                <textarea type="text" class="form-control" name="descripcion">{{ $articulo->descripcion }}</textarea>
                                            </div>
                                            <p>(*) Campo no requerido, puede dejarlo en blanco</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
