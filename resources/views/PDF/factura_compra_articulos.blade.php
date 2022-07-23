<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}">
    <title>Factura de Compra</title>

    <style>
      .clearfixx:after {
        content: "";
        display: table;
        clear: both;	
      }
      
      a {
        color: #5D6975;
        text-decoration: underline;
      }
      
      body {
        margin: 0 auto; 
        color: #001028;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        font-family: Arial;
      }
      
      header {
        padding: 10px 0;
        margin-bottom: 30px;
      }
      
      #logo {
        text-align: right;
        margin-bottom: 10px;
      }
      
      #logo img {
        width: 179px;
      }
      
      h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
      }
      
      #project {
        float: left;
        padding: 2%;
      }
      
      #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
      }
      
      #company {
        float: right;
        text-align: right;
        padding: 2%;
      }
      
      #project div,
      #company div {
        white-space: nowrap;        
      }
      
      table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
      }
      
      table tr:nth-child(2n-1) td {
        background: #F5F5F5;
      }
      
      table th,
      table td {
        text-align: center;
      }
      
      table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
      }
      
      table .service,
      table .desc {
        text-align: center;
      }
      
      table td {
        padding: 20px;
        text-align: right;
      }
      
      table td.service,
      table td.desc {
        vertical-align: top;
      }
      
      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }
      
      table td.qty{
        text-align: center;
      }

      table td.total{
        text-align: center;
      }

      table td.unit{
        text-align: center;
      }
      
      table td.grand {
        border-top: 1px solid #5D6975;;
      }

      table td.grand {
        text-align: right;
      }

      table td.grand_val {
        text-align: center;
        border-top: 1px solid #5D6975;;
      }

      #notices{
        text-align: end;
      }
      
      #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
      }
      
      footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
      }
    </style>

  </head>

  <body>

    <header class="clearfixx container-fluid">

      <div id="logo">
        <img src="{{public_path('imagenes/iconos/logo1.jpeg')}}">
      </div>
      <h1>Factura de Compra en la página Merca-Lín</h1>
      <div id="company" class="clearfix">
        <div>Merca-Lín</div>
        <div><a>mercalinshop@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>ID Factura:</span> {{$numero_factura}}</div>
        <div><span>CLIENTE:</span> {{Auth::user()->nombre}} {{Auth::user()->primer_apellido}} {{Auth::user()->segundo_apellido}}</div>
        <div><span>CORREO:</span>{{Auth::user()->email}}</a></div>
        <div><span>FECHA:</span>{{$fecha_actual}}</div>
      </div>

    </header>

    <main class="container-fluid">
      <table>
        <thead>
          <tr>
            <th class="service">CATEGORIA</th>
            <th class="desc">NOMBRE DEL PRODUCTO</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php
              $total_Final=0;
          @endphp
          @foreach ($array as $item)
          <tr>
            <td class="service">{{$item->attributes->slug}}</td>
            <td class="desc">{{$item->name}}</td>
            <td class="unit">$ {{$item->price}}</td>
            <td class="qty">{{$item->quantity}}</td>
              @php
                  $total =0;

                  $precio = $item->price;
                  $cantidad = $item->quantity;
                  $total = $precio*$cantidad;

                  $total_Final += $total; 
              @endphp
            <td class="total">$ {{$total}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4">SUBTOTAL =</td>
            <td class="total">$ {{$total_Final}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL DE LA COMPRA =</td>
            <td class="grand_val total"><b>$ {{$total_Final}}</b></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div class="notice"></div>
      </div>
    </main>
  </body>
</html>