@extends('layout')
@include('components/calendar')
@section('content')
      @include('components/_admin-dash')
    <div id="main">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCObligation"></button>
      <div id='calendar'></div>
      @include('components/_create_obligation')
    </div>
@endsection
@include('components/timeline')
