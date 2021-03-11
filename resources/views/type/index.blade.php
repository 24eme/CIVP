@extends('admin/layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h3">Types</h1>
  <a href="{{ route('type_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouveau</i></a>
</div>
@if (count($types) === 0)
<p>
  <i>Aucun type créé</i>
</p>
@else
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="col-1">#</th>
      <th scope="col">Type</th>
      <th scope="col">Couleur</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($types as $type)
      <tr>
      <td>
        {{$type->id}}
      </td>
      <td>
        <strong>{{$type->nom}}</strong>
      </td>
      <td>
        <i class="fas fa-circle" style="color: {{$type->couleur}}"></i>&nbsp;{{$type->couleur}}
      </td>
      <td>
        <a href="{{ route('type_edit', $type) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
@endsection
