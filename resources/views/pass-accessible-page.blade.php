@extends('layout')
@include('calendar/calendar')
@section('content')
      @include('partials/_sideNav')
      @include('admin/event/_list_events')
    <div id="main">
      <form method="POST">
        <?php if( $_SERVER['REQUEST_METHOD'] == 'POST' ) { ?>
          Numéro invalide ou non existant
        <?php } ?>
        <p>Veuillez saisir le numéro de votre pass:</p>
        <input type="password" name="password">
        <button type="submit">Entrez</button>
      </form>
    </div>
@endsection
@include('timeline/timeline')
