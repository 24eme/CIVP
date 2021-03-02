<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="pt-3">

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1">
      Recherche
    </h6>
    <div class="row px-2">

        <div class="input-group mb-2">
         <div class="input-group-prepend">
           <div class="input-group-text"><i class="fas fa-search"></i></div>
         </div>
           <input id="searchInput" type="text" class="form-control" placeholder="" onkeypress="openListGroup()" name="q" value=""  />
       </div>
        <ul id="ListGroupSearch" class="list-group list-group-custom mt-5">
          @foreach($evenements as $evenement)
          <li class="list-group-item"><a href="javascript:void(0)" class="popupEvent" data-url="/evenement/{{$evenement->id}}">{{$evenement->title}}</a></li>
          @endforeach
        </ul>
    </div>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1">
      Familles
    </h6>
    <div class="row ml-0">
      <div class="col-md-12">
          <div class="filter-wrapper">
            @foreach($familles as $famille)
            <div class="filter-div"><label class="filter-label" for="famille-{{$famille->id}}">{{$famille->nom}}</label></div><label class="switch"><input class="filter-profil" id="famille-{{$famille->id}}" name="producteur" value="{{$famille->slug}}" type="checkbox" checked><span class="slider round" style="background-color:{{$famille->couleur}}"></span></label>
            @endforeach
          </div>
      </div>
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
