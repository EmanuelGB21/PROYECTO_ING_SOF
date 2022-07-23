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
  <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

  @yield('CSS')

  <title>Merca-Lin</title>
</head>

<body>

  <div class="sticky-top">
    {{--  PANEL LOGO Y BUSCADOR  --}}
  <div class="container-fluid panel_inicial p-2">

    <nav class="navbar navbar-expand-lg navbar-dark panel_inicial">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('pagina_principal')}}">
          <div class="row">
            <div class="col-2">
              <h4 class="animate__animated animate__lightSpeedInLeft"><i class="fas fa-shop"></i></h4>
            </div>
            <div class="col-2">
              <h4 class="animate__animated animate__lightSpeedInRight">Merca-Lín</h4>
              <h6 class="animate__animated animate__lightSpeedInRight" style="margin-top: -9px; margin-left: 28px;"><i class="fas fa-coins"></i> Compras en Línea</h6>
            </div>
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
         
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

</div>

  {{--  CONTENIDO DE LA PÁGINA (ARTICULOS) --}}
  @yield('MENSAJE')
  
  <div class="container mt-5">
   
      @yield('CONTENIDO')

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  @yield('js')
</body>
</html>