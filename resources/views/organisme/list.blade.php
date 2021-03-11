@extends('admin/layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
  <h1 class="h3">Organisme</h1>
  <a href="{{ route('organisme_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
</div>
@if (count($organismes) === 0)
<p>
  <i>Aucun organisme créé</i>
</p>
@else
<table class="table table-hover">
  <thead>
    <tr class="evenement-content" style="text-align:center">
      <th class="col-md-auto">Identifiant</th>
      <th class="col-md-auto">Organisme</th>
      <th class="col-md-auto">Adresse</th>
      <th class="col-md-auto">Contact</th>
      <th class="col-md-auto">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($organismes as $organisme)
      <tr class="evenement-content" style="text-align:center">
      <td>
        {{$organisme->id}}
      </td>
      <td>
        <strong>{{$organisme->nom}}</strong>
      </td>
      <td>
        {{$organisme->adresse}} - {{$organisme->code_postal}}&nbsp;{{$organisme->ville}}
      </td>
      <td>
        <span class="fas fa-phone-square-alt"></span>&nbsp;{{$organisme->telephone}} - <span class="fas fa-envelope-square"></span>&nbsp;{{$organisme->email}}
      </td>
      <td>
        <a href="{{ route('organisme_edit', $organisme) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
@endsection
