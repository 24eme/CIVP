@extends('layout')
@include('calendar/calendar')
@section('content')
      @include('partials/_sideNav') 
    <div id="main">
      <div id='calendar'></div>
      <div class="obligation_non_dates" style="display:none;">
        <h3>Obligations non-daté</h3>

      </div>
    </div>
@endsection
@include('timeline/timeline')
