@extends('Plantillas_Generales.plantilla_general')

@section('logo')
    <div class="p-2">
{{--     <a href="{{route('pagina_principal')}}"> <img src="{{asset('logo/1.ico')}}" alt=""></a> --}}
        <a href="{{route('pagina_principal')}}"> <img src="{{asset('logo/LOGO.gif')}}" alt=""></a>
    </div>
@endsection

{{--  @section('busquedas')
    <div class="container-fluid bg-dark menu_completo">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div id="navbarNav">
              <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Inicio</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-light" href="{{(route('ir_acerca_de'))}}"><i class="fas fa-plus"></i> Acerca de</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{route('ir_ayuda')}}"><i class="fas fa-info-circle"></i> Ayuda</a>
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
            <button class="btn bg-dark dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    
  <div class="container mt-3 p-4">
     <div class="card">
       <div class="card-body">
        <p><b>¡Bienvenido(a)! a la sección de ayuda de la página NegoTico:
          <br><br>
          Para que tu estadía sea la mejor, te dejamos acá unas preguntas con la 
          explicación de cómo usar nuestra página web de la mejor manera posible en distintos términos.</b>
        </p>
       </div>
     </div>
  </div>

  <div class="container mt-3">
   
    <div id="accordion">

      <div class="card">
        <div class="card-header bg-dark" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h5 class="btn btn-link text-light mb-0">
              ¿Cómo Registrarse y/o Iniciar Sesión?
          </h5>
        </div>
    
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            
            <p>Para ello nada más se da click al botón <b>Inicia Sesión</b> del menú, seguidamente click en <b>registrarse</b> y llenamos con los datos necesarios.
              <br>
              Una vez registrados nos redireccionará a nuestro perfil creado y a la vez llegará al correo que se puso cuando se estaba creando la cuenta los datos necesarios para nuestro inicio de sesión de ahora en adelante</p>

          </div>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header bg-dark" id="headingTwo"   data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h5 class="btn btn-link collapsed text-light mb-0">
              ¿Cómo reportar una publicación sobre un artículo?
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <p>No es necesario iniciar sesión antes</p>
            <p>Para ello nada más se da click al botón <b>Ver más</b> que sale en cada artículo publicado y este nos llevará a ver más detalles sobre el producto, ahí mismo se tendrá la opción de reportar cuando fuese el caso.</p>
            <div class="container p-5 text-center">
              <video class="w-75" src="{{asset('videos/reportar_publicacion.mp4')}}" controls></video>
            </div>
          </div>
        </div>
      </div>


      <div class="card mt-3">
        <div class="card-header bg-dark" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h5 class="mb-0 btn btn-link collapsed text-light">
              ¿Cómo insertar artículos para recibir un trueque a cambio?
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <p>Es necesario haver iniciado sesión con nuestro usuario y contraseña, el mismo se encuentra en el correo que se puso cuando se estaba registrando</p>
            <div class="container p-5 text-center">
              <video class="w-75" src="{{asset('videos/venta_trueque.mp4')}}" controls></video>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header bg-dark" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <h5 class="btn btn-link collapsed text-light mb-0">
              ¿Cómo insertar artículos en forma de venta normal?
          </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body">
            <p>Es necesario haber iniciado sesión con nuestro usuario y contraseña, el mismo se encuentra en el correo que se puso cuando se estaba registrando</p>
            
            <div class="container p-5 text-center">
              <video class="w-75" src="{{asset('videos/venta_normal.mp4')}}" controls></video>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-3 mb-5">
        <div class="card-header bg-dark" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <h5 class="btn btn-link collapsed text-light mb-0"> 
              ¿Cómo editar los artículos que hemos registrado en nuestra página y cómo eliminarlo?
          </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
          <div class="card-body">
            <p>Es necesario haber iniciado sesión con nuestro usuario y contraseña, el mismo se encuentra en el correo que se puso cuando se estaba registrando</p>
            <div class="container p-5 text-center">
              <video class="w-75" src="{{asset('videos/editar_articulo_y_eliminarlo.mp4')}}" controls></video>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
@endsection