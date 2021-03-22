<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Evenement;
use App\Models\Tag;
use App\Models\Famille;
use App\Models\Organisme;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index()
    {
      $evenements = Evenement::all()->sortBy('start');
      $familles = Famille::all();
      $organismes = Organisme::all();
      $types = Type::all();
      $tags = Tag::all();
      return view('index', ['evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'types' => $types]);
    }

    public function listEvenements(Request $request)
    {

      $evenements = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end','types.name as type','organismes.nom as organisme', 'types.color as color')
      ->where('evenements.active','=', true)
      ->join('types', 'types.id', '=', 'evenements.type_id')
      ->join('organismes', 'organismes.id', '=', 'evenements.organisme_id')
      ->orderBy('evenements.start', 'desc')
      ->get();
      if ($request->output == "json") {
          return $evenements->toJson();
      }
      else if ($request->output == "html"){
        return view('partials/_list',['evenements'=>$evenements]);
      }

    }

    public function filterEvenementsByType($filter)
    {
      $evenements = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end','types.name as type','organismes.nom as organisme', 'types.color as color')
      ->where('evenements.active','=', true)
      ->where('types.name','like', $filter)
      ->join('types', 'types.id', '=', 'evenements.type_id')
      ->join('organismes', 'organismes.id', '=', 'evenements.organisme_id')
      ->orderBy('evenements.start', 'desc')
      ->get();
      return $evenements->toJson();
    }

    public function filterEvenementsByOrganisme($filter)
    {
      $evenements = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end','types.name as type','organismes.nom as organisme', 'types.color as color')
      ->where('evenements.active','=', true)
      ->where('organismes.nom','like', $filter)
      ->join('organismes', 'organismes.id', '=', 'evenements.organisme_id')
      ->join('types', 'types.id', '=', 'evenements.type_id')
      ->orderBy('evenements.start', 'desc')
      ->get();
      return $evenements->toJson();
    }
}
