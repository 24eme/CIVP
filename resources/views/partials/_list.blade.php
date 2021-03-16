<h2 class="fc-toolbar-title"></h2>
<div class="list-events">
  <table class="fc-list-table table-bordered">
    <tbody>
      <tr class="fc-list-day fc-day fc-day-tue fc-day-past">
        <td class="fc-list-event-time"><a>En cours</a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    @foreach($evenements as $evenement)
    @if($evenement->active == true)
    <tr class="fc-list-event  fc-event fc-event-start fc-event-end fc-event-past">
      <td class="fc-list-event-time" style="width: 150px">{{ date('d F Y', strtotime($evenement->start)) }}</td>
      <td class="fc-list-event-title"><span class="fc-list-dot col-md-auto"><i class="fas fa-circle" style="color:{{$evenement->type->color}}"></i></span>{{$evenement->title}}</td>
      <td class="fc-list-event-title">{{$evenement->type->nom}}</td>
      <td class="fc-list-event-title" style="width: 300px">{{$evenement->organisme->nom}}</td>
      <td class="fc-list-event-title"><button type="button" class="btn btn-primary" onclick="exportICS({{$evenement->id}})"><i class="fas fa-external-link-alt"></i></button></td>
    </tr>
    @endif
    @endforeach
    </tbody>
  </table>
  <table class="fc-list-table table-bordered">
    <tbody>
      <tr class="fc-list-day fc-day fc-day-tue fc-day-past">
        <td class="fc-list-event-time"><a>Terminé</a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    @foreach($evenements as $evenement)
    @if($evenement->active == false)
    <tr class="fc-list-event  fc-event fc-event-start fc-event-end fc-event-past">
      <td class="fc-list-event-time" style="width: 150px">{{ date('d F Y', strtotime($evenement->start)) }}</td>
      <td class="fc-list-event-title"><span class="fc-list-dot col-md-auto"><i class="fas fa-circle" style="color:{{$evenement->type->color}}"></i></span>{{$evenement->title}}</td>
      <td class="fc-list-event-title">{{$evenement->type->nom}}</td>
      <td class="fc-list-event-title" style="width: 300px">{{$evenement->organisme->nom}}</td>
      <td class="fc-list-event-title"><button type="button" class="btn btn-primary" onclick="exportObligation()"><i class="fas fa-external-link-alt"></i></button></td>
    </tr>
    @endif
    @endforeach
    </tbody>
  </table>
</div>
