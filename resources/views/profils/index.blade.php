@extends('layoutAdmin')

@section('content')
<a href="{{ route('profils_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau profil</i></a>
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
        <a href="{{ route('profils_edit', $profil) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      @endforeach
  </tbody>
</table>
@endsection
