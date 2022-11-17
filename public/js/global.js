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
    plugins: ['link', 'autolink', 'lists', 'paste', 'image'],
    toolbar: 'bold italic underline | styleselect link image | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent',
    link_assume_external_targets: true,
    paste_as_text: true,
    automatic_uploads: true,
    file_picker_types: 'image',
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
            Note: In modern browsers input[type="file"] is functional without
            even adding it to the DOM, but that might not be the case in some older
            or quirky browsers like IE, so you might want to add it to the DOM
            just in case, and visually hide it. And do not forget do remove it
            once you do not need it anymore.
        */

        input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                /*
                    Note: Now we need to register the blob in TinyMCEs image blob
                    registry. In the next release this part hopefully won't be
                    necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },
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
