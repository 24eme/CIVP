@extends('layout')
@include('components/calendar')
@section('content')
@include('components/partials/_admin-nav')
<div id="main">
<div class="ct" id="dashboard">
  <div class="ct" id="calendrier">
    <div class="ct" id="obligations">
      <div class="ct" id="filtres">
        <div class="ct" id="contact">
           <ul class="subnav">
             <a class="section-tab" href="#dashboard"><li class="subnav-item" id="cinco">DASHBOARD</li></a>
             <a class="section-tab" href="#calendrier"><li class="subnav-item" id="uno">CALENDRIER</li></a>
             <a class="section-tab" href="#obligations"><li class="subnav-item" id="dos">OBLIGATIONS</li></a>
             <a class="section-tab" href="#filtres"><li class="subnav-item" id="tres">FILTRES</li></a>
             <a class="section-tab" href="#contact"><li class="subnav-item" id="cuatro">CONTACT</li></a>
           </ul>
          <div class="page" id="p1">
            <div id='calendar'></div>
          </div>
          <div class="page" id="p2">
            @include('components/partials/_list_obligations')
          </div>
          <div class="page" id="p3">
            @include('components/partials/_filtering')
          </div>
          <div class="page" id="p4">
            @include('components/partials/_contact')
          </div>
          <div class="page" id="p5">
            @include('components/partials/_list_events')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@include('components/_create_obligation')
@include('components/_update_obligation')
@endsection
@include('components/timeline')
