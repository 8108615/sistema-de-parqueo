@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Datos del Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/usuarios') }}">Listado de Usuarios</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b><i class="fas fa-user"></i> Información Personal</b></h3>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <b><i class="fas fa-user"></i> Nombre Completo</b>
                            <p>{{ $usuario->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <b><i class="fas fa-envelope"></i> Correo Electrónico</b>
                            <p>{{ $usuario->email }}</p>
                        </div>
                        <div class="col-md-3">
                            <b><i class="fas fa-id-card"></i> Documento</b>
                            <p>{{ $usuario->tipo_documento." - ".$usuario->numero_documento }}</p>
                        </div>
                        <div class="col-md-3">
                            <b><i class="fas fa-mobile-alt"></i> Celular</b>
                            <p>{{ $usuario->celular }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <b><i class="fas fa-birthday-cake"></i> Fecha de Nacimiento</b>
                            <p>{{ $usuario->fecha_nacimiento }}</p>
                        </div>
                        <div class="col-md-3">
                            <b><i class="fas fa-venus-mars"></i> Género</b>
                            <p>{{ $usuario->genero }}</p>
                        </div>
                        <div class="col-md-6">
                            <b><i class="fas fa-map-marker-alt"></i> Dirección</b>
                            <p>{{ $usuario->direccion }}</p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>


            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b><i class="fas fa-user"></i> Contactos de Emergencia</b></h3>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <b><i class="fas fa-user"></i> Nombre </b>
                            <p>{{ $usuario->contacto_nombre }}</p>
                        </div>
                        <div class="col-md-4">
                            <b><i class="fas fa-mobile-alt"></i> Telefono</b>
                            <p>{{ $usuario->contacto_telefono }}</p>
                        </div>
                        <div class="col-md-4">
                            <b><i class="fas fa-id-card"></i> Parentesco</b>
                            <p>{{ $usuario->contacto_parentesco }}</p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-2">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><b><i class="fas fa-user"></i> Perfil</b></h3>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            @if ($usuario->foto)
                                <img src="{{ asset('storage/'.$usuario->foto) }}" class="profile-user-img img-fluid img-circle" alt="foto del usuario">
                            @else
                                <img src="{{ url('/images/avatar.jpg') }}" class="profile-user-img img-fluid img-circle" alt="foto del usuario">
                            @endif

                            <h3 class="profile-username">{{ $usuario->name }}</h3>

                            <button class="btn btn-warning">{{ $usuario->roles->pluck('name')->implode(', ') }}</button>

                            <br>

                             @if ($usuario->estado == 1)
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-danger">Inactivo</span>
                            @endif

                            <hr>
                            <small><b>Hora y Fecha de Creacion:</b> <br> {{ $usuario->created_at }}</small>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
