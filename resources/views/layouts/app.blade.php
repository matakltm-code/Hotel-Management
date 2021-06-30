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

                        @auth
                        @if (auth()->user()->is_admin)
                        <li class="nav-item <?=(Route::current()->uri() == 'account' ? 'active':'')?>">
                            <a class="nav-link" href="/account">{{ __('Account Management') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'account/login-history' ? 'active':'')?>">
                            <a class="nav-link" href="/account/login-history">{{ __('Login History') }}</a>
                        </li>
                        @elseif (auth()->user()->is_manager)
                        <li class="nav-item <?=(Route::current()->uri() == 'room-management' ? 'active':'')?>">
                            <a class="nav-link" href="/room-management">{{ __('Rooms Management') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'employee-management' ? 'active':'')?>">
                            <a class="nav-link" href="/employee-management">{{ __('Employee Management') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Feedback') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'audits' ? 'active':'')?>">
                            <a class="nav-link" href="/audits">{{ __('Reports') }}</a>
                        </li>
                        @elseif (auth()->user()->is_auditor)
                        <li class="nav-item <?=(Route::current()->uri() == 'audits' ? 'active':'')?>">
                            <a class="nav-link" href="/audits">{{ __('Audite') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == 'audits/report' ? 'active':'')?>">
                            <a class="nav-link" href="/audits/report">{{ __('Generate Report') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Reception Reports') }}</a>
                        </li>
                        @elseif (auth()->user()->is_receptionist)
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Reservation') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Feedback') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Generate Report') }}</a>
                        </li>
                        @elseif (auth()->user()->is_customer)
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Reservation') }}</a>
                        </li>
                        <li class="nav-item <?=(Route::current()->uri() == '/NAN' ? 'active':'')?>">
                            <a class="nav-link" href="#">{{ __('Feedback') }}</a>
                        </li>
                        @endif

                        @endauth

                        {{-- Services --}}
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
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
    {{-- CKeditor files --}}
    <script src="/ckeditor5/ckeditor.js"></script>
    <script src="/ckeditor5/ckeditor.js.map"></script>
    <script>
        const watchdog = new CKSource.EditorWatchdog();

		window.watchdog = watchdog;

		watchdog.setCreator( ( element, config ) => {
			return CKSource.Editor
				.create( element, config )
				.then( editor => {




					return editor;
				} )
		} );

		watchdog.setDestructor( editor => {



			return editor.destroy();
		} );

		watchdog.on( 'error', handleError );

		watchdog
			.create( document.querySelector( '.editor' ), {

				toolbar: {
					items: [
						'heading',
						'|',
						'underline',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'outdent',
						'indent',
						'|',
						'undo',
						'redo',
						'-',
						'alignment',
						'fontBackgroundColor',
						'fontColor',
						'fontFamily',
						'fontSize',
						'highlight',
						'horizontalLine',
						'subscript',
						'superscript',
						'strikethrough',
						'insertTable',
						'blockQuote'
					],
					shouldNotGroupWhenFull: true
				},
				language: 'en',
				licenseKey: '',



			} )
			.catch( handleError );

		function handleError( error ) {
			console.error( 'Oops, something went wrong!' );
			console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
			console.warn( 'Build id: 8uo7e3v0si9i-uk35tb5rkyg' );
			console.error( error );
		}

    </script>
</body>

</html>
