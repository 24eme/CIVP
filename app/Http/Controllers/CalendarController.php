<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Obligation;
use Illuminate\Http\UploadedFile;

class CalendarController extends Controller
{
    public function manage(){
      $obligations = Obligation::all();
      return view('admin/admin',['obligations'=>$obligations]);
    }


    public function importCSV(Request $request){

    $csv = fopen($request->file('csv_file'),"r");
    while(!feof($csv)){
      $rowData[]=fgetcsv($csv,3000,";");
    }
      foreach ($rowData as $key => $value ) {
        if ($value !==false) {
        $inserted_data=array('title'=>$value[0],
                             'start'=>$value[1],
                             'end'=>$value[2],
                             'description'=>$value[3],
                             'profil'=>$value[4]
                            );
        Obligation::create($inserted_data);
        }
      }
      return redirect()->back()->with('success', 'Votre obligation a été ajouté');

    }

}
