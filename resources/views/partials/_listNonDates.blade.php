@if (count($obligationsNonDates)>0)
<table class="table table-hover">
    @foreach($obligationsNonDates as $obligation)
      <tr class="row m-0">
        <td class="col-1">&nbsp</td>
        <td class="col-4">@if (!$obligation['active']) <i class="fas fa-circle" style="color: red"></i> @endif<a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', ['id' => $obligation['id']]) }}"><strong>{{$obligation['simpleTitle']}}</strong><a></td>
        <td class="col-6">{!! $obligation['organismes'] !!}</td>
        <td class="col-1">@if ($user) <a href="{{ route('evenement_edit', $obligation['id']) }}"><i class="far fa-edit">&nbsp;</i>Modifier</a> @endif</td>
      </tr>
    @endforeach
</table>
@endif
