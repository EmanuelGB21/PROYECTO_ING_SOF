<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 
  <link rel="icon" href="{{asset('imagenes/iconos/icono_pagina.ico')}}">

  @yield('CSS')

  <title>Merca-Lin</title>
</head>

<body>
    {{--  PANEL LOGO Y BUSCADOR  --}}
  <div class="container-fluid panel_inicial p-2">

    <nav class="navbar navbar-expand-lg navbar-dark panel_inicial">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('pagina_principal')}}">Merca-Lin (mercado en línea)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          </ul>
          <form class="d-flex" method="POST" action="{{route('buscar',['id' => '0', 'tipo_busqueda' => 'CT'])}}">
            @csrf
            @method('GET')
            <input class="form-control me-2" name="campo_busqueda" type="search" placeholder="Buscar" aria-label="Search">
            
            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
    </nav>

  </div>

  {{--  PANEL DEL MENU   --}}
  <div class="container-fluid panel_seccundario p-2">
    <div class="clearfix">

      <div class="float-start">
        @yield('START')
      </div>

      <div class="float-end">
        @yield('END')
      </div>

    </div>
  </div>


  {{--  CONTENIDO DE LA PÁGINA (ARTICULOS) --}}
  @yield('MENSAJE')
  
  <div class="container mt-5">
   
      @yield('CONTENIDO')

  </div>

  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  
  @yield('js')
</body>
</html>