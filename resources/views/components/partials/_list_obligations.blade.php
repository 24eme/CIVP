<div class="">
  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>
<div id="LObligations" class="section-content listed-container">
<ul class="">
  <div class="download_csv">
    <form class="" action="{{route('importCSV')}}" method="post">
      <h2></i>Importer via fichier CSV</h2>
      <label id="csv_label" for="csv_file"><i class="fas fa-cloud-download-alt"></i></label>
      <input id="csv_input" type="file" name="" value="">
    </form>
  </div>
  <h3>Les obligations activés</h3>
    <hr>
  <div class="obligations-container">
  @foreach($obligations as $obligation)
    <li class="obligation-content">
      <span class="vertical-line">{{ date('j M Y', strtotime($obligation->start)) }}</span>
      <div class="wrapper">
        <span>{{$obligation->title}}</span>
        <span>{{$obligation->start}}</span>
      </div>
    </li>
  @endforeach
  </div>
  <h3>Les obligations désactivés</h3>
    <hr>
  @foreach($obligations as $obligation)
    @if($obligation->color =='blue')
    @endif
  @endforeach
</ul>
</div>
