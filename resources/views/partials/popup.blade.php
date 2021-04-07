<div class="modal-dialog modal-lg">
  <div class="modal-content">

    <div class="modal-header" style="display:inline-block;">
        <div class="row">
          <div class="col-md-2 text-center">
              <button class="btn btn-md btn-block" style="background-color: {{$evenement->type->color}}">{{$evenement->type->name}}</button>
          </div>
          <div class="col-md-8">
            <h4 class="modal-title">{{ $evenement->title }}</h4>
          </div>
          <div class="col-md-2 text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">&nbsp;</div>
          <div class="col-md-8">
            <i class="far fa-calendar-alt"></i>&nbsp;{{ \Carbon\Carbon::parse($evenement->start)->translatedFormat('l d F Y') }}
            @if ($evenement->start != $evenement->end)
            au {{ \Carbon\Carbon::parse($evenement->end)->translatedFormat('l d F Y') }}
            @endif
          </div>
          <div class="col-md-2">&nbsp;</div>
        </div>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <p>{{ $evenement->description }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <label class="popup-label" for="">Famille : </label>
        </div>
        <div class="col-md-10">
          <p>{{ $evenement->strFamilles() }}</p>
        </div>
      </div>
      @foreach($evenement->organismes as $organisme)
      <div class="organisme-card p-3 m-1">
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for="">Organisme : </label>
        </div>
        <div class="col-md-8">
          <p>{{$organisme->nom}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for="">Adresse : </label>
        </div>
        <div class="col-md-8">
          <p>{{$organisme->adresse}} {{$organisme->code_postal}} {{$organisme->ville}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for="">Contact : </label>
        </div>
        <div class="col-md-8">
          <p>{{$organisme->contact}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for=""><i class="fas fa-phone-alt"></i> Téléphone : </label>
        </div>
        <div class="col-md-8">
          <p>{{$organisme->telephone}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for=""><i class="far fa-envelope"></i> Mail : </label>
        </div>
        <div class="col-md-8">
          <p>{{$organisme->email}}</p>
        </div>
      </div>
      </div>
      @endforeach
      <div class="row">
        <div class="col-md-2 mt-2">
          <label class="popup-label" for="">Tags : </label>
        </div>
        <div class="col-md-auto">
          @foreach($evenement->tags as $tag)
          <div class="btn-group-toggle m-1" data-toggle="buttons">
            <label class="btn btn-sm btn-outline-danger">
              {{$tag->nom}}
            </label>
          </div>
          @endforeach
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button style="background-color:{{$evenement->type->color}};border-color:{{$evenement->type->color}}" type="button" class="btn btn-warning" data-dismiss="modal"><a href="evenement/export/{{$evenement->id}}">Exporter</a></button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Accéder à la déclaration</button>
    </div>
  </div>
</div>
