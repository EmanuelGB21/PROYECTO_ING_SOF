@extends('Plantillas_Generales.plantilla_general')

@section('START')
    <nav class="nav">
        <li class="nav-item">
        <a class="nav-link text-light MENU" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Regresar</a>
        </li>
    </nav>
@endsection

@section('END')

    <nav class="nav">
        
        <li class="nav-item">
            <a class="nav-link text-light MENU" href="{{route('home')}}"><i class="fas fa-user-circle"></i> Iniciar Sesión</a>
        </li>

    </nav>

@endsection

@section('CONTENIDO')
    
  <div class="container mt-3 p-4">
     <div class="card shadow">
       <div class="card-body">
        <p><b> ¡Bienvenido(a)! a la sección de ayuda de la página Merca-Lín:
          <br><br>
          Para que tu estadía sea la mejor, te dejamos acá unas preguntas con la 
          explicación de cómo usar nuestra página web de la mejor manera posible en distintos términos.</b>
        </p>
       </div>
     </div>
  </div>

  <div class="container mt-3 p-4">
    
    <div class="accordion accordion-flush" id="accordionFlushExample">

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button text-light collapsed panel_seccundario mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <span class="badge bg-white text-dark rounded-circle"><b>1</b></span> ¿Debo estar logueado para poder comprar artículos?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Sí, es necesario registrarse para poder comprar artículos</p>  
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button text-light collapsed panel_seccundario mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            <span class="badge bg-white text-dark rounded-circle"><b>2</b></span> ¿Debo pagar para poder publicar artículos?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Sí, es necesario pagar una suscripción de $1200 dólares para poder publicar artículos que desees vender</p>  
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button text-light collapsed panel_seccundario mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            <span class="badge bg-white text-dark rounded-circle"><b>3</b></span> ¿Cómo registrarse y/o iniciar sesión en la página web?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Para ello nada más se da click al botón <b>Inicia Sesión</b> del menú, seguidamente click en <b>registrarse</b> y llenamos con los datos necesarios.
              <br>
              Una vez registrados nos redireccionará a nuestro perfil creado y a la vez llegará al correo que se puso cuando se estaba creando la cuenta los datos necesarios para nuestro inicio de sesión de ahora en adelante</p>  
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button text-light collapsed panel_seccundario mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
            <span class="badge bg-white text-dark rounded-circle"><b>4</b></span> ¿Qué pasa cuando reporto un artículo?
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            Si reportas un artículo este se oculta totalmente a todos para así evitar una posible estafa.
            <br>
            El dueño del artículo se puede contactar con mercalinshop@gmail.com para solucionar el problema.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFive">
          <button class="accordion-button text-light collapsed panel_seccundario mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
            <span class="badge bg-white text-dark rounded-circle"><b>5</b></span> ¿Mi información es segura aquí?
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            La respuesta es sí, ya que se maneja un login cada usuario tendrá accesibilidad solo a sus datos y no a la de los demás.  
            <br>
            Pd: la dirección que brindas si podrá ser visible para poder enviar el producto al destino correcto.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingSix">
          <button class="accordion-button text-light collapsed panel_seccundario mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
            <span class="badge bg-white text-dark rounded-circle"><b>6</b></span> ¿Debo ser ético y correcto al usar la página?
          </button>
        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Sí, se debe tener un ambiente sano, con vendedores responsables, serios para evitar inconvenientes.
              <br>
              Todos los usuarios antes de loguearse en Merca-Lín deben leer las <a href="{{route('IR_ACERCA_DE')}}#/POLITICAS-DE-PRIVACIDAD">politicas de privacidad</a> para tener una mejor idea de como funciona el sitio
            </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <br><br>
@endsection

@section('js')
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection