<div class="modal-dialog modal-md modal-dialog-scrollable">
  <div class="modal-content">
    <div class="modal-header pb-0">
      <div class="row">
        <div class="col-md-2 mt-2 p-0">
          <span class="color-block" style="background-color:{{$evenement->type->color}}"></span>
        </div>
        <div class="col-md-10 m-0">
          <h4 class="modal-title" id="staticBackdropLabel" style="line-height: 2;">{{ $evenement->title }}</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mx-auto">
          <p>{{ $evenement->description }}</p>
        </div>
      </div>
      <div class="col-2 p-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"class="h2">&times;</span>
        </button>
      </div>
    </div>
    <div class="modal-body" style="overflow:hidden">
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for="">Date de début : </label>
        </div>
        <div class="col-md-8">
          <p>{{ date('d M', strtotime($evenement->start)) }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for="">Date de fin : </label>
        </div>
        <div class="col-md-8">
          <p>{{ date('d M', strtotime($evenement->end)) }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mt-2">
          <label class="popup-label" for="">Type : </label>
        </div>
        <div class="col-md-8">
          <p><button class="btn" style="background-color: {{$evenement->type->color}}">{{ $evenement->type->name }}</button></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label class="popup-label" for="">Famille : </label>
        </div>
        <div class="col-md-8">
          <p>{{ $evenement->strFamilles() }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mt-2">
          <label class="popup-label" for="">Tags : </label>
        </div>
        <div class="col-md-auto">
          <ul class="tagList p-0">
            <li class="tag-item"><a href="#" class="tag">{{$evenement->strTags()}}</a></li>
          </ul>
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
    </div>
    <div class="modal-footer">
      <button style="background-color:{{$evenement->type->color}};border-color:{{$evenement->type->color}}" type="button" class="btn btn-warning" data-dismiss="modal"><a href="evenement/export/{{$evenement->id}}">Exporter</a></button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Accéder à la déclaration</button>
    </div>
  </div>
</div>
