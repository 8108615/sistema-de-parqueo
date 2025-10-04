@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Mi Perfil</h1>
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

    <form action="{{ url('/perfil/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" value="{{ $usuario->id }}" hidden>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Informacion Personal </b></h3>
                        <!-- /.card-tools -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="rol">Roles</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select name="rol" class="form-control" id="" disabled>
                                                    <option value="">Seleccione un Rol</option>
                                                    @foreach ($roles as $role)
                                                        @if (!($role->name == 'SUPER-ADMIN'))
                                                            <option value="{{ $role->name }}"
                                                                {{ old('rol', $usuario->roles->pluck('name')->implode(', ')) == $role->name ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                            @error('rol')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombres">Nombres</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('nombres', $usuario->nombres) }}" name="nombres"
                                                    placeholder="Ingrese el nombre del usuario" required>
                                            </div>
                                            @error('nombres')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('apellidos', $usuario->apellidos) }}" name="apellidos"
                                                    placeholder="Ingrese el apellido del usuario" required>
                                            </div>
                                            @error('apellidos')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email">Correo Electronico</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control"
                                                    value="{{ old('email', $usuario->email) }}" name="email"
                                                    placeholder="Ingrese el Correo Electronico" required>
                                            </div>
                                            @error('email')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tipo_documento">Tipo de Documento</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                </div>
                                                <select name="tipo_documento" class="form-control" id="tipo_documento"
                                                    required>
                                                    <option value="">Seleccione un Tipo de Documento</option>
                                                    <option value="DNI"
                                                        {{ old('tipo_documento', $usuario->tipo_documento) == 'DNI' ? 'selected' : '' }}>
                                                        DNI</option>
                                                    <option value="CARNET DE EXTRANJERIA"
                                                        {{ old('tipo_documento', $usuario->tipo_documento) == 'CARNET DE EXTRANJERIA' ? 'selected' : '' }}>
                                                        CARNET DE EXTRANJERIA</option>
                                                    <option value="PASAPORTE"
                                                        {{ old('tipo_documento', $usuario->tipo_documento) == 'PASAPORTE' ? 'selected' : '' }}>
                                                        PASAPORTE
                                                    </option>
                                                    <option value="RUC"
                                                        {{ old('tipo_documento', $usuario->tipo_documento) == 'RUC' ? 'selected' : '' }}>
                                                        RUC</option>
                                                    <option value="CI"
                                                        {{ old('tipo_documento', $usuario->tipo_documento) == 'CI' ? 'selected' : '' }}>
                                                        CI
                                                    </option>
                                                </select>
                                            </div>
                                            @error('tipo_documento')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="numero_documento">Numero de Documento</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('numero_documento', $usuario->numero_documento) }}"
                                                    name="numero_documento" id="numero_documento"
                                                    placeholder="Ingrese el Numero de Documento" required>
                                            </div>
                                            @error('numero_documento')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="celular">Celular</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-mobile-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('celular', $usuario->celular) }}" name="celular"
                                                    id="celular" placeholder="Ingrese el Celular" required>
                                            </div>
                                            @error('celular')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha de Nacimiento</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" class="form-control"
                                                    value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}"
                                                    name="fecha_nacimiento" id="fecha_nacimiento"
                                                    placeholder="Ingrese la Fecha de Nacimiento" required>
                                            </div>
                                            @error('fecha_nacimiento')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="genero">Género</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-venus-mars"></i></span>
                                                </div>
                                                <select name="genero" id="genero" class="form-control" required>
                                                    <option value="">Seleccione el Género</option>
                                                    <option value="Masculino"
                                                        {{ old('genero', $usuario->genero) == 'Masculino' ? 'selected' : '' }}>
                                                        Masculino</option>
                                                    <option value="Femenino"
                                                        {{ old('genero', $usuario->genero) == 'Femenino' ? 'selected' : '' }}>
                                                        Femenino</option>
                                                    <option value="Otro"
                                                        {{ old('genero', $usuario->genero) == 'Otro' ? 'selected' : '' }}>
                                                        Otro
                                                    </option>
                                                </select>
                                            </div>
                                            @error('genero')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-map-marker-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    value="{{ old('direccion', $usuario->direccion) }}" name="direccion"
                                                    id="direccion" placeholder="Ingrese la Dirección" required>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red;">*{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="foto">Fotografia</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-image"></i>
                                                    </span>
                                                </div>
                                                <input type="file" class="form-control" name="foto" id="foto"
                                                    accept="image/*" onchange="mostrarImagen(event)">
                                                    
                                            </div>
                                            <center>
                                                @if (isset($usuario) && $usuario->foto)
                                                    <img id="preview1" src="{{ asset('storage/fotos/' . $usuario->foto) }}"
                                                        style="max-width: 200px; margin-top: 10px;">
                                                @else
                                                    <img id="preview1" src=""
                                                        style="max-width: 200px; margin-top: 10px;">
                                                @endif
                                            </center>
                                            @error('foto')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <script>
                                        const mostrarImagen = e =>
                                            document.getElementById("preview1").src = URL.createObjectURL(e.target.files[0]);
                                    </script>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><b>Contactos de Emergencia</b></h3>
                        <!-- /.card-tools -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto_nombre">Nombre del Contacto de Emergencia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-shield"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="{{ old('contacto_nombre', $usuario->contacto_nombre) }}"
                                            name="contacto_nombre" id="contacto_nombre"
                                            placeholder="Ingrese el Nombre del Contacto de Emergencia" required>
                                    </div>
                                    @error('contacto_nombre')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto_telefono">Telefono del Contacto de Emergencia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="{{ old('contacto_telefono', $usuario->contacto_telefono) }}"
                                            name="contacto_telefono" id="contacto_telefono"
                                            placeholder="Ingrese el Telefono del Contacto de Emergencia" required>
                                    </div>
                                    @error('contacto_telefono')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contacto_parentesco">Parentesco del Contacto de Emergencia</label><b>
                                        (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="{{ old('contacto_parentesco', $usuario->contacto_parentesco) }}"
                                            name="contacto_parentesco" id="contacto_parentesco"
                                            placeholder="Ingrese el Parentesco del Contacto de Emergencia" required>
                                    </div>
                                    @error('contacto_parentesco')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
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
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"><b>Seguridad - Cambio de Contraseña</b></h3>
                        <!-- /.card-tools -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_actual">Contraseña Actual</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password_actual"
                                            id="password_actual" placeholder="Ingrese su Contraseña Actual" >
                                    </div>
                                    @error('password_actual')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_nueva">Nueva Contraseña</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password_nueva"
                                            id="password_nueva" placeholder="Ingrese su Nueva Contraseña">
                                    </div>
                                    @error('password_nueva')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_confirmacion">Confirma Nueva Contraseña</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password_confirmacion"
                                            id="password_confirmacion" placeholder="Confirme su Nueva Contraseña">
                                    </div>
                                    @error('password_confirmacion')
                                        <small style="color: red;">*{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>



        <hr>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/admin') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                    Regresar</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Cambios</button>
            </div>
        </div>

    </form>
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
