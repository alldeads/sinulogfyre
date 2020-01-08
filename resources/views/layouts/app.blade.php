<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Sinulog Fyre | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content="Multi Level Marketing" />

        <meta name="trafficjunky-site-verification" content="u13xtzat0" />

        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
    
        <!-- css files -->
        <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
        <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' /><!-- custom css -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"><!-- fontawesome css -->
        <link href="{{ asset('images/favicon.png') }}" rel="icon">
        <!-- //css files -->
    
        <link href="{{ asset('css/slider.css') }}" type="text/css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- google fonts -->
        <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
        <!-- //google fonts -->

        @yield('extra_css')
    </head>

    <body>

        @include("partials.header")

        @yield('content')

        @include("partials.footer")

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>


</html>

