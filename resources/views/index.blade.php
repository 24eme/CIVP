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

  <div class="row">
      @foreach($organismes as $organisme)
      <div id="image-{{$organisme->slug}}">
        <label class="image-checkbox mx-2 p-1" for="organisme{{$organisme->id}}">
          <img src="/images/logos/organismes/{{$organisme->logo}}" class="img-responsive" height="50px" />
        </label>
      </div>
      @endforeach
  </div>

  <div class="tab-content mt-4" id="nav-tabContent">
    <a type="button" class="btn btn-primary float-right my-3 mx-2" href="{{ route('export') }}"><i class="far fa-calendar-alt"></i> Exporter</a>
    <div class="tab-pane fade show active" id="nav-calendrier" role="tabpanel" aria-labelledby="nav-calendrier-tab">
      <div id='calendar' class="mainContent"></div>
        <h2 class="p-3">Obligations non-datées</h2>
        <div class="row">
          @foreach($obligationsNonDates as $obligation)
            <div class="col-sm-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$obligation->title}}</h5>
                  <a href="javascript:void(0)" class="btn btn-primary popupEvent" data-url="{{ route('evenement_popup', $obligation) }}">En savoir plus</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </div>
    <div class="tab-pane fade" id="nav-liste" role="tabpanel" aria-labelledby="nav-liste-tab">
      @include('partials/_list')
    @if (count($obligationsNonDates)>0)
    <div>
      <h2 class="h4 my-4">Obligations non datées</h2>
      <table class="table table-hover">
          @foreach($obligationsNonDates as $obligation)
            <tr class="row m-0">
              <td class="col-1">&nbsp</td>
              <td class="col-5">@if (!$obligation->active) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $obligation) }}"><strong>{{$obligation->title}}</strong><a></td>
              <td class="col-5">{!! $obligation->htmlOrganismesList() !!}</td>
              <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $obligation) }}"><i class="far fa-edit">&nbsp;</i></a> @endif</td>
            </tr>
          @endforeach
      </table>
    </div>
        </div>
    @endif
  </div>
</div>

@endsection
