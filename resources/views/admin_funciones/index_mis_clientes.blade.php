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
            <i class="fas fa-users"></i> Mis Clientes: {{$clientes->count()}}
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="tabla">
                <thead class="bg-dark text-light text-center">
                    <tr>
                        <th>Fecha Registro</th>
                        <th>Nombre Cliente</th>
                        <th>Tipo de Cliente</th>
                        <th colspan="2">Información de contacto</th>
                        <th colspan="2">Membresía Vence</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $item)
                        <tr>
                            <td style="width: 100px">{{$item->fecha_registro}}</td>
                            <td style="width: 80px">{{$item->nombre}} {{$item->primer_apellido}} {{$item->segundo_apellido}}</td>
                            @if ($item->id_tipo_cuenta==1)
                                <td style="width: 80px">Comprador y Vendedor</td>
                            @else
                                <td style="width: 80px">Comprador</td>
                            @endif
                           
                            <td colspan="2">
                               <i class="fas fa-envelope"></i> {{$item->email}} <br>
                               <i class="fas fa-phone"></i> {{$item->telefono}}
                            </td>

                            @if ($item->membresia=="no")
                            <td  colspan="2">No paga</td>    
                            @else
                            @php
                                date_default_timezone_set('America/Costa_Rica');

                                $fechaAct= new DateTime(date('Y-m-d')); 
                                $fechaRenov= new DateTime($item->fecha_renovacion);
                                
                                $dias = $diff = $fechaAct->diff($fechaRenov); 

                                $dias = $fechaAct->diff($fechaRenov)->format('%r%a');
                            @endphp
                            <td colspan="2">Renueva dentro de {{$dias}} días</td>
                            @endif
                            
                            <td class="text-center">
                                <button data-bs-toggle="modal" data-bs-target="#contactar{{$item->id_user}}" class="btn btn-primary btn-sm"><i class="fas fa-envelope"></i> Contactar</button> 
                                @include('modales.contactar_clientes')
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
        function cerrar(){
            $('.toast').hide();
        }
    </script>
@endsection