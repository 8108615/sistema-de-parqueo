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
                            <div class="col" style="text-align: center;">
                                <h5>ESP-{{ $espacio->numero }}</h5>

                                @if ($espacio->estado == 'libre')
                                    <button class="btn btn-success btn-ticket" data-espacio-id="{{ $espacio->id }}" data-numero-espacio="{{ $espacio->numero }}"
                                        style="width: 100%;height: 120px;">
                                        LIBRE
                                    </button>
                                @endif

                                @if ($espacio->estado == 'mantenimiento')
                                    <button class="btn btn-warning btn-mantenimiento" style="width: 100%;height: 120px;">
                                        <small>Mantenimiento</small>
                                    </button>
                                @endif

                                @if ($espacio->estado == 'ocupado')
                                    <button class="btn btn-danger btn-ocupado" style="width: 100%;height: 120px;">
                                        <img src="{{ asset('storage/logos/' . $ajuste->logo_auto) }}"
                                            style="max-width: 100px; margin-top: 5px;">
                                    </button>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="placa">Placa del Vehiculo</label><b> (*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-car"></i></span>
                                    </div>
                                    <select name="placa" id="placa" class="form-control select2">
                                        <option value="">Buscar Vehiculo...</option>
                                        @foreach ($vehiculos as $vehiculo)
                                            <option value="{{ $vehiculo->id }}">Placa: {{ $vehiculo->placa }} - Cliente: {{ $vehiculo->cliente->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('placa')
                                    <small style="color: red;">*{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div id="info_vehiculo">

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para el mantenimiento-->
    <div class="modal fade" id="modal_mantenimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dd1c1c;color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Ticket </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

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
        $(document).ready(function() {
            $('.select2').select2({
                allowClear:true,
                width: '90%',
                dropdownParent: $('#modal_ticket')
            });

            $('.select2').on('change', function() {
                var vehiculo_id = $(this).val();
                if(vehiculo_id) {
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


        $('.btn-ticket').on('click', function() {
            var espacio_id = $(this).data('espacio-id');
            var numero_espacio = $(this).data('numero-espacio');
            $('#espacio').html(numero_espacio);
            $('#modal_ticket').modal('show');
        });

        $('.btn-mantenimiento').on('click', function() {
            $('#modal_mantenimiento').modal('show');
        });

        $('.btn-ocupado').on('click', function() {
            $('#modal_ocupado').modal('show');
        });
    </script>
@stop
