@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <h1><b>Bienvenido: </b> {{ Auth::user()->name }}</h1>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=""><b>Rol:
                                {{ Auth::user()->roles->pluck('name')->implode(', ') }}</b></a> </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <hr>

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">

                    @can('admin.roles.index')
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/roles') }}">
                                        <img src="{{ url('/images/roles.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Roles Registrados</span>
                                    <span class="info-box-number">{{ $total_roles }} Roles</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan

                    @can('admin.usuarios.index')
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/usuarios') }}">
                                        <img src="{{ url('/images/usuario.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Usuarios Registrados</span>
                                    <span class="info-box-number">{{ $total_usuarios }} Usuarios</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan

                    @can('admin.espacios.index')
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/espacios') }}">
                                        <img src="{{ url('/images/aparcamiento.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $total_espacios }} Espacios Registrados</span>
                                    <span class="info-box-number" style="text-align: center;">{{ $total_espacios_libres }}
                                        Libres |
                                        {{ $total_espacios_ocupados }} Ocupados |
                                        {{ $total_espacios_mantenimiento }} en Mantenimiento
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan
                </div>


                <div class="row">
                    @can('admin.tarifas.index')
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/tarifas') }}">
                                        <img src="{{ url('/images/tarifas.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tarifas Registradas</span>
                                    <span class="info-box-number">{{ $total_tarifas }} Tarifas</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan

                    @can('admin.clientes.index')
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/clientes') }}">
                                        <img src="{{ url('/images/cliente.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Clientes Registrados</span>
                                    <span class="info-box-number">{{ $total_clientes }} Clientes</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan

                    @can('admin.vehiculos.index')
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/vehiculos') }}">
                                        <img src="{{ url('/images/coche.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Vehiculos Registrados</span>
                                    <span class="info-box-number">{{ $total_vehiculos }} Vehiculos</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan

                    @can('admin.tickets.index')
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box zoomP">
                                <span class="info-box-icon bg-info">
                                    <a href="{{ url('/admin/tickets') }}">
                                        <img src="{{ url('/images/ticket.gif') }}" width="100%" alt="">
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tickets Activos</span>
                                    <span class="info-box-number">{{ $total_tickets_activos }} Tickets</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endcan
                </div>

                @can('admin.reportes.index')
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_hoy }}</h3>

                                    <p>Ingresos de Hoy</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_ayer }}</h3>

                                    <p>Ingresos de Ayer</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_esta_semana }}</h3>

                                    <p>Ingresos de esta Semana</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_semana_anterior }}</h3>

                                    <p>Ingresos de la Semana Anterior</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_este_mes }}</h3>

                                    <p>Ingresos de este Mes</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_mes_anterior }}</h3>

                                    <p>Ingresos del Mes Anterior</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ ($ajuste->divisa ?? '') . ' ' . $ingreso_total }}</h3>

                                    <p>Ingreso Total en el Sistema</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Ingresos Mensuales</b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <canvas id="ingresosMensuales"></canvas>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Estado de Seguimiento</b></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <canvas id="estadoEspaciosPorTickets"></canvas>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                @endcan
            </div>
            <div class="col-md-3">
                <h1 id="reloj-hora" class="text-center font-weight-bold"></h1>
                <h5 id="reloj-fecha" class="text-center"></h5>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Calendario</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="calendar" style="margin-top: -20px"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>



        </div>
    </div>
@stop

@section('css')
    <style>
        .zoomP {
            transition: transform 0.3s ease;
            /* Transición suave para el efecto de zoom */
            border: 1px solid #c0c0c0;
            box-shadow: #c0c0c0 0px 5px 5px 0px;
        }

        .zoomP:hover {
            transform: scale(1.05);
            /* Escala el elemento al 105% de su tamaño original al pasar el mouse */
        }
    </style>

@stop

@section('js')
    <script>
        const ingresosData = @json(array_values($ingresos_data));
        const ctx1 = document.getElementById('ingresosMensuales').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Ingresos Mensuales',
                    data: ingresosData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        @php
            $ticketsOcupados = 0;
            $espaciosLibres = 0;
            $espaciosMantenimiento = 0;
        @endphp

        @foreach ($espacios as $espacio)
            @php
                $ticket_activo = $tickets_activos->firstWhere('espacio_id', $espacio->id);
                if ($ticket_activo) {
                    $ticketsOcupados++;
                } elseif ($espacio->estado == 'libre') {
                    $espaciosLibres++;
                } else {
                    $espaciosMantenimiento++;
                }
            @endphp
        @endforeach


        const ticketsOcupados = {{ $ticketsOcupados }};
        const espaciosLibres = {{ $espaciosLibres }};
        const espaciosMantenimiento = {{ $espaciosMantenimiento }};
        //Grafico pastel : Estado de espacios
        const ctxPie = document.getElementById('estadoEspaciosPorTickets').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Ocupados por Tickets', 'Libres en Seguimiento', 'En Mantenimiento'],
                datasets: [{
                    data: [ticketsOcupados, espaciosLibres, espaciosMantenimiento],
                    backgroundColor: ['#dc3545', '#28a745', '#ffc107'], //Rojo, Verde, Amarillo
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendar = new VanillaCalendar('#calendar', {
                type: 'default',
                settings: {
                    lang: 'es',
                    visibility: {
                        theme: 'light'
                    }
                },
                locale: {
                    months: [
                        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    weekday: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
                },
                actions: {
                    clickDay(event, self) {
                        console.log('Fecha seleccionada:', self.selectedDates[0]);
                    }
                }
            });
            calendar.HTMLElement.style.width = '100%';
            calendar.HTMLElement.style.maxWidth = '100%';
            calendar.init();
        });
    </script>

    <script>
        function actualizarReloj() {
            const d = new Date();
            const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                'Octubre', 'Noviembre', 'Diciembre'
            ];

            const diaSemana = dias[d.getDay()];
            const dia = d.getDate();
            const mes = meses[d.getMonth()];
            const anio = d.getFullYear();

            let h = d.getHours();
            let m = d.getMinutes();
            let s = d.getSeconds();

            // Convertir a formato de 12 horas y determinar AM/PM
            let meridiano = h >= 12 ? 'PM' : 'AM';
            h = h % 12;
            h = h ? h : 12; // La hora '0' debe ser '12'

            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;

            document.getElementById('reloj-fecha').innerHTML = `${diaSemana}, ${dia} de ${mes} de ${anio}`;
            document.getElementById('reloj-hora').innerHTML = `${h}:${m}:${s} ${meridiano}`;
        }
        setInterval(actualizarReloj, 1000);
        actualizarReloj();
    </script>

@stop
