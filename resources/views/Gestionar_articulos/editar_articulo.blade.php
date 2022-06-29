@extends('Plantillas_Generales.plantilla_general_admin')

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

    {{--  CONTENIDO  --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-7">
                <form method="POST" action="{{url('articulos/'.$articulo->id_articulo)}}">
                    @csrf
                    @method('PUT')
        
                        <div class="card FORM_REG_ART">
        
                            <div class="card-header text-center bg-dark text-light">
                                <h6 class="mt-1"><i class="fas fa-clipboard"></i> Formulario de Actualización de Artículos</h6>
                            </div>
                            
                            <div class="card-body">
                                
                                <div class="input-group mt-2">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Nombre:</span>
                                    <input required name="nombre_articulo" value="{{$articulo->nombre_articulo}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                </div>
                
                                <div class="row g-3 mt-4">
            
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Categoría:</span>
                                            <select class="form-select" name="id_categoria">
                                                @foreach ($categorias as $item)
                                                    <option value="{{$item->id_categoria}}" {{($articulo->id_categoria==$item->id_categoria)?'selected':''}} >{{$item->nombre_categoria}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Estado:</span>
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
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Precio:</span>
                                            <input name="precio" value="{{$articulo->precio}}" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
            
                                    <div class="col">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Cantidad:</span>
                                            <input name="cantidad" min="1" value="{{$articulo->cantidad}}" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
            
                                </div>
            
            
                                <div class="input-group mt-4">
                                    <span class="input-group-text" id="inputGroup-sizing-lg">Descripción:</span>
                                    <textarea name="descripcion" value="{{$articulo->descripcion}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" class="form-control" rows="3" maxlength="238">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus omnis expedita molestiae dignissimos commodi quisquam est, vero eum neque laudantium maiores ut. Nobis doloribus numquam nesciunt incidunt nulla! Sapiente, similique.</textarea>
                                </div>
            
                                <div class="mt-3 text-center">
                                    <a href="{{route('home')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Regresar</a>
                                    <button class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
                                </div>
        
                            </div>
                        </div>
                </form> 
            </div>

            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <h6 class="mt-1"><i class="fas fa-images"></i> Imágenes</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('imagenes_ruta/')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="mb-2" for="my-input">Buscar Imágenes:</label>
                                <input type="hidden" name="id_articulo" value="{{$articulo->id_articulo}}">
                                <input required class="form-control" type="file" name="ruta_imagen">
                            </div>

                            <button class="mt-3 btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
                        </form>

                        <hr>
                        
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($articulo->obtener_imagenes as $img)
                                <div class="col"> 
                                    <div class="card-img-top">  
                                        <button style="position: absolute;" data-bs-toggle="modal" data-bs-target="#img{{$img->id_imagen}}" class="btn btn-sm btn-danger rounded-circle"><i class="fas fa-times"></i></button>
                                        @include('alertas.elim_img')
                                        <img class="img-fluid" src="{{asset('storage').'/'.$img->ruta_imagen}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
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