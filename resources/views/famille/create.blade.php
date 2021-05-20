@extends('admin/layout')

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
        <div class="form-group row">
          <label for="description" class="col-2">Description</label>
          <div class="col-4">
            <textarea class="form-control" rows="3" name="description"></textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
