<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Evenement;
use App\Models\Tag;
use App\Models\Famille;
use App\Models\Organisme;
use App\Models\Type;
use Illuminate\Http\UploadedFile;

class CalendarController extends Controller
{
    public function index()
    {
      $evenements = Evenement::get()->all();
      $familles = Famille::all();
      $organismes = Organisme::all();
      $types = Type::all();
      $tags = Tag::all();
      return view('admin/index', ['evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'types' => $types]);
    }

    public function importCSV(Request $request){

    $csv = fopen($request->file('csv_file'),"r");
    while(!feof($csv)){
      $rowData[]=fgetcsv($csv,3000,";");
    }
      foreach ($rowData as $key => $value ) {
        if ($value !==false) {
        $inserted_data=array('title'=> $value[0],
                             'start'=> $value[1],
                             'end'=> $value[2],
                             'description'=> $value[3],
                             'type_id'=> $value[4],
                             'organisme_id' => $value[5],
                             'textedeloi' => $value[6],
                             'liendeclaration' => $value[7],
                             'active' => $value[8],
                             'rrule' => $value[9],
                            );
        Evenement::create($inserted_data);
        }
      }
      return redirect()->back()->with('success', 'Votre obligation a été ajouté');

    }

}
