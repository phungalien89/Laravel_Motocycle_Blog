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
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://w3schools.com/w3css/4/w3.css">
    <script src="/js/ckfinder/ckfinder.js"></script>
    <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
</head>
<style>
    *{
        box-sizing: border-box;
    }

    .myTable > table > caption{
        caption-side: top;
    }

    .myTable > th, td{
        border-bottom: 3px ridge gray;
    }

    .post_item:hover{
        transform: scale(1.1);
        box-shadow: 0px 0px 20px 5px gray;
        background-color: white;
        transition: all 0.25s;
    }
    .form-control::placeholder{
        color: lightblue;
        font-family: 'Quicksand';
        text-align: center;
        font-size: 0.8em;
    }
    .form-control{
        color: #333;
    }
    .custom-switch .custom-control-label::before{
        height: 1.75rem;
        width: calc(2.75rem + 0.75rem);
        border-radius: 3rem;
    }
    .custom-switch .custom-control-label::after{
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 1.5rem;
    }
    .custom-switch .custom-control-input:checked ~ .custom-control-label::after{
        transform: translateX(calc(2rem - 0.3rem));
    }
    .custom-switch .custom-control-label{
        padding-left: 2rem;
        padding-top: 0.5rem;
        font-size: 1.5em;
    }
    .btn-link{
        color: white;
    }
    .btn-link:hover{
        color: #bbb;
    }
    .invalid-feedback{
        color: #dd0000;
        font-size: 1em;
    }
    .custom-radio .custom-control-label{
        padding-top: 0.1rem;
        font-size: 1.5em;
    }
</style>
<body>
    <div id="app">
        @include('inc.message')
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'Trang chủ' }}
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
</html>
