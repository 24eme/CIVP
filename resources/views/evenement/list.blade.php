@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3">
    <h1 class="h3">Evènements</h1>
    <a href="{{ route('evenement_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
  </div>
  <div id="LObligations" class="row section-content listed-container mb-3">
    <div class="col-md-3 mx-auto download_csv">
      <form class="" action="{{route('importCSV')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mx-auto btn-import">
          <label id="csv_label" for="csv_input">Importer un fichier CSV<i class="fas fa-cloud-download-alt"></i></label>
          <input id="csv_input" type="file"  name="csv_file" onchange="form.submit()">
        </div>
      </form>
    </div>
  </div>
  @include('partials/_list')
</div>
@endsection
