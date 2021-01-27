<!DOCTYPE html>
<html @yield('fixed-navbar', 'class=has-navbar-fixed-top')>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendrier - CIVP</title>
        <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
        <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <link rel="stylesheet" href="/css/main.css" />
    </head>
    <body>
        @section('header')
            @include('header')
            @include('components/partials/_flash-message')
        @show

        <div class="main-container main">
            @yield('content')
        </div>

         @section('script_js')
             <script src="/js/global.js"></script>
             <script>AOS.init();</script>
         @show
    <footer>
        @include("footer")
    </footer>
    </body>
</html>
