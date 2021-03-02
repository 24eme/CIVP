@extends('layoutAdmin')

@section('content')
<div class="container mt-5">
    <form method="post" action="{{ route('evenements_create') }}">
      @csrf
        <div class="form-group">
          <label for="profil_id">Profil</label>
          <select class="form-control @error('profil_id') is-invalid @enderror" name="profil_id">
            @foreach($profils as $profil)
              <option value="{{$profil->id}}">{{$profil->nom}}</option>
            @endforeach
          </select>
          @error('profil_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="organisme_id">Organisme</label>
          <select class="form-control @error('organisme_id') is-invalid @enderror" name="organisme_id">
            @foreach($organismes as $organisme)
              <option value="{{$profil->id}}">{{$organisme->nom}}</option>
            @endforeach
          </select>
          @error('organisme_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" />
          @error('titre')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="titre">Description</label>
          <textarea class="form-control" rows="3" name="description"></textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="date_debut">Date début</label>
          <input type="text" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" />
          @error('date_debut')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="date_fin">Date de fin</label>
          <input type="text" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" />
          @error('date_fin')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
