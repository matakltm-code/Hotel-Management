<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/users_feed.css') }}" rel="stylesheet">

    {{-- ------------- --}}
    {{-- Jquery --}}
    <script src="{{ asset('jq/jquery-ui.css') }}"></script>
    <script src="{{ asset('jq/jquery.js') }}"></script>
    <script src="{{ asset('jq/jquery-ui.js') }}"></script>

    {{-- ------------- --}}
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="d-flex">
                    <a href="/" class=""><img src="/images/logo.png" style="height: 30px;" class=""></a>
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    </a> --}}
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item <?=(Route::current()->uri() == '/' ? 'active':'')?>">
                            <a class="nav-link" href="/">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item <?=(Route::current()->uri() == 'rooms' ? 'active':'')?>">
                            <a class="nav-link" href="/rooms">{{ __('Rooms') }}</a>
                        </li>

                        {{-- AdminLinks --}}
                        {{-- @if(auth()->user()->user_type == 'admin')
                        @endif --}}
                        @auth
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Users Management') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Inbox') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Bookd Rooms') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Room Management') }}</a>
                        </li>
                        @endauth


                        @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Serviecs
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item <?=(Route::current()->uri() == 'services/food-services' ? 'active':'')?>"
                                    href="/services/food-services">
                                    Food services
                                </a>
                                <a class="dropdown-item <?=(Route::current()->uri() == 'services/tourist-attraction' ? 'active':'')?>"
                                    href="/services/tourist-attraction">
                                    Touris Attraction
                                </a>
                                <a class="dropdown-item <?=(Route::current()->uri() == 'services/about-us' ? 'active':'')?>"
                                    href="/services/about-us">
                                    About Us
                                </a>
                                <a class="dropdown-item <?=(Route::current()->uri() == 'services/contact-us' ? 'active':'')?>"
                                    href="/services/contact-us">
                                    Contact us
                                </a>
                                <a class="dropdown-item <?=(Route::current()->uri() == 'services/gallery' ? 'active':'')?>"
                                    href="/services/gallery">
                                    Gallery
                                </a>
                            </div>
                        </li>

                        @if (Route::has('login'))
                        <li class="nav-item <?=(Route::currentRouteName() == 'login' ? 'active':'')?>">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item <?=(Route::currentRouteName() == 'register' ? 'active':'')?>">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle  <?=(Route::current()->uri() == '/profile' ? 'active':'')?>"
                                href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item <?=(Route::current()->uri() == 'profile' ? 'active':'')?>"
                                    href="/profile">
                                    Profile
                                </a>

                                {{-- Logout --}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="<?=(Route::current()->uri() == '/' ? '':'py-4')?>">
            @yield('content')
        </main>
    </div>
</body>

</html>