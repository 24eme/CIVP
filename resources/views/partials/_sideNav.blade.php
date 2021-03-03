<div id="sideNavigation" class="sideNavigation">
  <div class="row upper_wrapper">
    <div class="col-md-3 ml-2 pr-0" style="display:inline-block">
      <a href="/"><img src="{{asset('images/logos/logo-C.png')}}" width=50  alt=""></a>
    </div>
    <div class="col-md-8 p-0" style="display:inline-block">
      <a href="/"><p style="font-size:0.9em" class="upper-title">Calendrier des déclarations viti/vinicoles</p></a>
    </div>
  </div>
  <div class="row p-0 mt-5">
    <div class="upper_wrapper" style="margin-left:10px">
      <i class="fas fa-search" style="color:grey;position:absolute;margin:10px;margin-top:8px;"></i><input id="searchInput" class="input-search" type="text" placeholder="Recherche..." onkeypress="openListGroup()" autocomplete list="events-list" name="" value="" >
      <ul id="ListGroupSearch" class="list-group list-group-custom">
        @foreach($obligations as $obligation)
        <li class="list-group-item"><a href="/obligation/{{$obligation->id}}">{{$obligation->title}}</a></li>
        @endforeach
      </ul>
      <datalist id="events-list">
        @foreach($obligations as $obligation)
        <option>{{$obligation->title}}</option>
        @endforeach
      </datalist>
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
          <div class="filter-div"><label class="filter-label" for="FilterProdRec">Producteur - Récoltant</label></div><label class="switch"><input class="filter-profil" id="FilterProdRec" name="producteur" value="Producteur-Recoltant" type="checkbox" checked><span id="sliderProd" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociant">Négociant</label></div><label class="switch"><input class="filter-profil" id="FilterNegociant" name="nego" value="Negociant" type="checkbox" checked><span id="sliderNego" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociantVini">Négociant - Vinificateur</label></div><label class="switch"><input class="filter-profil" id="FilterNegociantVini" name="nego" value="Negociant-Vinificateur" type="checkbox" checked><span id="sliderVini" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterViticulteur">Viticulteur (Exploitant agricole)</label></div><label class="switch"><input class="filter-profil" id="FilterViticulteur" name="viti" value="Viticulteur" type="checkbox" checked><span id="sliderViti" class="slider round"></span></label>
        </div>
    </div>
  </div>
  <div class="row ml-4 mt-5">
    <div class="col-md-12">
      <h5>ORGANISMES</h5>
    </div>
  </div>
  <div class="row ml-4 mt-1">
      <ul class="tagList p-2">
        <li class="tag-item"><a href="#" class="tag"><i></i>CIVP</a></li>
        <li class="tag-item"><a href="#" class="tag">IGP</a></li>
        <li class="tag-item"><a href="#" class="tag">AIDES</a></li>
      </ul>
  </div>
  <div class="row ml-4 mt-5">
    <div class="col-md-12">
      <h5>TYPE</h5>
    </div>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1">
      Types
    </h6>
    <div class="row ml-4 mt-1">
      <div class="filter-wrapper type-filters">
          @foreach($profils as $profil)
          <div class="filter-div"><label class="filter-label" for="profil-{{$profil->id}}">{{$profil->nom}}</label></div><label class="switch"><input class="filter-profil" id="profil-{{$profil->id}}" name="producteur" value="{{$profil->slug}}" type="checkbox" checked><span class="slider round" style="background-color:{{$profil->couleur}}"></span></label>
          @endforeach
      </div>
    </div>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1">
      Organismes
    </h6>
    <div class="row ml-4 mt-1">
      <div class="filter-wrapper type-filters">
          @foreach($organismes as $organisme)
          <div class="filter-div"><label class="filter-label" for="profil-{{$profil->id}}">{{$organisme->nom}}</label></div><label class="switch"><input class="filter-profil" id="organisme-{{$organisme->id}}" name="producteur" value="{{$organisme->slug}}" type="checkbox" checked><span class="slider round" style="background-color:{{$organisme->couleur}}"></span></label>
          @endforeach
      </div>
    </div>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1">
      Tags
    </h6>
    <ul class="tagList p-2">
      @foreach($tags as $tag)
      <li class="tag-item"><a href="#" class="tag">{{$tag->nom}}</a></li>
      @endforeach
    </ul>
  </div>
</nav>
