<div id="sideNavigation" class="col-2 navbar-custom h-100">

  @if ($user)

  <div class="row p-2 NavAdmin">
    <div class="col-md-12 pt-1">
      <h5>Administration</h5>
    </div>
  </div>
  <div class="BlocAdmin row p-3 mb-3 ">
      <div class="col-md-12 py-1"><a href="{{ route ('evenement_create') }}" class="{{ (Request::is('admin/evenement*') ? 'active' : '') }}"><i class="far fa-calendar-plus"></i> Créer un evenement</a></div>
      <div class="col-md-12 py-1"><a href="{{ route ('types') }}" class="{{ (Request::is('admin/type*') ? 'active' : '') }}"><i class="fas fa-sitemap"></i> Types d'évènement</a></div>
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

  <div class="row ml-0">
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Familles</h5></div>
  </div>

  <div class="row ml-4">
    <div class="col-md-12 mb-0 p-0">
      @foreach($familles as $famille)
        <div class="custom-control custom-switch py-1">
          <input name="filters[familles][]" value="{{$famille->id}}" type="checkbox" class="custom-control-input" id="famille{{$famille->id}}">
          <label class="custom-control-label" for="famille{{$famille->id}}">{{$famille->nom}}</label>
        </div>
      @endforeach
    </div>
  </div>

  <div class="row ml-0">
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Tags</h5></div>
  </div>

  <div class="row ml-4">
      @foreach($tags as $tag)
      <div class="btn-group-toggle m-1" data-toggle="buttons">
        <label class="btn btn-sm btn-outline-danger">
          <input name="filters[tags][]" value="{{$tag->id}}" type="checkbox"> {{$tag->nom}}
        </label>
      </div>
      @endforeach
  </div>

  </form>

  <div class="row p-2 mt-3 FiltrerPar">
    <div class="col-md-12 pt-1">
      <h5>Recherche</h5>
    </div>
  </div>

  <div class="row p-0 mt-4">
    <div class="upper_wrapper col-md-auto" style="margin-left:5px">
      <input id="searchInput" class="input-search" type="text" placeholder="Recherche..." onkeypress="openListGroup()" autocomplete="off" list="events-list" name="" value="" >
      <ul id="ListGroupSearch" class="list-group list-group-custom">
      </ul>
    </div>
  </div>


</div>
