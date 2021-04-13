@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Organismes destinaires</h1>
    <div class="col-md-auto float-right">
      @if($user)
      <div class="btn-group">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>&nbsp;{{ $user->name }}
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a>
        </div>
      </div>
      @endif
    </div>
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
            <img src="/images/logos/organismes/{{$organisme->logo}}" class="" height="25px" />
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
            <a href="{{ route('organisme_edit', $organisme) }}"><i class="far fa-edit">&nbsp;</i></a>
          </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <a href="{{ route('organisme_create') }}" class="btn btn-primary float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
    @endif
  </div>
</div>
@endsection
