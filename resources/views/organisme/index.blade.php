@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Organismes destinataires</h1>
    <a href="{{ route('organisme_create') }}" class="btn btn-primary float-right"><i class="fas fa-plus">&nbsp;Ajouter un organisme</i></a>
  </nav>


  <div class="mainContent clearfix">
    @if (count($organismes) === 0)
    <p>
      <i>Aucun organisme créé</i>
    </p>
    @else
    <table class="table table-hover">
      <thead>
        <tr class="">
          <th class="col-1">ID</th>
          <th class="col-2">Logo</th>
          <th class="col-3">Organisme</th>
          <th class="col-3">Adresse</th>
          <th class="col-2">Contact</th>
          <th class="col-1">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
          @foreach($organismes as $organisme)
          <tr class="">
          <td>
            {{$organisme->id}}
          </td>
          <td>
            <img src="{{ asset($organisme->logo) }}" class="" height="25px" />
          </td>
          <td align="left">
            <i class="fas fa-circle" style="color: {{ $organisme->couleur }}"></i>&nbsp;<strong>{{$organisme->nom}}</strong>
          </td>
          <td align="left">
            {{$organisme->adresse}}<br />{{$organisme->code_postal}}&nbsp;{{$organisme->ville}}
          </td>
          <td align="left">
            <span class="fas fa-phone-square-alt"></span>&nbsp;{{$organisme->telephone}}<br /><span class="fas fa-envelope-square"></span>&nbsp;{{$organisme->email}}
          </td>
          <td>
            <a href="{{ route('organisme_edit', $organisme) }}"><i class="far fa-edit">&nbsp;</i>Modifier</a>
          </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
