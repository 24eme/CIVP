@extends('admin/layout')
@section('content')
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
@if (count($evenements) === 0)
<p>
  <i>Aucun événements créé</i>
</p>
@else
<table class="table table-hover evenements-container">
  <thead>
    <tr class="evenement-content">
      <th class="col-md-auto">Identifiant</th>
      <th class="col-md-auto">Type</th>
      <th class="col-md-auto">Organisme</th>
      <th class="col-md-auto">Titre</th>
      <th class="col-md-auto"><i class="far fa-clock"></i> Date début</th>
      <th class="col-md-auto"><i class="far fa-clock"></i> Date fin</th>
      <th class="col-md-auto">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($evenements as $evenement)
      <tr class="evenement-content">
      <td style="text-align:center">
        {{$evenement->id}}
      </td>
      <td style="text-align:center">
        <i class="fas fa-circle" style="color:{{$evenement->type->color}}"></i>&nbsp;{{$evenement->type->nom}}
      </td>
      <td>
        {{$evenement->organisme->nom}}
      </td>
      <td>
        <a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong></a>
      </td>
      <td>
        {{$evenement->start}}
      </td>
      <td>
        {{$evenement->end}}
      </td>
      <td>
        <a href="{{ route('evenement_edit', $evenement) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
@endsection
