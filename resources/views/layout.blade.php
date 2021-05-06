<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calendrier des déclarations viti/vinicoles</title>
    <link rel="shortcut icon" href="{{ asset('images/logos/logo-P.svg') }}" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="/fullcalendar-year-view/dist/fullcalendar.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>


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
      .custom-control-input:checked ~ .custom-control-label::before ,
      .custom-control-input:active ~ .custom-control-label::before {
          background-color: #ef8c8e;
          border-color: #ef8c8e;
      }

      .custom-control-input:focus ~ .custom-control-label::before {
        outline: none !important;
        -webkit-appearance: none;
        box-shadow: none !important;
        border-color: #adb5bd !important;
      }
      .table .thead-light th {
        background-color: #ffeff0;
        color: #ef8c8e;
        border:none;
      }
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        text-align: center;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .table {
        background-color: #fff;
      }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){

      var ancre = window.location.hash;
      if (ancre) {
        $('#nav-tab a[href="'+ancre+'"]').tab('show')
      }
      // OUVERTURE POPUP
      $(".popupEvent").click(function() {
        var url = $(this).data('url');
        $.get(url, function(response) {
          $('#popupEvenement').html(response);
          $('#popupEvenement').modal('show');
        });
      });
      // IMG checkbox
      $(".image-checkbox").each(function () {
        if ($("#"+$(this).attr('for')).attr("checked")) {
          $(this).addClass('image-checkbox-checked');
        }
        else {
          $(this).removeClass('image-checkbox-checked');
        }
      });

      $(".image-checkbox").click(function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var cb = $("#"+$(this).attr('for'));
        cb.prop("checked", !cb.prop("checked"));
        e.preventDefault();
        $("#formFilters").submit();
      });
      // FILTRES
      var form = $("#formFilters");
      form.change(function() {
        form.submit();
      });
      form.submit(function(e) {
        e.preventDefault();
        var source = form.attr('action')+'?'+form.serialize();
        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', source);
        $.ajax({
           url : form.attr('action')+'?output=html&'+form.serialize(),
           type : 'GET',
           dataType : 'html',
           success : function(result, statut){
               $("#nav-liste").html(result);
           }
        });
      });
      tinymce.init({
        selector: 'textarea#editor',
        menubar: false
      });
    });
    </script>
</head>
<body>
  @include('layout/header')
  <div class="row px-2">
    @yield('content')
  </div>
  @include('layout/popup')
  @include("layout/footer")
  <script src="/js/calendar.js"></script>
  <script src="/js/global.js"></script>
</body>
</html>
