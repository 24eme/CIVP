@extends('layout')
@include('components/calendar')
@section('content')
    @include('components/_sideNav')
    <div id="main">
      <div id='calendar'></div>
    </div>
@endsection
@include('components/timeline')
