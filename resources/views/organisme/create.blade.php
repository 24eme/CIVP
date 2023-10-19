@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Création d'un organisme</h1>
  </nav>

  <div class="mainContent clearfix">
    <form method="post" action="{{ route('organisme_create') }}" enctype="multipart/form-data">
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
        <div class="form-group row">
          <label for="site" class="col-2">Site internet</label>
          <div class="col-4">
            <input type="text" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ old('site', $post->site ?? '') }}" />
            @error('site')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="logo" class="col-2">Logo</label>
          <div class="col-3">
            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo', $post->logo ?? '') }}" accept="image/png, image/jpeg" />
            @error('logo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="couleur" class="col-2">Couleur</label>
          <div class="col-1">
            <input type="color" class="form-control @error('couleur') is-invalid @enderror" name="couleur" value="{{ old('couleur', $post->couleur ?? '') }}" />
            @error('couleur')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2">&nbsp;</label>
          <div class="col-4">
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input @error('visible_filtre') is-invalid @enderror" name="visible_filtre" id="visible_filtre" value="1" />
              <label for="visible_filtre">Visible dans les filtres</label>
            </div>
            @error('visible_filtre')
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
