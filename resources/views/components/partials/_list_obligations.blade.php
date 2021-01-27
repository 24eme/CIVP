<div id="LObligations" class="section-content listed-container">
  <ul class="list_titles">
    <li class="list_title"><a href="#obligations">Obligations</a></li>
    <li class="list_title"><a href="#calendrier">Exemple</a></li>
    <li class="list_title"><a href="#site">Statis</a></li>
  </ul>
  <ul class="">
    <input type="file" name="" value="">
  @foreach($obligations as $obligation)
    <li class="obligation-container">
      <span class="vertical-line">{{ date('j M Y', strtotime($obligation->start)) }}</span>
      <div class="wrapper">
        <span>{{$obligation->title}}</span>
        <span>{{$obligation->contact}} Exemple</span>
      </div>
      <div class="wrapper" style="float:right">

      </div>
    </li>
  @endforeach
  </ul>
</div>
