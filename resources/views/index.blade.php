@extends('layout')
@include('calendar/calendar')

@section('content')

      @include('partials/_sideNav')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Calendrier</a>
          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Liste</a>
          <a class="nav-link disabled" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-disabled="true">Timeline</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><div id='calendar'></div></div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">@include('evenement/_list_events')</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"></div>
      </div>





    </main>
    @include('layout/popup')
@endsection
@include('timeline/timeline')
