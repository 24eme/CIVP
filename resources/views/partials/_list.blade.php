@php($done = [])

<table class="table table-hover">
    @foreach($evenements as $evenement)
    @if(in_array($evenement->id, $done) == false)
    <thead class="thead-light">
      <tr>
          <th colspan="3">{{ \Carbon\Carbon::parse($evenement->start)->translatedFormat('d F Y') }}</th>
      </tr>
    </thead>
    @endif
    @foreach($evenements as $subevenement)
    @if($subevenement->start == $evenement->start && in_array($subevenement->id, $done) == False)
    @php(array_push($done,$subevenement->id))
      <tr>
        <td class⁼"col-2"><small class="text-muted">{{ $subevenement->type->name }}</span> <a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><strong>{{$evenement->title}}</strong><a></td>
        <td class⁼"col-1">@if($subevenement->end)<small class="text-muted">fin le</small>&nbsp;{{ \Carbon\Carbon::parse($evenement->end)->translatedFormat('d F Y') }} @endif</td>
        <td class⁼"col-1">{{$evenement->strOrganismes()}}</td>
        <td><button type="button" class="btn btn-primary" onclick="exportICS({{$evenement->id}})"><i class="fas fa-external-link-alt"></i></button></td>
      </tr>
    @endif
    @endforeach
    @endforeach
</table>
