<div class="" hidden>
@php($start = Carbon\Carbon::now()->startOfYear()->toDateString())
@php($end =Carbon\Carbon::now()->endOfYear()->toDateString())
@php($dates = Carbon\CarbonPeriod::create($start, $end))
@php($done = [])
</div>
<h2 class="fc-toolbar-title"></h2>
<div class="list-events">
  <table class="fc-list-table table-bordered">
    <tbody>
      @foreach($evenements as $evenement)
      @if(in_array($evenement->id, $done) == False)
      <tr class="fc-list-day fc-day fc-day-tue fc-day-past">
        <td class="fc-list-event-time col-md-auto"><a>{{ date('d F Y', strtotime($evenement->start )) }}</a></td>
        <td class="col-md-auto">&nbsp;</td>
        <td class="col-md-auto">&nbsp;</td>
        <td class="col-md-auto">&nbsp;</td>
        <td class="col-md-auto">&nbsp;</td>
      </tr>
      @endif
      @foreach($evenements as $subevenement)
      @if($subevenement->start == $evenement->start && in_array($subevenement->id, $done) == False)
      @php(array_push($done,$subevenement->id))
      <tr class="fc-list-event  fc-event fc-event-start fc-event-end fc-event-past">
        <td class="fc-list-event-time col-md-1">{{ $subevenement->type->name }}</td>
        <td class="fc-list-event-title col-md-6"><span class="fc-list-dot col-md-auto"><i class="fas fa-circle" style="color:{{$evenement->type->color}}"></i></span><a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong><a></td>
        <td class="fc-list-event-title col-md-auto">{{$evenement->organisme->nom}}</td>
        <td class="fc-list-event-title col-md-auto"><button type="button" class="btn btn-primary" onclick="exportICS({{$evenement->id}})"><i class="fas fa-external-link-alt"></i></button></td>
      </tr>
      @endif
      @endforeach
    @endforeach

    </tbody>
  </table>
</div>
