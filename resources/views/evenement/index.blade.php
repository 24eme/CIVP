@extends('layoutAdmin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3">
  <h1 class="h3">Evénements</h1>
  <a href="{{ route('evenement_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
</div>
@if (count($evenements) === 0)
<p>
  <i>Aucun événements créé</i>
</p>
@else
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
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($evenements as $evenement)
      <tr>
      <td>
        {{$evenement->id}}
      </td>
      <td>
        <i class="fas fa-circle" style="color: {{$evenement->profil->couleur}}"></i>&nbsp;{{$evenement->profil->nom}}
      </td>
      <td>
        {{$evenement->organisme->nom}}
      </td>
      <td>
        <strong>{{$evenement->title}}</strong>
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
      <td>
        <a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><i class="far fa-eye">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
@include('layout/popup')
@endif
@endsection