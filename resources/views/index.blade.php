<!DOCTYPE html>
<html lang='fr'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link rel='stylesheet' href='public/css/main.css'>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left:'prev,today,next',
            center: 'title',
            right: ''
          },
          locale: 'fr',
          themeSystem: 'bootstrap',
          events:'/events.json',
          buttonText:{ today:'Aujourd\'hui',month: 'Mois', week: 'Semaine', day: 'Jour'},
          allDayText:'Journée',
          bootstrapFontAwesome:{ month: 'fa-calendar-alt',week: 'fa-calendar-week' ,day:'fa-calendar-day' },
          initialView: 'dayGridMonth'
        });
        calendar.render();
        var removedEvents = [];

        $("input.filter-profil").each(function (index, element) {
            $(element).click(function(){
              var events = calendar.getEvents();
              if (!this.checked) {
                $.each(events,function(i,eve){
                  if (eve.extendedProps.profil == element.value) { eve.remove();removedEvents.push(eve);console.log(removedEvents); }
                })
              }
              else{
                  $.each(removedEvents,function(i,removedEve){
                    if (removedEve.extendedProps.profil == element.value) {
                    calendar.addEvent(removedEve);
                    removedEvents.pop(removedEve);
                    }
                  })
                };
            })
          })
          $("#btn-TimelineView").click(function(){calendar.changeView('listWeek');})
          $("#btn-DayGrid").click(function(){calendar.changeView('dayGridMonth');})
        });

  </script>
  </head>
  <body>
    <div id="upper_navigation">
      <span style="float:left;"><i style="font-size:50px;" class="fas fa-circle-notch"></i></span>
      <div class="btn-wrapper">
        <button id="btn-TimelineView"class="btn-primary btn-custom" type="button" name="button">Vue Listée</button>
        <button id="btn-DayGrid"class="btn-primary btn-custom" type="button" name="button">Vue Calendrier</button>
      </div>
    </div>
    <div id="side_navigation">
      <div class="filter-wrapper">
        <div class="filter-div"><label class="filter-label" for="FilterProdRec">Producteur - Récoltant</label></div><label class="switch"><input class="filter-profil" id="FilterProdRec" name="producteur" value="Producteur-Recoltant" type="checkbox" checked><span id="sliderProd" class="slider round"></span></label>
        <div class="filter-div"><label class="filter-label" for="FilterNegociant">Négociant</label></div><label class="switch"><input class="filter-profil" id="FilterNegociant" name="nego" value="Negociant" type="checkbox" checked><span id="sliderNego" class="slider round"></span></label>
        <div class="filter-div"><label class="filter-label" for="FilterNegociantVini">Négociant - Vinificateur</label></div><label class="switch"><input class="filter-profil" id="FilterNegociantVini" name="nego" value="Negociant-Vinificateur" type="checkbox" checked><span id="sliderVini" class="slider round"></span></label>
        <div class="filter-div"><label class="filter-label" for="FilterViticulteur">Viticulteur ou exploitant agricole</label></div><label class="switch"><input class="filter-profil" id="FilterViticulteur" name="viti" value="Viticulteur" type="checkbox" checked><span id="sliderViti" class="slider round"></span></label>
      </div>
    </div>
    <div id='calendar'></div>
  </body>
</html>
