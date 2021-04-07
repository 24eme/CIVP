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
        <td class="col-5"><a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong><a></td>
        <td class="col-5">{!! $evenement->htmlOrganismesList() !!}</td>
        <td class="col-1"><button type="button" class="btn btn-primary" onclick="exportICS({{$evenement->id}})"><i class="fas fa-external-link-alt"></i></button></td>
      </tr>
    @endforeach
</table>
