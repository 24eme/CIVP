@php($done = [])

<table class="table table-hover">
    @foreach($evenements as $evenement)
    @if(!in_array($evenement->start, $done))
      <tr class="thead-light">
          <th colspan="4" style="font-weight:bold;">{{ \Carbon\Carbon::parse($evenement->start)->translatedFormat('d F Y') }}</th>
      </tr>
    @endif
    @php(array_push($done, $evenement->start))
      <tr class="row m-0">
        <td class="col-1">@if($evenement->end)<small class="text-muted">au {{ \Carbon\Carbon::parse($evenement->end)->translatedFormat('d M Y') }}</small>@endif</td>
        <td class="col-5">@if (!$evenement->active) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong><a></td>
        <td class="col-5">{!! $evenement->htmlOrganismesList() !!}</td>
        <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $evenement) }}"><i class="far fa-edit">&nbsp;</i></a> @endif</td>
      </tr>
    @endforeach
</table>
@if (count($obligationsNonDates)>0)
<h4>Obligations non datées</h4>
<table class="table table-hover">
    @foreach($obligationsNonDates as $obligation)
      <tr class="row m-0">
        <td class="col-1">&nbsp</td>
        <td class="col-5">@if (!$obligation->active) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $obligation) }}"><strong>{{$obligation->title}}</strong><a></td>
        <td class="col-5">{!! $obligation->htmlOrganismesList() !!}</td>
        <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $obligation) }}"><i class="far fa-edit">&nbsp;</i></a> @endif</td>
      </tr>
    @endforeach
</table>

@endif
