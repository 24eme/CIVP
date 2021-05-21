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
      height: 'auto',
      dayMaxEvents: true,
      displayEventEnd: true,
			eventSources: [
					{
							url: $("#formFilters").attr('action')+'?output=json&dates=1&calendar=1&'+$("#formFilters").serialize(),
							type: 'GET'
					}
			],
      firstDay: 1,
      fixedWeekCount: false,
      defaultView: 'year',
      buttonText: {month: 'Mois', year: 'Année'},
      eventClick: function(item){
        $.get("evenement/"+item.id, function(response) {
          $('#popupEvenement').html(response);
          $('#popupEvenement').modal({backdrop: true, keyboard: true});
        });
      },
			eventRender: function (event, element) {
					var ds = new Date(event.start);
					var de = new Date(event.end);
					var dss = ds.getDate().toString().padStart(2, '0') + '/' + (1 + ds.getMonth()).toString().padStart(2, '0') + '/' + ds.getFullYear();
					var des = de.getDate().toString().padStart(2, '0') + '/' + (1 + de.getMonth()).toString().padStart(2, '0') + '/' + de.getFullYear();
					var title = "Du "+dss+" au "+des;
          element.find('.fc-title, .fc-list-item-title').html('<span title="'+title+'">' + event.title + '</span>');
      }
		 });
  });

})(jQuery);
