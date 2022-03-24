<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendrier des déclarations viti/vinicoles</title>
    <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >

    <script src="/js/lib/jquery.3-5-1.min.js"></script>
    <script src="/js/lib/popper.2-9-3.js"></script>
    <script src="/js/lib/moment.2-29-1.js"></script>
    <script src="/js/lib/popper.1-12-9.js"></script>
    <script src="/js/lib/bootstrap.4-0-0.min.js"></script>
    <script src="/fullcalendar-year-view/dist/fullcalendar.js"></script>
    <script src="/js/lib/tinymce.5-8-2.min.js"></script>

    <link href='/css/lib/bootstrap.4-5-0.css' rel='stylesheet' />
    <link href='/css/lib/fontawesome-free.5-13-1.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fullcalendar-year-view/dist/fullcalendar.css" />
    <link rel="stylesheet" href="/css/main.css?20220324" />

</head>
<body>
  @include('layout/header')
  <div class="row px-2">
    @yield('content')
  </div>
  @include('layout/popup')
  @include("layout/footer")
  <script src="/js/global.js?cache=202203021110"></script>
  <script src="/js/calendar.js?cache=202105211910"></script>
</body>
</html>
