@php($done = [])

<table class="table table-hover">
    @foreach($evenements as $evenement)
    @if(!in_array($evenement->start, $done))
      <tr class="thead-light">
          <th colspan="4">{{ \Carbon\Carbon::parse($evenement->start)->translatedFormat('d F Y') }}</th>
      </tr>
    @endif
    @php(array_push($done, $evenement->start))
      <tr class="row m-0">
        <td class="col-1">@if($evenement->end)<small class="text-muted"><i class="fas fa-chevron-right small"></i>&nbsp;{{ \Carbon\Carbon::parse($evenement->end)->translatedFormat('d F Y') }}</small>@endif</td>
        <td class="col-5">@if (!$evenement->active) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong><a></td>
        <td class="col-5">{!! $evenement->htmlOrganismesList() !!}</td>
        <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $evenement) }}"><i class="far fa-edit">&nbsp;</i></a> @endif</td>
      </tr>
    @endforeach
</table>
