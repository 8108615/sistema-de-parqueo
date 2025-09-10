@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                    <h3 class="card-title"><b>Usuarios Registrados</b></h3>
                    <!-- /.card-tools -->
                    <div class="card-tools">
                        <a href="{{ url('/admin/usuarios/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear
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
                                            <th>Rol de Usuario</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Tipo Documento</th>
                                            <th>Número Documento</th>
                                            <th>Celular</th>
                                            <th style="text-align: center">Estado</th>
                                            <th style="text-align: center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                                                <td>{{ $usuario->nombres }}</td>
                                                <td>{{ $usuario->apellidos }}</td>
                                                <td>{{ $usuario->tipo_documento }}</td>
                                                <td>{{ $usuario->numero_documento }}</td>
                                                <td>{{ $usuario->celular }}</td>
                                                <td style="text-align: center">
                                                    @if ($usuario->estado == 1)
                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>

                                                <td class="d-flex justify-content-center">
                                                    <a href="{{ url('/admin/usuario/' . $usuario->id) }}" class="btn btn-info btn-sm"><i
                                                            class="fas fa-eye"></i> Ver</a>
                                                    <a href="{{ url('/admin/usuario/' . $usuario->id . '/edit') }}"
                                                        class="btn btn-success btn-sm"><i class="fas fa-edit"></i>
                                                        Editar</a>
                                                    <form action="{{ url('/admin/usuario/' . $usuario->id) }}"
                                                        id="miformulario{{ $usuario->id }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="preguntar{{ $usuario->id }}(event)">
                                                            <i class="fas fa-trash-alt"></i> Eliminar</button>
                                                    </form>
                                                    <script>
                                                        function preguntar{{ $usuario->id }}(event) {
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
                                                                    document.getElementById('miformulario{{ $usuario->id }}').submit();
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                    "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                    "lengthMenu": "Mostrar _MENU_ Usuarios",
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
