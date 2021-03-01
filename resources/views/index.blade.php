@extends('layout')
@include('calendar/calendar')
@section('content')

<div id='calendar'></div>

<div class="modal fade" id="popupEvenement" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"></div>

@endsection
