@extends('layoutAdmin')

@section('content')
<div class="container mt-5">
    <form method="post" action="{{ route('organismes_create') }}">
      @csrf
        <div class="form-group">
          <label for="nom">Nom de l'organisme</label>
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" />
          @error('nom')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" />
            @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-3">
                <div class="form-group">
                  <label for="code_postal">Code postal</label>
                  <input type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" />
                  @error('code_postal')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="col-9">
                  <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" />
                    @error('ville')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
          </div>
          <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" />
            @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
