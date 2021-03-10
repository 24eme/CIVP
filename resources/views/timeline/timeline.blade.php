
<div class="timeline">
  <ul>
    @foreach($evenements as $evenement)
    <li>
      <div class="right_content" data-aos="fade-right">
        <h5>{{$evenement->title}}</h5>
        <p>{{$evenement->description}}</p>
      </div>
      <div class="left_content" data-aos="fade-left">
        <h5>{{($evenement->start)}}</h5>
      </div>
    </li>
    @endforeach
    <div style="clear:both;"></div>
  </ul>
</div>
