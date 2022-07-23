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
    
    {{--  A PARTIR DE ACÁ CONTENIDO  --}}
    <div class="container-fluid px-4">    
        <h4 class="mt-4"><i class="fas fa-coins"></i></h4>
            <h5 class="mt-3 mb-5">Movimientos de la página web Merca-Lín</h5>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4 shadow">
                    <div class="card-body">Cantidad de Ventas Realizadas:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h2 class="text-white stretched-link">
                           <i class="fas fa-receipt"></i> {{$total_ventas}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4 shadow">
                    <div class="card-body">Cantidad de Usuarios:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h2 class="text-white stretched-link">
                            <i class="fas fa-users"></i> {{$usuarios->count()}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4 shadow">
                    <div class="card-body">Ganacias de Merca-Lín:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h2 class="text-white stretched-link">
                          <i class="fas fa-chart-line"></i> $  {{Auth::user()->ganancias}}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4 shadow">
                    <div class="card-body">Productos disponibles:</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h2 class="text-white stretched-link">
                            <i class="fas fa-box"></i> {{$total_publicados}}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  OPCIONES DE GENERAR DISTINTOS PDFS   --}}

    <div class="container-fluid mt-5">    
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h5>Generar documentos PDF</h5>
                </div>

                <div class="card-body shadow">
                    <div class="container text-center">
                        <form action="{{route('get_ganacias_pdf')}}" method="POST">
                            @csrf
                            @method('GET')

                            <input type="hidden" name="total_publicados" value="{{$total_publicados}}">
                            <input type="hidden" name="total_ventas" value="{{$total_ventas}}">
                            <input type="hidden" name="usuarios" value="{{$usuarios}}">
                            <input type="hidden" name="ganancias" value="{{Auth::user()->ganancias}}">
                            
                            <button class="btn btn-danger"><i class="fas fa-download"></i> Generar y descargar PDF</button>
                        </form>
                    </div>

                   

                </div>
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