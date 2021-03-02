@extends('layoutAdmin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
  <h1 class="h4">Edition d'un événement</h1>
</div>
<div class="container mt-5">
    <form method="post" action="{{ route('evenement_edit', $evenement) }}">
      @csrf
        <div class="form-group">
          <label for="profil_id">Profil</label>
          <select class="form-control @error('profil_id') is-invalid @enderror" name="profil_id">
            @foreach($profils as $profil)
              <option value="{{$profil->id}}" @if($profil->id == $evenement->profil_id) selected="selected" @endif>{{$profil->nom}}</option>
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
              <option value="{{$organisme->id}}" @if($organisme->id == $evenement->organisme_id) selected="selected" @endif>{{$organisme->nom}}</option>
            @endforeach
          </select>
          @error('organisme_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="titre">Titre</label>
          <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ $evenement->titre }}" />
          @error('titre')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="titre">Description</label>
          <textarea class="form-control" rows="3" name="description">{{ $evenement->description }}</textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Familles</label>
          <div>
            @foreach($familles as $famille)
            <div class="form-check form-check-inline">
              <input name="familles[]" @if($evenement->familles->contains($famille->id)) checked="checked" @endif class="form-check-input @error('familles') is-invalid @enderror" id="famille-{{ $famille->id }}" type="checkbox" value="{{ $famille->id }}">
              <label class="form-check-label" for="famille-{{ $famille->id }}">{{ $famille->nom }}</label>
            </div>
            @endforeach
            @error('familles')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="date_debut">Date début</label>
          <input type="text" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ $evenement->date_debut }}" />
          @error('date_debut')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="date_fin">Date de fin</label>
          <input type="text" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ $evenement->date_fin }}" />
          @error('date_fin')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="date_fin">Tags</label>
          <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $evenement->strTags() }}" />
          @error('tags')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
