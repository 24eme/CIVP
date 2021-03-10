@extends('admin/layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3">
  <h1 class="h3">Evènements</h1>
  <a href="{{ route('evenement_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
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
      <th class="col-md-auto">Profil</th>
      <th class="col-md-auto">Organisme</th>
      <th class="col-md-auto">Titre</th>
      <th class="col-md-auto"><i class="far fa-clock"></i> Date début</th>
      <th class="col-md-auto"><i class="far fa-clock"></i> Date fin</th>
      <th class="col-md-auto">&nbsp;</th>
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
        <i class="fas fa-circle" style="color:{{$evenement->profil->color}}"></i>&nbsp;{{$evenement->profil->nom}}
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
@include('components/popup')
@endif 
@endsection
