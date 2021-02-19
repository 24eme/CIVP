var months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
var removedEvents = new Array()
var removed = new Array()



$(document).ready(function(){
  $("input.filter-profil").each(function (index, element) {
    if (getCookie(element.id) == "false") {$(element).prop('checked',false)}else{$(element).prop('checked',true)}
  })
  // setDate()
})

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


  function openNav() {
    if (document.getElementById('admin_nav') != null && document.getElementById('admin_nav').style.width == "350px") {closeNav();return 0
    }
    if (document.getElementById('side_navigation') != null && document.getElementById('side_navigation').style.width == "350px") {closeNav();return 0
    }
    if (document.getElementById('side_navigation') != null) {
        document.getElementById('side_navigation').style.width = "350px";
    }
    if (document.getElementById('admin_nav') != null) {
        document.getElementById('admin_nav').style.width = "350px";
    }
    document.getElementById('main').style.marginLeft = "350px";

  }

  function closeNav() {
    if (document.getElementById('side_navigation') != null) {
        document.getElementById('side_navigation').style.width = "0";
    }
    if (document.getElementById('admin_nav') != null) {
        document.getElementById('admin_nav').style.width = "0";
    }
    document.getElementById('main').style.marginLeft= "0";
  }

  function modalUpdate(info){
      $("#head_title").html(info.event.title)
      $("#inputID").val(info.event.id)
      $("#inputTitleU").val(info.event.title)
      $("#inputStartU").val(info.event.startStr)
      $("#inputDescriptionU").val(info.event.extendedProps.description)
      $("#inputProfilU").val(info.event.extendedProps.profil)
      $("#inputOrganismeU").val(info.event.extendedProps.organisme)
      $("#inputLienU").val(info.event.extendedProps.lien)
      $("#inputContactU").val(info.event.extendedProps.contact)
      $(".color-block").css('background-color',info.event.color)

      if (info.event.allDay) {
        var date = new Date(info.event.startStr)
        date.setDate(date.getDate()+1)
        date = date.getFullYear() + "-"+date.getMonth()+1 + "-" + (date.getDate()<=9 ? "0" + date.getDate() : date.getDate())
        $("#inputEndU").val(date)
      }
      else{
        $("#inputEndU").val(info.event.endStr)
      }

      $('#ModalUObligation').modal('show');
  }

  function deleteObligation(){
      var url = 'deleteObligation/'+ $('#inputID').val();
      window.location = url;
  };

  function modalPopUp(info){

    var date = new Date(info.event.startStr)
    var month = months[date.getMonth()]
    var day = date.getDate()
    $("#event-title").html(info.event.title)
    $("#event-month").text(month)
    $("#event-day").text(day)
    $("#event-endDate").html(info.event.endStr)
    $("#event-description").html(info.event.extendedProps.description)
    $("#event-profil").html(info.event.extendedProps.profil)
    $("#event-organisme").val(info.event.extendedProps.organisme)
    $("#event-lien").val(info.event.extendedProps.lien)
    $("#event-contact").val(info.event.extendedProps.contact)
    if (info.event.backgroundColor !== "null") {
      $(".triangle-color").css('border-top-color',info.event.backgroundColor)
    }
    else {
      $(".triangle-color").css('border-top-color','#3788d8')
    }
    var popup = $("#modalPopUp")
    $(".fc-daygrid-event").hover(function(e) {
        var x = e.clientX;
        var y = e.clientY;
        var newposX = x - 60;
        var newposY = y - 60;
    $("#modalPopUp").css("display","block")
    $("#modalPopUp").css("transform","translate3d("+newposX+"px,"+newposY+"px,0px)").show();
    }, function() {
        $("#modalPopUp").hide();
    });

  }

  function modalInfo(info){
    $("#head_title").html(info.event.title)
    $("#inputID").val(info.event.id)
    $("#inputTitle").val(info.event.title)
    $("#inputStart").val(info.event.startStr)
    $("#inputDescription").val(info.event.extendedProps.description)
    $("#inputProfil").val(info.event.extendedProps.profil)
    $("#inputOrganisme").val(info.event.extendedProps.organisme)
    $("#inputLien").val(info.event.extendedProps.lien)
    $("#inputContact").val(info.event.extendedProps.contact)
    $(".color-block").css('background-color',info.event.color)

    if (info.event.allDay) {
      var date = new Date(info.event.startStr)
      date.setDate(date.getDate()+1)
      date = date.getFullYear() + "-"+date.getMonth()+1 + "-" + (date.getDate()<=9 ? "0" + date.getDate() : date.getDate())
      $("#inputEnd").val(date)
    }
    else{
      $("#inputEnd").val(info.event.endStr)
    }

    $('#ModalSObligation').modal('show');
  }
  function openEvents() {
    if (document.getElementById('events_side') != null && document.getElementById('events_side').style.width == "350px") {
      closeEvents();return 0
    }
    if (document.getElementById('events_side') != null) {
        document.getElementById('events_side').style.width = "350px";
    }
    document.getElementById('main').style.marginRight = "350px";
  }

  function closeEvents() {
    if (document.getElementById('events_side') != null) {
        document.getElementById('events_side').style.width = "0";
    }
    document.getElementById('main').style.marginRight= "0";
  }

  var deactivated = []

  function deactivateObligation(){
    var obligation = calendar.getEventById($("#inputID").val())
    deactivated.push(obligation)
    obligation.remove()
  }
  function activateObligation(){
    var obligationAct = calendar.getEventById($("#inputID").val())
    deactivated.pop(obligationAct)
    obligationAct.addEvent()
  }

  var searched = []
  function searchEvents(){
    $("#events_list").empty()
    var q = $("#inputSearch").val()
    var calendar = window.value
    events = calendar.getEvents()
    for (i = 0; i < events.length; i++) {
      if ((events[i].title.toUpperCase()).indexOf(q.toUpperCase()) > -1 && !(searched.includes(events[i]))) {
        searched.push(events[i])
        var li = $("<li class='event_item'></li>").text(events[i].title)
        $("#events_list").append(li)
      }
    }
  }

  function openSection(evt, section) {
    var i, tabcontent, tablinks;
    contents = document.getElementsByClassName("section-contents");
    for (i = 0; i < contents.length; i++) {
      contents[i].style.display = "none";
    }
    tabs = document.getElementsByClassName("section-tab");
    for (i = 0; i < tabs.length; i++) {
      tabs[i].className = tabs[i].className.replace(" active", "");
    }
    document.getElementById(section).style.display = "block";
    evt.currentTarget.className += " active";
  }
