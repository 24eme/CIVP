@extends('layout')
@include('calendar/calendar')
@section('content')

      @include('partials/_sideNav')
      @include('admin/event/_list_events')
    <div id="main">
      @include('layout/header')
      <!-- <div class="row mt-1">
        <div class="col-md-auto ml-auto p-0">
          <button id="btn-ListView"class="btn-upper" type="button" name="button"><a href="/#liste">LISTE</a></button>
        </div>
        <div class="col-md-auto p-0 mt-auto mb-auto">
          <div class="circle-separator"></div>
        </div>
        <div class="col-md-auto p-0">
          <button id="btn-DayGrid"class="btn-upper" type="button" name="button"><a href="/#calendrier">CALENDRIER</a></button>
        </div>
        <div class="col-md-auto p-0 mt-auto mb-auto">
          <div class="circle-separator"></div>
        </div>
        <div class="col-md-auto mr-auto p-0">
          <button id="btn-TimelineView"class="btn-upper" type="button" name="button"><a href="/#timeline">TIMELINE</a></button>
        </div>
      </div> -->
      <div id='calendar'></div>
      <!-- <div class="obligation_non_dates" style="display:none;">
        <h3>Obligations non-daté</h3>

      </div> -->
        @include('evenements/_list_events')
        <div class="row">
          <div class="col-md-12 mt-3">
            <center><button type="button" class="fc-dayGridMonth-button btn btn-primary active" name="button" onclick="showEventList()">Vue Liste</button></center>
          </div>
        </div>

    </div>
@endsection
@include('timeline/timeline')
