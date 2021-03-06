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
    <script src="https://kit.fontawesome.com/e320c2c21a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div><img src="/img/FilmEst.jpg" style="height: 50px" class="pt-1 pe-3"></div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link h2" href="{{ url('/') }}">
                            Movies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h2" href="{{ url('/profile') }}">
                            Users
                        </a> 
                    </li>
                </ul>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link h2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link h2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle h2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item h3" href="{{ route('profile.show', Auth::user()->id) }}">My Account</a>
                                    </a>

                                    <form id="home-form" action="{{ route('profile.show', Auth::user()->id) }}" method="GET" class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item h3" href="{{ route('welcome') }}">Movies</a>
                                    </a>

                                    <form id="welcome-form" action="{{ route('welcome') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item h3" href="/profile/{{ Auth::user()->id }}/following"> My Followings</a>
                                    </a>

                                    <form id="welcome-form" action="/profile/{{ Auth::user()->id }}/following" method="GET" class="d-none">
                                        @csrf
                                    </form>



                                    <a class="dropdown-item  h3" href="/profile/{{ Auth::user()->id }}/followers">My Followers</a>
                                    </a>

                                    <form id="welcome-form" action="/profile/{{ Auth::user()->id }}/followers" method="GET" class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item  h3" href="{{ route('logout') }}"
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
        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
