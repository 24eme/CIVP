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
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index(Request $request)
    {
      $evenements = $this->getEvenements();
      $obligationsNonDates = $this->getObligationsNonDates();
      $familles = Famille::all();
      $organismes = Organisme::all();
      $tags = Tag::all();
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      return view('index', ['obligationsNonDates' => $obligationsNonDates, 'evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user]);
    }

    public function listEvenements(Request $request)
    {
      $filtres = (isset($request->filters) && is_array($request->filters))? $request->filters : [];
      $evenements = $this->getEvenements($filtres);
      $obligationsNonDates = $this->getObligationsNonDates($filtres);
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      if ($request->output == "html"){
        return view('partials/_list',['obligationsNonDates' => $obligationsNonDates, 'evenements' => $evenements, 'user' => $user]);
      }
      return $evenements->load('organismes')->toJson();
    }

    private function getEvenements($filtres = [])
    {
      if (Auth::check()) {
        $evenements = Evenement::whereIn('active', [0,1]);
      } else {
        $evenements = Evenement::where('active','=', 1);
      }
      $evenements->whereNotNull('start');
      $evenements->whereNotNull('end');
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


    private function getObligationsNonDates($filtres = [])
    {
      if (Auth::check()) {
        $evenements = Evenement::whereIn('active', [0,1]);
      } else {
        $evenements = Evenement::where('active','=', 1);
      }
      $evenements->where(function($sq) {
        $sq->whereNull('start')->orWhereNull('end');
      });
      if (count($filtres) > 0) {
        foreach(['familles', 'organismes', 'tags'] as $filtre) {
          if (isset($filtres[$filtre]) && count($filtres[$filtre]) > 0) {
            $ids = $filtres[$filtre];
            $evenements->whereHas($filtre, function (Builder $query) use ($ids) { $query->whereIn('id', $ids);});
          }
        }
      }
      return $evenements->get();
    }
}
