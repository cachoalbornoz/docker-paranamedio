<nav class="navbar navbar-expand-md shadow-sm" style="background-color: #2f81d3;">
    <div class="container-fluid">

        <img src="{{ asset('images/site/header-logo.png') }}" alt="logo" style=" width:120px; margin-right:15px">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                @auth

                    @if (Auth::user()->hasRole('Administrador'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside">
                                <i class="fas fa-cogs"></i> Settings
                            </a>
                            <ul class="dropdown-menu shadow">
                                <li class="dropend">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Escrituras</a>
                                    <ul class="dropdown-menu shadow">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('escrituras.index') }}"> Escrituras</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Placas</a>
                                    <ul class="dropdown-menu shadow">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('placas.index') }}">Placas</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('tipoplaca.index') }}">Tipo placas</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('municipios.index') }}">Municipios</a></li>
                                <li><a class="dropdown-item" href="{{ route('estaciones.index') }}">Estaciones</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></li>
                                <li class="dropend">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Roles
                                        y
                                        Permisos
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="{{ route('roles.index') }}"> Roles</a></li>
                                        <li><a class="dropdown-item" href="{{ route('permissions.index') }}"> Permisos</a>
                                        </li>
                                    </ul>
                                </li>

                                {{-- <li class="dropend">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside">Submenu Right</a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href=""> Second level 1</a></li>
                                        <li><a class="dropdown-item" href=""> Second level 2</a></li>
                                        <li><a class="dropdown-item" href=""> Second level 3</a></li>
                                        <li class="dropend">
                                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                                data-bs-auto-close="outside">Let's go deeper!</a>
                                            <ul class="dropdown-menu dropdown-submenu shadow">
                                                <li><a class="dropdown-item" href=""> Third level 1</a></li>
                                                <li><a class="dropdown-item" href=""> Third level 2</a></li>
                                                <li><a class="dropdown-item" href=""> Third level 3</a></li>
                                                <li><a class="dropdown-item" href=""> Third level 4</a></li>
                                                <li class="dropend">
                                                    <a href="#" class="dropdown-item dropdown-toggle"
                                                        data-bs-toggle="dropdown">Still don't have enough? Go much deeper!</a>
                                                    <ul class="dropdown-menu dropdown-submenu shadow">
                                                        <li><a class="dropdown-item" href=""> Third level 1</a></li>
                                                        <li><a class="dropdown-item" href=""> Third level 2</a></li>
                                                        <li><a class="dropdown-item" href=""> Third level 3</a></li>
                                                        <li><a class="dropdown-item" href=""> Third level 4</a></li>
                                                        <li><a class="dropdown-item" href=""> Third level 5</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href=""> Third level 5</a></li>
                                    </ul>
                                </li> --}}

                            </ul>
                        </li>
                        @include('layouts.botonera')
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside">Datos</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item" href="{{ route('estaciones.index') }}">Estaciones</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                            </ul>
                        </li>
                    @endif



                @endauth
            </ul>



            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">

                @guest

                    @if (Route::current()->getName() == 'login')
                        <form action="{{ route('front') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link">Home</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Acceder</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user"></i> {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i> Salir
                                </button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
