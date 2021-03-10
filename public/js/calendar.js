document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left:'prev,today,next',
      center: 'title',
      right: 'dayGridDay,dayGridWeek,dayGridMonth,YearViewCustom'
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

  $("input.filter-profil").each(function (index, element) {
      $(element).click(function(){
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

});
document.addEventListener('DOMContentLoaded', function() {

  const { sliceEvents, createPlugin, Calendar } = FullCalendar

  const CustomViewConfig = {

    classNames: [ 'custom-view' ],

    content: function(props) {
      console.log(props.dateProfile)
      let segs = sliceEvents(props, true); // allDay=true
      let html =
        '<div class="view-title">' +
          props.dateProfile.currentRange.start.toUTCString() +
        '</div>' +
        '<div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">' +
          segs.length + ' events:' +
          '<ul>' +
            segs.map(function(seg) {
              return seg.def.title + ' (' + seg.range.start.toUTCString() + ')'
            }).join('') +
          '</ul>' +
        '</div>'

      return { html: html }
    }

  }

  const CustomViewPlugin = createPlugin({
    views: {
      custom: CustomViewConfig
    }
  })

  let calendarEl = document.getElementById('calendar');
  let calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ CustomViewPlugin ],
    initialView: 'custom',
    events: 'https://fullcalendar.io/demo-events.json'
  })


});
