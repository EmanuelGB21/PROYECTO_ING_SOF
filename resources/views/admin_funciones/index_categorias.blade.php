@extends('Plantillas_Generales.plantilla_general_admin')


@section('CSS')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endsection

@section('TITULO')
<title>Administrador</title>
@endsection

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="{{asset('imagenes/ADMIN.png')}}" alt=""> <span class="text-decoration-underline">Administrador</span></a>
@endsection

@section('BUSQUEDAS')
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
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
            Generar Reportes
    </a>
        
    <a class="nav-link" href="#">
        <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
            Ganancias
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
    
    <div class="container mt-5">

        <div class="row mt-5">
            <div class="col-1"></div>
            <div class="col-3">
               <div class="card">
                   <div class="card-header">
                        Registrar Categoría
                   </div>
                   <div class="card-body">
                    <form action="{{url('categorias')}}" method="post">
                        @csrf

                        <div class="form-floating mb-3">
                            <input required name="nombre_categoria" type="text" class="form-control" id="floatingInput" placeholder="Nombre Categoria">
                            <label for="floatingInput">Nombre Categoria</label>
                        </div>
    
                        <div class="form-group mt-2">
                            <button class="btn btn-primary"><i class="fas fa-upload"></i> Registrar</button>
                        </div>
                    </form>
                   </div>
               </div>
            </div>

            <div class="col-7">

                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Tabla Categorías
                    </div>
                    <div class="card-body">
                     <table class="table table-bordered">
                         <thead class="bg-dark text-light text-center">
                             <tr>
                                 <th>#</th>
                                 <th>Nombre Categoria</th>
                                 <th>Eliminar</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($categorias as $item)
                             <tr>
                                 <td>{{$item->id_categoria}}</td>
                                 <td>{{$item->nombre_categoria}}</td>
         
                                 <td class="text-center">
                                     <form action="{{url('categorias/'.$item->id_categoria)}}" method="post">
                                         @csrf
                                         @method('DELETE')
                                         <button onclick="return confirm('¿Desea eliminar esta categoría?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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
    </div>

@endsection


@section('JS')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function cerrar(){
            $('.toast').hide();
        }
    </script>
@endsection