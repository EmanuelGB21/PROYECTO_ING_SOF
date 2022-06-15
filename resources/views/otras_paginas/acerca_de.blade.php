@extends('Plantillas_Generales.plantilla_general')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('logo')
    <div class="p-2">
        <a href="{{route('pagina_principal')}}"> <img src="{{asset('')}}" alt="LOGO"></a>
    </div>
@endsection

{{--  @section('CONTENIDO')
    <div class="container-fluid bg-dark menu_completo">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div id="navbarNav">
              <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Inicio</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-light" href="{{(route('IR_ACERCA_DE'))}}"><i class="fas fa-plus"></i> Acerca de</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{route('IR_AYUDA')}}"><i class="fas fa-info-circle"></i> Ayuda</a>
                </li>

                <div class="text-end">
                <li class="nav-item text-right">
                    <a class="nav-link text-light" href="{{route('home')}}"><i class="fas fa-user"></i> Inicia Sesión</a>
                </li>
                </div>
              </ul>
            </div>
        </nav>
    </div>
      
    
    <div class="container-fluid bg-dark menu_despegable p-2">
        <div class="dropdown text-right">
            <button class="btn bg-dark  dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i style="font-size: 20px" class="fas fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Inicio</a>
                <a class="dropdown-item" href="{{(route('ir_acerca_de'))}}"><i class="fas fa-plus"></i> Acerca de</a>
                <a class="dropdown-item" href="{{route('ir_ayuda')}}"><i class="fas fa-info-circle"></i> Ayuda</a>
                <a class="dropdown-item" href="{{route('home')}}"><i class="fas fa-user"></i> Inicia Sesión</a>
            </div>
        </div> 
    </div> 
@endsection  --}}

@section('contenido')

<div class="card mb-3 " {{--  style="max-width: 940px; margin-left: 7%"  --}}>

  <div class="row g-0">
    <div class="col-md-4 p-4">
      <!-- INICIA VIDEO-->
      <video class="w-100" autoplay controls src="{{asset('videos/promocion.mp4')}}"></video>
      <!-- TERMINA VIDEO -->
    </div>

    <div class="col-md-8 text-left">   
      <div class="card-body">

        <p><b>¡Bienvenido(a)! a la sección acerca de la página NegoTico:
          <br><br>
          Esta es una página hecha en Costa Rica.
          <br><br>
          Su función está relacionada con el e-commerce (comercio electrónico) en donde diferentes
          usuarios podrán iniciar sesión para publicar artículos que deseen vender y que los clientes
          puedan verlos y consultar por los mismos.
          <br><br>
          Nos tomamos muy enserio todo tipo de estafas que se puedan presentar, por lo tanto
          existe la opción de que se pueda reportar una publicación si fuese necesario.</b>
        </p>
       
      </div>
    </div>
  </div>
</div>
@endsection

{{--  @section('footer')
   <footer class="w-100" style=" position: fixed;bottom: 0;">
    <div class="container-fluid bg-dark p-2">
      <p class="text-light text-center">Todos los derechos reservados 2022</p>
    </div>
   </footer>
@endsection  --}}