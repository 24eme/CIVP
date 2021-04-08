@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4">
    <div class="col-md-auto float-right">
      @if($user)
      <div class="btn-group">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>&nbsp;{{ $user->name }}
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
        </div>
      </div>
      @endif
    </div>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-link active" id="nav-calendrier-tab" data-toggle="tab" href="#nav-calendrier" role="tab" aria-controls="nav-calendrier" aria-selected="true">Calendrier</a>
      <a class="nav-link" id="nav-liste-tab" data-toggle="tab" href="#nav-liste" role="tab" aria-controls="nav-liste" aria-selected="false">Liste</a>
    </div>

  </nav>
  <div class="tab-content mt-4" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-calendrier" role="tabpanel" aria-labelledby="nav-calendrier-tab">
      <div id='calendar'></div>
    </div>
    <div class="tab-pane fade" id="nav-liste" role="tabpanel" aria-labelledby="nav-liste-tab">
      @include('partials/_list')
    </div>
    <a type="button" class="btn btn-primary float-right my-3 mr-2" href="{{ route('export') }}">Export Ical</a></a>
  </div>
</div>

@endsection
