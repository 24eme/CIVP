@extends('layout')
@section('content')
<style type="text/css">
@foreach($organismes as $organisme)
.custom-control-input-{{$organisme->slug}}:checked ~ .custom-control-label-{{$organisme->slug}}::before ,
.custom-control-input-{{$organisme->slug}}:active ~ .custom-control-label-{{$organisme->slug}}::before {
    background-color: {{$organisme->couleur}};
    border-color: {{$organisme->couleur}};
}
@endforeach
</style>
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav>
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

  <div class="row ml-0">
    <div><h5 class="col-md-12 mt-2 px-0 py-1">Organismes</h5></div>
  </div>
  <div class="row ml-4">
      @foreach($organismes as $organisme)
      <div class="col-md-3 mb-0 p-0">
        <div class="custom-control custom-switch py-1">
          <input name="filters[organismes][]" value="{{$organisme->id}}" type="checkbox" class="custom-control-input custom-control-input-{{$organisme->slug}}" id="organisme{{$organisme->id}}">
          <label class="custom-control-label custom-control-label-{{$organisme->slug}}" for="organisme{{$organisme->id}}"><img src="/images/logos/organismes/{{$organisme->logo}}" class="" height="20px" /> {{$organisme->nom}}</label>
        </div>
            </div>
      @endforeach
  </div>
  <div class="tab-content mt-4" id="nav-tabContent">
    <a type="button" class="btn btn-primary float-right my-3 mx-2" href="{{ route('export') }}"><i class="far fa-calendar-alt"></i> Exporter</a>
    <div class="tab-pane fade show active" id="nav-calendrier" role="tabpanel" aria-labelledby="nav-calendrier-tab">
      <div id='calendar' class="mainContent"></div>
        <h2 class="p-3">Obligations non-datées</h2>
        <div class="row">
          @foreach($obligationsNonDates as $obligation)
            <div class="col-sm-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$obligation->title}}</h5>
                  <a href="#" class="btn btn-primary" onclick="$('#popupEvenement').modal('show');">En savoir plus</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </div>
    <div class="tab-pane fade" id="nav-liste" role="tabpanel" aria-labelledby="nav-liste-tab">
      @include('partials/_list')
    </div>
  </div>
</div>

@endsection
