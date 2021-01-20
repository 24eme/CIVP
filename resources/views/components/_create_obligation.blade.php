
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une obligation</h5>
        <h5 class="modal-title" id="exampleModalLabel">Saisissez les détails de l'évenement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <input type="text" name="" value="">
          </div>
        </div>
        <form method="POST" id="" action="{{route('createObligation')}}">
          <div class="">
            <label for="title" class="content-title">Nom de l'obligation</label>
            <input id="inputTitle" type="text" placeholder="Déclaration Annuelle d'Inventaire (DAI)" name="title" class="input" value="" required>
            <select id="inputType" name="type">
              <option value="volvo">Type 1</option>
              <option value="saab">Type 2</option>
              <option value="fiat">Type 3</option>
              <option value="audi">Type 4</option>
            </select>
          </div>

          <label for="organisme">Organisme rattaché</label>
          <input id="inputOrganisme" type="text" placeholder="Organisme rattaché" name="organisme" class="input" value="" required><br>

          <label for="equipment">Date d'ouverture</label>
          <input id="inputEquipment" type="text" name="start" class="input" value="" required><br>

          <label for="equipment">Deadline</label><label id="roomEquipment"></label>
          <input class="" type="text" id="inputDeadline" name="deadline" value=""><span class="focus-border"></span><br>

          <label for="equipment">Lien vers la plateforme déclarative</label>
          <input class="" type="text" id="inputLien" name="lien" value=""><span class="focus-border"></span><br>

          <label for="equipment">Contact</label><label id="roomEquipment"></label>
          <input class="" type="text" id="inputContact" name="contact" value=""><span class="focus-border"></span><br>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Sauvegarder</button>
          </div>
        </form>
    </div>
  </div>
</div>
