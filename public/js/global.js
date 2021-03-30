var months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre']
var removedEvents = new Array()
var removed = new Array()
var deactivated = []
var searched = []
AOS.init();



$(document).ready(function(){
  $("input.filter-type").each(function (index, element) {
    if (getCookie(element.id) == "false") {$(element).prop('checked',false)}else{$(element).prop('checked',true)}
  })

  $(".popupEvent").click(function() {
    var url = $(this).data('url');
    $.get(url, function(response) {
      $('#popupEvenement').html(response);
      $('#popupEvenement').modal('show');
    });
  });
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

  if ($("#sideNavigation") != null && $("#sideNavigation").css('width') == "290px") {
    closeNav();return 0
  }
  if ($("#sideNavigation") != null) {
      $("#sideNavigation").css('width',"290px")
  }
  $("#main").css("marginLeft","290px")

}
function closeNav() {
  if ($("#sideNavigation") != null) {
      $("#sideNavigation").css('width',"0")
      $("#sideNavigation").css('padding','0')
  }
  $("#main").css('marginLeft',"0")
}

function modalUpdate(info){
    $("#head_title").html(info.event.title)
    $("#inputID").val(info.event.id)
    $("#inputTitleU").val(info.event.title)
    $("#inputStartU").val(info.event.startStr)
    $("#inputDescriptionU").val(info.event.extendedProps.description)
    $("#inputTypeU").val(info.event.extendedProps.type)
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
    if($("#inputEndU").val()== ""){
      $("#inputEndU").val(info.event.endStr)
    }

    $('#ModalUObligation').modal('show');
}

function deleteObligation(){
    var url = 'deleteObligation/'+ $('#inputID').val();
    window.location = url;
}

function exportICS(id){
    var url = 'evenement/export/'+ id;
    window.location = url;
}

// function shareObligation(){
//     var copyText = document.getElementById("shareIcon");
//     copyText.select();
//     copyText.setSelectionRange(0, 99999);
//     document.execCommand("copy");
//     alert("Lien copié");
// }

function openListGroup(){
  $("#ListGroupSearch").css('visibility','visible')
  $("body").click(function(evt){
    $("#ListGroupSearch").css('visibility','hidden')
  })
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#ListGroupSearch li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}

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
  $("#event-type").html(info.event.extendedProps.type)
  $("#event-organisme").val(info.event.extendedProps.organisme)
  $("#event-lien").val(info.event.extendedProps.lien)
  $("#event-contact").val(info.event.extendedProps.contact)
  if (info.event.backgroundColor !== "null") {
    $(".color-block").css('border-top-color',info.event.backgroundColor)
  }
  else {
    $(".color-block").css('border-top-color','#3788d8')
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
function filterEvenement(value,name){
  var id = "#"+value+"checkbox"
  var calendrier = window.value
  var eventSource = calendrier.getEventSources()
  if ($(id)[0].checked) {
    if (eventSource[0].internalEventSource["_raw"] == "evenement/list?output=json") {
      eventSource[0].remove()
      $("#tbody-events").empty()
    }
    calendrier.addEventSource('/filter/'+ name +'/'+value)
    feedList()
  }
  else {
    if (eventSource.length == 1) {
      eventSource[0].remove()
      $("#tbody-events").empty()
      calendrier.addEventSource('evenement/list?output=json')
      feedList()
    }
    else {
      for (var i = 0; i < eventSource.length; i++) {
        if (eventSource[i].internalEventSource["_raw"] == "/filter/"+ name +'/'+value) {
          eventSource[i].remove()
          $("#tbody-events").empty()
        }
      }
    }
  }
}

// function deactivateObligation(){
//   var obligation = calendar.getEventById($("#inputID").val())
//   deactivated.push(obligation)
//   obligation.remove()
// }
// function activateObligation(){
//   var obligationAct = calendar.getEventById($("#inputID").val())
//   deactivated.pop(obligationAct)
//   obligationAct.addEvent()
// }
function feedList() {
  var calendrier = window.value
  var eventSource = calendrier.getEventSources()
  // var events = $('.')
      $.ajax({
         url : calendrier.getEventSources()[0].internalEventSource["_raw"]+'?output=html',
         type : 'GET',
         dataType : 'json',
         success: function(data){

           $.each(data,function(index,element){
             element.start = new Date(element.start).toLocaleDateString('fr-FR',{weekday:'long',year:'numeric',month:'long',day:'numeric'})
             $("#tbody-events").append("<tr class='fc-list-day fc-day fc-day-tue fc-day-past'><td class='fc-list-event-time col-md-auto'><a>"+element.start+"</a></td><td class='col-md-auto'>&nbsp;</td><td class='col-md-auto'>&nbsp;</td><td class='col-md-auto'>&nbsp;</td></tr>")
             $("#tbody-events").append(
               "<tr class='fc-list-event  fc-event fc-event-start fc-event-end fc-event-past'><td class='fc-list-event-time col-md-auto'><a>"+element.type+"</a></td><td class='fc-list-event-title col-md-6'><span class='fc-list-dot col-md-auto'><i class='fas fa-circle' style='color:"+element.color+"'></i></span><a href='javascript:void(0)' class='popupEvent' data-url='{{ route('evenement_popup', $evenement) }}'><strong>"+element.title+"</strong><a></td><td class='fc-list-event-title col-md-auto'>"+element.organisme+"</td><td class='fc-list-event-title col-md-auto'><button type='button' class='btn btn-primary' onclick='exportICS({{$evenement->id}})'><i class='fas fa-external-link-alt'></i></button></td></tr>")

           })
         },
      });
}
function showEventList() {
  if ($("#ListEvents").css('display') === 'block') {
    $("#ListEvents").css('display','none')
    $("#calendar").css('display','block')
  }
  else {
    $("#ListEvents").css('display','block')
    $("#calendar").css('display','none')
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
