@extends('layout')
@section('content')
<style type="text/css">
@foreach($organismes as $organisme)
.custom-control-input-{{$organisme->slug}}:checked ~ .custom-control-label-{{$organisme->slug}}::before ,
.custom-control-input-{{$organisme->slug}}:active ~ .custom-control-label-{{$organisme->slug}}::before {
    background-color: {{$organisme->couleur}};
    border-color: {{$organisme->couleur}};
}
@endforeach
</style>
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-link active" id="nav-calendrier-tab" data-toggle="tab" href="#nav-calendrier" role="tab" aria-controls="nav-calendrier" aria-selected="true">Calendrier</a>
      <a class="nav-link" id="nav-liste-tab" data-toggle="tab" href="#nav-liste" role="tab" aria-controls="nav-liste" aria-selected="false">Liste</a>
    </div>
  </nav>
  <div class="tab-content mt-4" id="nav-tabContent">
    <a type="button" class="btn btn-primary float-right my-3 mx-2" href="{{ route('export') }}">Export Ical</a>
    <div class="tab-pane fade show active" id="nav-calendrier" role="tabpanel" aria-labelledby="nav-calendrier-tab">
      <div id='calendar' class="mainContent"></div>
    </div>
    <div class="tab-pane fade" id="nav-liste" role="tabpanel" aria-labelledby="nav-liste-tab">
      @include('partials/_list')
    </div>
    @if (count($evenementsNonDates)>0)
    <div>
      <h2 class="h4 my-4">Obligations non datées</h2>
      <table class="table table-hover">
          @foreach($evenementsNonDates as $evenement)
            <tr class="row m-0">
              <td class="col-1">&nbsp</td>
              <td class="col-5">@if (!$evenement->active) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong><a></td>
              <td class="col-5">{!! $evenement->htmlOrganismesList() !!}</td>
              <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $evenement) }}"><i class="far fa-edit">&nbsp;</i></a> @endif</td>
            </tr>
          @endforeach
      </table>
    </div>
    @endif
  </div>
</div>

@endsection
