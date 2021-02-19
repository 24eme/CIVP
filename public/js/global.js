var months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
var removedEvents = new Array()
var removed = new Array()
var deactivated = []
var searched = []

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

  if (document.getElementById('adminNavigation') != null && document.getElementById('adminNavigation').style.width == "290px") {closeNav();return 0
  }
  if (document.getElementById('sideNavigation') != null && document.getElementById('sideNavigation').style.width == "290px") {closeNav();return 0
  }
  if (document.getElementById('sideNavigation') != null) {
      document.getElementById('sideNavigation').style.width = "290px";
  }
  if (document.getElementById('adminNavigation') != null) {
      document.getElementById('adminNavigation').style.width = "290px";
  }
  document.getElementById('main').style.marginLeft = "290px";

}
function closeNav() {
  if (document.getElementById('sideNavigation') != null) {
      document.getElementById('sideNavigation').style.width = "0";
  }
  if (document.getElementById('adminNavigation') != null) {
      document.getElementById('adminNavigation').style.width = "0";
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
}

function exportObligation(){
    var url = 'exportObligation/'+ $('#inputIDshow').val();
    window.location = url;
}
// function shareObligation(){
//     var copyText = document.getElementById("shareIcon");
//     copyText.select();
//     copyText.setSelectionRange(0, 99999);
//     document.execCommand("copy");
//     alert("Lien copié");
// }

function modalPopUp(info){

  var date = new Date(info.event.startStr)
  var month = months[date.getMonth()]
  var day = date.getDate()
  $("#inputIDshow").val(info.event.id)
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
  $(".fc-daygrid-event,.modalPopUp").hover(function(e) {
      var x = e.clientX;
      var y = e.clientY;
      var newposX = x - 60;
      var newposY = y + 10;
  $("#modalPopUp").css("display","block")
  $("#modalPopUp").css("transform","translate3d("+newposX+"px,"+newposY+"px,0px)").show();
  }, function() {
      $("#modalPopUp").hover(function(e) {
        $("#modalPopUp").show();
      })
      if ($("#modalPopUp").css('box-shadow') != 'none') {
        $("#modalPopUp").hide(1);
      }
  });

}
function scalemodalPopUp() {
  $("#modalPopUp").css("top","30%")
  $("#modalPopUp").css("left","40%")
  $("#modalPopUp").css('z-index','1050')
  $("#modalPopUp").css('box-shadow','none')
  $("#modalPopUp").css('transform','scale(1.7)')

  $("#modalPopUp").hover(function(e) {
    $("#modalPopUp").show();
  })
  $("#modalPopUp").modal('show')
}
function closePopUp() {
  $("#modalPopUp").css('z-index','0')
    $("#modalPopUp").modal('hide')
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
  if (document.getElementById('eventNavigation') != null && document.getElementById('eventNavigation').style.width == "350px") {
    closeEvents();return 0
  }
  if (document.getElementById('eventNavigation') != null) {
      document.getElementById('eventNavigation').style.width = "320px";
  }
  document.getElementById('main').style.marginRight = "270px";
}
function closeEvents() {
  if (document.getElementById('eventNavigation') != null) {
      document.getElementById('eventNavigation').style.width = "0";
  }
  document.getElementById('main').style.marginRight= "0";
}

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
