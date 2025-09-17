@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Clientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">clientes</li>
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
                    <h3 class="card-title"><b>Clientes Registrados</b></h3>
                    <!-- /.card-tools -->
                    <div class="card-tools">
                        <a href="{{ url('/admin/clientes/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                            Crear
                            Nuevo</a>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="table1" class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">Nro</th>
                                            <th>Nombre del Cliente</th>
                                            <th>Numero de Documento</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Genero</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes as $cliente)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $cliente->nombres }}</td>
                                                <td>{{ $cliente->numero_documento }}</td>
                                                <td>{{ $cliente->email }}</td>
                                                <td>{{ $cliente->celular }}</td>
                                                <td>{{ $cliente->genero }}</td>
                                                <td style="text-align: center">
                                                    @if ($cliente->estado == 1)
                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center">

                                                    @if (!$cliente->deleted_at)
                                                     <a href="{{ url('/admin/cliente/' . $cliente->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fas fa-car"></i>
                                                            Ver</a>
                                                        <a href="{{ url('/admin/cliente/' . $cliente->id . '/edit') }}"
                                                            class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                                            Editar</a>
                                                        <form action="{{ url('/admin/cliente/' . $cliente->id) }}"
                                                            id="miformulario{{ $cliente->id }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="preguntar{{ $cliente->id }}(event)">
                                                                <i class="fas fa-trash-alt"></i> Eliminar</button>
                                                        </form>
                                                        <script>
                                                            function preguntar{{ $cliente->id }}(event) {
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
                                                                        document.getElementById('miformulario{{ $cliente->id }}').submit();
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    @else
                                                        <form
                                                            action="{{ url('/admin/cliente/' . $cliente->id . '/restaurar') }}"
                                                            id="miformulario{{ $cliente->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm"
                                                                onclick="preguntar{{ $cliente->id }}(event)">
                                                                <i class="fas fa-save"></i> Restaurar Cliente
                                                            </button>
                                                        </form>
                                                        <script>
                                                            function preguntar{{ $cliente->id }}(event) {
                                                                event.preventDefault();
                                                                Swal.fire({
                                                                    title: "¿Desea Restaurar este Cliente?",
                                                                    text: "",
                                                                    icon: "question",
                                                                    showDenyButton: true,
                                                                    confirmButtonText: "Restaurar",
                                                                    confirmButtonColor: "#a5161d",
                                                                    denyButtonColor: "#270a0a",
                                                                    denyButtonText: "Cancelar",
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        document.getElementById('miformulario{{ $cliente->id }}').submit();
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    @endif




                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                    "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                    "lengthMenu": "Mostrar _MENU_ Clientes",
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
