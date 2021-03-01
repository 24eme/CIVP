@extends('layoutAdmin')

@section('content')
<h1 class="pb-4">
  Listing des obligations
  <a href="{{route('addObligation')}}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Ajouter une obligation</i></a>
</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col-1" class="col-1">#</th>
      <th scope="col">Titre</th>
      <th scope="col" class="col-1">Début</th>
      <th scope="col" class="col-1">Fin</th>
      <th scope="col" class="col-1">Statut</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  @foreach($obligations as $obligation)
  <tr>
    <th scope="row">{{ $obligation->id }}</th>
    <td>{{ $obligation->title }}</td>
    <td>{{ $obligation->start }}</td>
    <td>{{ $obligation->end }}</td>
    <td>
      <span class="active_dot"></span><p class="active_text">active</p>
    </td>
    <td>
      <a href="#"><i class="far fa-edit"></i></a>
    </td>
  </tr>
@endforeach

@endsection
