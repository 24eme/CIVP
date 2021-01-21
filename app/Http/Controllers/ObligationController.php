<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Obligation;
use Carbon\Carbon;
use Auth;
use Validator;
use DateTime;

class ObligationController extends Controller
{

  protected $obligation;

  public function __construct() {
    $this->obligation = new Obligation;
  }

  public function show(){
    $obligations = Obligation::all();
      return $obligations->toJson();
  }

  public function create(Request $request){
      $request->validate([
        'title' => 'required',
        'start_date' => 'date|date_format:Y-m-d',
        'end_date' => 'date|date_format:Y-m-d',
        'profil' => 'string',
      ]);

      $obligation = new Obligation;
      $obligation->title = $request->title;
      $obligation->start = $request->start;
      $obligation->end = $request->end;
      $obligation->profil = $request->profil;
      $obligation->organisme = $request->organisme;
      $obligation->lien= $request->lien;
      $obligation->contact= $request->contact;

      if ($obligation->InvalidDate()){
        return redirect()->back()->with('error', 'Impossible de créer une obligation dans le passé');
      }

    $obligation->save();
    return redirect()->back()->with('success', 'Votre obligation a été ajouté');
  }


  public function update(Request $request){

   $id = $request->input('inputId');

   $obligation = Obligation::find($id);
   $obligation->title = $request->title;
   $obligation->start = $request->start;
   $obligation->end = $request->end;
   $obligation->profil = $request->profil;
   $obligation->organisme = $request->organisme;
   $obligation->lien = $request->lien;
   $obligation->contact = $request->contact;

    if($id != null){
      if ($this->obligation->InvalidDate()){
          return redirect()->back()->with('error', 'Impossible de créer une obligation dans le passé');
      }
      else{
        $obligation->save();
      }
     return redirect()->back()->with('success', 'Votre obligation a bien été modfié');
    }
}

  public function delete(Request $request,$id){
    $obligation = Obligation::find($id)->delete();
    return redirect()->back()->with('success', 'Votre obligation a été supprimé de la base de données');
    }
}
