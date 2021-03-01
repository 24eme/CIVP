<div id="sideNavigation" class="sideNavigation col-md-3 d-md-block bg-light sidebar collapse">

  <div class="row">
    <div class="col-md-9">
      <form action="/" method="get">
        <div class="input-group m-0">
          <input type="text" class="form-control form-control-lg" placeholder="Rechercher une obligations" name="q" />
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit"><span class="fa fa-search py-1"></span></button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
        <h4 class="py-3">Filtrer par familles</h4>
        <div class="filter-wrapper">
          <div class="filter-div"><label class="filter-label" for="FilterProdRec">Producteur - Récoltant</label></div><label class="switch"><input class="filter-profil" id="FilterProdRec" name="producteur" value="Producteur-Recoltant" type="checkbox" checked><span id="sliderProd" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociant">Négociant</label></div><label class="switch"><input class="filter-profil" id="FilterNegociant" name="nego" value="Negociant" type="checkbox" checked><span id="sliderNego" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterNegociantVini">Négociant - Vinificateur</label></div><label class="switch"><input class="filter-profil" id="FilterNegociantVini" name="nego" value="Negociant-Vinificateur" type="checkbox" checked><span id="sliderVini" class="slider round"></span></label>
          <div class="filter-div"><label class="filter-label" for="FilterViticulteur">Viticulteur (Exploitant agricole)</label></div><label class="switch"><input class="filter-profil" id="FilterViticulteur" name="viti" value="Viticulteur" type="checkbox" checked><span id="sliderViti" class="slider round"></span></label>
        </div>
    </div>
    <div class="col-md-12">
      <h4 class="py-3">Filtrer par tags</h4>
      <ul class="tagList p-2">
        <li class="tag-item"><a href="#" class="tag">CIVP</a></li>
        <li class="tag-item"><a href="#" class="tag">IGP</a></li>
        <li class="tag-item"><a href="#" class="tag">AIDES</a></li>
      </ul>
    </div>
  </div>

</div>
