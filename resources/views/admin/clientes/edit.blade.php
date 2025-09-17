@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Modificar Datos del Cliente</h1>
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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Llene los Campos del Formulario </b></h3>
                    <!-- /.card-tools -->
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/cliente/'.$cliente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombres">Nombre Completo</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{old('nombres',$cliente->nombres)}}" 
                                            name="nombres" id="nombres" placeholder="Ingrese el nombre Completo" required>
                                    </div>
                                    @error('nombres')
                                        <small style="color: red;">*{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_documento">Numero de Documento</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{old('numero_documento',$cliente->numero_documento)}}" 
                                            name="numero_documento" placeholder="Ingrese el numero de documento" required>
                                    </div>
                                    @error('numero_documento')
                                        <small style="color: red;">*{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" value="{{old('email',$cliente->email)}}" 
                                            name="email" id="email" placeholder="Ingrese el email" required>
                                    </div>
                                    @error('email')
                                        <small style="color: red;">*{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="celular">Celular</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{old('celular',$cliente->celular)}}" 
                                            name="celular" id="celular" placeholder="Ingrese el celular" required>
                                    </div>
                                    @error('celular')
                                        <small style="color: red;">*{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="genero">Genero</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        </div>
                                        <select class="form-control" name="genero" id="genero" required>
                                            <option value="">Seleccione un Genero...</option>
                                            <option value="Masculino"{{ old('genero',$cliente->genero) == 'Masculino' ? ' selected' : '' }}>Masculino</option>
                                            <option value="Femenino"{{ old('genero',$cliente->genero) == 'Femenino' ? ' selected' : '' }}>Femenino</option>
                                            <option value="Otros"{{ old('genero',$cliente->genero) == 'Otros' ? ' selected' : '' }}>Otros</option>
                                        </select>
                                    </div>
                                    @error('genero')
                                        <small style="color: red;">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('/admin/clientes') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
