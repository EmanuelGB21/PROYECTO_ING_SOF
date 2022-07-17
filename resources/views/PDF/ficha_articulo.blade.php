<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">
    
    <title>Ficha del Artículo {{$ficha_articulo->nombre_articulo}}</title>

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
        <h5>Detalles del artículo: {{$ficha_articulo->nombre_articulo}}</h5>
    </div>

    <div class="container-fluid">

        <table id="customers">

            <thead>
                <tr>
                <th id="titulo" colspan="2">La información del artículo es la siguiente: </th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <th id="subtitulos" scope="row">Nombre:</th>
                    <td>{{$ficha_articulo->nombre_articulo}}</td>
                </tr>

                <tr>
                    <th id="subtitulos" scope="row">Categoria:</th>
                    <td>{{$ficha_articulo->obtener_categoria->nombre_categoria}}</td>
                </tr>

                <tr>
                    <th  id="subtitulos"scope="row">Estado:</th>
                    <td>{{$ficha_articulo->obtener_estado_articulo->estado_articulo}}</td>
                </tr>


                <tr>
                    <th id="subtitulos" scope="row">Cantidad Actual disponible:</th>
                    <td>{{$ficha_articulo->cantidad}}</td>
                </tr>


                <tr>
                    <th id="subtitulos" scope="row">Fecha de publicación:</th>
                    <td>{{$ficha_articulo->fecha_publicacion_articulo}}</td>
                </tr>

                @if ($ficha_articulo->descuento!=0)
                    @php
                        $precio=$ficha_articulo->precio;
                        $descuento=$ficha_articulo->descuento;

                        $operacion=100-$descuento;
                        $resultado=$precio*($operacion/100);
                    @endphp
                <tr>
                    <th id="subtitulos" scope="row">Precio:</th>
                    <td>$ {{$resultado}}</td>
                </tr>

                @else
                    <tr>
                        <th id="subtitulos" scope="row">Precio:</th>
                        <td>$ {{$ficha_articulo->precio}}</td>
                    </tr> 
                @endif

            </tbody>
        </table>
    </div>

    {{--  IMAGENES DEL ARTÍCULO  --}}
    <div class="container-fluid text-center mt-5 mb-5">
        <h5>Imagenes del artículo {{$ficha_articulo->nombre_articulo}}</h5>
    </div>

    <div class="card">
        <div class="card-body imagenes">
            @foreach ($ficha_articulo->obtener_imagenes as $item)
                <img src="{{public_path('storage'.'/'.$item->ruta_imagen)}}" alt="1" width="20%">
            @endforeach
        </div>
    </div>


</body>
</html>