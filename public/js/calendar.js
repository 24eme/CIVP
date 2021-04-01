(function($)
{
	$(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev title next',
        center: '',
        right: 'month,year'
      },
      locale: 'fr',
      contentHeight: 650,
      dayMaxEvents: true,
      displayEventEnd: true,
      events:'evenement/list?output=json',
      firstDay: 1,
      fixedWeekCount: false,
      defaultView: 'year',
      buttonText: {month: 'Mois', year: 'Année'},
      eventClick: function(item){
        $.get("evenement/"+item.id, function(response) {
          $('#popupEvenement').html(response);
          $('#popupEvenement').modal('show');
        });
      }
    });
  });

})(jQuery);
