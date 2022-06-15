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
        <a class="nav-link text-light MENU" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <i class="fas fa-shopping-cart"></i> Agregar al carrito
        </a>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Offcanvas right</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              Carrito de compras
            </div>
          </div>
    </nav>
@endsection

@section('CONTENIDO')
    
<div class="clearfix">
    <div class="float-start">
      <!-- DATOS DEL ARTÍCULO -->

      <div class="card mb-3 carta-producto" id="tamaño_reportar_y_detalles_articulos">
        <div class="card-header bg-dark">

          <div class="row align-items-center">

            <div class="col mt-1">
              <a href="{{route('pagina_principal')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a>
            </div>

            <div class="col text-center mt-1">
              <h5 class="text-light"><i class="fas fa-clipboard"></i> Detalles del Producto</h5>
            </div>

            <div class="col text-end">
              <form method="POST" action="{{route('GENERAR_PDF')}}">
                @csrf
                @method('GET')
                <input type="hidden" name="id_articulo" value="{{$articulo->id_articulo}}">
                <button class="btn btn-danger">PDF <i class="fas fa-download"></i></button>
              </form>
            </div>

          </div>
        </div>
        <div class="row g-0">
          <div class="col-md-6">
            <!--INICIA CAROUSEL -->
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">

              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

              </div>

              <div class="carousel-inner">
                
                <div class="carousel-item active">
                  <div
                    style="width: 100%; height:280px; background-image: url('/otro/monitor 1.jpg'); background-repeat: no-repeat;background-size: cover;">
                  </div>
                </div>

                <div class="carousel-item">
                  <div
                    style="width: 100%; height:280px; background-image: url('/otro/monitor 2.jpg'); background-repeat: no-repeat;background-size: cover;">
                  </div>
                </div>

                <div class="carousel-item">
                  <div
                    style="width: 100%; height:280px; background-image: url('/otro/monitor 3.jpg'); background-repeat: no-repeat;background-size: cover;">
                  </div>
                </div>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

            <!--  CIERRA CAROUSEL -->

            {{--  INFO DEL ARTÍCULO  --}}
            <div class="p-2 mt-2">
              <p class="card-text"><small class="text-muted"><b><i class="fas fa-calendar-alt"></i>
                Fecha de publicación: {{$articulo->fecha_publicacion_articulo}}
              </b></small></p>
                             
              @if ($articulo->id_estado_articulo==1)
              <p class="card-text"><b>Estado:</b> <span class="badge bg-success text-uppercase">{{$articulo->obtener_estado_articulo->estado_articulo}}</span></p>    
              @else
              <p class="card-text"><b>Estado:</b> <span class="badge bg-warning text-light text-uppercase">{{$articulo->obtener_estado_articulo->estado_articulo}}</span></p>    
              @endif
              
            </div>
            
          </div>

          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title">{{$articulo->nombre_articulo}} | {{$articulo->obtener_categoria->nombre_categoria}}</h5>
          
              @if ($articulo->descuento!=0)
                  @php
                      $precio=$articulo->precio;
                      $descuento=$item->descuento;

                      $operacion=100-$descuento;
                      $resultado=$precio*($operacion/100);
                  @endphp
  
                  <h6 class="text-start mt-3">Precio : 
                      <span class="badge bg-danger text-decoration-line-through">$ {{$precio}}</span>  
                      <span class="badge bg-success">$ {{$resultado}}</span>
                  </h6>
                  
                @else
                  
                  <h6 class="text-start mt-3"> Precio : 
                      <span class="badge bg-success">$ {{$articulo->precio}}</span> 
                  </h6>  

              @endif


              <p class="mt-5"><b><u>Descripción:</u></b></p>

              <p class="card-text">{{$articulo->descripcion}}</p>
            </div>

            <div class="card-body  mt-4 text-end">
              <label style="font-size:17px;"><i class="fas fa-share"></i><b> Compartir con:</b></label>

                <a href="WhatsApp"><i style="font-size:20px; color:rgb(31, 179, 92)"
                    class="fab fa-whatsapp-square"></i></a>
                <a href="Facebook"><i style="font-size:20px; color:rgb(66, 103, 178)"
                    class="fab fa-facebook-square"></i></a>
                <a href="twitter"><i style="font-size:20px; color:rgb(29, 161, 242)"
                    class="fab fa-twitter-square"></i></a>
            </div>

          </div>
        </div>
      </div>

    </div> <!-- FIN DATOS DEL ARTÍCULO -->


    <div class="float-end">
      <!-- DATOS DEL PROPIETARIO -->

      <div class="card ficha_propietario">
        <div class="card-header text-center">
          <img class="rounded-circle w-75" src="/imagenes/yo.jpg" alt="">
        </div>
        <div class="card-body">
          <p class="card-title text-muted mb-3"><strong>Dueño: {{$articulo->obtener_user->nombre}} {{$articulo->obtener_user->primer_apellido}} {{$articulo->obtener_user->segundo_apellido}}</strong></p>
          
            <a href="#!" class="card-text"><i style="font-size:17px; color:rgb(31, 179, 92)" class="fab fa-whatsapp-square"></i>
            <b>Contactar por WhatsApp</b></a>
            

            <div class="container-fluid mt-3">
              <a style="font-size: 15px" href="">Ver más articulos del dueño</a>
            </div>
          
        </div>
      </div>

      <div class="card-header reportar-publicacion mt-2">
        
          <form class="form-inline" action="{{route('reportar',$articulo->id_articulo)}}" method="POST">
            @csrf
            @method('GET')
            <label class="text-center p-2"><b>Reportar Publicación</b></label>
            <button onclick="return confirm('Desea reportar este artículo?')" class="btn btn-danger btn-sm"><i class="fas fa-info-circle"></i></button>
          </form>
      
      </div>

    </div> <!-- FIN DATOS DEL PROPIETARIO -->
  </div>

  <div class="container gallery-container">

    <h2>Fotografías</h2>

    <div class="tz-gallery">

      <div class="row m-5">

        <div class="col-lg-4 mb-4">
          <a class="lightbox" href="#!" data-bs-toggle="modal" data-bs-target="#my_modal1">
            <img class="w-100 mb-4 rounded" src="/otro/fiat_panda_cross_2021_0000.jpg" alt="1">
          </a>
        </div>

        <div class="col-lg-4 mb-4">
          <a class="lightbox" href="#!" data-bs-toggle="modal" data-bs-target="#my_modal2">
            <img class="w-100 mb-4 rounded" src="/otro/fiat-panda-2021-2110053.jpg" alt="2">
          </a>
        </div>

        <div class="col-lg-4 mb-4">
          <a class="lightbox" href="#!" data-bs-toggle="modal" data-bs-target="#my_modal3">
            <img class="w-100 mb-4 rounded" src="/otro/fiat-panda-lateral-posterior.352477.jpg" alt="3">
          </a>
        </div>

        <div class="col-lg-4 mb-4">
          <a class="lightbox" href="#!" data-bs-toggle="modal" data-bs-target="#my_modal4">
            <img class="w-100 mb-4 rounded" src="/otro/fiat_panda_cross_2021_0000.jpg" alt="1">
          </a>
        </div>
        
      </div>

    </div>

  </div>

  <br><br>

  {{--  MODAL DE LAS FOTOS  --}}

  {{--  FOTO 1  --}}

  <div id="my_modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my_modal1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img class="w-100" src="/otro/fiat_panda_cross_2021_0000.jpg" alt="">
        </div>
      </div>

    </div>
  </div>

  {{--  FOTO 2  --}}
  <div id="my_modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my_modal2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img class="w-100" src="/otro/fiat-panda-2021-2110053.jpg" alt="">
        </div>
      </div>
    </div>
  </div>

  {{--  FOTO 3  --}}
  <div id="my_modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my_modal3" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img class="w-100" src="/otro/fiat-panda-lateral-posterior.352477.jpg" alt="">
        </div>
      </div>
    </div>
  </div>

  {{--  FOTO 4  --}}
  <div id="my_modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my_modal4" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img class="w-100" src="/otro/fiat_panda_cross_2021_0000.jpg" alt="">
        </div>
      </div>
    </div>
  </div>

@endsection


@section('js')
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
@endsection