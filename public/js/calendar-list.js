document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar-list');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left:'',
      center: 'title',
      right: ''
    },
    locale: 'fr',
    contentHeight:650,
    eventDisplay:'block',
    dayMaxEvents: true,
    themeSystem: 'bootstrap',
    displayEventEnd: true,
    events:'evenement/list',
    firstDay: 1,
    fixedWeekCount: false,
    buttonText:{ today:'Aujourd\'hui',month: 'Mois', week: 'Semaine', day: 'Jour'},
    allDayText:'Journée',
    bootstrapFontAwesome:{ month: 'fa-calendar-alt',week: 'fa-calendar-week' ,day:'fa-calendar-day' },
    initialView: 'listYear',
    eventClick: function(item){
      $.get("evenement/"+item.event.id, function(response) {
        $('#popupEvenement').html(response);
        $('#popupEvenement').modal('show');
      });
    },
    views: {
      listDay: { buttonText: 'Jour' },
      listWeek: { buttonText: 'Semaine' },
      listMonth: { buttonText: 'Mois' },
      listYear: { buttonText: 'Année',duration:{months:12} }
    },
  });
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
