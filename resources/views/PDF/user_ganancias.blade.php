<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">
    
    <title>Reporte de Ventas generado el {{$fecha_actual}}</title>

    <style>

        body{
            padding:0%;
            margin: 0%;
        }

        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #titulo{
            background-color: #02639B;
            color: white; 
        }
        #subtitulos {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #02639bb9;
          color: white;
          width: 240px;
        }

        .imagenes{
            padding: 6%
        }

        #img{
            margin-top: -20%;
        }

    </style>

</head>
<body>

    <div class="text-start">
       <p class="card-text text-muted"><b><small>Generado el: {{$fecha_actual}}</small></b></p>
       <p class="card-text text-muted"><b><small>mercalinshop@gmail.com</small></b></p>
       <p class="card-text text-muted"><b>Merca-Lín</b></p>
    </div>

    <div class="text-end">
        <img id="img" class="w-25" src="{{public_path('imagenes/iconos/logo1.jpeg')}}">
    </div>

    <div class="container-fluid text-center mb-5">
        <h5>Reporte de Ventas {{$fecha_actual}}</h5>
    </div>

    <div class="container-fluid">

        <table id="customers">
            <thead>
                <tr>
                <th id="titulo" colspan="2">La información es la siguiente: </th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="container-fluid mt-3">
        <table>
            <tbody>
                <tr>
                    <th style="width: 250px" class="text-start" scope="row"> Cantidad de artículos vendidos:</th>
                    <td class="text-start">{{$total_vendidos}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container-fluid mt-3">
        <table class="table table-bordered table-condensed">
            <tbody>
                <tr>
                    <th style="width: 250px" class="text-start" scope="row"> Detalles de los artículos vendidos:</th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container-fluid mt-3">
        <table id="customers">
            <thead class="bg-dark text-light">
                <tr>
                    <th>#</th>
                    <th>Fecha de Venta</th>
                    <th>Categoría</th>
                    <th>Artículo</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($array as $detalles)
                <tr>
                    <td>{{$loop->index}}</td>
                    <td>{{$detalles->obtener_factura->fecha_factura}}</td>
                    <td>{{$detalles->categoria_articulo}}</td>
                    <td>{{$detalles->nombre_articulo}}</td>
                    <td>{{$detalles->cantidad_comprada}}</td>
                    <td>{{$detalles->precio_articulo}}</td>
                    <td>{{$detalles->precio_articulo*$detalles->cantidad_comprada}}</td>
                    @php
                       $total += $detalles->precio_articulo*$detalles->cantidad_comprada; 
                    @endphp
                </tr>
                @endforeach
                <tr>
                    <td class="w-100 text-end" colspan="6">Total = </td>
                    <td><span class="badge bg-success">$ {{$total}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>