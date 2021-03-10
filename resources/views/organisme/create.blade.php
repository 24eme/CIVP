@extends('admin/layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h4">Ajout d'un organisme</h1>
</div>
<div class="container mt-5">
    <form method="post" action="{{ route('organisme_create') }}">
      @csrf
        <div class="form-group">
          <label for="nom">Nom de l'organisme</label>
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', $post->nom ?? '') }}" />
          @error('nom')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse', $post->adresse ?? '') }}" />
            @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-3">
                <div class="form-group">
                  <label for="code_postal">Code postal</label>
                  <input type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal', $post->code_postal ?? '') }}" />
                  @error('code_postal')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="col-9">
                  <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville', $post->ville ?? '') }}" />
                    @error('ville')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
          </div>
          <div class="form-group">
            <label for="telephone">Contact</label>
            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact', $post->contact ?? '') }}" />
            @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone', $post->telephone ?? '') }}" />
            @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $post->email ?? '') }}" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
