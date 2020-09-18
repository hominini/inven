<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

    <!-- START NAV -->
    <nav class="navbar is-white" role="navigation" aria-label="dropdown navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="../home">
                <img src="https://www.exposweet.com.ec/images/expositores/YAVIRAC.jpg" alt="Girl in a jacket" width="60" height="60">
                </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('muebles.index') }}">
                        Muebles
                    </a>
                    <a class="navbar-item" href="{{ route('bienes_tecnologicos.index') }}">
                        Bienes tecnológicos
                    </a>
                    <a class="navbar-item" href="{{ route('libros.index') }}">
                        Items Bibliográficos
                    </a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="navbar-dropdown ">
                            <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->

    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-2 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a class="is-active">Dashboard</a></li>
                        @if(Auth::user()->es_administrador == 1)
                        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                        @endif
                    </ul>
                    <p class="menu-label">
                        Administración
                    </p>
                    <ul class="menu-list">
                        <li><a>Activos Institución</a></li>
                        <!-- <li>
                            <a>Manage Your Team</a>
                            <ul>
                                <li><a>Members</a></li>
                                <li><a>Plugins</a></li>
                                <li><a>Add a member</a></li>
                            </ul>
                        </li> -->
                        <li><a href="{{ route('rutas.index') }}">Ubicaciones</a></li>
                        <li><a >Reportes</a></li>
                        <li><a>Autenticación</a></li>
                    </ul>
                    <p class="menu-label">
                        Tareas
                    </p>
                    <ul class="menu-list">
                        <li><a href="{{ route('asignacionesTareas.index') }}">Asignación de Tareas</a></li>
                        <li><a href="{{ route('registros.index') }}">Registro</a></li>
                        <li><a href="{{ route('conteo.index') }}">Conteo</a></li>
                        <li><a href="{{ route('bajas.index') }}">Baja</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-10">
            @yield('content')
            </div>
        </div>
    </div>
    <script async type="text/javascript" src="../js/bulma.js"></script>
    @yield('custom_scripts')
</body>

</html>
