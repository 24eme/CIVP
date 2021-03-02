@extends('layoutAdmin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h3">Profils</h1>
  <a href="{{ route('profil_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
</div>
@if (count($profils) === 0)
<p>
  <i>Aucun profil créé</i>
</p>
@else
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="col-1">#</th>
      <th scope="col">Profil</th>
      <th scope="col">Couleur</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($profils as $profil)
      <tr>
      <td>
        {{$profil->id}}
      </td>
      <td>
        <strong>{{$profil->nom}}</strong>
      </td>
      <td>
        {{$profil->couleur}}
      </td>
      <td>
        <a href="{{ route('profil_edit', $profil) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
@endsection
