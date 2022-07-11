<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('imagenes/iconos/icono_pagina.ico')}}">
    <title>Merca-Lín</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 

</head>
<body class="BODY_LOGIN">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm panel_inicial">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="{{ route('home') }}">
                    <div class="row">
                        <div class="col-2">
                          <h4 class="animate__animated animate__lightSpeedInLeft"><i class="fas fa-shop"></i></h4>
                        </div>
                        <div class="col-2">
                          <h4 class="animate__animated animate__lightSpeedInRight">Merca-Lín</h4>
                          <h6 class="animate__animated animate__lightSpeedInRight" style="margin-top: -9px; margin-left: 28px;"><i class="fas fa-coins"></i> Compras en Línea</h6>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif
                                <h3 class="text-light">|</h3>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre_user }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="panel_seccundario">
            <nav class="nav p-2">
                <li class="nav-item MENU">
                    <a class="nav-link text-light" href="{{route('pagina_principal')}}"><i class="fas fa-home"></i> Inicio</a>
                </li>
            </nav>
        </div>

        <main class="py-5">
            @yield('content')
        </main>
    </div>

    <div class="container-fluid text-center">
        <div class="container p-2 mt-1">
            <p class="text-light">@Derechos Reservados 2022, Merca-Lín</p>
        </div>
    </div>

    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
    @yield('js')
</body>
</html>
