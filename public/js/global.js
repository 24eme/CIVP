var months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']

  function openNav() {
    if (document.getElementById('side_nav') != null && document.getElementById('side_nav').style.width == "350px") {closeNav();return 0
    }
    if (document.getElementById('side_navigation') != null && document.getElementById('side_navigation').style.width == "350px") {closeNav();return 0
    }
    if (document.getElementById('side_navigation') != null) {
        document.getElementById('side_navigation').style.width = "350px";
    }
    if (document.getElementById('side_nav') != null) {
        document.getElementById('side_nav').style.width = "350px";
    }
    document.getElementById('main').style.marginLeft = "350px";

  }

  function closeNav() {
    if (document.getElementById('side_navigation') != null) {
        document.getElementById('side_navigation').style.width = "0";
    }
    if (document.getElementById('side_nav') != null) {
        document.getElementById('side_nav').style.width = "0";
    }
    document.getElementById('main').style.marginLeft= "0";
  }

  function setColor(value) {
    switch (value) {
      case "Producteur":

      break;
      case "Negociant":

      break;
      case "Vinificateur":

      break;
      case "Viticulteur":

      break;
      default:

    }
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
// $(".fc-").each(function(index,element) {
//   element.hover(function(e)){
//     var btn = $('<button type="button" class="btn-primary" onclick="openNav()"><i class="fas fa-trash-alt"></i></button>') ;
//     $("#main").html(btn).offset({ top: e.pageY, left: e.pageX });
//   }
// });

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
    $("#triangle-color").css('background-color',info.event.color)
    var popup = $("#modalPopUp") 
    $('#modalPopUp').css('visibility','visible');
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
    console.log(info.event.eventColor)
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
    obligation.remove()
  }
  function activateObligation(){
    var obligation = calendar.getEventById($("#inputID").val())
    obligation.addEvent()
  }

  var searched = []
  function searchEvents(){
    // var url = 'showEvents/' + $("#inputSearch").val()
    // window.location = url
    var calendar = window.value
    var q = $("#inputSearch").val()
    events = calendar.getEvents()
    for (i = 0; i < events.length; i++) {
      if ((events[i].title).indexOf(q) > -1 && !(searched.includes(events[i]))) {
        console.log("here")
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
// jQuery(document).ready(function(){
//   $(document).click(function(e){
//     var num = Math.floor((Math.random()*10)+1);
//     var img = $('<div>Image '+num+':<img src="image' + num + '.png" /></div>');
//     $("#img_container").html(img).offset({ top: e.pageY, left: e.pageX});
//   });
// })
