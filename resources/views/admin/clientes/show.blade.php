@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><b>Cliente: </b>{{ $cliente->nombres }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/clientes') }}">Listado de Clientes</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos Registrados del Cliente</b></h3>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombres"><i class="fas fa-user"></i> Nombre Completo</label>
                                <p>{{ $cliente->nombres }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="numero_documento"><i class="fas fa-id-card"></i> Numero de Documento</label>
                                <p>{{ $cliente->numero_documento }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Correo Electronico</label>
                                <p>{{ $cliente->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="celular"><i class="fas fa-mobile-alt"></i> Celular</label>
                                <p>{{ $cliente->celular }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="genero"><i class="fas fa-venus-mars"></i> Genero</label>
                                <p>{{ $cliente->genero }}</p>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="estado">Estado</label><br>
                                @if ($cliente->estado == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Listado de Vehiculos</b></h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#ModalCreateVehiculo">
                            <i class="fas fa-plus"></i> Crear Nuevo
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalCreateVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2945c4; color: white;">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de Vehículos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/clientes/vehiculos/create') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $cliente->id }}" name="cliente_id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="placa">Placa del Vehiculo</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-car"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('placa') }}" name="placa" id="placa"
                                                                placeholder="ABC-123" style="text-transform: uppercase;"
                                                                required>
                                                        </div>
                                                        @error('placa')
                                                            <small style="color: red;">*{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="marca">Marca</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-industry"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('marca') }}" name="marca"
                                                                id="marca" placeholder="Toyota, Honda, Etc" required>
                                                        </div>
                                                        @error('marca')
                                                            <small style="color: red;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="modelo">Modelo</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-car-side"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('modelo') }}" name="modelo"
                                                                id="modelo" placeholder="Corolla, Civic, Etc" required>
                                                        </div>
                                                        @error('modelo')
                                                            <small style="color: red;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="color">Color</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-palette"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('color') }}" name="color"
                                                                id="color" placeholder="Rojo, Azul, Etc" required>
                                                        </div>
                                                        @error('color')
                                                            <small style="color: red;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="tipo">Tipo de Vehiculo</label><b> (*)</b>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-truck"></i></span>
                                                            </div>
                                                            <select class="form-control" name="tipo" id="tipo"
                                                                required>
                                                                <option value="auto"
                                                                    {{ old('tipo') == 'auto' ? 'selected' : '' }}>Automovil
                                                                </option>
                                                                <option value="motocicleta"
                                                                    {{ old('tipo') == 'motocicleta' ? 'selected' : '' }}>
                                                                    Motocicleta</option>
                                                                <option value="camion"
                                                                    {{ old('tipo') == 'camion' ? 'selected' : '' }}>Camión
                                                                </option>
                                                            </select>
                                                        </div>
                                                        @error('tipo')
                                                            <small style="color: red;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">Nro</th>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente->vehiculos as $vehiculo)
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $vehiculo->placa }}</td>
                                        <td>{{ $vehiculo->marca }}</td>
                                        <td>{{ $vehiculo->modelo }}</td>
                                        <td>{{ $vehiculo->color }}</td>
                                        <td>{{ $vehiculo->tipo }}</td>
                                        <td class="d-flex justify-content-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#ModalEditVehiculo{{ $vehiculo->id }}">
                                                <i class="fas fa-edit"></i> Editar</a>
                                                
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="ModalEditVehiculo{{ $vehiculo->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header"
                                                            style="background-color: #1f9c44; color: white;">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modificar Datos del
                                                                Vehículos</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/clientes/vehiculo/'.$vehiculo->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="{{ $cliente->id }}"
                                                                    name="cliente_id">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="placa">Placa del
                                                                                Vehiculo</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-car"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ old('placa', $vehiculo->placa) }}"
                                                                                    name="placa" id="placa"
                                                                                    placeholder="ABC-123"
                                                                                    style="text-transform: uppercase;"
                                                                                    required>
                                                                            </div>
                                                                            @error('placa')
                                                                                <small
                                                                                    style="color: red;">*{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="marca">Marca</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-industry"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ old('marca', $vehiculo->marca) }}"
                                                                                    name="marca" id="marca"
                                                                                    placeholder="Toyota, Honda, Etc"
                                                                                    required>
                                                                            </div>
                                                                            @error('marca')
                                                                                <small
                                                                                    style="color: red;">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="modelo">Modelo</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-car-side"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ old('modelo', $vehiculo->modelo) }}"
                                                                                    name="modelo" id="modelo"
                                                                                    placeholder="Corolla, Civic, Etc"
                                                                                    required>
                                                                            </div>
                                                                            @error('modelo')
                                                                                <small
                                                                                    style="color: red;">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="color">Color</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-palette"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ old('color', $vehiculo->color) }}"
                                                                                    name="color" id="color"
                                                                                    placeholder="Rojo, Azul, Etc" required>
                                                                            </div>
                                                                            @error('color')
                                                                                <small
                                                                                    style="color: red;">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="tipo">Tipo de
                                                                                Vehiculo</label><b> (*)</b>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i
                                                                                            class="fas fa-truck"></i></span>
                                                                                </div>
                                                                                <select class="form-control" name="tipo" id="tipo" required>
                                                                                    <option value="auto" {{ old('tipo', $vehiculo->tipo) == 'auto' ? 'selected' : '' }}>
                                                                                        Automovil
                                                                                    </option>
                                                                                    <option value="motocicleta"
                                                                                        {{ old('tipo', $vehiculo->tipo) == 'motocicleta' ? 'selected' : '' }}>
                                                                                        Motocicleta</option>
                                                                                    <option value="camion"
                                                                                        {{ old('tipo', $vehiculo->tipo) == 'camion' ? 'selected' : '' }}>
                                                                                        Camión
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            @error('tipo')
                                                                                <small
                                                                                    style="color: red;">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Actualizar</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->


                                            <form action="{{ url('/admin/clientes/vehiculo/' . $vehiculo->id) }}"
                                                id="miformulario{{ $vehiculo->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="preguntar{{ $vehiculo->id }}(event)">
                                                    <i class="fas fa-trash-alt"></i> Eliminar</button>
                                            </form>
                                            <script>
                                                function preguntar{{ $vehiculo->id }}(event) {
                                                    event.preventDefault();
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
                                                            document.getElementById('miformulario{{ $vehiculo->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #table1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #table1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados*/
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6e7176;
            color: #212529;
            border: none;
        }
    </style>
@stop

@section('js')
    <script>
        $(function() {
            $("#table1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Vehículos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Vehículos",
                    "infoFiltered": "(Filtrado de _MAX_ total Vehículos)",
                    "lengthMenu": "Mostrar _MENU_ Vehículos",
                    "loadingRecords": "Cargando ...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior",
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    }
                ]
            }).buttons().container().appendTo('#table1_wrapper .row:eq(0)');
        });
    </script>
@stop
