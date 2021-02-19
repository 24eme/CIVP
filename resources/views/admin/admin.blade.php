@extends('layout')
@include('calendar/calendar')
@include('partials/_admin-nav')
      @include('admin/event/_list_events')
@section('content')
<div id="main">
@include('layout/header')
<div class="ct" id="dashboard">
  <div class="ct" id="calendrier">
    <div class="ct" id="obligations">
      <div class="ct" id="filtres">
        <div class="ct" id="contact">
          <div class="page" id="p1">
            <div id='calendar'></div>
          </div>
          <div class="page" id="p2">
            @include('admin/obligation/_list_obligations')
          </div>
          <div class="page" id="p3">
            @include('admin/filter/_filtering')
          </div>
          <div class="page" id="p4">
            @include('admin/contact/_contact')
          </div>
          <div class="page" id="p5">
            @include('admin/event/_list_events')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@include('admin/obligation/_create_obligation')
@include('admin/obligation/_update_obligation')
@include('timeline/timeline')
