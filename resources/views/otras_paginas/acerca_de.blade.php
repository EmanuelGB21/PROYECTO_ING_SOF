<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      
      <title>Acerca De Merca-Lín</title>

      <link rel="icon" href="{{asset('imagenes/iconos/icono_pagina.ico')}}">
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    </head>
  <body>

    <div class="container-fluid panel_seccundario p-2 fijado">
      <div class="clearfix">
        <div class="float-start">
            <nav class="navbar navbar-light">
              <div class="container-fluid">
                <a class="navbar-brand text-light" href="{{route('IR_ACERCA_DE')}}">
                  {{--  <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">  --}}
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
              </div>
            </nav>
        </div>
        <div class="float-end mt-2">
            <nav class="nav p-2 MI_NAV">
              <a class="nav-link text-light boton" href="{{route('pagina_principal')}}">Visitar Sitio <i class="fas fa-arrow-right"></i></a>
            </nav>
        </div>
      </div>
    </div>
        {{--  CARROUSEL  --}}
    <div class="container-fluid px-0">

      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="Slide 3" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

        <div class="carousel-inner" style="height: 500px">
          <div class="carousel-item active">
            <img src="https://www.actionsdata.com/wp-content/uploads/2021/10/ecommerce2-1024x588.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://www.cutedigitalmedia.com/blog/wp-content/uploads/2021/06/beneficios-de-crear-un-e-commerce-para-tu-negocio-scaled.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://blog.pad.edu/hs-fs/hubfs/laptop%20con%20carrito%20de%20compras%20simbolo%20de%20comercio%20electronico.jpg?width=1280&name=laptop%20con%20carrito%20de%20compras%20simbolo%20de%20comercio%20electronico.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://blog.pad.edu/hubfs/todo%20lo%20que%20necesitas%20saber%20sobre%20el%20comercio%20electronico.jpg" class="d-block w-100" alt="...">
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="container mt-5 p-4">
     <div class="row">
      <div class="col-sm-4">
        <h3>¿Quienes somos?</h3>
        <img src="{{asset('imagenes/quienes_somos.png')}}" width="200px" alt="">
      </div>
      <div class="col-sm-8">
        <h4 class="mt-4"><i class="fas fa-arrow-right"></i> Somos un sitio web relacionado con el comercio electrónico dirigido a
          personas emprendedoras que buscan vender sus articulos por internet, así como también permitir que usuarios vengan y compren de manera rápida, sencilla y segura sin salir de sus hogares.
       </h4>
      </div>
     </div>
    </div>

    <div class="container mt-5 p-4">
      <div class="row">
        <div class="col-8">
        <h4><i class="fas fa-circle text-primary"></i> Podes realizar las siguientes funciones:</h4>
        <br>
        <p><i class="text-primary fas fa-check"></i> Comprar productos de tu interés, con solo iniciar sesión.</p>
        <p><i class="text-primary fas fa-check"></i> Buscar artículos de interés, ya sea por artículo o dueño del artículo.</p>
        <p><i class="text-primary fas fa-check"></i> Navegar a través de las diferentes categorías que se ofrecen.</p>
        <p><i class="text-primary fas fa-check"></i> Ver más detalles sobre un artículo y más.</p>
        <p><i class="text-primary fas fa-check"></i> Compartir por redes sociales cualquier artículo.</p>
        <p><i class="text-primary fas fa-check"></i> Descargar una ficha de algún artículo de interés.</p>
        <p><i class="text-primary fas fa-check"></i> Reportar publicaciones sospechosas de estafas.</p>
        <p><i class="text-primary fas fa-check"></i> Gestionar tú perfil de usuario.</p>
        <p><i class="text-primary fas fa-check"></i> Ver los artículos comprados.</p>

        <h4 class="mt-5"> <i class="fas fa-circle text-primary"></i> Además, a tan solo por $12 dólares tendrás la posibilidad de:</h4>
        <br>
        <p><i class="text-primary fas fa-check"></i> Publicar productos que desees vender.</p>
        <p><i class="text-primary fas fa-check"></i> Agregar descuentos a tus artículos.</p>
        <p><i class="text-primary fas fa-check"></i> Actualizar y/o Eliminar tus productos.</p>
        <p><i class="text-primary fas fa-check"></i> Descargar diferentes archivos PDF.</p>
        <p><i class="text-primary fas fa-check"></i> Ver tus artículos vendidos, así como también las ganacias obtenidas.</p>
        </div>

        <div class="col-4">
          <div class="container text-start">
            <img class="img-fluid" src="{{asset('imagenes/dinero.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>  

    <div class="container p-5 mt-5">
      
      <div class="row">

        <div class="col-6">
          <div class="container">
            <img class="img-fluid" src="{{asset('imagenes/responsive.png')}}" alt="">
          </div>
        </div>

        <div class="col-6 text-end">
          <div class="container">
            <h3>Nuestro sitio web cuenta con un diseño responsive para que puedas acceder desde diferentes dispositivos móviles</h3>
          <br>
          <p><i style="font-size:23px" class="text-success fas fa-check"></i> Computadoras <i class="fas fa-laptop" style="font-size: 23px"></i></p>
          <p><i style="font-size:23px" class="text-success fas fa-check"></i> Celulares <i class="fas fa-mobile-screen" style="font-size: 23px"></i></p>
          <p><i style="font-size:23px" class="text-success fas fa-check"></i> Tablets <i class="fas fa-tablet-alt" style="font-size: 23px"></i></p>
          </div>
        </div>

      </div>

    </div>
    
    
    <div class="container">
      politicas de privacidad del sitio
    </div>

    <div class="container">
      formulario de contacto
    </div>

    <div class="container">
      @ derechos reservados 2022, Merca-Lín
      REDES SOCIALES, FACEBOOK E INSTAGRAM
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
  </body>
</html>