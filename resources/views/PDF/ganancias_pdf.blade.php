<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">
    
    <title>Reporte de Ganancias generado el {{$fecha_actual}}</title>

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
        <h5>Reporte de Ganancias {{$fecha_actual}}</h5>
    </div>

    <div class="container-fluid">

        <table id="customers">

            <thead>
                <tr>
                <th id="titulo" colspan="2">La información es la siguiente: </th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <th id="subtitulos" scope="row">La cantidad de artículos publicados:</th>
                    <td>A la fecha hay: {{$total_publicados}}</td>
                </tr>

                <tr>
                    <th id="subtitulos" scope="row">La cantidad de ventas realizadas:</th>
                    <td>A la fecha se realizaron: {{$total_ventas}}</td>
                </tr>

                <tr>
                    <th  id="subtitulos"scope="row">El total de usuarios que se tienen registrados es: </th>
                    <td>Un total de: {{$total_users}}</td>
                </tr>


                <tr>
                    <th id="subtitulos" scope="row">Ganancias por parte de Merca-Lín: </th>
                    <td>Se tiene una ganancia de {{$ganancias}} dólares desde que se inició</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="container-fluid text-center mb-5 mt-5">
        <h5>Clientes registrados</h5>
    </div>

    <div>
        <table id="customers">

            <thead class="bg-dark text-light">
                <tr>
                <th>Fecha Registro</th>
                <th>Nombre</th>
                <th>Tipo de cuenta</th>
                <th>Ganacias Generadas</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($array_usuarios as $item)
                <tr>
                    <td>{{$item->fecha_registro}}</td>
                    <td>{{$item->nombre}} {{$item->primer_apellido}} {{$item->segundo_apellido}}</td>
                    @if ($item->id_tipo_cuenta=="1")
                        <td>Vendedor</td>
                    @else
                        <td>Comprador</td>
                    @endif

                    <td>$ {{$item->ganancias}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>