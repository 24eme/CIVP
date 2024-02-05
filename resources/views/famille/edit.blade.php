@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Edition famille</h1>
  </nav>

  <div class="mainContent clearfix">

    <form method="post" action="{{ route('famille_edit', $famille) }}">
      @csrf
        <div class="form-group row">
          <label for="nom" class="col-2">Nom de la famille</label>
          <div class="col-sm-4">
            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $famille->nom }}" />
            @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-2">Description</label>
          <div class="col-4">
            <textarea class="form-control" rows="3" name="description">{{ $famille->description }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <a href="{{ route('familles') }}" class="btn btn-secondary float-left">Retour</a>
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i>&nbsp;Valider</button>
          </div>
        </div>
    </form>
    </div>
  </div>
@endsection
