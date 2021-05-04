<div class="modal-dialog modal-lg">
  <div class="modal-content">

    <div class="modal-header" style="display:inline-block;border-bottom:none;">
        <div class="row">
          <div class="col-md-2 text-center">
              <button class="btn btn-md btn-block" style="background-color: {{$evenement->type->color}}">{{$evenement->type->name}}</button>
          </div>
          <div class="col-md-8">
            <h4 class="modal-title">{{ $evenement->title }}</h4>
          </div>
          <div class="col-md-2 text-right">
            @if(Auth::check())
              @if (Auth::user()->isAdmin() == 1)
                <a href="{{ route('evenement_edit', $evenement) }}"><i class="far fa-edit"></i></a>
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
            <i class="far fa-calendar-alt"></i>&nbsp;<strong>{{ \Carbon\Carbon::parse($evenement->start)->translatedFormat('l d F Y') }}</strong>
            @if ($evenement->start != $evenement->end)
            au <strong>{{ \Carbon\Carbon::parse($evenement->end)->translatedFormat('l d F Y') }}</strong>
            @endif
          </div>
          <div class="col-md-2">&nbsp;</div>
        </div>

    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-7 row">
          <div class="col-12">
            <label class="popup-label" for="">Famille(s) : </label>{{ $evenement->strFamilles() }}
          </div>
          <div class="col-12">
            <p>{!! $evenement->description !!}</p>
          </div>
        </div>

        <div class="col-5 row d-inline-block">
          @foreach($evenement->organismes as $organisme)
          <div class="organisme-card my-1 p-1 row d-inline-block w-100 ml-4">
            <div class="col-12 pb-2">
              <img src="/images/logos/organismes/{{$organisme->logo}}" class="" height="20px" /> <i class="fas fa-circle" style="color: {{ $organisme->couleur }}"></i>&nbsp;<strong>{{$organisme->nom}}</strong>
            </div>
            <div class="col-12 pb-2">
              {{$organisme->adresse}}<br />{{$organisme->code_postal}} {{$organisme->ville}}
            </div>
            <div class="col-12 pb-1">
              <strong>{{$organisme->contact}}</strong>
            </div>
            <div class="col-12">
              <i class="fas fa-phone-alt"></i>&nbsp;{{$organisme->telephone}}
            </div>
            <div class="col-12">
              <i class="far fa-envelope"></i>&nbsp;{{$organisme->email}}
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <label class="popup-label" for="">Tags</label>
        </div>
        <div class="col-11 row">
          @foreach($evenement->tags as $tag)
          <div class="btn-group-toggle m-1" data-toggle="buttons">
            <label class="btn btn-sm btn-outline-danger">
              {{$tag->nom}}
            </label>
          </div>
          @endforeach
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-md-12">
          <p>Cette obligation est régulée et soumise à la loi.<a href="{{$evenement->textedeloi}}" style="color:blue;">En savoir plus</a></p>
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="evenement/export/{{$evenement->id}}"><i class="far fa-calendar-check"></i> Exporter</a></button>
      <button type="button" class="btn btn-primary"><a href="{{$evenement->liendeclaration}}"><i class="fas fa-external-link-alt"></i></i>Accéder à la déclaration</a></button>

    </div>
  </div>
</div>
