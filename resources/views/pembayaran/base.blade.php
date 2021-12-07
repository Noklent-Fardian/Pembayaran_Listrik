

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Bayar Listrik | Level</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#14b8a6">


    <!-- Boostrap -->
    <link href="{{url("bootstrap/bootstrap.min.css")}}" rel="stylesheet">

        
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{url("google-font/css2.css")}}?family=Nunito&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- My Base Css -->
    <link rel="stylesheet" href="{{url("css/style.css")}}">

    <!-- Sweet Alert -->
    <script src="{{url("js/sweetalert/sweetalert.min.js")}}"></script>

    <!-- Voler Admin Template -->
    <link rel="stylesheet" href="{{ url('css/app.css')}}">
    <link rel="stylesheet" href="{{ url('js/perfect-scrollbar/perfect-scrollbar.css') }}">

 

    <!-- CSS -->
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }

        label {
            font-weight: 700!important;
            color: var(--dark)!important;
        }

        @keyframes loader {
            0% { transform: rotate(0deg);}
            25% { transform: rotate(180deg);}
            50% { transform: rotate(180deg);}
            75% { transform: rotate(360deg);}
            100% { transform: rotate(360deg);}
        }
        @keyframes loader-inner {
            0% { height: 0%;}
            25% { height: 0%;}
            50% { height: 100%;}
            75% { height: 100%;}
            100% { height: 0%;}
        }
    </style>
    @yield('css')

</head>
<body>
    <div id="app" style="min-height: 100vh;">
        <div id="sidebar" class='active shadow-lg'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <a href="/home">
                        <div class="d-flex">
                                <h5 class="text-dark">Pembayaran Listrik</h5>
                            </div>
                    </a>
                </div>
                @include('components/sidebar')
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                                <div class="dropdown-divider"></div>

                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                    
                </div>
            </nav>

            <div class="main-content container-fluid">
                <!-- CONTENT -->
                @yield('content')
                <!-- CONTENT -->
            </div>

        </div>
    </div>
    
    <!-- Boostrap -->
    <script src="{{url("js/bootstrap/bootstrap.bundle.min.js")}}"></script>
    <!-- Jquery -->
    <script src="{{url("js/jquery/jquery-3.6.0.min.js")}}"></script>
    <!-- Volet Admin Template -->
    <script src="{{url('js/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('js\app.js')}}"></script>
    <script src="{{url('js/main.js')}}"></script>

</body>

</html>
