<!doctype html>
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

    <div id="app" class="container-grid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ms-3">
                    <!-- div class="container" -->

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'VisionGate') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
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
                        </ul>
                    </div>

                    <!-- /div -->
                </nav>
            </div>
        </div>
        <div class="row">
            <!-- Sidebar menu -->
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="list-group">
                    <!-- Sezione Visitatori -->
                    <a href="#visitatoriSubmenu" data-bs-toggle="collapse"
                        class="list-group-item list-group-item-action bg-light border-0"><i
                            class="bi bi-people-fill"></i>
                        Visitatori</a>
                    <div class="collapse show" id="visitatoriSubmenu">
                        <a href="#" class="list-group-item list-group-item-action bg-light border-0 ms-1"><i
                                class="bi bi-house-door-fill"></i> In azienda</a>
                        <a href="/storico" class="list-group-item list-group-item-action bg-light border-0 ms-1"><i
                                class="bi bi-clock-history"></i> Storico</a>
                    </div>

                    <div class="my-2 border-0"></div>

                    <!-- Sezione Impostazioni -->
                    <a href="#impostazioniSubmenu" data-bs-toggle="collapse"
                        class="list-group-item list-group-item-action bg-light border-0"><i class="bi bi-gear-fill"></i>
                        Impostazioni</a>
                    <div class="collapse  show" id="impostazioniSubmenu">
                        <a href="{{ route('imposta.azienda.show') }}"
                            class="list-group-item list-group-item-action bg-light border-0  ms-1"><i
                                class="bi bi-building"></i> Azienda</a>
                        <a href="/reparti" class="list-group-item list-group-item-action bg-light border-0 ms-1"><i
                                class="bi bi-layout-text-sidebar-reverse"></i> Reparti</a>
                        <a href="/persone" class="list-group-item list-group-item-action bg-light border-0 ms-1"><i
                                class="bi bi-person-lines-fill"></i> Persone</a>
                    </div>
                </div>
            </div>
            <!-- fine Sidebar menu -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    @yield('before_body_close')
</body>

</html>
