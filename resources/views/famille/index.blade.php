@extends('admin/layout')

@section('content')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h3">Familles</h1>
  <a href="{{ route('famille_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
</div>
@if (count($familles) === 0)
<p>
  <i>Aucune famille créée</i>
</p>
@else
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="col-1">#</th>
      <th scope="col">Famille</th>
      <th scope="col">Couleur</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($familles as $famille)
      <tr>
      <td>
        {{$famille->id}}
      </td>
      <td>
        <strong>{{$famille->nom}}</strong>
      </td>
      <td>
        {{$famille->couleur}}
      </td>
      <td>
        <a href="{{ route('famille_edit', $famille) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
@endsection
