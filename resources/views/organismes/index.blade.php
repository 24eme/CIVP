@extends('layoutAdmin')

@section('content')
<a href="{{ route('organismes_create') }}" class="btn btn-warning float-right"><i class="fas fa-plus">&nbsp;Nouvel organisme</i></a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="col-1">#</th>
      <th scope="col">Organisme</th>
      <th scope="col">Adresse</th>
      <th scope="col">Contact</th>
      <th scope="col" class="col-1">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
      @foreach($organismes as $organisme)
      <td>
        {{$organisme->id}}
      </td>
      <td>
        <strong>{{$organisme->nom}}</strong>
      </td>
      <td>
        {{$organisme->adresse}}<br />{{$organisme->code_postal}}&nbsp;{{$organisme->ville}}
      </td>
      <td>
        <i class="fas fa-phone-square-alt">&nbsp;{{$organisme->telephone}}</i><br /><i class="fas fa-envelope-square">&nbsp;{{$organisme->email}}</i>
      </td>
      <td>
        <a href="{{ route('organismes_edit', $organisme) }}"><i class="far fa-edit">&nbsp;</i></a>
      </td>
      @endforeach
  </tbody>
</table>
@endsection
