<!DOCTYPE html>
<html @yield('fixed-navbar', 'class=has-navbar-fixed-top')>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendrier - CIVP</title>
    <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="/css/main.css" />
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <div class="col-md-2 col-sm-1 d-md-none">
        <button class="navbar-toggler float-right collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col-md-auto col-sm">
        <a class="navbar-brand col-md-4 me-0 px-3 py-3" href="#"><strong class="h3">Administration |</strong>
        Calendrier des déclarations viti/vinicoles</a>
      </div>
</header>
<div class="container-fluid">
<div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1 text-muted">
        <span>MENU</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('evenements') }}">
            <i class="far fa-calendar-alt"></i>&nbsp;Evenements
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('organismes') }}">
            <i class="fas fa-university"></i>&nbsp;Organismes
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @yield('content')
  </main>
</div>
</div>

</body>
</html>
