<!doctype html>
{{-- preso da qui https://startbootstrap.com/previews/simple-sidebar#google_vignette --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <script src="https://unpkg.com/htmx.org"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('before_head_close')
</head>

<body>
    @yield('after_body_open')
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="d-flex flex-column border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">{{ config('app.name', 'VisionGate') }}</div>
            <div class="list-group list-group-flush">
                <a href="#visitatoriSubmenu" data-bs-toggle="collapse"
                    class="list-group-item list-group-item-action bg-light border-0"><i class="bi bi-people-fill"></i>
                    Visitatori</a>
                <div class="collapse show" id="visitatoriSubmenu">
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3"><i
                            class="bi bi-house-door-fill"></i> In azienda</a>
                    <a href="/storico" class="list-group-item list-group-item-action list-group-item-light p-3"><i
                            class="bi bi-clock-history"></i> Storico</a>
                </div>
                <!-- Sezione Impostazioni -->
                <a href="#impostazioniSubmenu" data-bs-toggle="collapse"
                    class="list-group-item list-group-item-action list-group-item-light p-3"><i
                        class="bi bi-gear-fill"></i>
                    Impostazioni</a>
                <div class="collapse  show" id="impostazioniSubmenu">
                    <a href="{{ route('imposta.azienda.show') }}"
                        class="list-group-item list-group-item-action list-group-item-light p-3"><i
                            class="bi bi-building"></i> Azienda</a>
                    <a href="{{ route('imposta.sede.list') }}"
                        class="list-group-item list-group-item-action list-group-item-light p-3"><i
                            class="bi bi-buildings"></i> Sedi</a>
                    <a href="{{ route('imposta.reparto.list') }}"
                        class="list-group-item list-group-item-action list-group-item-light p-3"><i
                            class="bi bi-layout-text-sidebar-reverse"></i> Reparti</a>
                    <a href="{{ route('imposta.persona.list') }}"
                        class="list-group-item list-group-item-action list-group-item-light p-3"><i
                            class="bi bi-person-lines-fill"></i> Persone</a>
                </div>
                {{-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a> --}}
            </div>
            <div class="mt-auto">
                <p class="fs-6 ps-1">{{ config('app.name', 'VisionGate') }} ver. {{ config('visiongate.platform.version', 'VisionGate') }}</p>
                <p class="fs-6 ps-1">{{ \Carbon\Carbon::now()->tz('Europe/Rome')->toDateTimeString() }}</p>

            </div>
        </div>
        <!-- chiude sidebar -->
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            {{-- Dropdown d'esempio
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                            --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('before_body_close')
</body>

</html>
