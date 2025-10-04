<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Mensual</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #333;
            font-size: 24px;
            margin: 0;
            padding: 0;
        }
        .header p {
            color: #777;
            margin: 5px 0 0 0;
        }
        .report-info {
            background-color: #f4f4f4;
            padding: 10px;
            border-left: 4px solid #17a2b8;
            margin-bottom: 20px;
        }
        .report-info strong {
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        .total-row {
            font-weight: bold;
            background-color: #e9ecef;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 10px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="contain">
        <div class="header">
            <h1>Reporte de Facturaciones Mensual</h1>
            <p>Generado el: {{ now()->format('d/m/Y')." a las ".now()->format('H:i:s A') }}</p>
        </div>
        <div class="report-info">
            @php
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
            <p><b>Periodo del Reporte: </b> {{ $meses[$mes] }}</p>
        </div>

        @if ($facturaciones->isEmpty())
            <p style="text-align: center;">No hay Facturaciones en el período seleccionado, No se encontraron Factura en el Rango de Fecha.</p>
        @else
            <table>
                <thead>
                    <tr>

                        <th>Nro</th>
                        <th>Cliente</th>
                        <th>Vehículo</th>
                        <th style="width: 170px;">Detalle</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_monto = 0;
                    @endphp
                    @foreach ($facturaciones as $factura)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $factura->nombre_cliente}}</td>
                            <td>{{ $factura->placa }}</td>
                            <td>{{ $factura->detalle }}</td>
                            <td>{{ $ajuste->divisa." ".$factura->monto }}</td>
                            <td>{{ \Carbon\Carbon::parse($factura->created_at)->format('d/m/Y') }}</td>
                        </tr>
                        @php
                            $total_monto += $factura->monto;
                        @endphp
                    @endforeach
                    <tr class="total-row">
                        <td colspan="4" style="text-align: right;">Total</td>
                        <td colspan="2">{{  $ajuste->divisa." ".$total_monto }}</td>

                    </tr>
                </tbody>
            </table>
        @endif
        <div class="footer">
            <p>Reporte generado por el {{ $ajuste->nombre }} - Copyright &copy; {{ date('Y') }} - Impreso por: {{ $usuario->name }}</p>
        </div>
    </div>
</body>
</html>