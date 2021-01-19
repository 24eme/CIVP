<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>

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
          events:'',
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
                events.forEach((item,index)=> {
                  if(item.extendedProps.profil == element.value) { item.remove();removedEvents.push(item)}
                })
              }
              else{
                  removedEvents.forEach((removed,index)=>{
                    if (removed.extendedProps.profil == element.value) {calendar.addEvent(removed);removedEvents.pop(removed);}
                  })
                };
            })
          })
          $("#btn-TimelineView").click(function(){calendar.changeView('listWeek');})
          $("#btn-DayGrid").click(function(){calendar.changeView('dayGridMonth');})
        });

  </script>
