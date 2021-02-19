<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Obligation;
use Carbon\Carbon;
use Auth;
use Validator;
use DateTime;
use Sabre\VObject;
use Illuminate\Support\Facades\File;

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

      $obligation->setColor($obligation->profil);

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
    if ($id != null) {
      $obligation = Obligation::find($id)->delete();
      return redirect()->back()->with('success', 'Votre obligation a été supprimé de la base de données');
    }
  }

  public function export($info){

    $obligation = Obligation::find($info);
    $vcalendar = new VObject\Component\VCalendar([
    'VEVENT' => [
        'SUMMARY' => $obligation->title,
        'DTSTART' => new \DateTime($obligation->start),
        'DTEND'   => new \DateTime($obligation->end)
    ]
    ]);
    File::put('event.ics',$vcalendar->serialize());
    return response()->download('event.ics');
  }


}
