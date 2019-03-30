<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Xisfo Pay') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container_header">
                <div class="row">
                    <div class="col-md-12 col-lg-3 col-xl-2 section_left_header text-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Xisfo Pay
                        </a>
                        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>-->
                    </div>
                    <div class="col-md-12 col-lg-9 col-xl-10 header_right">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown name_user">
                                        <span>{{ Auth::user()->name }}</span>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-2 section_left">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <h3 class="title_lateral">Modulos</h3>
                                    <li class="nav-item" id="tab1">
                                        <a class="nav-link" id="v-pills-home-tab" href="{{ url('home') }}">Dashboard</a>
                                    </li>
                                    @role('super-admin')
                                        <li class="nav-item" id="tab2">
                                            <a class="nav-link" id="v-pills-profile-tab" href="{{ url('usuarios') }}">Clientes</a>
                                        </li>
                                        <li class="nav-item" id="tab3">
                                            <a class="nav-link" id="v-pills-profile-tab" href="{{ url('employees') }}">Empleados</a>
                                        </li>
                                    @endrole
                                    @role('editor')
                                        <li class="nav-item" id="tab4">
                                            <a href="{{ url('/usuarios/'.Auth::user()->id.'/edit') }}" class="nav-link">Configurar Cuenta</a>
                                        </li>
                                    @endrole
                                     @role('super-admin')
                                        <li class="nav-item" id="tab6">
                                            <a class="nav-link" id="v-pills-settings-tab" href="{{ URL::to('/admin/money') }}">Fondos</a>
                                        </li>
                                     @endrole
                                     @if(Auth::user()->state == 1)
                                        <li class="nav-item" id="tab7">
                                            <a class="nav-link" id="v-pills-transfer-tab" href="{{ url('/admin/transfers') }}">Transferencias</a>
                                        </li>
                                        <li class="nav-item" id="tab8">
                                            <a class="nav-link" id="v-pills-transfer-tab" href="{{ url('/admin/withdrawal') }}">Retiros</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </nav>

                    </div>
                </div>
                <div class="col-md-12 col-lg-9 col-xl-10 no_padding section_right">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

</body>
</html>
