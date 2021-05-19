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
  });
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
  $(".custom-control-input").each(function (index, element) {
    if (getCookie(element.id) == "true") {
      $(element).prop('checked',true)
    }else{
      $(element).prop('checked',false)
    }
  })
  $(".custom-control-input").click(function (element) {
    setCookie(this.id,this.checked)
  });
});


function moveToMonth(date){
    var toDate = new Date(date);
    $('#calendar').fullCalendar( 'changeView', 'month' );
    $('#calendar').fullCalendar( 'gotoDate', toDate );
}

// IMPORTANT POUR COOKIE
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value)  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
