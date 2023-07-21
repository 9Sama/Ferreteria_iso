@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Listado de Proveedores</h1>

        <button class="btn btn-primary" data-toggle="modal" data-target="#createSuppliers">
            <i class="fa fa-plus"></i> Nuevo registro
        </button>

        <!-- Modal create supplier-->
        <div class="modal fade" id="createSuppliers" tabindex="-1" aria-labelledby="createSuppliersLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSuppliersLabel">Registrar Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('proveedores.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tipo_documento">Tipo de Documento</label>
                                <select name="tipo_documento" class="form-control" required>
                                    <option value="">Seleccione ...</option>
                                    <option value="dni">DNI</option>
                                    <option value="ruc">RUC</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="num_documento">Nro de Documento</label>
                                <input type="text" name="num_documento" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">RUC</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Email</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->idpersona }}</td>
                        <td>{{ $proveedor->num_documento }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#updateSuppliers_{{ $proveedor->idpersona }}">Editar</button>

                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteSuppliers_{{ $proveedor->idpersona }}">Editar</button>
                        </td>
                    </tr>

                    <!-- Modal update supplier-->
                    <div class="modal fade" id="updateSuppliers_{{ $proveedor->idpersona }}" tabindex="-1"
                        aria-labelledby="updateSuppliersLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateSuppliersLabel">Editar Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('proveedores.update', $proveedor->idpersona) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tipo_documento">Tipo de Documento</label>
                                            <select name="tipo_documento" class="form-control" required>
                                                <option value="">Seleccione ...</option>
                                                <option value="dni" @if ($proveedor->tipo_documento == 'dni') selected @endif>DNI
                                                </option>
                                                <option value="ruc" @if ($proveedor->tipo_documento == 'ruc') selected @endif>RUC
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="num_documento">Nro de Documento</label>
                                            <input type="text" name="num_documento" class="form-control"
                                                value="{{ $proveedor->num_documento }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="nombre" class="form-control"
                                                value="{{ $proveedor->nombre }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $proveedor->email }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" name="direccion" class="form-control"
                                                value="{{ $proveedor->direccion }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="text" name="telefono" class="form-control"
                                                value="{{ $proveedor->telefono }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal update supplier-->
                    <div class="modal fade" id="deleteSuppliers_{{ $proveedor->idpersona }}" tabindex="-1"
                        aria-labelledby="deleteSuppliersLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteSuppliersLabel">Eliminar Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('proveedores.delete', $proveedor->idpersona) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-body">
                                        <p>Estas seguro de eliminar a {{ $proveedor->nombre }} de los registros?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
