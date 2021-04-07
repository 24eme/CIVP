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
use Illuminate\Database\Eloquent\Builder;

class IndexController extends Controller
{

    public function index(Request $request)
    {
      $evenements = $this->getEvenements();
      $familles = Famille::all();
      $organismes = Organisme::all();
      $tags = Tag::all();
      return view('index', ['evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes]);
    }

    public function listEvenements(Request $request)
    {
      $filtres = (isset($request->filters) && is_array($request->filters))? $request->filters : [];
      $evenements = $this->getEvenements($filtres);
      if ($request->output == "html"){
        return view('partials/_list',['evenements' => $evenements]);
      }
      return $evenements->toJson();
    }

    private function getEvenements($filtres = [])
    {
      $evenements = Evenement::where('active','=', 1);
      if (count($filtres) > 0) {
        foreach(['familles', 'organismes', 'tags'] as $filtre) {
          if (isset($filtres[$filtre]) && count($filtres[$filtre]) > 0) {
            $ids = $filtres[$filtre];
            $evenements->whereHas($filtre, function (Builder $query) use ($ids) { $query->whereIn('id', $ids);});
          }
        }
      }
      return $evenements->orderBy('start', 'asc')->orderBy('end', 'asc')->get();
    }
}
