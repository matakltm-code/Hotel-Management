<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- <img src="https://getbootstrap.com/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy"> --}}
            {{ config('app.name', 'ትምህርት ቤት') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

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
                    {{-- Authorization using postpolicy --}}
                    @can('viewAny', App\Post::class)
                        <li class="nav-item {{ ( request()->routeIs('posts.index') || request()->routeIs('posts.create') || request()->routeIs('posts.show') ) ? 'active' : '' }}">
                            <a class="nav-link" href="/posts">
                                ማስታወቂያ 
                                @if (Auth::user()->unreadNotifications->where('type', 'App\Notifications\PostNotification')->count())
                                    <span class="badge badge-light">{{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\PostNotification')->count() }}</span>
                                @endif
                            </a>
                        </li>
                    @endcan
                    {{-- Check if the user is admin --}}
                    @if (Auth::user()->user_type == 'admin')
                        {{-- Checking Authorization using StudentPaymentsPolicy --}}
                        @can('viewAny', App\StudentPayments::class)
                            <li class="nav-item">
                                <a class="nav-link" href="/students-payment">የተማሪ ክፍያ</a>
                            </li>
                        @endcan
                    @endif
                    
                    {{-- Authorization using batchpolicy --}}
                    @can('viewAny', App\Batch::class)
                        <li class="nav-item {{ ( request()->routeIs('batches.index') || request()->routeIs('batches.edit') || request()->routeIs('subjects.show') ) ? 'active' : '' }}">
                            <a class="nav-link" href="/batches">የት/ት ክፍሎች</a>
                        </li>
                    @endcan

                    
                    {{-- Authorization using documentpolicy --}}
                    @can('viewAny', App\Document::class)
                        <li class="nav-item {{ ( request()->routeIs('documents.index') || request()->routeIs('documents.create') || request()->routeIs('documents.edit') ) ? 'active' : '' }}">
                            <a class="nav-link" href="/documents">
                                መጽሐፍት
                                @if (Auth::user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->count())
                                    <span class="badge badge-light">{{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->count() }}</span>
                                @endif
                            </a>
                        </li>
                    @endcan

                    {{-- Authorization using soundpolicy --}}
                    @can('viewAny', App\Sound::class)
                        <li class="nav-item {{ ( request()->routeIs('sounds.index') || request()->routeIs('sounds.create') || request()->routeIs('sounds.edit') ) ? 'active' : '' }}">
                            <a class="nav-link" href="/sounds">
                                ድምፅ 
                                @if (Auth::user()->unreadNotifications->where('type', 'App\Notifications\SoundClassNotification')->count())
                                    <span class="badge badge-light">{{ Auth::user()->unreadNotifications->where('type', 'App\Notifications\SoundClassNotification')->count() }}</span>
                                @endif
                            </a>
                        </li>
                    @endcan
                    
                    
                    <li class="nav-item dropdown" data-turbolinks="false">
                        @php
                            $image_name = (Auth::user()->profile_img == 'default.jpg') ? 'default.jpg' : 'thumb.'.Auth::user()->profile_img;
                        @endphp
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/storage/profile_images/{{ $image_name }}" alt="" style="width: 18px; height:18px; border-radius:50%;">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        
                            <a class="dropdown-item" href="/dashboard" data-turbolinks="true">ዳሽቦርድ</a>
                            <div class="dropdown-divider"></div>
                        
                        
                            <a class="dropdown-item" href="/profiles" data-turbolinks="true">የተጠቃሚ መገለጫ</a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('ዘግተህ ውጣ') }}
                                
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>