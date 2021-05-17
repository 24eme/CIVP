@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Types de déclaration</h1>
  </nav>

  <div class="mainContent clearfix">
    @if (count($types) === 0)
    <p>
      <i>Aucun type créé</i>
    </p>
    @else
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" class="col-1">ID</th>
          <th scope="col" class="col-10">Type</th>
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
            <strong>{{$type->name}}</strong>
          </td>
          <td>
            <a href="{{ route('type_edit', $type) }}"><i class="far fa-edit">&nbsp;</i>Modifier</a>
          </td>
          </tr>
          @endforeach
      </tbody>
    </table>
@endif
</div>
</div>
@endsection
