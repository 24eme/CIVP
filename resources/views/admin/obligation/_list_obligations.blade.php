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
        <label id="csv_label" for="csv_input">Importer <i class="fas fa-cloud-download-alt"></i></label>
        <input id="csv_input" type="file"  name="csv_file" onchange="form.submit()">
      </div>
    </form>
  </div>
  <div class="obligations-container">
  <ul class="">
  @foreach($obligations as $obligation)
    <li class="obligation-content">
      <span class="vertical-line">{{ date('j M Y', strtotime($obligation->start)) }}</span>
      <div class="wrapper">
        <span class="obligation_title">{{$obligation->title}}  <span class="active_dot"></span><p class="active_text">active</p></span>
        <span id="obligation_start" class="obligation_date">Date de début : {{$obligation->start}}</span>
        <span id="obligation_end" class="obligation_date">Date de fin : {{$obligation->end}}</span>
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
