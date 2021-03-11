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
      $evenements = Evenement::get()->all();
      $familles = Famille::all();
      $organismes = Organisme::all();
      $types = Type::all();
      $tags = Tag::all();
      return view('index', ['evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'types' => $types]);
    }

    public function listEvenements()
    {
      $evenements = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end', 'types.color as color')
      ->join('types', 'types.id', '=', 'evenements.type_id')
      ->get();
      return $evenements->toJson();
    }

}
