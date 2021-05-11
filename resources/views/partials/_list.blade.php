@php($done = [])

<table class="table table-hover pt-4">
    @foreach($evenements as $evenement)
    @if(!in_array($evenement['start'], $done))
      <tr class="thead-light">
          <th colspan="4">{{ \Carbon\Carbon::parse($evenement['start'])->translatedFormat('d F Y') }}</th>
      </tr>
    @endif
    @php(array_push($done, $evenement['start']))
      <tr class="row m-0">
        <td class="col-1">@if($evenement['end'])<small class="text-muted">au {{ \Carbon\Carbon::parse($evenement['end'])->translatedFormat('d M Y') }}</small>@endif</td>
        <td class="col-5">@if (!$evenement['active']) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', ['id' => $evenement['id'], 'organisme_id' => $evenement['organisme_id']]) }}"><strong>{{$evenement['title']}}</strong><a></td>
        <td class="col-5"><i class="fas fa-circle" style="color: {{ $evenement['color'] }}"></i>&nbsp;{{ $evenement['organisme'] }}</td>
        <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $evenement['id']) }}"><i class="far fa-edit">&nbsp;</i></a> @endif</td>
      </tr>
    @endforeach
</table>
