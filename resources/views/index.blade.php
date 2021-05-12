@extends('layout')
@section('content')
<style type="text/css">
@foreach($organismes as $organisme)
#image-{{$organisme->slug}} .image-checkbox-checked {
  border-color: {{$organisme->couleur}} !important;
}
@endforeach
</style>
@include('partials/_sideNav')

<div id="main" class="main col-10">

  <nav>
    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
      <a class="nav-link active" id="nav-calendrier-tab" data-toggle="tab" href="#nav-calendrier" role="tab" aria-controls="nav-calendrier" aria-selected="true"><i class="far fa-calendar-alt"></i> Calendrier</a>
      <a class="nav-link" id="nav-liste-tab" data-toggle="tab" href="#nav-liste" role="tab" aria-controls="nav-liste" aria-selected="false"><i class="fas fa-list-ul"></i> Liste</a>
    </div>
  </nav>

  <div class="tab-content mt-4" id="nav-tabContent">


  <div class="row">
    <div id="organismes-filter" class="col-12 text-center">
      @foreach($organismes as $organisme)
      <div id="image-{{$organisme->slug}}" class="d-inline">
        <label class="image-checkbox mx-2 p-1" for="organisme{{$organisme->id}}">
          <img src="/images/logos/organismes/{{$organisme->logo}}" class="img-responsive" height="45px" title="{{$organisme->nom}}" />
        </label>
      </div>
      @endforeach
    </div>
  </div>

    <a type="button" class="btn btn-primary float-right my-3 mx-2" href="{{ route('export') }}"><i class="far fa-calendar-alt"></i> Exporter</a>
    <div class="tab-pane fade show active" id="nav-calendrier" role="tabpanel" aria-labelledby="nav-calendrier-tab">
      <div id='calendar' class="mainContent"></div>
    </div>
    <div class="tab-pane fade" id="nav-liste" role="tabpanel" aria-labelledby="nav-liste-tab">
      @include('partials/_list')
    </div>
    <div id="nav-listenondates">
      @include('partials/_listNonDates')
    </div>
  </div>

</div>

@endsection
