  <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: '',
            center:'prev,title,next',
            right: 'dayGridMonth,YearViewCustom'
          },
          locale: 'fr',
          contentHeight:650,
          eventDisplay:'background',
          titleFormat:{year: 'numeric',month:'long'},
          dayMaxEvents: true,
          themeSystem: 'bootstrap',
          displayEventEnd: true,
          events:'showObligations',
          buttonText:{ today:'Aujourd\'hui',month: 'Mois', week: 'Semaine', day: 'Jour'},
          allDayText:'Journée',
          firstDay: 1,
          fixedWeekCount: false,
          bootstrapFontAwesome:{ month: 'fa-calendar-alt',week: 'fa-calendar-week' ,day:'fa-calendar-day' },
          initialView: 'dayGridMonth',
          eventClick: function(item){
            $.get("obligation/"+item.event.id, function(response) {
              $('#popupEvenement').html(response);
              $('#popupEvenement').modal('show');
            });
          },
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

        window.value = calendar;
        var removedEvents = new Array()
        var removed = new Array()

        $("input.filter-profil").each(function (index, element) {
            $(element).click(function(){
              // filterCalendar()
              setCookie(this.id,this.checked)
              var events = calendar.getEvents();
              if (!this.checked) {
                events.forEach(function(eve,i){
                  if (eve.extendedProps.profil == element.value) { eve.remove();removedEvents.push(eve); }
                })
              } else{
                  removedEvents.forEach(function(removedEve,i){
                    if (removedEve.extendedProps.profil == element.value) {
                      calendar.addEvent(removedEve);
                    } else{
                      if (removed.includes(removedEve) == false) {
                        removed.push(removedEve)
                      }
                    }
                  })
                  removedEvents = removed
              }
            })
          })

          $("#btn-ListView").click(function(){calendar.changeView('listWeek');})
          $("#btn-DayGrid").click(function(){calendar.changeView('dayGridMonth');})
        });

  </script>
