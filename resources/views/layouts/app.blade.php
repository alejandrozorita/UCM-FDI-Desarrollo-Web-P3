<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="language" content="Spanish">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Alejandro Zorita') }}</title>

    <link href="{{ asset ('assets/css/dropInput.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="" href="{{ url('/') }}">
                        <div class="titulo-cabecera">
                            <img src="{{ asset('assets/img/bytecode-logo.png') }}" width="450px" alt="logotipo-bytecode"><br>
                        </div>
                    </a>
                    <h1>Periódico dígital ByteCode</h1>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="active"><a href="{!! route('index') !!}">Home</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorías <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            @foreach ($datos_vista['categorias'] as $categoria)
                                <li><a href="{!! route('ver_noticias_categoria',$categoria->slug) !!}">{!! $categoria->nombre !!}</a></li>
                            @endforeach
                          </ul>
                        </li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @if (es_administrador(Auth::user()))
                                        <li><a href="{!! route('nuevo_autor') !!}">Nuevo Autor</a></li>
                                        <li class="active"><a href="{!! route('index_admin') !!}">Home Admin</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('contenido')
    </div>
    
    <!-- Añadimos el footer -->
    <footer class="footer">
      <div class="contenedor">
        <p><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" target="_blank"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">licencia de Creative Commons Reconocimiento-NoComercial 4.0 Internacional</a>. | Alejandro Zorita</p>
        </div>
    </footer>
    


    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/dropInput.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>


    {{-- Script para ejecutar variables PHP --}}
    @if (count($errors) > 0)

        <script>
            @foreach ($errors->all() as $error)
                
                $.notify({
                    // options
                    message: '{!! $error !!}'
                },{
                    // settings
                    type: 'danger'
                });

            @endforeach
        </script>

    @endif


    @if (isset($datos_vista['mensaje_success']))

        <script>

            $.notify({
                // options
                message: '{!! $datos_vista['mensaje_success'] !!}'
            },{
                // settings
                type: 'success'
            });

        </script>

    @endif
    
</body>
</html>
