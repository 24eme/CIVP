<div id="sideNavigation" class="sideNavigation">
  <div class="row upper_wrapper">
    <div class="col-md-12">
      <a href="/"><span style="display: inline-block;margin-left:20px;"> <img src="{{asset('images/logos/logo-C.png')}}" width=50  alt=""></span></a>
      <a href="/"><p style="font-size:0.9em" class="upper-title">Calendrier des obligations viticoles</p></a>
    </div>
  </div>
  <div class="row p-0 mt-5">
    <div class="upper_wrapper" style="margin-left:10px">
      <i class="fas fa-search" style="color:grey;position:absolute;margin:10px;margin-top:8px;"></i><input id="searchInput" class="input-search" type="text" placeholder="Recherche..." onkeypress="openListGroup()" name="" value="" >
      <ul id="ListGroupSearch" class="list-group list-group-custom">
        @foreach($obligations as $obligation)
        <li class="list-group-item"><a href="/obligation/{{$obligation->id}}">{{$obligation->title}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="row p-4 mt-5 FiltrerPar">
    <div class="col-md-12 p-0">
      <h4>Filtrer par</h4>
    </div>
  </div>
  <div class="row ml-5">
    <div class="col-md-12 mt-2 p-0">
      <h5>Famille</h5>
    </div>
  </div>
  <div class="row ml-0">
    <div class="col-md-12">
        <div class="filter-wrapper">
          <div class="filter-div"><label class="filter-label" for="FilterProdRec">Obligation</label></div><label class="switch"><input class="filter-profil" id="FilterProdRec" name="producteur" value="Producteur-Recoltant" type="checkbox" checked><span id="sliderProd" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociant">Négociant</label></div><label class="switch"><input class="filter-profil" id="FilterNegociant" name="nego" value="Negociant" type="checkbox" checked><span id="sliderNego" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociantVini">Négociant - Vinificateur</label></div><label class="switch"><input class="filter-profil" id="FilterNegociantVini" name="nego" value="Negociant-Vinificateur" type="checkbox" checked><span id="sliderVini" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterViticulteur">Viticulteur (Exploitant agricole)</label></div><label class="switch"><input class="filter-profil" id="FilterViticulteur" name="viti" value="Viticulteur" type="checkbox" checked><span id="sliderViti" class="slider round"></span></label>
        </div>
    </div>
  </div>
  <div class="row ml-4 mt-5">
    <div class="col-md-12">
      <h5>TYPE</h5>
    </div>
  </div>
  <div class="row ml-4 mt-1">
    <div class="filter-wrapper type-filters">
      <div class="filter-div"><label class="filter-label" for="FilterObligation">Obligations</label></div><label class="switch"><input class="filter-type" id="FilterObligation" name="obligation" value="obligation" type="checkbox" checked><span id="sliderObligation" class="slider round"></span></label>
      <div class="filter-div"><label class="filter-label" for="FilterAide">Aides</label></div><label class="switch"><input class="filter-type" id="FilterAide" name="aide" value="aide" type="checkbox" checked><span id="sliderAide" class="slider round"></span></label>
      <div class="filter-div"><label class="filter-label" for="FilterEvenement">Evenements</label></div><label class="switch"><input class="filter-type" id="FilterEvenement" name="evenement" value="evenement" type="checkbox" checked><span id="sliderEvenement" class="slider round"></span></label>
    </div>
  </div>
  <div class="row ml-4 mt-5">
    <div class="col-md-12">
      <h5>TAG</h5>
    </div>
  </div>
  <div class="row ml-4 mt-1">
      <ul class="tagList p-2">
        <li class="tag-item"><a href="#" class="tag">CIVP</a></li>
        <li class="tag-item"><a href="#" class="tag">IGP</a></li>
        <li class="tag-item"><a href="#" class="tag">AIDES</a></li>
      </ul>
  </div>
</div>
