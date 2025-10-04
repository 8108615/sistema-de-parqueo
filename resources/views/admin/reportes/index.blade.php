@extends('adminlte::page')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Centro de Reporte del Sistema</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/reportes') }}">Centro de Reportes</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-calendar-day"></i><b> Reporte Semanal </b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{  url('/admin/reporte/semanal') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha Inicio</label>
                                    <input type="date" name="fecha_inicio" class="form-control" value="{{ \Carbon\Carbon::now()->startOfWeek()->format('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha Fin</label>
                                    <input type="date" name="fecha_fin" class="form-control" value="{{ \Carbon\Carbon::now()->endOfWeek()->format('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-calendar-day"></i> Generar Reporte</button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-calendar-week"></i><b> Reporte Mensual </b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{  url('/admin/reporte/mensual') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Año</label>
                                    <select name="year" class="form-control" required>
                                        @for ($i = 2020; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}" @if ($i == date('Y')) selected @endif>{{ $i }} </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mes</label>
                                    <select name="mes" class="form-control" required>
                                        @php
                                            $currentMonth = date('n'); //Obtiene el numero del mes actual (1-12)
                                            $meses = [
                                                1 => 'Enero',
                                                2 => 'Febrero',
                                                3 => 'Marzo',
                                                4 => 'Abril',
                                                5 => 'Mayo',
                                                6 => 'Junio',
                                                7 => 'Julio',
                                                8 => 'Agosto',
                                                9 => 'Septiembre',
                                                10 => 'Octubre',
                                                11 => 'Noviembre',
                                                12 => 'Diciembre',
                                            ];
                                        @endphp
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                            @if ($i == $currentMonth) selected @endif>
                                                {{ $meses[$i] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fas fa-calendar-day"></i> Generar Reporte</button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-dollar-sign"></i><b> Ingresos Diarios </b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{  url('/admin/reporte/ingresos_diarios') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Año</label>
                                    <select name="year" class="form-control" required>
                                        @for ($i = 2020; $i <= date('Y'); $i++)
                                            <option value="{{ $i }}" @if ($i == date('Y')) selected @endif>{{ $i }} </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mes</label>
                                    <select name="mes" class="form-control" required>
                                        @php
                                            $currentMonth = date('n'); //Obtiene el numero del mes actual (1-12)
                                            $meses = [
                                                1 => 'Enero',
                                                2 => 'Febrero',
                                                3 => 'Marzo',
                                                4 => 'Abril',
                                                5 => 'Mayo',
                                                6 => 'Junio',
                                                7 => 'Julio',
                                                8 => 'Agosto',
                                                9 => 'Septiembre',
                                                10 => 'Octubre',
                                                11 => 'Noviembre',
                                                12 => 'Diciembre',
                                            ];
                                        @endphp
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                            @if ($i == $currentMonth) selected @endif>
                                                {{ $meses[$i] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-dollar-sign"></i> Generar Reporte</button>

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
