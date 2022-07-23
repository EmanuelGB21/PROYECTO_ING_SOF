@extends('Plantillas_Generales.plantilla_general_admin')

@section('CSS')
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    {{--  PARA PAYPAL  --}}
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
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
    <a class="nav-link" href="{{route('home')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
        Mis Compras
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
                    <div class="container-fluid p-2 mb-3">
                        <div class="row">
                            <div class="col text-start"> {{--  INICIO  --}}
                                
                                <button data-bs-toggle="modal" data-bs-target="#mem{{Auth::user()->id_user}}" class="btn btn-primary">Publicar Artículo</button>

                            </div>
    
                            <div class="col"></div>
    
                            <div class="col text-end"> {{--  FINAL  --}}
                               <form target="__blank" action="{{route('PDF_COMPRAS_USER')}}" method="POST">
                                @csrf
                                @method('GET')

                                <input type="hidden" name="array_mis_compras" value="{{$mis_compras}}">
                                <button class="btn btn-danger">Lista de Artículos comprados en PDF <i class="fas fa-download"></i></button>
                               </form>
                            </div>
    
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b><i class="fas fa-table"></i> Tabla de Artículos Comprados</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="tabla">
                                <thead class="bg-dark text-light py-0">
                                    <tr>
                                        <th>Fecha de Compra</th>
                                        <th>Factura #</th>
                                        <th>Dueño</th>
                                        <th>Total Pagado</th>
                                        <th>Ver detalles de la compra</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mis_compras as $item)
                                    <tr>
                                        <td>{{$item->fecha_factura}}</td>
                                        <td>{{$item->id_factura}}</td>
                                        <td>{{$item->obtener_user->nombre}}</td>
                                        
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
                                            <button data-bs-toggle="modal" data-bs-target="#det_fact_compr{{$item->id_factura}}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> 
                                            </button>
                                            @include('modales.modal_comprador_detalle_factura')
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
    <div>
        @include('modales.paypal_enlace')
    </div>


    {{--  PREGUNTO SI HAY QUE CARGAR MODAL DESDE INICIO O NO  --}}
    @if($direccion=="falta")
    
        <div style="background-color: rgba(0,0,0, 0.5) !important;" class="modal" id="modal_registro_direccion" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light text-center">
                <h6 class="modal-title">Registra tu Dirección para continuar</h6>
                </div>
                <div class="modal-body">
                <form action="{{url('direcciones')}}" method="POST">
                    @csrf
                    <input id="input_direccion" type="hidden" value="{{$direccion}}">
                    
                    <div class="input-group mb-3">
                    <span class="input-group-text">Código Postal: </span>
                    <input type="number" name="codigo_postal" class="form-control">
                    </div>
        
                    <div class="input-group mb-3">
                    <span class="input-group-text">País: </span>
                    <input type="text" name="pais" value="Costa Rica" readonly class="bg-white form-control">
                    </div>
        
                    <div class="input-group mb-3">
                    <span class="input-group-text">Provincia: </span>
                    <select name="provincia" class="form-select">
                        @foreach ($provincias as $prov)
                            <option value="{{$prov}}">{{$prov}}</option>
                        @endforeach
                    </select>
                    </div>
        
                    <div class="input-group mb-3">
                    <span class="input-group-text">Ciudad: </span>
                    <input type="text" name="ciudad" class="form-control">
                    </div>
        
                    <div class="input-group mb-3">
                    <span class="input-group-text">Dirección Actual: </span>
                    <input type="text" name="direccion_actual" class="form-control">
                    </div>
        
                    <div class="text-end">
                    <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Registrar</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    @endif

@endsection


@section('JS')
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/membresia_paypal.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
    <script>
        function cerrar(){
            $('.toast').hide();
        }
        var direccion = document.getElementById('input_direccion').value;
        if(direccion=="falta"){
            $('#modal_registro_direccion').show();
        }
    </script>
@endsection

