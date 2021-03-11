<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="row">
    <div class="col-md-4">
      <a class="navbar-brand col-lg-2 me-0 px-3 py-3" href="#"><strong class="h3">Administration |</strong></a>
    </div>
    <div class="col-md-auto">
      <a class="navbar-brand me-0 px-0 py-3" href="#">Calendrier des déclarations viti/vinicoles</a>
    </div>
  </div>
  <button class="navbar-toggler float-right d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
<div class="position-sticky pt-3">
  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 my-4 mb-1 text-muted">MENU</h6>
  <ul class="nav flex-column mb-2">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('evenements') }}">
        <span class="far fa-calendar-alt"></span>&nbsp;Evenements
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('organismes') }}">
        <span class="fas fa-university"></span>&nbsp;Organismes
      </a>
    </li>
  </ul>
</div>
</nav>
