<div id="ListEvents" class="section-content listed-container">
  <div class="obligations-container">
  <ul id="EventsList" class="p-0">
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