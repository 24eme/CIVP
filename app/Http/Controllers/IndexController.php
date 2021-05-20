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
      $filtres = (isset($request->filters) && is_array($request->filters))? $request->filters : [];
      $evenements = $this->getwithReccurences($this->getObligations($filtres));
      $obligationsNonDates = $this->getwithReccurences($this->getObligationsNonDates($filtres));
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
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      if ($request->dates){
        $evenements = $this->getwithReccurences($this->getObligations($filtres));
        return ($request->output == "html")? view('partials/_list',['evenements' => $evenements, 'user' => $user]) : json_encode($evenements);
      } else {
        $obligationsNonDates = $this->getwithReccurences($this->getObligationsNonDates($filtres));
        return ($request->output == "html")? view('partials/_listNonDates',['obligationsNonDates' => $obligationsNonDates, 'user' => $user]) : json_encode($obligationsNonDates);
      }
    }

    private function getwithReccurences($obligations)
    {
      $result = array();
      foreach($obligations as $obligation) {
        $result = $result + $obligation->getwithReccurences();
      }
      ksort($result);
      $result = array_values($result);
      return $result;
    }

    private function getObligations($filtres = [])
    {
      return $this->findObligations($filtres, false);
    }

    private function getObligationsNonDates($filtres = [])
    {
      return $this->findObligations($filtres, true);
    }

    private function findObligations($filtres = [], $nonDates = false)
    {
      $evenements = Evenement::with('familles')->with('organismes')->with('tags');
      if (Auth::check()) {
        $evenements->whereIn('active', [0,1]);
      } else {
        $evenements->where('active','=', 1);
      }
      if ($nonDates) {
        $evenements->where(function($sq) {
          $sq->whereNull('start')->orWhereNull('end');
        });
      } else {
        $evenements->whereNotNull('start');
        $evenements->whereNotNull('end');
      }
      if (count($filtres) > 0) {
        foreach(['familles', 'organismes', 'tags'] as $filtre) {
          if (isset($filtres[$filtre]) && count($filtres[$filtre]) > 0) {
            $ids = $filtres[$filtre];
            $evenements->whereHas($filtre, function (Builder $query) use ($ids) { $query->whereIn('id', $ids);});
          }
        }
        if (isset($filtres['query']) && $filtres['query']) {
          $keywords = explode(' ', $filtres['query']);
          foreach ($keywords as $keyword) {
            if (strlen($keyword) <= 2) {
              continue;
            }
            $evenements->Where(function (Builder $query) use($keyword) {
                $query->orWhere('title', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%")
                ->orWhereHas('familles', function(Builder $query) use ($keyword) { $query->where('nom', 'like', "%{$keyword}%"); })
                ->orWhereHas('organismes', function(Builder $query) use ($keyword) { $query->where('nom', 'like', "%{$keyword}%"); })
                ->orWhereHas('tags', function(Builder $query) use ($keyword) { $query->where('nom', 'like', "%{$keyword}%"); });
            });
          }
        }
      }
      return $evenements->orderBy('start', 'asc')->orderBy('end', 'asc')->get();
    }

    public function mentions(Request $request)
    {
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      return view('mentions', ['user' => $user]);
    }
}
