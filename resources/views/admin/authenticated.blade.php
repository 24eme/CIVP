@extends('layout')
@section('content')

<div class="form-signin mt-5">
  <img class="mb-4" src="{{asset('images/logos/logo-C.png')}}" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Administration</h1>
  <p>Bonjour <strong>{{ $user->name }}</strong>,</p>
  <p>Vous êtes actuellement connecté en tant qu'admin.</p>
  <div class="row text-center d-block">
    <a class="btn btn-lg btn-outline-secondary col-5 mr-1" href="{{ route('index') }}">Retour</a>
    <a class="btn btn-lg btn-primary btn- col-5 mt-0 ml-1" href="{{ route('logout') }}">Déconnexion</a>
  </div>
</div>

@endsection
