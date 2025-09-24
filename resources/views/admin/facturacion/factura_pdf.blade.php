<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TICKET</title>
    <style>
        body{
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            line-height: 1.2;
            width: 300px;
            max-width: 300px;
            overflow-x: hidden;
            margin: 0px;
            padding: 0px;
            background-color: #fff;
        }
        .container {
            border: 0px solid #000;
            margin: 0px;
            padding: 0px;
        }
        .header, .footer {
        }
        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }
        th, td {
            border: 1px solid #000;
            padding: 3px;
            font-size: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <!-- Ecabezado -->
        <div class="header" style="text-align: center">
            
            <b style="">{{ $ajuste->nombre }}</b> <br>
            {{ $ajuste->descripcion }} <br>
            Sucursal: {{ $ajuste->sucursal }} <br>
            {{ $ajuste->direccion }} <br>
            {{ $ajuste->telefonos }} <br>
        </div>
        <div class="line"></div>

        <!-- Titulo -->
        <h3 style="margin: 5px 0; font-size: 14px;text-align: center">FACTURA: {{ $factura->nro_factura }}</h3>

        <div class="line "></div>

        <!-- Datos del Cliente -->
        <div style="text-align: left;">
            <strong>DATOS DEL CLIENTE: </strong><br>
            <b>Señor(a): </b> {{  $factura->nombre_cliente }} <br>
            <b>Documento: </b> {{  $factura->nro_documento }} <br>
            <b>placa del Vehiculo: </b> {{  $factura->placa }} <br>            
        </div>

        <div class="line "></div>

        <!-- Datos del Espacio -->

        <div>
            <strong>DATOS DEL SERVICIO: </strong><br>
            <b>Espacio Nro: </b> {{ $factura->ticket->espacio->numero }} <br>
            <b>Fecha de Ingreso: </b> {{ $factura->ticket->fecha_ingreso }} <br>
            <b>Hora de Ingreso: </b> {{ $factura->ticket->hora_ingreso }} <br>
            <b>Fecha de Salida: </b> {{ $factura->ticket->fecha_salida }} <br>
            <b>Hora de Salida: </b> {{ $factura->ticket->hora_salida }} <br>
        </div>


        <div class="line"></div>


        <div>
            <table>
                <thead>
                    <th>Detalle</th>
                    <th>Cantidad</th>
                    <th>precio</th>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 150px">{{ $factura->detalle }}</td>
                        <td style="text-align: center">1</td>
                        <td>{{ $ajuste->divisa." ".$factura->monto }}</td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: right"><b>Monto Total:</b> {{ $ajuste->divisa." ".$factura->monto }}</p>
        </div>

        <div class="line"></div>

        <p style="text-align: center">
            <img src="{{ $barcodePNG }}" style="width: 100px; height: 100px; display:block; margin:0 auto:">
        </p>

        <div class="line"></div>

        <!-- Firmas en el controlador Imprimir _ticket pasar debajo de ajuste $fecha_hora = Carbon::now  y en el compan poner fecha_hora -->
        <div class="footer" style="text-align: center">
            <small style="font-size: 6pt">
                <b>¡¡ Gracias por su Preferencia !!</b> <br>
                <b>Hora de Impresion: </b> {{ $fecha_hora }} <br>
                <b>Usuario: </b> {{ $factura->usuario->name }} <br>
            </small>
        </div>
    </div>
</body>
</html>