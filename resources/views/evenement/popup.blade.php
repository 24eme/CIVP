<div class="modal-dialog modal-lg modal-dialog-scrollable">
  <div class="modal-content">
    <div class="modal-header pb-0">
      <div class="col-2 p-0">
          <i class="far fa-calendar-alt float-left" style="font-size: 3rem;"></i>
          <p class="pl-2 float-left">
            <small class="text-muted">du</small> {{ date('d M', strtotime($evenement->start)) }}<br />
            <small class="text-muted">au</small> {{ date('d M', strtotime($evenement->end)) }}
          </p>
      </div>
      <div class="col-8 text-center">
        <h2 class="modal-title" id="staticBackdropLabel" style="line-height: 2;">{{ $evenement->title }}</h2>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"class="h2">&times;</span>
        </button>
      </div>
    </div>
    <div class="modal-body">
      <p class="text-right">
        <button class="btn" style="background-color: {{$evenement->profil->couleur}}">{{ $evenement->profil->nom }}</button>
      </p>
      <p>
        Public : {{ $evenement->strFamilles() }}
      </p>
      <p>
        {{ $evenement->description }}
      </p>
      <p>
        Tags : {{ $evenement->strTags() }}
      </p>
      <p>
        Organisme : {{$evenement->organisme->nom}}<br />
        Adresse : {{$evenement->organisme->adresse}} {{$evenement->organisme->code_postal}} {{$evenement->organisme->ville}}<br /><br />
        Contact : {{$evenement->organisme->contact}}<br />
        <span class="fas fa-phone-square-alt"></span>&nbsp;{{$evenement->organisme->telephone}}<br />
        <span class="fas fa-envelope-square"></span>&nbsp;{{$evenement->organisme->email}}
      </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">Accéder à la déclaration</button>
    </div>
  </div>
</div>
