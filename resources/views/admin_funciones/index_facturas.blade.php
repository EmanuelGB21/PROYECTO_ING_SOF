@extends('Plantillas_Generales.plantilla_general_admin')


@section('CSS')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
@endsection

@section('TITULO')
<title>Administrador</title>
@endsection

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="{{asset('imagenes/iconos/logo1.jpeg')}}" alt=""> <span class="badge bg-danger">Administrador</span></a>
@endsection

@section('DROPDOWN')
    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
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
    
    <a class="nav-link" href="{{route('home')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
            Ver Ganancias
    </a>
    
    <a class="nav-link" href="{{route('ver_reportados')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-exclamation-circle"></i></div>          
        Arículos reportados
    </a>

    <a class="nav-link" href="{{route('admin_categorias')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
        Gestionar Categorías
    </a>

    <a class="nav-link" href="{{route('MIS_CLIENTES')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Mis clientes
    </a>

    <div class="sb-sidenav-menu-heading">Tramitar Facturas</div>

    <a class="nav-link" href="{{route('SECC_FACT')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
            Facturas
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

    <div class="container mt-5"></div>

    <div class="container mt-5 p-5">
       <div class="card shadow">
            <div class="card-header">
                <i class="fas fa-receipt"></i> Facturas
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="tabla">
                    <thead class="bg-dark text-light text-center">
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">ID Factura</th>
                            <th class="text-center">Comprador</th>
                            <th class="text-center">Total Pagado</th>
                            <th class="text-center">Detalles de la compra</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($facturas as $item)
                            <tr>
                                <td class="text-center" style="width: 100px">{{$item->fecha_factura}}</td>
                                <td class="text-center" style="width: 120px">{{$item->id_factura}}</td>
                                <td class="text-center">{{$item->obtener_user->nombre}} {{$item->obtener_user->primer_apellido}} {{$item->obtener_user->segundo_apellido}}</td>
                              
                                @php
                                $cantidad =0;
                                $precio =0;
                                $TOTAL_PAGADO=0;
                                @endphp
                                @foreach ($item->obtener_detalles as $detalles)
                                    @php
                                        $cantidad = $detalles->cantidad_comprada;
                                        $precio = $detalles->precio_articulo;

                                        $TOTAL_PAGADO+=$cantidad*$precio;
                                    @endphp  
                                @endforeach
                                <td class="text-center" style="width: 130px"><span style="font-size: 12px" class="badge bg-success">$ {{$TOTAL_PAGADO}}</span></td>
                                
                                <td class="text-center">
                                    <button data-bs-toggle="modal" data-bs-target="#det{{$item->id_factura}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> 
                                    </button>
                                    @include('admin_funciones.modal_detalle_factura')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>
    </div>

@endsection


@section('JS')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>

    <script>
        //cerrar funcion de cerrar toast
        function cerrar(){
            $('.toast').hide();
        }
    </script>
@endsection