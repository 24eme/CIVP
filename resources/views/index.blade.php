@extends('layout')
@include('components/calendar')
@section('content')
      @include('components/partials/_sideNav')
      @include('components/partials/_list_events')
    <div id="main">
      <div id='calendar'></div>
      @include('components/_create_obligation')
      @include('components/_update_obligation')
    </div>
@endsection
@include('components/timeline')
