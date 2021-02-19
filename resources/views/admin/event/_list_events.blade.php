<div id="eventNavigation" >
  <div class="row">
    <div class="col-md-1">
      <a href="javascript:void(0)" class="closebtn" onclick="closeEvents()"><i class="fas fa-chevron-circle-right"></i></a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <input type="search" id="inputSearch" class="input-search" onkeyup="searchEvents()" placeholder=" Recherche..." title="Type in a name">
    </div>
  </div>
  <div class="row m-2">
    <div class="col-md-12">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TYPE D'EVENEMENTS
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Conférence</a>
          <a class="dropdown-item" href="#">Rencontre</a>
          <a class="dropdown-item" href="#">Atelier</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <ul id="eventList">
        <li></li>
      </ul>
    </div>
  </div>
</div>
