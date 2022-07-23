<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">
    
    <title>Lista de artículos Comprados</title>

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
         <h5>Lista de Artículos Comprados {{$fecha_actual}}</h5>
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
 
     <div class="container-fluid">
         <table>
             <tbody>
                <tr>
                    <th style="width: 250px" class="text-start" scope="row">
                    Cantidad de artículos comprados: {{count($mis_compras)}}</th>
                </tr>
             </tbody>
         </table>
     </div>
 
     <div class="container-fluid mt-3 mb-5">
         <table class="table table-bordered table-condensed">
             <tbody>
                 <tr>
                     <th style="width: 250px" class="text-start" scope="row"> Detalles del artículo Comprado:</th>
                 </tr>
             </tbody>
         </table>
     </div>
     
     @foreach ($mis_compras as $item)
        <hr>
        <div class="container-fluid mt-2">
            <table class="table table-bordered table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 250px" class="text-start" scope="row">
                             Fecha de Compra: {{$item->fecha_factura}}</th>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container-fluid mt-2">
            <table class="table table-bordered table-condensed">
                <tbody>
                    <tr>
                        <th style="width: 250px" class="text-start" scope="row">
                             ID Factura: # {{$item->id_factura}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
 
     <div class="container-fluid mt-3">
        
         <table id="customers">
             <thead class="bg-dark text-light">
                 <tr>
                     <th>Categoria</th>
                     <th>Nombre</th>
                     <th>Cantidad</th>
                     <th>Precio</th>
                 </tr>
             </thead>
             <tbody>
                 @php
                     $TOTAL_PAGADO = 0;
                 @endphp
                 @foreach ($item->obtener_detalles as $detalles)
                 <tr>
                    <td>{{$detalles->categoria_articulo}}</td>
                    <td>{{$detalles->nombre_articulo}}</td>
                    <td>{{$detalles->cantidad_comprada}}</td>
                    <td>{{$detalles->precio_articulo}}</td>
                    
                        @php
                           $TOTAL_PAGADO += $detalles->precio_articulo*$detalles->cantidad_comprada; 
                        @endphp
                    @endforeach
                 </tr>
                
                 <tr>
                     <td class="w-100 text-end" colspan="2">Total = </td>
                     <td class="w-100 text-center" colspan="2"><span class="badge bg-success">$ {{$TOTAL_PAGADO}}</span></td>
                 </tr>
             </tbody>
         </table>
         @endforeach
     </div>
</body>
</html>