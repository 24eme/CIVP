@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Edition d'une déclaration</h1>
  </nav>

  <div class="mainContent clearfix">
  <form method="post" action="{{ route('evenement_edit', $evenement) }}">
    @csrf
      <div class="form-group row">
        <label for="type_id" class="col-2">Edition d'une déclaration</label>
        <div class="col-4">
          <select class="form-control @error('type_id') is-invalid @enderror" name="type_id">
            @foreach($types as $type)
              <option value="{{$type->id}}"@if($type->id == $evenement->type_id) selected="selected" @endif>{{$type->name}}</option>
            @endforeach
          </select>
          @error('type_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="familles" class="col-2">Familles viti/vinicoles</label>
        <div class="col-4">
          @foreach($familles as $famille)
          <div class="form-check form-check-inline">
            <input name="familles[]"@if($evenement->familles->contains($famille->id)) checked="checked" @endif class="form-check-input @error('familles') is-invalid @enderror" id="famille-{{ $famille->id }}" type="checkbox" value="{{ $famille->id }}">
            <label class="form-check-label" for="famille-{{ $famille->id }}">{{ $famille->nom }}</label>
          </div>
          @endforeach
          @error('familles')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <p class="text-right primary-link"><a href="{{ route('familles') }}">Gérer les familles</a></p>
        </div>
      </div>
      <div class="form-group row">
        <label for="start" class="col-2">Date début</label>
        <div class="col-4">
          <input type="date" min="2000-01-01" max="2100-12-31" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ $evenement->start }}" />
          @error('start')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="end" class="col-2">Date de fin</label>
        <div class="col-4">
          <input type="date" min="2000-01-01" max="2100-12-31" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ $evenement->end }}" />
          @error('end')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="title" class="col-2">Titre</label>
        <div class="col-4">
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $evenement->title }}" />
          @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-2">Description</label>
        <div class="col-4">
          <textarea id="editor" class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{ $evenement->description }}</textarea>
          @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="organismes" class="col-2">Organismes destinataires</label>
        <div class="col-4">
          @foreach($organismes as $organisme)
          <div class="form-check form-check-inline">
            <input name="organismes[]"@if($evenement->organismes->contains($organisme->id)) checked="checked" @endif class="form-check-input @error('organismes') is-invalid @enderror" id="organisme-{{ $organisme->id }}" type="checkbox" value="{{ $organisme->id }}">
            <label class="form-check-label" for="organisme-{{ $organisme->id }}">{{ $organisme->nom }}</label>
          </div>
          @endforeach
          @error('organismes')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          <p class="text-right primary-link"><a href="{{ route('organismes') }}">Gérer les organismes</a></p>
        </div>
      </div>
      <div class="form-group row">
        <label for="textdeloi" class="col-2">Texte de loi</label>
        <div class="col-4">
          <input type="text" class="form-control @error('textdeloi') is-invalid @enderror" name="textdeloi" value="{{ $evenement->textdeloi }}" />
          @error('textdeloi')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="liendeclaration" class="col-2">Lien de télédéclaration</label>
        <div class="col-4">
          <input type="text" class="form-control @error('liendeclaration') is-invalid @enderror" name="liendeclaration" value="{{ $evenement->liendeclaration }}" />
          @error('liendeclaration')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="tags" class="col-2">Mots-Clés  <small>(séparés par des virgules)</small></label>
        <div class="col-4">
          <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $evenement->strTags() }}" />
          @error('tags')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="rrule" class="col-2">Récurrence <small>(sur 1 année glissante)</small></label>
        <div class="col-4">
          <select class="form-control @error('rrule') is-invalid @enderror" name="rrule">
              <option value="">Aucune</option>
              <option value="mensuel"@if($evenement->rrule == 'mensuel') selected="selected" @endif>Tous les mois</option>
              <option value="trimestriel"@if($evenement->rrule == 'trimestriel') selected="selected" @endif>Tous les 3 mois</option>
              <option value="semestriel"@if($evenement->rrule == 'semestriel') selected="selected" @endif>Tous les 6 mois</option>
              <option value="annuel"@if($evenement->rrule == 'annuel') selected="selected" @endif>Tous les ans</option>
          </select>
          @error('rrule')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label class="col-2">&nbsp;</label>
        <div class="col-4">
          <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input @error('active') is-invalid @enderror" name="active" id="active" value="1"@if($evenement->active) checked="checked" @endif />
            <label for="active">Actif</label>
          </div>
          @error('active')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
          <a href="{{ route('index') }}" class="btn btn-secondary float-left">Retour</a>
        </div>
        <div class="col-sm-2 text-center text-muted">
            <a href="{{ route('evenement_delete', $evenement) }}" onclick="return confirm('Etes vous sûr de vouloir supprimer cette déclaration ?')">[x] Supprimer</a>
        </div>
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i>&nbsp;Valider</button>
        </div>
      </div>
  </form>
</div>

@endsection
