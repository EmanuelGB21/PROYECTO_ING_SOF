@extends('Plantillas_Generales.plantilla_general_admin')

@section('CSS')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
@endsection

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="{{asset('storage'.'/'.Auth::user()->foto_perfil)}}" alt=""> <span class="badge bg-success">{{ Auth::user()->nombre}}</span></a>
@endsection

@section('TITULO')
    <title>Tu Perfil Comprador</title>
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

<div class="sb-sidenav-menu-heading">Sección de entregas y compras</div>
<a class="nav-link" href="{{route('ENTREGAS')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
    Entregas
</a>

<a class="nav-link" href="{{route('MIS_COMPRAS')}}">
<div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
    Mis compras
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

    {{--  CONTENIDO  --}}

        <div class="container-fluid p-5">
            <div class="row mt-2">
                <div class="container">
                
                    <div class="card">
                        <div class="card-header">
                            <b><i class="fas fa-table"></i> Tabla de Entregas </b>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="tabla">
                                <thead class="bg-dark text-light py-0">
                                    <tr>
                                        <th>Articulo</th>
                                        <th>Cantidad</th>
                                        <th>Entregar a</th>
                                        <th>Dirección de entrega</th>
                                        <th class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mis_entregas as $item)
                                        <tr>
                                            <td>{{$item->nombre_articulo}}</td>
                                            <td class="text-center" style="width:60px">{{$item->cantidad_comprada}}</td>
                                            <td style="width: 160px">{{$item->obtener_factura->obtener_user->nombre}} {{$item->obtener_factura->obtener_user->primer_apellido}} {{$item->obtener_factura->obtener_user->segundo_apellido}}</td>
                                            @foreach ($item->obtener_factura->obtener_user->obtener_direccion as $direccion)
                                            <td style="width: 500px">
                                                {{$direccion->provincia}}, {{$direccion->ciudad}}, {{$direccion->direccion_actual}}.
                                                Código Postal{{$direccion->codigo_postal}}
                                            </td>
                                            @endforeach
                                            <td class="text-center">
                                                @if ($item->estado_entrega==0)
                                                    <button data-bs-toggle="modal" data-bs-target="#estado{{$item->id_detalle_factura}}" class="btn btn-danger btn-sm">En entrega</button>
                                                    @include('modales.cambiar_estado')
                                                @endif

                                                @if ($item->estado_entrega==1)
                                                    <button data-bs-toggle="modal" data-bs-target="#estado{{$item->id_detalle_factura}}" class="btn btn-primary btn-sm">Enviado</button>
                                                    @include('modales.cambiar_estado')
                                                @endif

                                                @if ($item->estado_entrega==2)
                                                    <button class="btn btn-success btn-sm">Entregado</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('JS')
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
    <script>
        function cerrar(){
            $('.toast').hide();
        }
    </script>
@endsection
