@extends('layout')
@include('components/calendar')
@section('content')
      @include('components/partials/_admin-nav')
    <div id="main">
      @include('components/partials/_list_obligations') 
    </div>
@endsection
