
<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Boostrap -->
        <link href="{{url("bootstrap/bootstrap.min.css")}}" rel="stylesheet">

        
        <!-- google font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="{{url("google-font/css2.css")}}?family=Nunito&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css\app.css') }}" rel="stylesheet">

        <!-- My Base Css -->
        <link rel="stylesheet" href="{{url("css/style.css")}}">

        <!-- Sweet Alert -->
        <script src="{{url("js/sweetalert/sweetalert.min.js")}}"></script>


        <!-- CSS -->
        <style>
            * {
                font-family: 'Nunito', sans-serif;
            }
            .center{
                display: flex;
            justify-content:center;}

            label {
                font-weight: 700!important;
                color: var(--dark)!important;
            }
            .content {
                max-width: 80%;
            }
            .loader-wrapper {
                width: 100vw;
                height: 100vh;
                /* position: absolute;
                top: 0;
                left: 0; */
                background: linear-gradient(to bottom right, var(--light-blue), var(--cyan));
                display:flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                z-index: 1000;
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
    <body class="soft-bg-green">
        @yield('content')
       
    </body>
</html>