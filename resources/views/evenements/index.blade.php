@extends('layoutAdmin')

@section('content')
<a href="{{ route('evenements_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouvel événement</i></a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="col-1">#</th>
      <th scope="col">Profil</th>
      <th scope="col">Organisme</th>
      <th scope="col">Titre</th>
      <th scope="col">Date début</th>
      <th scope="col">Date fin</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($evenements as $evenement)
      <td>
        {{$evenement->id}}
      </td>
      <td>
        {{$evenement->profil->nom}}
      </td>
      <td>
        {{$evenement->organisme->nom}}
      </td>
      <td>
        <strong>{{$evenement->titre}}</strong>
      </td>
      <td>
        {{$evenement->date_debut}}
      </td>
      <td>
        {{$evenement->date_fin}}
      </td>
      <td>
        <a href="{{ route('evenements_edit', $evenements) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      @endforeach
  </tbody>
</table>
@endsection
