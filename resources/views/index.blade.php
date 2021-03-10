@extends('layout')
@include('partials/_sideNav')
@section('content')
<div id="main" class="main">
  <nav class="mt-4">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-link active" id="nav-calendrier-tab" data-toggle="tab" href="#nav-calendrier" role="tab" aria-controls="nav-calendrier" aria-selected="true">Calendrier</a>
      <a class="nav-link" id="nav-liste-tab" data-toggle="tab" href="#nav-liste" role="tab" aria-controls="nav-liste" aria-selected="false">Liste</a>
      <a class="nav-link" id="nav-timeline-tab" data-toggle="tab" href="#nav-timeline" role="tab" aria-controls="nav-timeline" aria-disabled="true">Timeline</a>
    </div>
  </nav>
  <div class="tab-content mt-4" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-calendrier" role="tabpanel" aria-labelledby="nav-calendrier-tab">
      <div id='calendar'></div>
    </div>
    <div class="tab-pane fade" id="nav-liste" role="tabpanel" aria-labelledby="nav-liste-tab">
      <div id='calendar-list'></div>
    </div>
    <div class="tab-pane fade" id="nav-timeline" role="tabpanel" aria-labelledby="nav-timeline-tab">
      @include('timeline/timeline')
    </div>
  </div>
</div>

@endsection
