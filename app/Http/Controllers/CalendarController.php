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
      return view('admin',['obligations'=>$obligations]);
    }


    function importCSV(Request $request){

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

    // return redirect()->back()->with('success', 'Votre obligation a été ajouté');

    // $csv = fopen($request->file('csv_file'),"r");
    // while($data = fgetcsv($csv, 1000, ";")){
    //   dd($data);
    //     // $inserted_data=array('id'=>$dat[0],
    //     //                      'title'=>$value[1],
    //     //                      'start'=>$value[2],
    //     //                      'end'=>$value[3],
    //     //                     );
    // }
    // $csv_path = $request->file('csv_file')->path();
    // $options = array();
    // extract($options);
    // $delimiter = ';';
    // if (($csv_handle = fopen($csv_path, "r")) === FALSE)
    //     throw new Exception('Impossible d\'ouvrir ce fichier CSV');
    //
    // if(!isset($delimiter))
    //     $delimiter = ',';
    //
    // if(!isset($table))
    //     $table = preg_replace("/[^A-Z0-9]/i", '', basename($csv_path));
    //
    // if(!isset($fields)){
    //     $fields = array_map(function ($field){
    //         return strtolower(preg_replace("/[^A-Z0-9]/i", '', $field));
    //     }, fgetcsv($csv_handle, 0, $delimiter));
    // }
    //
    // $create_fields_str = join(', ', array_map(function ($field){
    //     return "$field TEXT NULL";
    // }, $fields));
    //
    // $pdo->beginTransaction();
    //
    // $create_table_sql = "CREATE TABLE IF NOT EXISTS $table ($create_fields_str)";
    // $pdo->exec($create_table_sql);
    //
    // $insert_fields_str = join(', ', $fields);
    // $insert_values_str = join(', ', array_fill(0, count($fields),  '?'));
    // $insert_sql = "INSERT INTO $table ($insert_fields_str) VALUES ($insert_values_str)";
    // $insert_sth = $pdo->prepare($insert_sql);
    //
    // $inserted_rows = 0;
    // while (($data = fgetcsv($csv_handle, 0, $delimiter)) !== FALSE) {
    //     $insert_sth->execute($data);
    //     $inserted_rows++;
    // }
    //
    // $pdo->commit();
    //
    // fclose($csv_handle);
    //
    // return array(
    //         'table' => $table,
    //         'fields' => $fields,
    //         'insert' => $insert_sth,
    //         'inserted_rows' => $inserted_rows
    //     );
    //
    // }
}
