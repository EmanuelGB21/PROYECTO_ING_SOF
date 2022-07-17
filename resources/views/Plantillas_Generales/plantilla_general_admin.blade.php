<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    @yield('TITULO')

    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>


        @yield('CSS')
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        @yield('FOTO-DE-PERFIL')
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- IR A LA PÁGINA-->
       {{--   @yield('BUSQUEDAS')  --}}
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a target="__blank" href="{{route('pagina_principal')}}" class="btn btn-primary btn-sm">Visitar Sitio <i class="fas fa-arrow-right"></i></a>
        </div>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
               @yield('DROPDOWN')
            </li>
        </ul>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                       
                        @yield('MENU-LATERAL')

                    </div>
                </div>
            </nav>

        </div>


        <div id="layoutSidenav_content">
            <main>
               @yield('CONTENIDO')
            </main>

        </div>
    </div>

    
  
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  
    @yield('JS')
</body>

</html>