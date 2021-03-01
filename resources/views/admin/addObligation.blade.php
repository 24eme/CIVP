@extends('layoutAdmin')

@section('content')

<h1 class="pb-4">Ajout d'une obligation</h1>
<form method="post" id="form_create" action="{{route('addObligation')}}">
  @csrf

    <div class="row input-wrapper">
      <div class="col input-group">
        <label class="input-underlined">
        <input id="inputTitleC" class="input" type="text" name="title" value="" required>
        <span class="input-label">Titre de l'obligation</span></label>
      </div>
    </div>

    <div class="row input-wrapper">
      <div class="col">
        <select id="inputProfilC" class="select-btn" name="profil" onchange="setColor()" required>
          <option value="Producteur-Recoltant">Producteur - Récoltant</option>
          <option value="Negociant">Négociant</option>
          <option value="Negociant-Vinificateur">Négociant - Vinificateur</option>
          <option value="Viticulteur">Viticulteur ou exploitant agricole</option>
        </select>
      </div>
    </div>

    <div class="row input-wrapper" style="margin-top:50px;">
      <div class="col-md-5 input-group">
        <label class="input-underlined">
        <input id="inputStartC" class="input" type="date" name="start" value="" >
        <span class="input-label" style="top:5">Date d'ouverture</span></label>
      </div>
      <div class="col-md-5 input-group">
        <label class="input-underlined">
        <input id="inputEndC" class="input" type="date" name="end" value="" required>
        <span class="input-label" style="top:5;">Date de fin</span></label>
      </div>
    </div>

    <div class="row input-wrapper">
      <div class="col input-group">
        <label class="input-underlined">
        <textarea class="input w-100 border-0 pt-4" name="description" rows="3"></textarea>
        <span class="input-label">Description</span></label>
      </div>
    </div>

    <div class="row input-wrapper">
      <div class="col input-group">
        <label class="input-underlined">
        <input id="inputOrganismeC" class="input" type="text" name="organisme" value="">
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

    <div class="row input-wrapper">
      <div class="col input-group">
          <label class="input-underlined">
              <button type="submit" class="btn btn-success btn-lg float-right">Enregistrer</button>
          </label>
      </div>
    </div>
</form>

@endsection
