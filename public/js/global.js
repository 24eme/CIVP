$(document).ready(function(){

  var ancre = window.location.hash;
  if (ancre) {
    $('#nav-tab a[href="'+ancre+'"]').tab('show')
  }
  // OUVERTURE POPUP
  $("#main").on("click", ".popupEvent", function() {
    var url = $(this).data('url');
    $.get(url, function(response) {
      $('#popupEvenement').html(response);
      $('#popupEvenement').modal({backdrop: true, keyboard: true});
    });
  });
  // IMG checkbox
  $(".image-checkbox").each(function () {
    if ($("#"+$(this).attr('for')).attr("checked")) {
      $(this).addClass('image-checkbox-checked');
    }
    else {
      $(this).removeClass('image-checkbox-checked');
    }
  });
  // Agenda header click
  $("#calendar").on("click", "th.fc-widget-header", function() {
    if ($(this).data('date')) {
      moveToMonth($(this).data('date'));
    }
  });
  // tooltip
  $('.titlize').tooltip();


  $(".image-checkbox").click(function (e) {
    $(this).toggleClass('image-checkbox-checked');
    var cb = $("#"+$(this).attr('for'));
    cb.prop("checked", !cb.prop("checked"));
    e.preventDefault();
    $("#formFilters").submit();
  });
  // FILTRES
  var form = $("#formFilters");
  form.change(function() {
    form.submit();
  });
  form.submit(function(e) {
    e.preventDefault();
    var source = form.attr('action')+'?output=json&dates=1&calendar=1&'+form.serialize();
    $('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('removeEventSources');
    $('#calendar').fullCalendar('addEventSource', source);
    $.ajax({
       url : form.attr('action')+'?output=html&dates=1&'+form.serialize(),
       type : 'GET',
       dataType : 'html',
       success : function(result, statut){
           $("#nav-liste").html(result);
       }
    });
    $.ajax({
       url : form.attr('action')+'?output=html&dates=0&'+form.serialize(),
       type : 'GET',
       dataType : 'html',
       success : function(result, statut){
           $("#nav-listenondates").html(result);
       }
    });
    setCookie('calendrier-filtres', form.serialize());
    updateCompteurOrganismes();
  });
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
  updateCompteurOrganismes();
});

function updateCompteurOrganismes() {
  var nb = $( "#organismesChoices input:checked" ).length;
  if (nb > 0)
    $("#counterOrga").text('('+nb+')');
  else
    $("#counterOrga").text('');
}

function moveToMonth(date){
    var toDate = new Date(date);
    $('#calendar').fullCalendar( 'changeView', 'month' );
    $('#calendar').fullCalendar( 'gotoDate', toDate );
}

// IMPORTANT POUR COOKIE
function setCookie(name, value) {
    var date = new Date();
    date.setTime(date.getTime() + (365*24*60*60*1000));
    expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + (value)  + expires + "; path=/";
}
