@extends('Plantillas_Generales.plantilla_general')


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
           <li><a class="dropdown-item text-light SUB_MENU" href="{{route('buscar',['id' => $item->id_categoria, 'tipo_busqueda' => 'C'])}}">{{$item->nombre_categoria}}</a></li>
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
   <div class="text-center mt-5">

    @if($mensaje!=null)
    <h5 class="text-danger mb-5">
        {{$mensaje}}
    </h5>
    @endif

    <img src="{{asset('imagenes_error/error.png')}}" alt="">
    <img src="{{asset('imagenes_error/404.png')}}" alt=""> 
   </div>
@endsection