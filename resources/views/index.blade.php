@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main">
  <button type="button" class="closebtn" onclick="openNav()" aria-label="Close">
    <i class="fas fa-chevron-circle-left"></i>
  </button>
  <nav class="mt-4">
    <div class="col-md-auto float-right">
      <button style="background-color:#E8E8E8;border-color:#E8E8E8" type="button" class="btn btn-warning" data-dismiss="modal"><a href="export">Exporter</a></button>
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
  </div>
</div>

@endsection
