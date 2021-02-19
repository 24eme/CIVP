<div class="">
  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>
<div id="LObligations" class="section-content listed-container">
  <div class="download_csv">
    <form class="" action="{{route('importCSV')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="btn-import">
        <label id="csv_label" for="csv_input">Importer un fichier CSV<i class="fas fa-cloud-download-alt"></i></label>
        <input id="csv_input" type="file"  name="csv_file" onchange="form.submit()">
      </div>
    </form>
  </div>
  <div class="obligations-container">
  <ul id="obligationList" class="p-0">
    <li class="obligation-content pl-3 pt-2 pb-0" style="background-color:white;">
      <div class="row p-2" style="color:#4c5d72">
        <div class="col-md-4 pl-2">
          <h5>TITRE</h5>
        </div>
        <div class="col-md-3 p-0">
          <h5>DATE DE DEBUT</h5>
        </div>
        <div class="col-md-3">
          <h5>DATE DE FIN</h5>
        </div>
        <div class="col-md-2">
          <h5>STATUT</h5>
        </div>
      </div>
    </li>
  @foreach($obligations as $obligation)
    <li class="obligation-content" >
      <div class="row">
        <div class="col-md-4">
          {{$obligation->title}}
        </div>
        <div class="col-md-auto p-0">
          <i class="far fa-clock"></i>
        </div>
        <div class="col-md-3 p-0">
          {{$obligation->start}}
        </div>
        <div class="col-md-auto p-0">
          <i class="far fa-clock"></i>
        </div>
        <div class="col-md-2 p-0">
          {{$obligation->end}}
        </div>
        <div class="col-md-2 ml-5">
          <span class="active_dot"></span><p class="active_text">active</p>
        </div>
      </div>
    </li>
  @endforeach
  </ul>
  </div>
  @foreach($obligations as $obligation)
    @if($obligation->color =='blue')
    @endif
  @endforeach
</ul>
</div>
