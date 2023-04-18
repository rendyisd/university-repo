<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sriwijaya University Digital Repository</title>

    <link rel="icon" href="{{ asset('/images/unsri.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('scripts')
</head>
<body>
    <div id="app">
        
        <div class="navbar-deco""></div>
        <div class="sticky-top">
            <div class="navbar bg-light">
                <div class="container logo-container">
                    <a class="navbar-brand d-flex flex-wrap align-items-center" href="{{ url('/') }}">
                        <img src="{{ asset('images/unsri.png') }}" class="logo">
                        <h3 class="logo-text ms-3">
                            {{ __('Digital Repository') }}
                        </h3>
                    </a>
                </div>
            </div>
            <nav class="navbar navbar-expand-md navbar-dark bg-light-dark shadow-sm custom-navbar">
                <div class="container">
                    <p class="my-auto">
                        {{ __('Research Information Repository') }}
                    </p>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item my-auto me-2">
                                <a href="{{ url('/') }}" class="nav-link">
                                    {{ __('Homepage') }}
                                </a>
                            </li>
                            <li class="nav-item my-auto me-2">
                                <a href="{{ route('deposit') }}" class="nav-link">
                                    {{ __('Deposit') }}
                                </a>
                            </li>
                            
                            @guest
                            @if (Route::has('login') && Route::has('register'))
                            <li class="nav-item dropdown my-auto">
                                <a href="#" id="loginRegisterDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Guest') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="loginRegisterDropdown">
                                @if(Route::has('login'))
                                    <a class="dropdown-item text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
                                @if(Route::has('register'))
                                    <a class="dropdown-item text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif

                                </div>
                            </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('your_document') }}" class="dropdown-item text-dark">Your Document</a>
                                        @if (Auth::user()->role === 'Admin')
                                            <a href="{{ route('approvement') }}" class="dropdown-item text-dark">Approvement Page</a>
                                            <a href="{{ route('docControl') }}" class="dropdown-item text-dark">Document Control</a>
                                        @endif
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
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
        </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
