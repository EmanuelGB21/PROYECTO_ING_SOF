<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">
    
    <title>Lista de artículos</title>

    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          margin-bottom: 10%
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
        <h5>Lista de artículos publicados {{count($lista)}}</h5>
    </div>

    <div class="container-fluid">

        @foreach ($lista as $item)
            <table id="customers">

                <thead>
                    <tr>
                    <th id="titulo" colspan="2">Artículo de la categoría: {{$item->obtener_categoria->nombre_categoria}}</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <th id="subtitulos" scope="row">Nombre del Artículo</th>
                        <td>{{$item->nombre_articulo}}</td>
                    </tr>

                    <tr>
                        <th id="subtitulos" scope="row">Fecha de publicación:</th>
                        <td>{{$item->fecha_publicacion_articulo}}</td>
                    </tr>

                    <tr>
                        <th id="subtitulos" scope="row">Precio: </th>
                        <td>{{$item->precio}}</td>
                    </tr>

                    <tr>
                        <th id="subtitulos" scope="row">Cantidad: </th>
                        <td>{{$item->cantidad}}</td>
                    </tr>

                    <tr>
                        <th id="subtitulos" scope="row">Estado: </th>
                        <td>{{$item->obtener_estado_articulo->estado_articulo}}</td>
                    </tr>

                </tbody>
            </table>
        @endforeach
    </div>
</body>
</html>