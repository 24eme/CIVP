$(document).ready(function(){

  var ancre = window.location.hash;
  if (ancre) {
    $('#nav-tab a[href="'+ancre+'"]').tab('show')
  }

  needSwitchTab();

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
    needSwitchTab();
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
    updateFiltersInfos();
  });
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false,
    plugins: ['link', 'autolink', 'lists', 'paste'],
    toolbar: 'bold italic underline | styleselect link | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent',
    link_assume_external_targets: true,
    paste_as_text: true
  });
});

function needSwitchTab() {
    var form = $("#formFilters");
    $.ajax({
       url : form.attr('action')+'?output=1&dates=1&'+form.serialize(),
       type : 'GET',
       dataType : 'html',
       success : function(result, statut){
           if (JSON.parse(result).length == 0) {
               $('#nav-tab a[href="#nav-listenondates"]').tab('show');
           } else {
               $('#nav-tab a[href="#nav-calendrier"]').tab('show');
           }
       }
    });
}

function updateFiltersInfos() {
  $.ajax({
     url : '/filtres/infos',
     type : 'GET',
     dataType : 'html',
     success : function(result, statut){
         $("#filtersResult").html(result);
         if (result) {
           $("#filtersInfos").show();
         } else {
           $("#filtersInfos").hide();
         }
     }
  });
}

function moveToMonth(date){
    var toDate = new Date(date);
    $('#calendar').fullCalendar( 'changeView', 'month' );
    $('#calendar').fullCalendar( 'gotoDate', toDate );
}

// IMPORTANT POUR COOKIE
function setCookie(name, value) {
    var date = new Date();
    date.setTime(date.getTime() + (12*60*60*1000));
    expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + (value)  + expires + "; path=/";
}
