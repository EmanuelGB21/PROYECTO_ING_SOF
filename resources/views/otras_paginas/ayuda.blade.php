@extends('Plantillas_Generales.plantilla_general')

@section('START')
    <nav class="nav">
        <li class="nav-item">
        <a class="nav-link text-light MENU" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Inicio</a>
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
     <div class="card">
       <div class="card-body">
        <p><b>¡Bienvenido(a)! a la sección de ayuda de la página Merca-Lín:
          <br><br>
          Para que tu estadía sea la mejor, te dejamos acá unas preguntas con la 
          explicación de cómo usar nuestra página web de la mejor manera posible en distintos términos.</b>
        </p>
       </div>
     </div>
  </div>

  <div class="container mt-3">
   
    <div class="accordion accordion-flush" id="accordionFlushExample">

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed panel_seccundario text-decoration-underline mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Pregunta?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Para ello nada más se da click al botón <b>Inicia Sesión</b> del menú, seguidamente click en <b>registrarse</b> y llenamos con los datos necesarios.
              <br>
              Una vez registrados nos redireccionará a nuestro perfil creado y a la vez llegará al correo que se puso cuando se estaba creando la cuenta los datos necesarios para nuestro inicio de sesión de ahora en adelante</p>  
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed panel_seccundario text-decoration-underline mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            ¿Pregunta?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            Respuesta
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed panel_seccundario text-decoration-underline mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
            ¿Pregunta?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            Respuesta  
          </div>
        </div>
      </div>

    </div>
    
  </div>
@endsection

@section('js')
    
@endsection