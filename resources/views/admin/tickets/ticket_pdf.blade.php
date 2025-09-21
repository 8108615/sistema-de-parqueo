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
        <h3 style="margin: 5px 0; font-size: 14px;text-align: center">TICKET: {{ $ticket->codigo_ticket }}</h3>

        <div class="line "></div>

        <!-- Datos del Cliente -->
        <div style="text-align: left;">
            <strong>Datos del Cliente: </strong><br>
            <b>Señor(a): </b> {{  $ticket->cliente->nombres }} <br>
            <b>Documento: </b> {{  $ticket->cliente->numero_documento }} <br>
            <b>placa del Vehiculo: </b> {{  $ticket->vehiculo->placa }} <br>            
        </div>

        <div class="line "></div>

        <!-- Datos del Espacio -->

        <div>
            <b>Espacio Nro: </b> {{ $ticket->espacio->numero }} <br>
            <b>Fecha de Ingreso: </b> {{ $ticket->fecha_ingreso }} <br>
            <b>Hora de Ingreso: </b> {{ $ticket->hora_ingreso }} <br>
        </div>


        <div class="line"></div>

        <!-- Firmas en el controlador Imprimir _ticket pasar debajo de ajuste $fecha_hora = Carbon::now  y en el compan poner fecha_hora -->
        <div class="footer" style="text-align: center">
            <small style="font-size: 6pt">
                <b>¡¡ Gracias por su Preferencia !!</b> <br>
                <b>Hora de Impresion: </b> {{ $fecha_hora }} <br>
                <b>Usuario: </b> {{ $ticket->usuario->name }} <br>
            </small>
        </div>
    </div>
</body>
</html>