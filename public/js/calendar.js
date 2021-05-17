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
      events:'evenement/list?output=json&dates=1&calendar=1',
      firstDay: 1,
      fixedWeekCount: false,
      defaultView: 'year',
      buttonText: {month: 'Mois', year: 'Année'},
      eventClick: function(item){
        $.get("evenement/"+item.id+"/organisme/"+item.organisme_id, function(response) {
          $('#popupEvenement').html(response);
          $('#popupEvenement').modal({backdrop: true, keyboard: true});
        });
      },
			eventMouseover:function(item,$el){
				$($el.currentTarget).tooltip({
					title:" du " + item.start.toISOString() + " au " +item.end.toISOString(),
					html: true
				});
				console.log($el.currentTarget)
			},
    });
  });

})(jQuery);
