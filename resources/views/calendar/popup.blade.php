<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header pb-0">
        <div class="col-2 p-0">
            <i class="far fa-calendar-alt float-left" style="font-size: 3rem;"></i>
            <p class="pl-2 float-left">
              <small class="text-muted">du</small> {{ date('d M', strtotime($obligation->start)) }}<br />
              <small class="text-muted">au</small> {{ date('d M', strtotime($obligation->end)) }}
            </p>
        </div>
        <div class="col-8 text-center">
          <h2 class="modal-title" id="staticBackdropLabel" style="line-height: 2;">{{ $obligation->title }}</h2>
        </div>
        <div class="col-2 p-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"class="h2">&times;</span>
          </button>
        </div>
      </div>
      <div class="modal-body">
        <p>
          {{ $obligation->description }}
        </p>
        Famille : {{$obligation->profil}}<br />
        Organisme : {{$obligation->organisme}}<br />
        Contact : {{$obligation->contact}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Accéder à la déclaration</button>
      </div>
    </div>
  </div>
