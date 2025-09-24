@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Seguimiento del Parqueo</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Espacios Registrados</b></h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($espacios as $espacio)
                            @php
                                $ticket_activo = $tickets_activos->firstWhere('espacio_id', $espacio->id);
                            @endphp
                            <div class="col-md-1 col-4" style="text-align: center;">
                                <h5>ESP-{{ $espacio->numero }}</h5>
                                @if ($ticket_activo)
                                    <button class="btn btn-danger btn-ocupado" data-ticket-id="{{ $ticket_activo->id }}"
                                        data-codigo="{{ $ticket_activo->codigo_ticket }}"
                                        data-cliente="{{ $ticket_activo->cliente->nombres }}"
                                        data-documento="{{ $ticket_activo->cliente->numero_documento }}"
                                        data-placa="{{ $ticket_activo->vehiculo->placa }}"
                                        data-numero_espacio="{{ $ticket_activo->espacio->numero }}"
                                        data-fecha_ingreso="{{ $ticket_activo->fecha_ingreso }}"
                                        data-hora_ingreso="{{ $ticket_activo->hora_ingreso }}"
                                        style="width: 100%;height: 220px;">
                                        <img src="{{ asset('storage/logos/' . $ajuste->logo_auto) }}"
                                            style="max-width: 60px; margin-top: 1px;"><br>
                                        <small>{{ $ticket_activo->vehiculo->placa }}</small><br>
                                        <small>{{ $ticket_activo->fecha_ingreso }}</small><br>
                                        <small>{{ $ticket_activo->hora_ingreso }}</small>
                                    </button>
                                @else
                                    @if ($espacio->estado == 'libre')
                                        <button class="btn btn-success btn-ticket" data-espacio-id="{{ $espacio->id }}"
                                            data-numero-espacio="{{ $espacio->numero }}"
                                            style="width: 100%;height: 220px;">
                                            LIBRE
                                        </button>
                                    @endif

                                    @if ($espacio->estado == 'mantenimiento')
                                        <button class="btn btn-warning btn-mantenimiento"
                                            style="width: 100%;height: 220px;">
                                            <small>Mantenimiento</small>
                                        </button>
                                    @endif
                                    @if ($espacio->estado == 'ocupado')
                                        <button class="btn btn-danger" style="width: 100%;height: 220px;">
                                            OCUPADO
                                        </button>
                                    @endif
                                @endif




                                <br><br>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- Modal para el ticket-->
    <div class="modal fade" id="modal_ticket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0921a8;color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Ticket del Espacio <span id="espacio"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/tickets/create') }}" method="POST" id="form_ticket">
                        @csrf
                        <input type="hidden" id="espacio_id" name="espacio_id">

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="placa">Placa del Vehiculo</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <select name="vehiculo_id" id="vehiculo_id" class="form-control select2">
                                            <option value="">Buscar Vehiculo...</option>
                                            @foreach ($vehiculos as $vehiculo)
                                                <option value="{{ $vehiculo->id }}">Placa: {{ $vehiculo->placa }} -
                                                    Cliente:
                                                    {{ $vehiculo->cliente->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('placa')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div style="height: 32px"></div>
                                    <a href="{{ url('/admin/clientes/create') }}" class="btn btn-primary">Nuevo Cliente</a>
                                </div>
                            </div>
                        </div>
                        <div id="info_vehiculo">

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tarifa">Tarifas</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <select name="tarifa_id" id="tarifa_id" class="form-control select2">
                                            @foreach ($tarifas as $tarifa)
                                                <option value="{{ $tarifa->id }}">Tarifa: {{ $tarifa->nombre }} - Tipo:
                                                    {{ $tarifa->tipo }} -
                                                    Cantidad: {{ $tarifa->cantidad }} - Costo:
                                                    {{ $ajuste->divisa . ' ' . $tarifa->costo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tarifa')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="obs">Observacion</label>
                                <textarea name="obs" class="form-control" id="obs" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <button class="btn btn-primary" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para el mantenimiento-->
    <div class="modal fade" id="modal_mantenimiento" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dda01c;color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Estado del Parqueo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: center">El Estado de este Espacio esta en Matenimiento</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para el ocupado-->
    <div class="modal fade" id="modal_ocupado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dd1c1c;color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Ticket </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <h1 style="margin: 5px 0;text-align: center">
                                <b>TICKET:</b> <span id="codigo_ticket"></span>
                            </h1>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Datos del Cliente: </b> <br>
                            <b>Señor(a): </b> <span id="cliente"></span> <br>
                            <b>Documento: </b> <span id="documento"></span> <br>
                            <b>placa del Vehiculo: </b> <span id="placa"></span> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Espacio Nro: </b> <span id="numero_espacio"></span> <br>
                            <b>Fecha de Ingreso: </b> <span id="fecha_ingreso"></span> <br>
                            <b>Hora de Ingreso: </b> <span id="hora_ingreso"></span> <br>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>

                            <form action="#" method="POST" id="form_cancel_ticket" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="ticket_id" id="ticket_id">
                                <button type="submit" class="btn btn-danger" id="btn_cancelar_ticket">
                                    <i class="fas fa-trash"></i> Cancelar Ticket</button>
                            </form>


                            <a href="#" id="btn_imprimir_ticket" data-dismiss="modal" data-toggle="modal"
                                data-target="#modal_pdf_ticket" class="btn btn-warning">
                                <i class="fas fa-print"></i> Imprimir</a>

                            <a href="#" id="btn_facturar" class="btn btn-success">
                                <i class="fas fa-money-bill"></i> Facturar</a>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para la vista de impresion ticket-->
    <div class="modal fade" id="modal_pdf_ticket" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dda01c;color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Impresion del Ticket
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdf_iframe_ticket" style="width: 100%; height: 50vh;" frameborder="0"></iframe>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para la vista de impresion de la factura-->
    <div class="modal fade" id="modal_pdf_factura" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dda01c;color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Impresion de la Factura
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdf_iframe_factura" style="width: 100%; height: 50vh;" frameborder="0"></iframe>
                </div>

            </div>
        </div>
    </div>



@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 35px !important;
        }
    </style>
@stop

@section('js')

    <script>
        let ticket_a_imprimir = null;
        $(document).ready(function() {
            $('.select2').select2({
                allowClear: true,
                width: '90%',
                dropdownParent: $('#modal_ticket')
            });

            $('#vehiculo_id').on('change', function() {
                var vehiculo_id = $(this).val();
                if (vehiculo_id) {
                    $.ajax({
                        url: "{{ url('/admin/tickets/vehiculo/') }}/" + vehiculo_id,
                        type: 'GET',
                        success: function(data) {
                            $('#info_vehiculo').html(data);
                        },
                        error: function() {
                            $('#info_vehiculo').html('<p> Error al Cargar la Informacion</p>');
                        }
                    });
                } else {
                    alert('Debe Seleccionar un Vehiculo')
                }
            });
        });

        $('#form_ticket').on('submit', function(event) {
            var espacio_id = $('#espacio_id').val();
            var vehiculo_id = $('#vehiculo_id').val();
            var tarifa_id = $('#tarifa_id').val();
            //alert(espacio_id+" - "+vehiculo_id+" - "+tarifa_id);
            if (!espacio_id || !vehiculo_id || !tarifa_id) {
                event.preventDefault();
                alert('Por favor Complete todos los campos');
            }
        });




        $('.btn-ticket').on('click', function() {
            var espacio_id = $(this).data('espacio-id');
            var numero_espacio = $(this).data('numero-espacio');
            $('#espacio_id').val(espacio_id);
            $('#espacio').html(numero_espacio);
            $('#modal_ticket').modal('show');
        });

        $('.btn-mantenimiento').on('click', function() {
            $('#modal_mantenimiento').modal('show');
        });

        $('.btn-ocupado').on('click', function() {
            var ticket_id = $(this).data('ticket-id');
            var codigo = $(this).data('codigo');
            var cliente = $(this).data('cliente');
            var documento = $(this).data('documento');
            var placa = $(this).data('placa');
            var numero_espacio = $(this).data('numero_espacio');
            var fecha_ingreso = $(this).data('fecha_ingreso');
            var hora_ingreso = $(this).data('hora_ingreso');

            $('#ticket_id').val(ticket_id);
            $('#codigo_ticket').html(codigo);
            $('#cliente').html(cliente);
            $('#documento').html(documento);
            $('#placa').html(placa);
            $('#numero_espacio').html(numero_espacio);
            $('#fecha_ingreso').html(fecha_ingreso);
            $('#hora_ingreso').html(hora_ingreso);

            ticket_a_imprimir = $(this).data('ticket-id');

            var url_finalizar_ticket = "{{ url('/admin/ticket') }}" + "/" + ticket_a_imprimir + "/finalizar_ticket";
            $('#btn_facturar').attr('href', url_finalizar_ticket);

            //$('#btn_imprimir_ticket').attr('href', urlImprimir);
            $('#modal_ocupado').modal('show');
        });

        $('#btn_imprimir_ticket').on('click', function() {
            if (ticket_a_imprimir) {
                var urlImprimir = "{{ url('/admin/ticket') }}" + "/" + ticket_a_imprimir + "/imprimir";
                $('#pdf_iframe_ticket').attr('src', urlImprimir);
            }
        });
    </script>

    @if (session('ticket_id'))
        <script>
            var ticket_id = {{ session('ticket_id') }};
            var urlImprimir = "{{ url('/admin/ticket') }}" + "/" + ticket_id + "/imprimir";
            $('#pdf_iframe_ticket').attr('src', urlImprimir);
            $('#modal_pdf_ticket').modal('show');
        </script>
    @endif

    @if (session('factura_id'))
        <script>
            var factura_id = {{ session('factura_id') }};
            var urlImprimir = "{{ url('/admin/factura') }}" + "/" + factura_id;
            $('#pdf_iframe_factura').attr('src', urlImprimir);
            $('#modal_pdf_factura').modal('show');
        </script>
    @endif

    <script>
        $('#form_cancel_ticket').on('click', function() {
            event.preventDefault();
            var ticket_id = $('#ticket_id').val();
            if (ticket_id) {
                Swal.fire({
                    title: "¿Desea Eiminar este Registro?",
                    text: "",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Eliminar",
                    denyButtonText: "No, Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var form = $('#form_cancel_ticket');
                        var url = "{{ url('/admin/ticket') }}" + "/" + ticket_id;
                        form.attr('action', url);
                        form.submit();
                    }
                });
            }
        });
    </script>
@stop
