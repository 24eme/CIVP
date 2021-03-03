@extends('layoutAdmin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
    <tr>
      <th scope="col" class="col-1">#</th>
      <th scope="col">Organisme</th>
      <th scope="col">Adresse</th>
      <th scope="col">Contact</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($organismes as $organisme)
      <tr>
      <td>
        {{$organisme->id}}
      </td>
      <td>
        <strong>{{$organisme->nom}}</strong>
      </td>
      <td>
        {{$organisme->adresse}}<br />{{$organisme->code_postal}}&nbsp;{{$organisme->ville}}
      </td>
      <td>
        <span class="fas fa-phone-square-alt"></span>&nbsp;{{$organisme->telephone}}<br /><span class="fas fa-envelope-square"></span>&nbsp;{{$organisme->email}}
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
