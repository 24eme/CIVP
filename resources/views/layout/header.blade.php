<div class="top-nav">
    <div class="circle-logo">
      <a href="/"><img src="{{asset('images/logos/logo-P.svg')}}"  alt="" /></a>
    </div>
    <div class="breadcrumb">
      <a href="/">déclarations viti/vinicoles</a>
    </div>
    <div class="top-nav-center">
      <strong>Calendrier des déclarations viti-vinicoles mis à disposition par le Conseil Interprofessionnel des Vins de Provence</strong>
    </div>
    <div class="col-md-auto float-right">
      @if($user)
      <div class="btn-group">
        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>&nbsp;{{ $user->name }}
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
        </div>
      </div>
      @endif
    </div>
</div>
