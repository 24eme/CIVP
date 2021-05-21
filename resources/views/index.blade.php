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
      <a class="nav-link" id="nav-liste-tab" data-toggle="tab" href="#nav-liste" role="tab" aria-controls="nav-liste" aria-selected="false"><i class="fas fa-list-ul"></i> Liste des déclarations</a>
    </div>
  </nav>

  <div class="tab-content mt-4" id="nav-tabContent">

  <p class="m-0 small text-center">
  Les informations relatives aux différentes déclarations ne sont données qu'à titre indicatif et ne sauraient être considérées comme constituant une garantie de l'exhaustivité et de la conformité des obligations déclaratives présentées à travers ce service en ligne.<br />Le Conseil Interprofessionnel des Vins de Provence (CIVP), éditeur de ce service, ne pourra en aucun cas être tenu responsable des préjudices ou dommages liés à l'utilisation des informations disponibles sur son site, qu’il s’agisse ou non d'une négligence de sa part.
  </p>
  <div class="row">
    <div id="organismes-filter" class="col-12 text-center pt-3">
    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      Filtrer par organisme <span id="counterOrga"></span>
    </button>
    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton">
      @foreach($organismes as $organisme)
      <div id="image-{{$organisme->slug}}" class="d-inline">
        <label class="image-checkbox mx-2 p-1 text-center" for="organisme{{$organisme->id}}">
          <a class="dropdown-item"><img src="/images/logos/organismes/{{$organisme->logo}}" class="img-responsive" height="45px" title="{{$organisme->nom}}" /></a>
          <i class="fas fa-circle" style="color: {{$organisme->couleur}}"></i>&nbsp;{{$organisme->nom}}
        </label>
      </div>
      @endforeach
    </div>
    </div>
    </div>
  </div>

    <a type="button" class="btn btn-primary float-right my-3 mx-2" href="{{ route('export') }}" style="z-index:4;position:relative;"><i class="far fa-calendar-alt"></i> Exporter</a>
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
