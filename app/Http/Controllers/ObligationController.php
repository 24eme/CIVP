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
      $obligation->description = $request->description;
      $obligation->profil = $request->profil;
      $obligation->organisme = $request->organisme;
      $obligation->lien= $request->lien;
      $obligation->contact= $request->contact;

      switch ($obligation->profil) {
        case 'Producteur-Recoltant':
          $obligation->color = '#f1d600';
          break;
        case 'Negociant':
          $obligation->color = '#96b5aa';
          break;
        case 'Negociant-Vinificateur':
          $obligation->color = '#517fbe';
          break;
        case 'Viticulteur':
          $obligation->color = '#621940';
          break;
        default:
          $obligation->color = 'blue';
          break;
      }


      if ($obligation->InvalidDate()){
        return redirect()->back()->with('error', 'Impossible de créer une obligation dans le passé');
      }

    $obligation->save();
    return redirect()->back()->with('success', 'Votre obligation a été ajouté');
  }


  public function update(Request $request){

   $obligation = Obligation::find($request->id);
   $obligation->title = $request->title;
   $obligation->start = $request->start;
   $obligation->end = $request->end;
   $obligation->description = $request->description;
   $obligation->profil = $request->profil;
   $obligation->organisme = $request->organisme;
   $obligation->lien = $request->lien;
   $obligation->contact = $request->contact;

    if($request->id != null){
        $obligation->save();
     return redirect()->back()->with('success', 'Votre obligation a bien été modfié');
    }
  }

  public function delete(Request $request,$id){
    $obligation = Obligation::find($id)->delete();
    return redirect()->back()->with('success', 'Votre obligation a été supprimé de la base de données');
  }

  public function manageObligation(Request $request){
    $obligations = Obligation::all();


    return view('manage',['obligations'=>$obligations]);
  }


}
