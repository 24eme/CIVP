@extends('layoutAdmin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 my-3 border-bottom">
  <h1 class="h4">Ajout d'un événement</h1>
</div>
<div class="container mt-5">
    <form method="post" action="{{ route('evenement_create') }}">
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
              <option value="{{$organisme->id}}">{{$organisme->nom}}</option>
            @endforeach
          </select>
          @error('organisme_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="title">Titre</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" />
          @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label>Familles</label>
          <div>
            @foreach($familles as $famille)
            <div class="form-check form-check-inline">
              <input name="familles[]" class="form-check-input @error('familles') is-invalid @enderror" id="famille-{{ $famille->id }}" type="checkbox" value="{{ $famille->id }}">
              <label class="form-check-label" for="famille-{{ $famille->id }}">{{ $famille->nom }}</label>
            </div>
            @endforeach
            @error('familles')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" rows="3" name="description"></textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="start">Date début</label>
          <input type="text" class="form-control @error('start') is-invalid @enderror" name="start" />
          @error('start')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="end">Date de fin</label>
          <input type="text" class="form-control @error('end') is-invalid @enderror" name="end" />
          @error('end')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="textdeloi">Texte de loi</label>
          <input type="text" class="form-control @error('textdeloi') is-invalid @enderror" name="textdeloi" />
          @error('textdeloi')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="liendeclaration">Lien de télédéclaration</label>
          <input type="text" class="form-control @error('liendeclaration') is-invalid @enderror" name="liendeclaration" />
          @error('liendeclaration')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="tags">Tags</label>
          <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" />
          @error('tags')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection
