<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de Cotización - Torres Batiz</title>
</head>
<style>
    table, table *{
        border: 1px solid #000 !important;
        text-align: center !important;
        padding: 1% 2% !important;
        vertical-align: middle !important;
    }
</style>
<body>
@php
$cont = count($datos);
@endphp
    <p>A <a href="http://www.creativasoftline.com">Creativa Softline</a> le es un gusto hacerle saber sus...</p>
    <h1>Datos de Cliente</h1>
    <p>Nombre: {{$datos[$cont]['nombre']}}</p>
    <p>Empresa: {{$datos[$cont]['empresa']}}</p>
    <p>Teléfono: {{$datos[$cont]['telefono']}}</p>
    <p>Email: {{$datos[$cont]['email']}}</p>
    <p>Mensaje: {{$datos[$cont]['mensaje']}}</p>
    <br>
    <h3>Productos solicitados</h3>
    
    <table>
        <thead>
            <th style="padding: 1% 2%; text-align: center; width: 300px;">Nombre del producto</th>
            <th style="padding: 1% 2%; text-align: center; width: 300px">Cantidad</th>
        </thead>
        <tbody>
        @foreach($datos as $key => $item)
        @if($key != $cont)
            <tr>
                <td style="text-align: center;">{{$item->nombre}}</td>
                <td style="text-align: center;">{{$item->cantidad}}</td>
            </tr>
        @endif
        @endforeach
            
        </tbody>
    </table>

    <br>
    <br>
    <p>Cualquier inconveniente favor de comunicarse a nuestra oficina.</p>
    
   

</body>
</html>