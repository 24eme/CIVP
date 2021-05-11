@extends('layout')
@section('content')
@include('partials/_sideNav')
<div id="main" class="main col-10">
  <nav class="mt-4 clearfix">
    <h1 class="h3 col-md-auto float-left">Création d'un évènement</h1>
  </nav>

  <div class="mainContent clearfix">
    <form method="post" action="{{ route('evenement_create') }}">
      @csrf
        <div class="form-group row">
          <label for="type_id" class="col-2">Type d'évènement</label>
          <div class="col-4">
            <select class="form-control @error('type_id') is-invalid @enderror" name="type_id">
              @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
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
              <input name="familles[]" class="form-check-input @error('familles') is-invalid @enderror" id="famille-{{ $famille->id }}" type="checkbox" value="{{ $famille->id }}">
              <label class="form-check-label" for="famille-{{ $famille->id }}">{{ $famille->nom }}</label>
            </div>
            @endforeach
            @error('familles')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="start" class="col-2">Date début</label>
          <div class="col-4">
            <input type="date" min="2000-01-01" max="2100-12-31" class="form-control @error('start') is-invalid @enderror" name="start" />
            @error('start')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="end" class="col-2">Date de fin</label>
          <div class="col-4">
            <input type="date" min="2000-01-01" max="2100-12-31" class="form-control @error('end') is-invalid @enderror" name="end" />
            @error('end')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-2">Titre</label>
          <div class="col-4">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" />
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-2">Description</label>
          <div class="col-4">
            <textarea id="editor" class="form-control" rows="3" name="description"></textarea>
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
              <input name="organismes[]" class="form-check-input @error('organismes') is-invalid @enderror" id="organisme-{{ $organisme->id }}" type="checkbox" value="{{ $organisme->id }}">
              <label class="form-check-label" for="organisme-{{ $organisme->id }}">{{ $organisme->nom }}</label>
            </div>
            @endforeach
            @error('organismes')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="textdeloi" class="col-2">Texte de loi</label>
          <div class="col-4">
            <input type="text" class="form-control @error('textdeloi') is-invalid @enderror" name="textdeloi" />
            @error('textdeloi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="liendeclaration" class="col-2">Lien de télédéclaration</label>
          <div class="col-4">
            <input type="text" class="form-control @error('liendeclaration') is-invalid @enderror" name="liendeclaration" />
            @error('liendeclaration')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="tags" class="col-2">Tags <small>(séparés par des virgules)</small></label>
          <div class="col-4">
            <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" />
            @error('tags')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="rrule" class="col-2">Récurrence <small>(sur 5 ans)</small></label>
          <div class="col-4">
            <select class="form-control @error('rrule') is-invalid @enderror" name="rrule">
                <option value="">Aucune</option>
                <option value="mensuel">Tous les mois</option>
                <option value="semestriel">Tous les 6 mois</option>
                <option value="annuel">Tous les ans</option>
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
              <input type="checkbox" class="form-check-input @error('active') is-invalid @enderror" name="active" id="active" checked="checked" value="1" />
              <label for="active">Actif</label>
            </div>
            @error('active')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <a href="{{ route('index') }}#nav-liste" class="btn btn-secondary float-left">Retour</a>
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i>&nbsp;Valider</button>
          </div>
        </div>
    </form>
</div>

@endsection
