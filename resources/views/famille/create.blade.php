@extends('layoutAdmin')

@section('content')
<div class="container mt-5">
    <form method="post" action="{{ route('famille_create') }}">
      @csrf
        <div class="form-group">
          <label for="nom">Nom de la famille</label>
          <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" />
          @error('nom')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
          <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" class="form-control @error('couleur') is-invalid @enderror" name="couleur" />
            @error('couleur')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
