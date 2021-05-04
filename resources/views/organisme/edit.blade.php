@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Edition d'un organisme</h1>
  </nav>

  <div class="mainContent clearfix">
    <form method="post" action="{{ route('organisme_edit', $organisme) }}">
      @csrf
        <div class="form-group row">
          <label for="nom" class="col-2">Nom de l'organisme</label>
          <div class="col-4">
            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $organisme->nom }}" />
            @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="adresse" class="col-2">Adresse</label>
          <div class="col-4">
            <input type="text" class="form-control @error('adresse') is-invalid @enderror"" name="adresse" value="{{ $organisme->adresse }}" />
            @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="code_postal" class="col-2">Code postal</label>
          <div class="col-4">
            <input type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ $organisme->code_postal }}" />
            @error('code_postal')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="ville" class="col-2">Ville</label>
          <div class="col-4">
            <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ $organisme->ville }}" />
            @error('ville')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="telephone" class="col-2">Contact</label>
          <div class="col-4">
            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ $organisme->contact }}" />
            @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="telephone" class="col-2">Téléphone</label>
          <div class="col-4">
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $organisme->telephone }}" />
            @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-2">E-mail</label>
          <div class="col-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $organisme->email }}" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="site" class="col-2">Site internet</label>
          <div class="col-4">
            <input type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ $organisme->site }}" />
            @error('site')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="logo" class="col-2">Logo</label>
          <div class="col-3">
            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ $organisme->logo }}" accept="image/png, image/jpeg"/>
            @error('logo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="couleur" class="col-2">Couleur</label>
          <div class="col-1">
            <input type="color" class="form-control @error('couleur') is-invalid @enderror" name="couleur" value="{{ $organisme->couleur }}" />
            @error('couleur')
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
</div>
@endsection
