@extends('Plantillas_Generales.plantilla_general_admin')

@section('CSS')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
@endsection

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""> <span class="text-decoration-underline">{{ Auth::user()->nombre}}</span></a>
@endsection

@section('TITULO')
    <title>Tu Perfil</title>
@endsection

@section('BUSQUEDAS')
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
@endsection

@section('DROPDOWN')
    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
        
        <li>
            <form action="{{url('user/'.Auth::user()->id_user)}}" method="POST">
                @csrf
                @method('GET')

                <button type="submit" class="dropdown-item text-light">
                    <i class="fas fa-user"></i> Mi Perfil
                </button>
            </form>
        </li>
        
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item text-light" href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
@endsection

@section('MENU-LATERAL')    
    <div class="sb-sidenav-menu-heading">¿Qué deseas realizar?</div>
    <a class="nav-link" href="{{url('articulos/create')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-upload"></i></div>
        Publicar Artículo
    </a>

    <a class="nav-link" href="{{route('home')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
        Ver Artículos
    </a>
@endsection



@section('CONTENIDO')
    @if (session('mensaje'))
    <div aria-live="polite" aria-atomic="true" class="position-relative" data-bs-delay="100">
                
        <div class="toast-container position-absolute top-0 end-0 p-3" style="z-index:11">

            <div class="toast show" role="alert" aria-live="assertive" data-bs-autohide="false" aria-atomic="true">
            
                <div class="toast-header">
                <strong class="me-auto"><i class="fas fa-info-circle text-primary"></i> Notificación</strong>
                <small class="text-muted">justo ahora</small>
                <button type="button" onclick="cerrar()" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                <p class="text-success"><i class="fas fa-check-circle text-success"></i> {{session('mensaje')}}</p>
                </div>

            </div>

        </div>
    </div>
    @endif

    <div class="container-fluid p-5">
       {{--   <h1 class="mt-4">Tus artículos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">A continuación se muestran tus artículos {{ Auth::user()->nombre }} <i class="fas fa-arrow-down"></i></li>
        </ol>  --}}

        <div class="row mt-2">

            <div class="container">
                <div class="container-fluid p-2 mb-3">

                    <div class="row">
                        <div class="col text-start"> {{--  INICIO  --}}
                            <a href="{{url('articulos/create')}}" class="btn btn-primary">+ Nuevo Artículo</a>
                        </div>

                        <div class="col"></div>

                        <div class="col text-end"> {{--  FINAL  --}}
                            <button class="btn btn-danger">Lista de Artículos PDF <i class="fas fa-download"></i></button>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b><i class="fas fa-table"></i> Tabla de Artículos</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="tabla">
                            <thead class="bg-dark text-light py-0">
                                <tr>
                                    <th>Fecha Publicación</th>

                                    <th>
                                        Categoría
                                        <a data-bs-toggle="modal" data-bs-target="#desc_categoria" class="px-1 bg-primary">+</a>
                                        @include('modales.modal_descuento_por_categoria')
                                    </th>

                                    <th>Nombre Artículo</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th colspan="2">
                                        Desc. (%)
                                        <a data-bs-toggle="modal" data-bs-target="#desc_general" class="px-1 bg-primary">+</a>
                                        @include('modales.modal_descuento_general')
                                    </th>

                                    <th colspan="2" class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mis_art as $item)
                                <tr>
                                    <td>{{$item->fecha_publicacion_articulo}}</td>
                                    <td>{{$item->obtener_categoria->nombre_categoria}}</td>
                                    <td>{{$item->nombre_articulo}}</td>
                                    <td>{{$item->precio}}</td>
                                    <td>{{$item->cantidad}}</td>
                                   
                                    <td class="text-center">
                                        {{$item->descuento}}
                                    </td>

                                    <td class="text-center">
                                        <button data-bs-toggle="modal" data-bs-target="#desc_por_articulo" class="btn btn-primary btn-sm"><i class="fas fa-percent text-small"></i></button>
                                        @include('modales.modal_descuento')</td>
                                    
                                    <td class="text-center">
                                        <form action="{{url('articulos/'.$item->id_articulo.'/edit')}}" method="post">
                                            @csrf
                                            @method('GET')
                                            <button class="btn btn-warning text-light btn-sm"><i class="fas fa-edit"></i></button>
                                        </form>
                                    </td>
                                    
                                    <td class="text-center">
                                        <form action="{{url('articulos/'.$item->id_articulo)}}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('¿Desea eliminar el articulo: {{$item->nombre_articulo}}?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>

    </div>
    
@endsection


@section('JS')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>

    <script>
        function cerrar(){
            $('.toast').hide();
        }
    </script>
@endsection

