<div id="sideNavigation" class="col-2 navbar-custom h-100">

  @if ($user)

  <div class="row p-2 NavAdmin">
    <div class="col-md-12 pt-1">
      <h5>Administration</h5>
    </div>
  </div>
  <div class="BlocAdmin row p-3 mb-3 ">
      <div class="col-md-12 py-1" style="border: 1px dashed black;"><a href="{{ route ('index') }}"><i class="fas fa-undo"></i> <strong>Retour au calendrier</strong></a></div>
      <div class="col-md-12 py-1"><a href="{{ route ('evenement_create') }}" class="{{ (Request::is('admin/evenement*') ? 'active' : '') }}"><i class="far fa-calendar-plus"></i> Créer une déclaration</a></div>
      <div class="col-md-12 py-1"><a href="{{ route ('types') }}" class="{{ (Request::is('admin/type*') ? 'active' : '') }}"><i class="fas fa-sitemap"></i> Types de déclaration</a></div>
      <div class="col-md-12 py-1"><a href="{{ route ('familles') }}" class="{{ (Request::is('admin/famille*') ? 'active' : '') }}"><i class="fas fa-users"></i> Familles viti/vinicoles</a></div>
      <div class="col-md-12 py-1"><a href="{{ route ('organismes') }}" class="{{ (Request::is('admin/organisme*') ? 'active' : '') }}"><i class="fas fa-university"></i> Organismes destinataires</a></div>
  </div>

  @endif

  <form action="{{ route('listEvenements') }}" method="GET" id="formFilters">

  <div class="row p-2 FiltrerPar">
    <div class="col-md-12 pt-1">
      <h5>Filtrer par</h5>
    </div>
  </div>

  <div class="d-none" id="organismesChoices">
    @foreach($organismes as $organisme)
    <input name="filters[organismes][]" value="{{$organisme->id}}" type="checkbox" id="organisme{{$organisme->id}}" @if(isset($filtres['organismes']) && in_array($organisme->id, $filtres['organismes'])) checked="checked" @endif />
    @endforeach
  </div>

  <div class="row ml-0">
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Familles</h5></div>
  </div>

  <div class="row ml-4">
    <div class="col-md-12 mb-0 p-0">
      @foreach($familles as $famille)
        <div class="custom-control custom-switch py-1">
          <input name="filters[familles][]" value="{{$famille->id}}" type="checkbox" class="custom-control-input" id="famille{{$famille->id}}" @if(isset($filtres['familles']) && in_array($famille->id, $filtres['familles'])) checked="checked" @endif />
          <label class="custom-control-label" for="famille{{$famille->id}}">{{$famille->nom}} <i class="fas fa-info-circle text-muted small titlize" data-toggle="tooltip" data-placement="right" title="{{$famille->description}}"></i></label>
        </div>
      @endforeach
    </div>
  </div>

  <div class="row ml-0">
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Mots-Clés liés à une déclaration</h5></div>
  </div>

  <div class="row ml-4">
      @foreach($tags->sortBy('slug') as $tag)
      <div class="btn-group-toggle m-1" data-toggle="buttons">
        <label class="btn btn-sm btn-outline-danger @if(isset($filtres['tags']) && in_array($tag->id, $filtres['tags'])) active @endif">
          <input name="filters[tags][]" value="{{$tag->id}}" type="checkbox" @if(isset($filtres['tags']) && in_array($tag->id, $filtres['tags'])) checked="checked" @endif /> {{$tag->nom}}
        </label>
      </div>
      @endforeach
  </div>

  <div class="row p-2 mt-3 FiltrerPar">
    <div class="col-md-12 pt-1">
      <h5>Recherche</h5>
    </div>
  </div>

  <div class="row p-0 mt-4 ml-4">
    <div class="input-group">
      <input class="form-control input-search" type="text" placeholder="Termes de recherche..." autocomplete="off" name="filters[query]" onkeypress="return event.keyCode!=13" value="@if(isset($filtres['query']) && $filtres['query']) {{ $filtres['query'] }} @endif" />
      <div class="input-group-append">
        <button class="btn btn-outline-danger" type="button"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>

  <p class="primary-link text-right">
    <a href="{{ route('reinit') }}">[x] Voir toutes les déclarations</a>
  </p>

  </form>


</div>
