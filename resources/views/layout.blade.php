<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendrier des déclarations viti/vinicoles</title>
    <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >
    <script src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.5.0/main.global.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="/css/main.css" />
</head>
<body>
  @include('layout/header')
  <div class="container-fluid">
      @yield('content')
  </div>
  <footer>
  @include("layout/footer")
  </footer>
  <script src="/js/global.js"></script>
  <script src="/js/calendar.js"></script>
  <script src="/js/calendar-list.js"></script>
  <script>AOS.init();</script>
  @include('layout/popup')
</body>
</html>
