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
          contentHeight:630,
          eventDisplay:'list-item',
          titleFormat:{year: 'numeric',month:'long'},
          dayMaxEvents: true,
          themeSystem: 'bootstrap',
          displayEventEnd: true,
          events:'showObligations',
          buttonText:{ today:'Aujourd\'hui',month: 'Mois', week: 'Semaine', day: 'Jour'},
          allDayText:'Journée',
          // eventDataTransform: function( eventData ) {
          //     eventData.url = window.location.origin + window.location.pathname + eventData.url;
          //     return eventData;
          // },
          bootstrapFontAwesome:{ month: 'fa-calendar-alt',week: 'fa-calendar-week' ,day:'fa-calendar-day' },
          initialView: 'dayGridMonth',
          eventClick: function(info){
            modalUpdate(info)
            // scalemodalPopUp()
          },
          eventMouseEnter: function(info){
              modalPopUp(info)
          },
          // datesSet:function(dateInfo){
          //     Currentdate = calendar.getDate().toISOString().slice(0,-14)
          //     var url = new URL(window.location);
          //     url.searchParams.set('date', Currentdate);
          //     // window.location = url:
          //     history.pushState(null,null, url);
          // },
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
        // var parameters = window.location.search;
        // var url = new URL(window.location);
        // const urlParams = new URLSearchParams(parameters);
        // var date = urlParams.get('date');
        // if(date!=null){
        //   calendar.gotoDate(date);
        //   url.searchParams.set('date', date);
        // }
        // else {
        //   CalendarDate = calendar.getDate().toISOString().slice(0,-14)
        //   history.pushState(null,null, "?date="+CalendarDate);
        //   // history.pushState = url.searchParams.append('date',CalendarDate)
        // }


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

          $("input.filter-type").each(function (index, element) {
              $(element).click(function(){
                setCookie(this.id,this.checked)
                var events = calendar.getEvents();
                if (!this.checked) {
                  events.forEach(function(eve,i){
                    console.log(eve.extendedProps.profil_id )
                    if (eve.extendedProps.profil_id == element.value) { eve.remove();removedEvents.push(eve); }
                  })
                } else{
                    removedEvents.forEach(function(removedEve,i){
                      if (removedEve.extendedProps.profil_id == element.value) {
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
