<div class="modal-dialog modal-lg">
  <div class="modal-content">

    <div class="modal-header" style="display:inline-block;border-bottom:none;">
        <div class="row">
          <div class="col-md-2 text-center">
              <button class="btn btn-md btn-block btn-outline-secondary">{{$evenement->type->name}}</button>
          </div>
          <div class="col-md-8">
            <h4 class="modal-title">{{ $evenement->title }}</h4>
          </div>
          <div class="col-md-2 text-right">
            @if(Auth::check())
              @if (Auth::user()->isAdmin() == 1)
                <a href="{{ route('evenement_edit', $evenement) }}"><i class="far fa-edit">&nbsp;</i>Modifier</a>
              @endif
            @endif
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">&nbsp;</div>
          <div class="col-md-8">
              <i class="far fa-calendar-alt"></i>&nbsp;
            @if ($evenement->rrule != null)
                Déclaration récurrente
            @else
                <strong>{{ \Carbon\Carbon::parse($evenement->start)->translatedFormat('l d F Y') }}</strong>
                @if ($evenement->start != $evenement->end)
                au <strong>{{ \Carbon\Carbon::parse($evenement->end)->translatedFormat('l d F Y') }}</strong>
                @endif
            @endif
          </div>
          <div class="col-md-2">&nbsp;</div>
        </div>

    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-2">
          <label class="popup-label" for="">Famille(s)</label>
        </div>
        <div class="col-10 row">
          {{ $evenement->strFamilles() }}
        </div>
      </div>

      <div class="row">

        <div class="col-7">
            <p class="mt-4 mb-0">
              <strong>Information</strong>
            </p>
            {!! $evenement->description !!}
        </div>

        <div class="col-5">
          @foreach($evenement->organismes as $organisme)
          <div class="organisme-card my-1 p-1 ml-4">
            <div class="col-12 pb-2">
              <img src="/images/logos/organismes/{{$organisme->logo}}" class="" height="20px" /> <i class="fas fa-circle" style="color: {{ $organisme->couleur }}"></i>&nbsp;<strong>{{$organisme->nom}}</strong>
            </div>
            <div class="col-12 pb-2">
              {{$organisme->adresse}}<br />{{$organisme->code_postal}} {{$organisme->ville}}
            </div>
            @if($organisme->contact)
            <div class="col-12 pb-1">
              <strong>{{$organisme->contact}}</strong>
            </div>
            @endif
            @if($organisme->telephone)
            <div class="col-12">
              <i class="fas fa-phone-alt"></i>&nbsp;<a href="tel:{{$organisme->email}}">{{$organisme->telephone}}</a>
            </div>
            @endif
            @if($organisme->email)
            <div class="col-12">
              <i class="far fa-envelope"></i>&nbsp;<a href="mailto:{{$organisme->email}}">{{$organisme->email}}</a>
            </div>
            @endif
            @if($organisme->site)
            <div class="col-12">
              <i class="fas fa-globe"></i>&nbsp;<a href="{{$organisme->site}}" target="_blank">{{$organisme->site}}</a>
            </div>
            @endif
            @if($organisme->site)
            <div class="col-12">
              <i class="fas fa-globe"></i>
              <a href="{{$organisme->site}}">{{ $organisme->site }}</a>
            </div>
            @endif
          </div>
          @endforeach
        </div>

      </div>

      <div class="row">
        <div class="col-2 pt-2">
          <label class="popup-label" for="">Mots-Clés</label>
        </div>
        <div class="col-10 row">
          @foreach($evenement->tags as $tag)
          <div class="m-1">
            <a href="{{ route('index') }}?filters[tags][]={{$tag->id}}" class="btn btn-sm btn-outline-danger">
              {{$tag->nom}}
            </a>
          </div>
          @endforeach
        </div>
      </div>

@if($evenement->textedeloi)
      <div class="row mt-2">
        <div class="col-md-12">
          <p class="primary-link">Cette obligation est régulée et soumise à la loi : <a href="{{$evenement->textedeloi}}" target="_blank">En savoir plus</a></p>
        </div>
      </div>
@endif
    </div>
    <div class="modal-footer d-inline-block">
      <a href="evenement/export/{{$evenement->id}}?s={{ $s }}&e={{ $e }}" class="btn btn-primary float-left" title="Exporter la déclaration dans mon calendrier personnel"><i class="far fa-calendar-alt"></i> Ajouter à mon Agenda</a>
@if($evenement->liendeclaration)
      <a href="{{$evenement->liendeclaration}}" target="_blank" class="btn btn-outline-danger float-right"><i class="fas fa-external-link-alt"></i> Accéder à la déclaration</a>
@endif
    </div>
  </div>
</div>
