@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <h1>Listado de clientes</h1>

        <button class="btn btn-primary" data-toggle="modal" data-target="#createSuppliers">
            <i class="fa fa-plus"></i> Nuevo registro
        </button>

        <!-- Modal create supplier-->
        <div class="modal fade" id="createSuppliers" tabindex="-1" aria-labelledby="createSuppliersLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSuppliersLabel">Registrar cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('clientes.store') }}" method="POST">
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
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->idpersona }}</td>
                        <td>{{ $cliente->num_documento }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#updateSuppliers_{{ $cliente->idpersona }}">Editar</button>

                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#deleteSuppliers_{{ $cliente->idpersona }}">Editar</button>
                        </td>
                    </tr>

                    <!-- Modal update supplier-->
                    <div class="modal fade" id="updateSuppliers_{{ $cliente->idpersona }}" tabindex="-1"
                        aria-labelledby="updateSuppliersLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateSuppliersLabel">Editar cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('clientes.update', $cliente->idpersona) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tipo_documento">Tipo de Documento</label>
                                            <select name="tipo_documento" class="form-control" required>
                                                <option value="">Seleccione ...</option>
                                                <option value="dni" @if ($cliente->tipo_documento == 'dni') selected @endif>DNI
                                                </option>
                                                <option value="ruc" @if ($cliente->tipo_documento == 'ruc') selected @endif>RUC
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="num_documento">Nro de Documento</label>
                                            <input type="text" name="num_documento" class="form-control"
                                                value="{{ $cliente->num_documento }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="nombre" class="form-control"
                                                value="{{ $cliente->nombre }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $cliente->email }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" name="direccion" class="form-control"
                                                value="{{ $cliente->direccion }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="text" name="telefono" class="form-control"
                                                value="{{ $cliente->telefono }}">
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
                    <div class="modal fade" id="deleteSuppliers_{{ $cliente->idpersona }}" tabindex="-1"
                        aria-labelledby="deleteSuppliersLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteSuppliersLabel">Eliminar cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('clientes.delete', $cliente->idpersona) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal-body">
                                        <p>Estas seguro de eliminar a {{ $cliente->nombre }} de los registros?</p>
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
