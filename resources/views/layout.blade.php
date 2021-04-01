<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendrier des déclarations viti/vinicoles</title>
    <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="/fullcalendar-year-view/dist/fullcalendar.js"></script>


    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fullcalendar-year-view/dist/fullcalendar.css" />
    <link rel="stylesheet" href="/css/main.css" />
    <style type="text/css">
      .fc-unthemed td.fc-today {
        background: #ffeff0;
      }
      .custom-control-label {
        cursor: pointer;
      }
      a.fc-event {
        cursor: pointer;
      }
      .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
          color: #ef8c8e;
          background-color: #fff;
          border-color: #ef8c8e;
          border-bottom: none;
      }
      .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
          color: #ef8c8e;
      }
      #calendar h2 {
        color: #ef8c8e;
      }
            .custom-control-input:checked ~ .custom-control-label::before {
                border-color: #ef8c8e !important;
                background-color: #ef8c8e !important;
            }

            .custom-control-input:active ~ .custom-control-label::before {
                background-color: #ef8c8e !important;
                border-color: #ef8c8e !important;
            }

            .custom-control-input:focus ~ .custom-control-label::before {
              outline: none !important;
              -webkit-appearance: none;
              box-shadow: none !important;
              border-color: #adb5bd !important;
            }
    </style>
</head>
<body>
  @include('layout/header')
  <div class="container-fluid">
    @include('components/flash-message')
    @yield('content')
  </div>
  @include('layout/popup')
  @include("layout/footer")
  <script src="/js/global.js"></script>
  <script src="/js/calendar.js"></script>
  <script src="/js/calendar-list.js"></script>
  @include('layout/popup')
</body>
</html>
