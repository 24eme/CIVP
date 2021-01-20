<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js'></script>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left:'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,YearViewCustom'
          },
          locale: 'fr',
          themeSystem: 'bootstrap',
          events:'showObligations',
          buttonText:{ today:'Aujourd\'hui',month: 'Mois', week: 'Semaine', day: 'Jour'},
          allDayText:'Journée',
          bootstrapFontAwesome:{ month: 'fa-calendar-alt',week: 'fa-calendar-week' ,day:'fa-calendar-day' },
          initialView: 'dayGridMonth',
          views: {
            YearViewCustom: {
            type: 'dayGrid',
            buttonText: 'Année',
            duration:{months:12},
              visibleRange: function (currentDate) {
                return {
                  start: currentDate.clone().startOf('year'),
                  end: currentDate.clone().endOf("year")
                };
              }
            }
          }
        });
        calendar.render();
        var removedEvents = [];
        $("input.filter-profil").each(function (index, element) {
            $(element).click(function(){
              var events = calendar.getEvents();
              if (!this.checked) {
                $.each(events,function(i,eve){
                  if (eve.extendedProps.profil == element.value) { eve.remove();removedEvents.push(eve); }
                })
              }
              else{
                  removedEvents.forEach(function(removedEve,i){
                    console.log(removedEvents)
                    if (removedEve.extendedProps.profil == element.value) {
                      console.log(removedEve.title)
                      var item = removedEve;
                      removedEvents.pop(removedEve);

                    calendar.addEvent(item); 
                    }
                  })
                };
            })
          })

          $("#btn-TimelineView").click(function(){calendar.changeView('listWeek');})
          $("#btn-DayGrid").click(function(){calendar.changeView('dayGridMonth');})
        });

  </script>
