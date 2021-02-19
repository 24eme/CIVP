@if ($message = Session::get('init'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('upcoming'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif

<!-- Modal pour supprimer une obligation-->
<div class="modal fade" id="ModalSafety" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cette obligation de la base de données ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
        <button type="button" class="btn btn-primary" onclick="deleteObligation()">Je suis sûr(e)</button>
      </div>
    </div>
  </div>
</div> 

<div id="modalPopUp" class="popup">
	<a href="javascript:void(0)" style="position:absolute;top:5;right:10;color:grey" onclick="closePopUp()"><i class="fas fa-times"></i></a>
	<div class="popup-header"><span class="triangle-color"></span></div>
	<div class="popup-body">
		<div class="popup-content inline-block">
			<div class="calendar-icon">
				<span id="event-month" class="calendar-month">Mois</span>
				<span id="event-day" class="calendar-day">Jour</span>
			</div>
		</div>
		<div class="popup-info inline-block">
			<label style="width:100%;" id="event-title" for="">Event</label>
		</div>
		<div class="popup-info">
			<input id="inputIDshow" class="input" type="text" name="id" value="" hidden>
			<label for="">Description :</label>
			<label id="event-description" for=""></label></br>
						<label for="">Fin de l'évenement</label>
						<label id="event-endDate" for=""></label>
		</div>
	</div>
	<div class="popup-footer">
		<div class="popup-info">
			<span><a id="event-link" href="#"><label for="">Lien :</label></a></span>
		</div>
		<div class="row mb-2">
			<div class="col-md-auto ml-auto">
				<button type="button" class="btn btn-secondary" onclick="exportObligation()">Exporter</button>
			</div>
			<div class="col-md-auto mr-auto">
				<button type="button" class="btn btn-secondary" onclick="shareObligation()">Partager</button>
			</div>
		</div>
	</div>
</div>
