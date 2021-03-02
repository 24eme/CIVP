<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Profil</th>
      <th scope="col">Titre</th>
      <th scope="col">Date début</th>
      <th scope="col">Date fin</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($evenements as $evenement)
      <tr>
      <td>
        {{$evenement->profil->nom}}
      </td>
      <td>
        <strong>{{$evenement->title}}</strong>
      </td>
      <td>
        {{$evenement->start}}
      </td>
      <td>
        {{$evenement->end}}
      </td>
      <td>
        <a href="javascript:void(0)" class="popupEvent" data-url="{{ route('evenement_popup', $evenement) }}"><i class="far fa-eye">&nbsp;</i></a>
      </td>
      </tr>
      @endforeach
  </tbody>
</table>
