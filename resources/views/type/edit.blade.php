@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Edition type</h1>
  </nav>

  <div class="mainContent clearfix">
    <form method="post" action="{{ route('type_edit', $type) }}">
      @csrf
      <div class="form-group row">
        <label for="name" class="col-2">Nom du type d'évènement</label>
        <div class="col-sm-4">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $type->name }}" />
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <a href="{{ route('types') }}" class="btn btn-secondary float-left">Retour</a>
        </div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i>&nbsp;Valider</button>
        </div>
      </div>
    </form>
</div>

@endsection
