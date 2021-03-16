<div id="sideNavigation" class="container navbar-custom">
  <div class="row upper_wrapper">
    <button type="button" class="closebtn" onclick="openNav()" aria-label="Close">
      <span aria-hidden="true"class="h2">&times;</span>
    </button>
    <div class="col-md-3 ml-2 pr-0" style="display:inline-block">
      <a href="/"><img src="{{asset('images/logos/logo-C.png')}}" width=50  alt=""></a>
    </div>
    <div class="col-md-8 p-0" style="display:inline-block">
      <a href="/"><h2 style="font-size:1em" class="upper-title">Calendrier des déclarations viti/vinicoles</h2></a>
    </div>
  </div>
  <div class="row p-0 mt-3">
    <div class="upper_wrapper" style="margin-left:10px">
      <i class="fas fa-search" style="color:grey;position:absolute;margin:10px;margin-top:8px;"></i><input id="searchInput" class="input-search" type="text" placeholder="Recherche..." onkeypress="openListGroup()" autocomplete="off" list="events-list" name="" value="" >
      <ul id="ListGroupSearch" class="list-group list-group-custom">
        @foreach($evenements as $evenement)
        <a href="/evenement/{{$evenement->id}}"><li class="list-group-item">{{$evenement->title}}</li></a>
        @endforeach
      </ul>
    </div>
  </div>
  @if(Request()->route()->getPrefix())
    @include('partials/_adminNav')
    @else
  <div class="row p-2 mt-1 FiltrerPar">
    <div class="col-md-12 pt-1">
      <h5>Filtrer par</h5>
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
          <div class="filter-div"><label class="filter-label" for="FilterProdRec">Producteur - Récoltant</label></div><label class="switch"><input class="filter-type" id="FilterProdRec" name="producteur" value="Producteur-Recoltant" type="checkbox" checked><span id="sliderProd" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociant">Négociant</label></div><label class="switch"><input class="filter-type" id="FilterNegociant" name="nego" value="Negociant" type="checkbox" checked><span id="sliderNego" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociantVini">Négociant - Vinificateur</label></div><label class="switch"><input class="filter-type" id="FilterNegociantVini" name="nego" value="Negociant-Vinificateur" type="checkbox" checked><span id="sliderVini" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterViticulteur">Viticulteur (Exploitant agricole)</label></div><label class="switch"><input class="filter-type" id="FilterViticulteur" name="viti" value="Viticulteur" type="checkbox" checked><span id="sliderViti" class="slider round"></span></label>
        </div>
    </div>
  </div>
  <div class="row ml-4">
    <div class="col-md-12 mt-2 p-0">
      <h5>Type</h5>
    </div>
  </div>
  <div class="row ml-0">
    <div class="col-md-12 mb-0 p-0">
          @foreach($types as $type)
          <a class="dropdown-item" href="javascript:void(0)" data-url="{{ route('filterType',$type->name)}}" onchange="filterEvenement('{{$type->name}}','type')">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="{{$type->name}}checkbox">
            <label class="form-check-label ml-2 mt-1" for="flexCheckDefault">
              {{$type->name}}
            </label>
          </div>
          </a>
          @endforeach
    </div>
  </div>
  <div class="row ml-4">
    <div class="col-md-12 mt-2 p-0">
      <h5>Organisme</h5>
    </div>
  </div>
  <div class="row ml-0">
    <div class="col-md-12 mb-0 p-0">
          @foreach($organismes as $organisme)
          <a class="dropdown-item" href="javascript:void(0)" data-url="{{ route('filterOrganisme',$organisme->nom)}}" onchange="filterEvenement('{{$organisme->nom}}','organisme')">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="{{$organisme->nom}}checkbox">
            <label class="form-check-label ml-2 mt-1" for="flexCheckDefault">
              {{$organisme->nom}}
            </label>
          </div>
          </a>
          @endforeach
    </div>
  </div>
  <div class="row ml-1 mt-2">
    <div class="col-md-12">
      <h5>Tags</h5>
    </div>
  </div>
  <div class="row ml-2 mt-1">
      <ul class="tagList p-2">
        <li class="tag-item"><a href="#" class="tag">Déclarations</a></li>
        <li class="tag-item"><a href="#" class="tag">DRM</a></li>
        <li class="tag-item"><a href="#" class="tag">Bleu</a></li>
      </ul>
  </div>
    @endif
</div>
