@extends('layoutContent')
@section('content')

<form class="form-signin mt-5" method="post" action="{{ route('authenticate') }}">
  @csrf
  <img class="mb-4" src="{{asset('images/logos/logo-C.png')}}" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Administration</h1>
  <div class="form-group mb-3">
    <label for="email" class="sr-only">Email</label>
    <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus />
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="password" class="sr-only">Mot de passe</label>
    <input name="password" type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" required />
    @error('password')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" name="remember" value="1" /> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
</form>

@endsection
