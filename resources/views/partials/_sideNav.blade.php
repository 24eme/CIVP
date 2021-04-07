<div id="sideNavigation" class="container navbar-custom">
  <div class="row upper_wrapper mt-3">
    <div class="text-center">
      <a href="/"><img src="{{asset('images/logos/logo-C.png')}}" width=50  alt=""></a>
    </div>
    <div class="col-md-auto mx-auto text-center">
      <a href="/"><h2 style="font-size:1em" class="upper-title">Calendrier des déclarations viti/vinicoles</h2></a>
    </div>
  </div>

  @if(Request()->route()->getPrefix())
    @include('partials/_adminNav')
  @endif

  <form action="{{ route('listEvenements') }}" method="GET" id="formFilters">

  <div class="row p-2 mt-3 FiltrerPar">
    <div class="col-md-12 pt-1">
      <h5>Filtrer par</h5>
    </div>
  </div>

  <div class="row ml-0">
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Famille</h5></div>
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
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Organisme</h5></div>
  </div>

  <div class="row ml-4">
    <div class="col-md-12 mb-0 p-0">
      @foreach($organismes as $organisme)
        <div class="custom-control custom-switch py-1">
          <input name="filters[organismes][]" value="{{$organisme->id}}" type="checkbox" class="custom-control-input" id="organisme{{$organisme->id}}">
          <label class="custom-control-label" for="organisme{{$organisme->id}}">{{$organisme->nom}}</label>
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
      <h5>Rechercher</h5>
    </div>
  </div>

  <div class="row p-0 mt-4">
    <div class="upper_wrapper" style="margin-left:10px">
      <input id="searchInput" class="input-search" type="text" placeholder="Recherche..." onkeypress="openListGroup()" autocomplete="off" list="events-list" name="" value="" >
      <ul id="ListGroupSearch" class="list-group list-group-custom">
        @foreach($evenements as $evenement)
        <a href="/evenement/{{$evenement->id}}"><li class="list-group-item">{{$evenement->title}}</li></a>
        @endforeach
      </ul>
    </div>
  </div>
</div>
