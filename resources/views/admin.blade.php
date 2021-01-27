@extends('layout')
@include('components/calendar')
@section('content')
      @include('components/partials/_admin-nav')
      @include('components/partials/_list_events')
    <div id="main">
      <ul class="subnav">
        <li class="subnav-item"><a class="section-tab" href="#obligations" onclick="openSection(event,'LObligation')">OBLIGATIONS</a></li>
        <li class="subnav-item active"><a class="section-tab" href="#calendrier" onclick="openSection(event,'calendar')">CALENDRIER</a></li>
        <li class="subnav-item"><a class="section-tab" href="#filtres" onclick="openSection(event,'Filtres')">FILTRES</a></li>
        <li class="subnav-item"><a class="section-tab" href="#contact" onclick="openSection(event,'Contact')">CONTACT</a></li>
      </ul>
      <div id='calendar'></div>
      @include('components/_create_obligation')
      @include('components/_update_obligation')
    </div>
@endsection
@include('components/timeline')
