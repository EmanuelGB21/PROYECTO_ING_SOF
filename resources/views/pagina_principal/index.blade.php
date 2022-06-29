@extends('Plantillas_Generales.plantilla_general')

@section('CSS')
    <link rel="stylesheet" href="{{asset('css/ribbon.css')}}">
@endsection

@section('START')
    <nav class="nav">
        <li class="nav-item">
        <a class="nav-link text-light MENU" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Inicio</a>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light MENU" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bars"></i> Categorías
        </a>
        <ul class="dropdown-menu panel_seccundario" aria-labelledby="navbarDropdown">
           @foreach ($categorias as $item)
           <li><a class="dropdown-item text-light SUB_MENU" href="{{$item->id_categoria}}">{{$item->nombre_categoria}}</a></li>
           @endforeach
        </ul>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light MENU" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-plus"></i> Información
        </a>

        <ul class="dropdown-menu panel_seccundario" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-light SUB_MENU" target="_blank" href="{{route('IR_ACERCA_DE')}}"><i class="fas fa-info-circle"></i> Acerca de</a></li>
            <li><a class="dropdown-item text-light SUB_MENU" href="{{route('IR_AYUDA')}}"><i class="fas fa-question-circle"></i> Ayuda</a></li>
        </ul>
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

    <div class="container">
        {{$articulos->links('pagination::bootstrap-4')}}
    </div>

    <div class="row row-cols-1 row-cols-md-3 p-5">

        @foreach($articulos as $item)
        <div class="col">
            <div class="card  carta-producto box">
                
                @if ($item->obtener_estado_articulo->estado_articulo=="Nuevo")

                <div class="ribbon-nuevo ribbon-top-left"><span>{{$item->obtener_estado_articulo->estado_articulo}}</span></div>  
               
                @else
                <div class="ribbon-usado ribbon-top-left"><span>{{$item->obtener_estado_articulo->estado_articulo}}</span></div>  
                @endif
               
                <div class="card-body mt-1 text-end ">
                    <div class="clearfix">
                       {{--   <div class="float-start">
                            <p class="text-muted"><small><b>Disponible: {{$item->cantidad}}</b></small></p>
                        </div>  --}}
                        <div class="float-end">
                            <a href="{{url('articulos/'.$item->id_articulo)}}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>    
                </div>

               
                <div class="card-body">

                    <div class=" text-center">
                        {{--  @foreach ($item->obtener_imagenes as $img)
        
                            <img src="{{asset('storage').'/'.$img->ruta_imagen}}" class="w-75 IMAGENES">
                       
                        @endforeach  --}}

                        FOTO
                    </div>

                    <hr>
                    
                    <div class="clearfix">
                        <div class="float-start">
                            <p class="text-muted"><b>{{$item->nombre_articulo}}</b></p>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-sm btn-dark text-light"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="float-start">
                            @if ($item->descuento!=0)
                                @php
                                    $precio=$item->precio;
                                    $descuento=$item->descuento;

                                    $operacion=100-$descuento;
                                    $resultado=$precio*($operacion/100);
                                @endphp
                
                                <label class="text-muted"><small><b>{{$item->obtener_categoria->nombre_categoria}} | </b></small>
                                    <span class="badge bg-danger text-decoration-line-through">$ {{$precio}}</span>  
                                    <span class="badge bg-success">$ {{$resultado}}</span>
                                </label>
                                @else    
                                <label class="text-muted "><small><b>{{$item->obtener_categoria->nombre_categoria}} | </b></small>
                                    <span class="badge bg-success">$ {{$item->precio}}</span> 
                                </label>  
                           @endif
                        </div>
                        <div class="float-end">
                            <p class="text-muted mb-0"><small><b>Disponible: {{$item->cantidad}}</b></small></p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container mt-4 p-2">
        {{$articulos->links('pagination::bootstrap-4')}}
    </div>

@endsection