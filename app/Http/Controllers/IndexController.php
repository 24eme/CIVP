<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Evenement;
use App\Models\Tag;
use App\Models\Famille;
use App\Models\Organisme;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index()
    {
      $evenements = Evenement::get()->all();
      $familles = Famille::all();
      $organismes = Organisme::all();
      $profils = Profil::all();
      $tags = Tag::all();
      return view('index', ['evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'profils' => $profils]);
    }

    public function listEvenements()
    {
      $evenements = DB::table('evenements')
      ->select('evenements.id', 'evenements.title', 'evenements.start', 'evenements.end', 'profils.color as color')
      ->join('profils', 'profils.id', '=', 'evenements.profil_id')
      ->get();
      return $evenements->toJson();
    }

}
