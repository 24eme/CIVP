document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left:'prev,today,next',
      center: 'title',
      right: 'dayGridMonth,YearViewCustom'
    },
    locale: 'fr',
    contentHeight:650,
    eventDisplay:'block',
    titleFormat:{year: 'numeric',month:'long'},
    dayMaxEvents: true,
    themeSystem: 'bootstrap',
    displayEventEnd: true,
    events:'evenement/list',
    firstDay: 1,
    datesSet:function(info){
        Currentdate = calendar.getDate().toISOString();
        DateTab = (Currentdate).split("T", 2);
        Currentdate = DateTab[0];
        var url = new URL(window.location);
        url.searchParams.set('date', Currentdate);
        if(window.location.href.includes('index')){
          history.pushState(null,null, "index?date="+Currentdate);
        };
    },
    fixedWeekCount: false,
    buttonText:{ today:'Aujourd\'hui',month: 'Mois', week: 'Semaine', day: 'Jour'},
    allDayText:'Journée',
    bootstrapFontAwesome:{ month: 'fa-calendar-alt',week: 'fa-calendar-week' ,day:'fa-calendar-day' },
    initialView: 'YearViewCustom',
    eventClick: function(item){
      $.get("evenement/"+item.event.id, function(response) {
        $('#popupEvenement').html(response);
        $('#popupEvenement').modal('show');
      });
    },
    views: {
      YearViewCustom: {
      type: 'dayGrid',
      buttonText: 'Année',
      duration:{months:12},
      dayMaxEventRows: 6
      },
      timeGridWeek: {
      type: 'timeGrid',
      buttonText: 'Semaine',
      duration:{days: 7},
      },
      timeGridDay: {
      type: 'timeGrid',
      duration: { days: 1 },
      buttonText: 'Jour'
      }
    }
  });
  window.value = calendar;
  calendar.render();

  var removedEvents = new Array()
  var removed = new Array()

  $("input.filter-type").each(function (index, element) {
      $(element).click(function(){
        setCookie(this.id,this.checked)
        var events = calendar.getEvents();
        if (!this.checked) {
          events.forEach(function(eve,i){
            if (eve.extendedProps.type == element.value) { eve.remove();removedEvents.push(eve); }
          })
        } else{
            removedEvents.forEach(function(removedEve,i){
              if (removedEve.extendedProps.type == element.value) {
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

});
