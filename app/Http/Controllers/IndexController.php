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
      $query = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end')
      ->leftJoin('evenement_famille', 'evenements.id', '=', 'evenement_famille.evenement_id')
      ->leftJoin('evenement_organisme', 'evenements.id', '=', 'evenement_organisme.evenement_id')
      ->leftJoin('evenement_tag', 'evenements.id', '=', 'evenement_tag.evenement_id')
      ->where('evenements.active','=', 1);
      if (isset($request->filters) && isset($request->filters['familles']) && count($request->filters['familles']) > 0) {
        $query->whereIn('evenement_famille.famille_id', $request->filters['familles']);
      }
      if (isset($request->filters) && isset($request->filters['organismes']) && count($request->filters['organismes']) > 0) {
        $query->whereIn('evenement_organisme.organisme_id', $request->filters['organismes']);
      }
      if (isset($request->filters) && isset($request->filters['tags']) && count($request->filters['tags']) > 0) {
        $query->whereIn('evenement_tag.tag_id', $request->filters['tags']);
      }
      $evenements = $query->orderBy('evenements.start', 'asc')->distinct()->get();
      if ($request->output == "html"){
        return view('partials/_list',['evenements'=> $evenements]);
      }
      return $evenements->toJson();
    }

    public function filterEvenementsByType($filter)
    {
      $evenements = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end','types.name as type','organismes.nom as organisme', 'types.color as color')
      ->where('evenements.active','=', true)
      ->where('types.name','like', $filter)
      ->join('types', 'types.id', '=', 'evenements.type_id')
      ->join('organismes', 'organismes.id', '=', 'evenements.organisme_id')
      ->orderBy('evenements.start', 'asc')
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
      ->orderBy('evenements.start', 'asc')
      ->get();
      return $evenements->toJson();
    }
}
