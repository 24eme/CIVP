<!DOCTYPE html>
<html @yield('fixed-navbar', 'class=has-navbar-fixed-top')>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendrier - CIVP</title>
        <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
        <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
        <link rel="stylesheet" href="/css/main.css" />
    </head>
    <body>
        @section('header')
            @include('components.header')
        @show

        <div class="main-container main">
            @yield('content')
        </div>

         @section('script_js')
             <script src="/js/global.js"></script>
         @show
    <footer>
        @include("footer")
    </footer>
    </body>
</html>
