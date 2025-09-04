@extends('adminlte::page')

@section('content_header')

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajustes del Sistema</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Ajustes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Llene los Campos del Formulario</h3> 
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="nombre">Nombre del Sistema</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-building"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ old('nombre') }}" placeholder="Ej: Sistema de Parqueo XYZ" required>
                          </div>
                          @error('nombre')
                            <small style="color: red;">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="descripcion">Descripcion</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-align-left"></i>
                              </span>
                            </div>
                            <textarea class="form-control" name="descripcion" id="descripcion"  rows="1"
                                placeholder="Descripcion del Negocio" required>{{ old('descripcion') }}</textarea>
                          </div>
                          @error('descripcion')
                            <small style="color: red;">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="sucursal">Sucursal</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="sucursal" id="sucursal"
                                value="{{ old('sucursal') }}" placeholder="Ej: Sucursal Centro" required>
                          </div>
                          @error('sucursal')
                            <small style="color: red;">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="telefono">Telefono</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-phone-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control" name="telefono" id="telefono"
                                value="{{ old('telefono') }}" placeholder="Ej: 1234-5678" required>
                          </div>
                          @error('telefono')
                            <small style="color: red;">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="direccion">Direccion</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-align-left"></i>
                              </span>
                            </div>
                            <textarea class="form-control" name="direccion" id="direccion"  rows="1"
                                placeholder="Descripcion del Negocio" required>{{ old('direccion') }}</textarea>
                          </div>
                          @error('direccion')
                            <small style="color: red;">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="divisa">Moneda</label><b> (*)</b>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                              </span>
                            </div>
                            <select class="form-control" name="divisa" id="divisa"  required>
                              <option value="">Seleccione una Moneda</option>
                              @foreach ($divisas as $divisa)
                                <option value="{{ $divisa['symbol'] }}">{{ $divisa['name']. " - (" .$divisa['symbol'] . ")" }}</option>
                              @endforeach
                            </select>
                          </div>
                          @error('direccion')
                            <small style="color: red;">{{ $message }}</small>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    IMAGEN
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop