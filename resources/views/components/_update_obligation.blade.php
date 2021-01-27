<div class="modal fade" id="ModalUObligation" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <span class="color-block"></span>
          <h4 class="modal-title" id="head_title" style="font-weight:bold;padding:5px">Obligation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" id="form_update" action="{{route('updateObligation')}}">
        @csrf
          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputID" class="input" type="text" name="id" value="" hidden>
              <input id="inputTitleU" class="input" type="text" name="title" value="" required>
              <span class="input-label">Titre de l'obligation</span></label>
            </div>
          </div>
          <div class="row input-wrapper">
            <div class="col">
              <select id="inputProfilU" class="select-btn" name="profil" required>
                <option value="Producteur-Recoltant">Producteur - Récoltant</option>
                <option value="Negociant">Négociant</option>
                <option value="Negociant-Vinificateur">Négociant - Vinificateur</option>
                <option value="Viticulteur">Viticulteur ou exploitant agricole</option>
              </select>
            </div>
          </div>

          <div class="row input-wrapper" style="margin-top:50px;">
            <div class="col-md-6 input-group">
              <label class="input-underlined">
              <input id="inputStartU" class="input" type="date" name="start" value="" >
              <span class="input-label" style="top:0;">Date d'ouverture</span></label>
            </div>
            <div class="col-md-6 input-group">
              <label class="input-underlined">
              <input id="inputEndU" class="input" type="date" name="end" value="" required>
              <span class="input-label" style="top:0;">Date de fin</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputDescriptionU" class="input" type="text" name="description" value="">
              <span class="input-label">Description</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputOrganismeU" class="input" type="text" name="organisme" value="">
              <span class="input-label">Organisme</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputLienU" class="input" type="text" name="lien" value="">
              <span class="input-label">Lien</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputContactU" class="input" type="text" name="contact" value="">
              <span class="input-label">Contact</span></label>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalSafety">Supprimer</button>
            <button type="submit" class="btn btn-secondary">Modifier</button>
            <button type="button" class="btn btn-primary" onclick="deactivateObligation()">Désactiver</button>
          </div>

        </form>
        </div>
    </div>
  </div>
</div>