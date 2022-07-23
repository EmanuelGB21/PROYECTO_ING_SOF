@extends('Plantillas_Generales.plantilla_general_admin')

@section('FOTO-DE-PERFIL')
<a class="navbar-brand ps-1" href="{{route ('home')}}"> <img class="rounded-circle w-25 p-2" src="{{asset('storage'.'/'.$cliente->foto_perfil)}}" alt=""> <span class="badge bg-success">{{ Auth::user()->nombre}}</span></a>
@endsection

@section('TITULO')
    <title>Tu Perfil</title>
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
  @if (Auth::user()->membresia=="si")
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

  @else
  <div class="sb-sidenav-menu-heading">¿Qué deseas realizar?</div>
  <a class="nav-link" href="{{route('home')}}">
      <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
      Mis Compras
  </a>
  @endif
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
        <div class="container">
            <div class="main-body">
          
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">

                      <div class="card shadow">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('storage').'/'.$cliente->foto_perfil}}" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <h4>{{$cliente->nombre_user}}</h4>

                              @if ($cliente->id_tipo_cuenta==1)
                              <p class="text-secondary mb-1">Vendedor(a) en la página Merca-Lín</p>
                              @else
                              <p class="text-secondary mb-1">Comprador(a) en la página Merca-Lín</p>
                              @endif
                              @foreach ($cliente->obtener_direccion as $item)
                              <p class="text-muted font-size-sm">{{$item->pais}}, {{$item->provincia}}, {{$item->ciudad}}</p> 
                              @endforeach
                              <a class="btn btn-secondary btn-sm" href="{{ route('password.request') }}">
                                Cambiar contraseña
                              </a>

                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_user{{$cliente->id_user}}">Editar</button>
                              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminar_perfil{{$cliente->id_user}}">Eliminar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card mt-3 shadow">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-check"></i> Total de Artículos Publicados</h6>
                              <span class="text-secondary">{{$total_mis_art_publicados}}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-check"></i> Total de Articulos Vendidos</h6>
                            <span class="text-secondary">{{$total_vendidos}}</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-coins"></i> Ganancia en Ventas</h6>
                            <span class="text-secondary">$ {{$cliente->ganancias}}</span>
                          </li>
                        </ul>
                      </div>

                    </div>

                    <div class="col-md-8">
                      <div class="card mb-3 shadow">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Nombre completo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$cliente->nombre}} {{$cliente->primer_apellido}} {{$cliente->segundo_apellido}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Correo</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$cliente->email}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Teléfono</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              (506) {{$cliente->telefono}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Fecha de Registro</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{$cliente->fecha_registro}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Dirección</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                               @foreach ($cliente->obtener_direccion as $item)
                               {{$item->provincia}}, {{$item->ciudad}} {{$item->direccion_actual}}
                               @endforeach
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_direccion{{$cliente->id_user}}">Editar Dirección</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                          <div class="card h-100 shadow">
                            <div class="card-body text-center">
                              @if ($cliente->membresia == "si")
                          
                                @php
                                  date_default_timezone_set('America/Costa_Rica');

                                  $fechaAct= new DateTime(date('Y-m-d')); 
                                  $fechaRenov= new DateTime($cliente->fecha_renovacion);
                                  
                                  $dias = $diff = $fechaAct->diff($fechaRenov); 

                                  $dias = $fechaAct->diff($fechaRenov)->format('%r%a');
                                @endphp
                                <span style="font-size: 19px" class="badge bg-success">Membresía expira en {{$dias}} días</span>
                              @else
                              <span style="font-size: 19px" class="badge bg-warning">No paga</span>
                              @endif
                              {{--   <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                              <small>Web Design</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Website Markup</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>One Page</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Mobile Template</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Backend API</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>  --}}
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                          <div class="card h-100 shadow">
                            <div class="card-body text-center">

                              <form target="__blank" action="{{route('MIS_ART_VENDIDOS')}}" method="POST">
                                @csrf
                                @method('GET')
                                <input type="hidden" name="array_art_vendidos" value="{{$vendidos}}">
                                <input type="hidden" name="total_vendidos" value="{{$total_vendidos}}">
                                <button class="btn btn-danger">Lista de artículos vendidos PDF</button>
                              </form>

                             {{--   <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                              <small>Web Design</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Website Markup</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>One Page</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Mobile Template</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small>Backend API</small>
                              <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>  --}}
                            </div>
                          </div>
                        </div>
                      </div>
 
                    </div>
                  </div>
        
                </div>
            </div>
    </div>
    {{--  MODALES  --}}
    <div>
      @include('modales.modal_edit_direccion')
    </div>

    <div>
      @include('modales.modal_edit_user')
    </div>

    <div>
      @include('alertas.modal_eliminar_perfil')
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