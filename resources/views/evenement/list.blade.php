<h2 class="fc-toolbar-title"></h2>
<div class="list-events">
  <table class="fc-list-table table-bordered">
    <tbody>
    @foreach($evenements as $evenement)
    <tr class="fc-list-day fc-day fc-day-tue fc-day-past">
      <td class="fc-list-event-time"><a>{{ date('d F Y', strtotime($evenement->start)) }}</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="fc-list-event  fc-event fc-event-start fc-event-end fc-event-past">
      <td class="fc-list-event-time" style="width: 150px">En cours</td>
      <td class="fc-list-event-title"><span class="fc-list-dot col-md-auto"><i class="fas fa-circle" style="color:{{$evenement->type->color}}"></i></span>{{$evenement->title}}</td>
      <td class="fc-list-event-title">{{$evenement->type->nom}}</td>
      <td class="fc-list-event-title" style="width: 300px">{{$evenement->organisme->nom}}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
