@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Familles viti/vinicoles</h1>
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
    @if (count($familles) === 0)
    <p>
      <i>Aucune famille créée</i>
    </p>
    @else
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" class="col-1">ID</th>
          <th scope="col" class="col-10">Famille</th>
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
            <a href="{{ route('famille_edit', $famille) }}"><i class="far fa-edit">&nbsp;</i></a>
          </td>
          </tr>
          @endforeach
      </tbody>
    </table>
@endif
</div>
</div>
@endsection
