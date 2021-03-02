@extends('layout')
@include('calendar/calendar')
@section('content')

      @include('partials/_sideNav')
    <div id="main">
      @include('layout/header')

      <div id='calendar'></div>

        @include('evenement/_list_events')
        <div class="row">
          <div class="col-md-12 mt-3">
            <center><button type="button" class="fc-dayGridMonth-button btn btn-primary active" name="button" onclick="showEventList()">Vue Liste</button></center>
          </div>
        </div>

    </div>
    @include('layout/popup')
@endsection
@include('timeline/timeline')
