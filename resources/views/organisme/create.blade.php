@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Création d'un organisme</h1>
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
    <form method="post" action="{{ route('organisme_create') }}">
      @csrf
        <div class="form-group row">
          <label for="nom" class="col-2">Nom de l'organisme</label>
          <div class="col-4">
            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $post->nom ?? '') }}" />
            @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="adresse" class="col-2">Adresse</label>
          <div class="col-4">
            <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse', $post->adresse ?? '') }}" />
            @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="code_postal" class="col-2">Code postal</label>
          <div class="col-4">
            <input type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal', $post->code_postal ?? '') }}" />
            @error('code_postal')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="ville" class="col-2">Ville</label>
          <div class="col-4">
            <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville', $post->ville ?? '') }}" />
            @error('ville')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="contact" class="col-2">Contact</label>
          <div class="col-4">
            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact', $post->contact ?? '') }}" />
            @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="telephone" class="col-2">Téléphone</label>
          <div class="col-4">
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone', $post->telephone ?? '') }}" />
            @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-2">E-mail</label>
          <div class="col-4">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $post->email ?? '') }}" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <a href="{{ route('organismes') }}" class="btn btn-secondary float-left">Retour</a>
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i>&nbsp;Valider</button>
          </div>
        </div>
    </form>
</div>

@endsection
