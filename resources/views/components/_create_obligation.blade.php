<div class="modal fade" id="ModalCObligation" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="" style="font-weight:bold;padding:5px">Ajouter une obligation</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <p class="" id="">Saisissez les détails de l'évenement</p>
        <form method="POST" id="" action="{{route('createObligation')}}">
        @csrf
          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputTitle" class="input" type="text" name="title" value="" required>
              <span class="input-label">Titre de l'obligation</span></label>
            </div>
          </div>
          <div class="row input-wrapper">
            <div class="col">
              <select id="inputType" class="select-btn" name="profil" required>
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
              <input id="inputStart" class="input" type="date" name="start" value="" >
              <span class="input-label" style="top:0;">Date d'ouverture</span></label>
            </div>
            <div class="col-md-6 input-group">
              <label class="input-underlined">
              <input id="inputEnd" class="input" type="date" name="end" value="" required>
              <span class="input-label" style="top:0;">Date de fin</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputOrganisme" class="input" type="text" name="organisme" value="">
              <span class="input-label">Organisme</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputLien" class="input" type="text" name="lien" value="">
              <span class="input-label">Lien</span></label>
            </div>
          </div>

          <div class="row input-wrapper">
            <div class="col input-group">
              <label class="input-underlined">
              <input id="inputContact" class="input" type="text" name="contact" value="">
              <span class="input-label">Contact</span></label>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">Sauvegarder</button>
          </div>

        </form>
        </div>
    </div>
  </div>
</div>
