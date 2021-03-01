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
        <style type="text/css">
        body {background-color: #f8f9ff;}
        </style>
    </head>
    <body>




      <nav class="navbar p-4 flex-md-nowrap" id="header">
        <a class="navbar-brand upper-title" href="/administration">Administration</a>
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sideNavigation" aria-controls="sideNavigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars"></span>
        </button>
      </nav>

        <div class="container-fluid">
          <div class="row">
            <div id="sideNavigation" class="sideNavigation col-md-3 d-md-block bg-light sidebar collapse">
              <div class="row">
                <div class="col-md-12">
                  <div class="list-group">
                    <a class="list-group-item list-group-item-action active" aria-current="true" href="/administration">
                      Obligations
                    </a>
                    <button type="button" class="list-group-item list-group-item-action">A second item</button>
                    <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                    <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                  </div>
                </div>
              </div>
            </div>


              <main role="main" class="col-md-9 ml-sm-auto px-md-4 pb-4">
                @yield('content')
              </main>
          </div>
        </div>


         @section('script_js')
             <script src="/js/global.js"></script>
             <script>AOS.init();</script>
         @show

    </body>
</html>
