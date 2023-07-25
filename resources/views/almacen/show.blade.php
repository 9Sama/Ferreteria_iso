@extends('layout.plantilla')
@section('contenido')
    <div class="card">
        <!-- Main content -->
        <div class="card-body">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fa fa-globe"></i> Ferretería
                        <small class="float-right">Fecha: {{ $date }}</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    De
                    <address>
                        <strong>Ferretería</strong><br>
                        13006, ABC<br>
                        Trujillo 13006<br>
                        Celular: +51 999999999<br>
                        Email: contacto@ferreteria.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Compra {{ $num_compra }}</b><br>
                    <br>
                    <b>Fecha de pago:</b> {{ Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cant.</th>
                                <th>Mercadería</th>
                                <th>Código</th>
                                <th>Subtotal</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compra_details as $compra_detail)
                                <tr>
                                    <td>{{ $compra_detail->quantity }}</td>
                                    <td>{{ $compra_detail->name }}</td>
                                    <td>{{ $compra_detail->id }}</td>
                                    <td>S/. {{ $compra_detail->totalprice }}</td>
                                    <td>
                                        <select name="estado" class="form-control"
                                            id="estado_{{ $compra_detail->id }}_{{ $compra_detail->iddetalle_ingreso }}">
                                            <option value=""> Seleccione estado</option>
                                            <option value="0" @if ($compra_detail->estado == 0) selected @endif>OK
                                            </option>
                                            <option value="1" @if ($compra_detail->estado == 1) selected @endif>
                                                Defectuoso</option>
                                            <option value="2" @if ($compra_detail->estado == 2) selected @endif>
                                                Faltante</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Monto Pagado
                        {{ Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>S/. {{ $compra->subtotal }}</td>
                            </tr>
                            <tr>
                                <th>IGV (18%)</th>
                                <td>S/. {{ $compra->impuesto }}</td>
                            </tr>
                            <tr>
                                <th>Envío:</th>
                                <td>S/. 0</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>S/. {{ $compra->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="{{ route('almacen.index') }}" class="btn btn-default float-right" style="margin-right: 5px;">
                        <i class="fa fa-reply fa-lg mr-2"></i> Regresar
                    </a>
                    @if ($compra->estado == 'PENDIENTE')
                        {
                        <button class="btn btn-danger float-right" style="margin-right: 5px;" data-toggle="modal"
                            data-target="#rejectOrder_{{ $compra->idingreso }}">Rechazar</button>
                        <button class="btn btn-success float-right" style="margin-right: 5px;" data-toggle="modal"
                            data-target="#approveOrder_{{ $compra->idingreso }}">Aprobar</button>
                        }
                    @endif

                </div>
            </div>

            <!-- Modal update supplier-->
            <div class="modal fade" id="approveOrder_{{ $compra->idingreso }}" tabindex="-1"
                aria-labelledby="approveOrderLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approveOrderLabel">Editar compra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('compras.approve', $compra->idingreso) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <p>Estas seguro de aceptar la compra
                                    {{ $compra->serie_comprobante }}-{{ $compra->num_comprobante }}?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Aprobar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal update supplier-->
            <div class="modal fade" id="rejectOrder_{{ $compra->idingreso }}" tabindex="-1"
                aria-labelledby="rejectOrderLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectOrderLabel">Eliminar compra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('compras.reject', $compra->idingreso) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <p>Estas seguro de rechazar la compra
                                    {{ $compra->serie_comprobante }}-{{ $compra->num_comprobante }}?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-danger">Rechazar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Si deseas cargarla desde una CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Función para enviar la petición al servidor
        function actualizarEstado(id, estado, compra_id) {
            axios.put(`/almacen/products/change/${id}/${compra_id}`, {
                    estado: estado
                })
                .then(response => {
                    console.log('Estado actualizado correctamente.');
                })
                .catch(error => {
                    console.error('Error al actualizar el estado:', error);
                });
        }

        // Agregar un evento de escucha a todos los elementos select
        const selectElements = document.querySelectorAll('select[name="estado"]');
        selectElements.forEach(select => {
            select.addEventListener('change', function() {
                const id = this.getAttribute('id').split('_')[1];
                const compra_id = this.getAttribute('id').split('_')[2];
                const estado = this.value;
                actualizarEstado(id, estado, compra_id);
            });
        });
    </script>
@endsection
