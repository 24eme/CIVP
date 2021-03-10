<div id="sideNavigation" class="container navbar-custom">
  <div class="row upper_wrapper">
    <div class="col-md-3 ml-2 pr-0" style="display:inline-block">
      <a href="/"><img src="{{asset('images/logos/logo-C.png')}}" width=50  alt=""></a>
    </div>
    <div class="col-md-8 p-0" style="display:inline-block">
      <a href="/"><h2 style="font-size:1em" class="upper-title">Calendrier des déclarations viti/vinicoles</h2></a>
    </div>
  </div>
  <div class="row p-0 mt-3">
    <div class="upper_wrapper" style="margin-left:10px">
      <i class="fas fa-search" style="color:grey;position:absolute;margin:10px;margin-top:8px;"></i><input id="searchInput" class="input-search" type="text" placeholder="Recherche..." onkeypress="openListGroup()" autocomplete list="events-list" name="" value="" >
      <ul id="ListGroupSearch" class="list-group list-group-custom">
        @foreach($evenements as $evenement)
        <li class="list-group-item"><a href="/evenement/{{$evenement->id}}">{{$evenement->title}}</a></li>
        @endforeach
      </ul> 
    </div>
  </div>
  <div class="row p-2 mt-1 FiltrerPar">
    <div class="col-md-12 p-2">
      <h4>Filtrer par</h4>
    </div>
  </div>
  <div class="row ml-4">
    <div class="col-md-12 mt-2 p-0">
      <h5>Famille</h5>
    </div>
  </div>
  <div class="row ml-0">
    <div class="col-md-12 mb-0 p-0">
        <div class="filter-wrapper">
          <div class="filter-div"><label class="filter-label" for="FilterProdRec">Producteur - Récoltant</label></div><label class="switch"><input class="filter-profil" id="FilterProdRec" name="producteur" value="Producteur-Recoltant" type="checkbox" checked><span id="sliderProd" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociant">Négociant</label></div><label class="switch"><input class="filter-profil" id="FilterNegociant" name="nego" value="Negociant" type="checkbox" checked><span id="sliderNego" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociantVini">Négociant - Vinificateur</label></div><label class="switch"><input class="filter-profil" id="FilterNegociantVini" name="nego" value="Negociant-Vinificateur" type="checkbox" checked><span id="sliderVini" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterViticulteur">Viticulteur (Exploitant agricole)</label></div><label class="switch"><input class="filter-profil" id="FilterViticulteur" name="viti" value="Viticulteur" type="checkbox" checked><span id="sliderViti" class="slider round"></span></label>
        </div>
    </div>
  </div>
  <div class="row ml-3 mt-1">
    <div class="dropdown">
    <button class="btn-Sidedropdown dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Types
    </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Aide</a>
        <a class="dropdown-item" href="#">Obligation</a>
        <a class="dropdown-item" href="#">Evenement</a>
      </div>
    </div>
  </div>
  <div class="row ml-3 mt-1">
    <div class="dropdown">
    <button class="btn-Sidedropdown dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Organismes
    </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">IGP</a>
        <a class="dropdown-item" href="#">CIVP</a>
      </div>
    </div>
  </div>
  <div class="row ml-1 mt-1">
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="#">Aide</a>
      <a class="dropdown-item" href="#">Obligation</a>
      <a class="dropdown-item" href="#">Evenement</a>
    </div>
  </div>
  <div class="row ml-1 mt-2">
    <div class="col-md-12">
      <h5>Tags</h5>
    </div>
  </div>
  <div class="row ml-2 mt-1">
      <ul class="tagList p-2">
        <li class="tag-item"><a href="#" class="tag"><i></i>Déclarations</a></li>
        <li class="tag-item"><a href="#" class="tag">DRM</a></li>
        <li class="tag-item"><a href="#" class="tag">Bleu</a></li>
      </ul>
  </div>
</div>
