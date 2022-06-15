@extends('Plantillas_Generales.plantilla_general_admin')

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="{{asset('imagenes/yo.jpg')}}" alt=""> <span class="text-decoration-underline">{{ Auth::user()->nombre}}</span></a>
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
        <li><a class="dropdown-item text-light" href="#!"><i class="fas fa-user"></i> Mi Perfil</a></li>
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

    <div class="container mt-5">
        
        <form class="row form_registro_articulo" method="POST" action="{{url('articulos/'.$articulo->id_articulo)}}">
            @csrf
            @method('PUT')

            <div class="col-1"></div>
            <div class="col-9">
                <div class="card FORM_REG_ART">

                    <div class="card-header text-center rounded-pill bg-dark text-light">
                        <h6 class="mt-1"><i class="fas fa-clipboard"></i> Formulario de Actualización de Artículos</h6>
                    </div>
                    
                    <div class="card-body">
                        
                        <div class="input-group mt-2">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Nombre del Artículo</span>
                            <input required name="nombre_articulo" value="{{$articulo->nombre_articulo}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
        
                        <div class="row g-3 mt-4">
    
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Categoría</span>
                                    <select class="form-select" name="id_categoria">
                                        @foreach ($categorias as $item)
                                            <option value="{{$item->id_categoria}}" {{($articulo->id_categoria==$item->id_categoria)?'selected':''}} >{{$item->nombre_categoria}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Estado del Artículo</span>
                                    <select class="form-select" name="id_estado_articulo">
                                        @foreach ($estado_articulo as $item)
                                            <option value="{{$item->id_estado_articulo}}" {{($articulo->id_estado_articulo==$item->id_estado_articulo)?'selected':''}} >{{$item->estado_articulo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                        </div>
    
    
                        <div class="row g-3 mt-4">
    
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Precio</span>
                                    <input name="precio" value="{{$articulo->precio}}" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                </div>
                            </div>
    
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Cantidad</span>
                                    <input name="cantidad" min="1" value="{{$articulo->cantidad}}" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                </div>
                            </div>
    
                        </div>
    
    
                        <div class="input-group mt-4">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Descripción</span>
                            <textarea name="descripcion" value="{{$articulo->descripcion}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" class="form-control" rows="3" maxlength="238">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus omnis expedita molestiae dignissimos commodi quisquam est, vero eum neque laudantium maiores ut. Nobis doloribus numquam nesciunt incidunt nulla! Sapiente, similique.</textarea>
                        </div>
    
                        <div class="mt-3 text-center">
                            <button class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form> 
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