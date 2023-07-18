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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compra_details as $compra_detail)
                                <tr>
                                    <td>{{ $compra_detail->quantity }}</td>
                                    <td>{{ $compra_detail->name }}</td>
                                    <td>{{ $compra_detail->id }}</td>
                                    <td>S/. {{ $compra_detail->totalprice }}</td>
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
                    <a href="{{ route('compras.index') }}" class="btn btn-default float-right" style="margin-right: 5px;">
                        <i class="fa fa-reply fa-lg mr-2"></i> Regresar
                    </a>
                    <button class="btn btn-danger float-right" style="margin-right: 5px;" data-toggle="modal"
                        data-target="#rejectOrder_{{ $compra->idingreso }}">Rechazar</button>
                    <button class="btn btn-success float-right" style="margin-right: 5px;" data-toggle="modal"
                        data-target="#approveOrder_{{ $compra->idingreso }}">Aprobar</button>
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
