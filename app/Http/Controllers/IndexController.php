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
use Illuminate\Support\Facades\File;
use Sabre\VObject;

class IndexController extends Controller
{

    public function index(Request $request)
    {
      $filtres = (isset($request->filters) && is_array($request->filters))? $request->filters : [];
      if (!$filtres && isset($_COOKIE['calendrier-filtres'])) {
        parse_str($_COOKIE['calendrier-filtres'], $filtres);
        $filtres = $filtres['filters'];
      }
      $strFilters = $this->makeStrFilters($filtres);
      $evenements = $this->getwithReccurences($this->getObligations($filtres));
      $obligationsNonDates = $this->getwithReccurences($this->getObligationsNonDates($filtres));
      $familles = Famille::all();
      $organismesVisibles = Organisme::where('visible_filtre', 1)->get();
      $organismesCaches = Organisme::where('visible_filtre', 0)->get();
      $organismes = Organisme::all();
      $tags = Tag::orderBy('slug')->get();
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      return view('index', ['strFilters' => $strFilters, 'organismesCaches' => $organismesCaches, 'organismesVisibles' => $organismesVisibles, 'obligationsNonDates' => $obligationsNonDates, 'evenements' => $evenements,'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user, 'filtres' => $filtres]);
    }

    private function makeStrFilters($filters) {
      $result = '';
      if (isset($filters['organismes'])  && !empty($filters['organismes'])) {
        $result .= '<li><u>Organisme(s)</u> : '.implode(', ', Organisme::whereIn('id', $filters['organismes'])->pluck('nom')->all()).'</li>';
      }
      if (isset($filters['familles'])  && !empty($filters['familles'])) {
        $result .= '<li><u>Famille(s)</u> : '.implode(', ', Famille::whereIn('id', $filters['familles'])->pluck('nom')->all()).'</li>';
      }
      if (isset($filters['tags'])  && !empty($filters['tags'])) {
        $result .= '<li><u>Tag(s)</u> : '.implode(', ', Tag::whereIn('id', $filters['tags'])->pluck('nom')->all()).'</li>';
      }
      if (isset($filters['query'])  && !empty($filters['query'])) {
        $result .= '<li><u>Recherche</u> : '.$filters['query'].'</li>';
      }
      return ($result)? '<ul class="mb-0 pl-3">'.$result.'</ul>': null;
    }

    public function export(){
      if (isset($_COOKIE['calendrier-filtres'])) {
        parse_str($_COOKIE['calendrier-filtres'], $filtres);
        $filtres = $filtres['filters'];
      } else {
            $filtres = [];
      }
      $evenements = $this->getwithReccurences($this->getObligations($filtres));
      $vcalendar = new VObject\Component\VCalendar();
      foreach ($evenements as $evenement) {
        $vevent = $vcalendar->add('VEVENT', [
            'SUMMARY' => $evenement['simpleTitle'],
            'DTSTART' => new \DateTime($evenement['start']),
            'DTEND' => new \DateTime($evenement['end']),
        ]);
        $vcalendar->add($vevent);
      }
      File::put(storage_path('calendrier-vitivini.vinsdeprovence.com.ics'),$vcalendar->serialize());
      return response()->download(storage_path('calendrier-vitivini.vinsdeprovence.com.ics'));
    }

    public function filtersInfos(Request $request)
    {
      $filtres = null;
      if (isset($_COOKIE['calendrier-filtres'])) {
        parse_str($_COOKIE['calendrier-filtres'], $filtres);
        $filtres = $filtres['filters'];
      }
      return $this->makeStrFilters($filtres);
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
        return ($request->output == "html")? view('partials/_list',['evenements' => $evenements, 'user' => $user, 'filtres' => $filtres]) : json_encode($evenements);
      } else {
        $obligationsNonDates = $this->getwithReccurences($this->getObligationsNonDates($filtres));
        return ($request->output == "html")? view('partials/_listNonDates',['obligationsNonDates' => $obligationsNonDates, 'user' => $user, 'filtres' => $filtres]) : json_encode($obligationsNonDates);
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
            $evenements->Where(function (Builder $query) use($keywords) {
              foreach ($keywords as $keyword) {
                if (strlen($keyword) <= 2) {
                  continue;
                }
                $query->orWhere('title', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "{$keyword}%")
                ->orWhereHas('familles', function(Builder $query) use ($keyword) { $query->where('nom', 'like', "%{$keyword}%"); })
                ->orWhereHas('organismes', function(Builder $query) use ($keyword) { $query->where('nom', 'like', "%{$keyword}%"); })
                ->orWhereHas('tags', function(Builder $query) use ($keyword) { $query->where('nom', 'like', "%{$keyword}%"); });
              }
            });
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

    public function reinitFilters(Request $request)
    {
      setcookie('calendrier-filtres');
      return redirect(route('index'));
    }
}
