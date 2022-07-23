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

      <!-- Libraries Stylesheet -->
      <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
      <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
      
    </head>
  <body>
     
    <div class="container-fluid panel_seccundario p-2 sticky-top">
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
      
            <ul class="ul nav mt-2 justify-content-end">
              <li class="nav-item MI_NAV estas">
                <a class="nav-link text-light" aria-current="page" href="#/INICIO">Inicio</a>
              </li>
              <li class="nav-item MI_NAV">
                <a class="nav-link text-light" aria-current="page" href="#/NOSOTROS">Nosotros</a>
              </li>
              <li class="nav-item MI_NAV">
                <a class="nav-link text-light" href="#/POLITICAS-DE-PRIVACIDAD">Políticas</a>
              </li>
              <li class="nav-item MI_NAV">
                <a class="nav-link text-light" href="#/CONTACTANOS">Contáctanos</a>
              </li>
              <li class="nav-item MI_NAV">
                <a class="nav-link text-light boton" href="{{route('pagina_principal')}}">Visitar Sitio <i class="fas fa-arrow-right"></i></a>
              </li>
            </ul>
        </div>
      </div>
    </div>
        {{--  CARROUSEL  --}}
    <div class="container-fluid px-0" id="/INICIO">

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

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 class="mb-4">Sitio web:</h3>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                
                <div class="testimonial-item text-center px-2">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid mx-auto mb-3" src="{{asset('img/testimonial-1.jpg')}}">
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <h5>Vista de artículos</h5>
                    </div>
                </div>

                <div class="testimonial-item text-center px-2">
                  <div class="testimonial-img position-relative">
                      <img class="img-fluid mx-auto mb-3" src="{{asset('img/testimonial-1.jpg')}}">
                  </div>
                  <div class="testimonial-text text-center rounded p-4">
                      <h5>Login</h5>
                  </div>
                </div>

              <div class="testimonial-item text-center px-2">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid mx-auto mb-3" src="{{asset('img/testimonial-1.jpg')}}">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5>Registro</h5>
                </div>
              </div>   
               
              <div class="testimonial-item text-center px-2">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid mx-auto mb-3" src="{{asset('img/testimonial-1.jpg')}}">
                </div>
                <div class="testimonial-text text-center rounded p-4">
                    <h5>Panel de usuario</h5>
                </div>
              </div> 

            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <div class="container p-4" id="/NOSOTROS">
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

    <div class="container p-5 mt-4" id="/POLITICAS-DE-PRIVACIDAD">
      <div class="container mb-5 text-center">
        <h3>Políticas de privacidad importantes:</h3>
      </div>
      <div class="container">
        
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Cada usuario tiene cuentas independientes.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Los datos que se solicitan al registrarse solo serán usados para términos de login.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> La dirección de correo electrónico es para hacer la entrega de los artículos sin necesidad de que los recojas presencialmente.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> La información dada por cada usuario quedará entre Merca-Lín y él.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Tú información solo la podrá ver la empresa, ningún otro cliente, a menos que sea la dirección de entrega de los artículos que compres.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Somos una empresa que se toma con seriedad las cosas.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Solo se permiten pagos mediante PayPal.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Tener en cuenta que trabajamos con dólares.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> Nos tomamos muy enserio cualquier tipo de estafas.</p>
        <p><i style="font-size:23px" class="text-primary fas fa-info-circle"></i> El dinero por ventas de tus artículos será intocable por parte de Merca-Lín, es decir del dinero que ganes no se quitará nada</p>
        
      </div>
    </div>

    {{--  formulario de contacto  --}}
    <div class="container-fluid p-5 mt-4" id="/CONTACTANOS">

      <div class="card">
        <div class="card-header text-center bg-white">
          <h3><i class="fas fa-envelope"></i> Contáctanos</h3>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="container text-center mt-4">
              <img class="w-50" src="{{asset('imagenes/iconos/logo6.jpeg')}}" alt="">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="container mt-5 mb-3">
              <form action="{{url('contacto-pagina')}}" method="POST">
                @csrf
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Ingresa tu correo electrónico:</label>
                  <input style="border-radius: 20px;" required type="email" class="form-control" name="email" placeholder="@gmail.com">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Asunto:</label>
                  <textarea style="border-radius: 20px;" required class="form-control" name="contenido" placeholder="Ingresa tu duda o sugerencia acá" rows="5"></textarea>
                </div>
  
                <div class="text-center mt-3 mb-3">
                  <button class="btn btn-primary rounded-pill btn-lg"><i class="fas fa-envelope"></i> Enviar</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      

    </div>

   {{--  footer  --}}
   <footer class="text-center text-light bg-dark">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn btn-link btn-floating btn-lg text-light m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-facebook-f"></i
        ></a>
 
        <!-- Instagram -->
        <a
          class="btn btn-link btn-floating btn-lg text-light m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-instagram"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center text-light bg-dark">
      <p class="text-light p-2">@ Copyright 2022 Merca-Lín <a href="#/POLITICAS-DE-PRIVACIDAD">politicas de privacidad</a></p>
    </div>
    <!-- Copyright -->
  </footer>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    

    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>

    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script>

      @if(session('mensaje'))
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Mensaje enviado con éxito',
        showConfirmButton: false,
        timer: 3000
      })
      @endif

      // DEJAR MARCADO CUANDO SELECCIONO DEL MENU
      $(".ul").find("li").click(function(){
        $(".ul li").removeClass('estas')
        $(this).addClass('estas')
      })

       // Testimonials carousel
      $(".testimonial-carousel").owlCarousel({
          autoplay: true,
          smartSpeed: 1000,
          center: true,
          dots: false,
          loop: true,
          nav : true,
          navText : [
              '<i class="fas fa-arrow-left"></i>',
              '<i class="fas fa-arrow-right"></i>'
          ],
          responsive: {
              0:{
                  items:1
              },
              768:{
                  items:2
              }
          }
      });

    </script>

  </body>
</html>