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

class AdminController extends Controller
{

  public function index(){
    $obligations = Obligation::all();
    return view('admin/index',['obligations'=>$obligations]);
  }

  public function addObligation(Request $request){

    if ($request->method() != "POST") {
      return view('admin/addObligation');
    }

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
    $obligation->save();

    return redirect()->route('administration');
  }
}
