@extends('Plantillas_Generales.plantilla_general_admin')


@section('CSS')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
@endsection

@section('TITULO')
<title>Administrador</title>
@endsection

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="{{asset('imagenes/ADMIN.png')}}" alt=""> <span class="badge bg-danger">Administrador</span></a>
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
        <div class="sb-nav-link-icon"><i class="fas fa-exclamation-circle"></i></div>
                                      
        Arículos reportados
    </a>

    <a class="nav-link" href="{{route('admin_categorias')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
        Gestionar Categorías
    </a>

    <a class="nav-link" href="#">
        <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>
            Generar Reportes **
    </a>
        
    <a class="nav-link" href="#">
        <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
            Ganancias **
    </a>

    <a class="nav-link" href="{{route('MIS_CLIENTES')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Mis clientes
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
    
    <div class="container mt-1 p-5">

        <button data-bs-toggle="modal" data-bs-target="#agregar_categorias" class="btn btn-primary">+ Nueva Categoría</button>
        @include('modales.modal_agregar_categoria')
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table"></i> Tabla Categorías
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="tabla">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre Categoria</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $item)
                        <tr>
                            <td>{{$item->id_categoria}}</td>
                            <td>{{$item->nombre_categoria}}</td>
    
                            <td class="text-center">
                                <button data-bs-toggle="modal" data-bs-target="#cat{{$item->id_categoria}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                @include('alertas.elim_cat')
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