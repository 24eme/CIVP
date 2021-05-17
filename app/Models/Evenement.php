<?php

namespace App\Models;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Tag;
use App\Models\Famille;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = ['type_id', 'organismes', 'familles', 'tags', 'title', 'description', 'start', 'end', 'textedeloi', 'liendeclaration','active', 'rrule'];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function organismes() {
        return $this->belongsToMany(Organisme::class)->orderBy('nom', 'asc');
    }

    public function organisme($id) {
        return $this->belongsToMany(Organisme::class)->find($id);
    }

    public function tags() {
      return $this->belongsToMany(Tag::class);
    }

    public function familles() {
      return $this->belongsToMany(Famille::class);
    }

    public function strTags() {
        $tags = [];
        foreach($this->tags as $tag) {
          $tags[] = $tag->nom;
        }
        return implode(', ', $tags);
    }

    public function strFamilles() {
        $familles = [];
        foreach($this->familles as $famille) {
          $familles[] = $famille->nom;
        }
        return implode(', ', $familles);
    }

    public function strOrganismes() {
        $organismes = [];
        foreach($this->organismes as $organisme) {
          $organismes[] = $organisme->nom;
        }
        return implode(', ', $organismes);
    }

    public function htmlOrganismesList() {
        $organismes = '';
        foreach($this->organismes as $organisme) {
          $organismes .= '<i class="fas fa-circle" style="color: '.$organisme->couleur.'"></i>&nbsp;'.$organisme->nom.' ';
        }
        return $organismes;
    }

    public function saveFamilles($familles) {
      $this->familles()->sync($familles);
    }

    public function saveOrganismes($organismes) {
      $this->organismes()->sync($organismes);
    }

    public function saveTags($items) {
      if (!is_array($items)) {
        $items = explode(',', $items);
      }
      if (!is_array($items)) {
        $items = array($items);
      }
      $toCreate = array();
      $toSync = array();
      $existants = Tag::get()->pluck('id', 'slug')->toArray();
      foreach($items as $item) {
        $tag = trim($item);
        $slug = Str::slug($tag);
        if (empty($slug)) {
          continue;
        }
        if (!isset($existants[$slug])) {
          $toCreate[$slug] = ['nom' => $tag];
        } else {
          $toSync[] = $existants[$slug];
        }
      }
      $results = $this->tags()->createMany($toCreate);
      foreach($results as $result) {
        $toSync[] = $result->id;
      }
      $this->tags()->sync(array_unique($toSync));
    }

    public function getwithReccurences() {
      $result = array();
      $result = $result + Evenement::getInfos($this);
      if(!in_array($this->rrule, array('mensuel', 'trimestriel', 'semestriel', 'annuel'))) {
        return $result;
      }
      if (!$this->end||!$this->start) {
        return $result;
      }
      $fin = new \DateTime();
      $fin->modify('+5 years');
      $start = new \DateTime($this->start);
      $end = new \DateTime($this->end);
      while($end->format('Ymd') < $fin->format('Ymd')) {
        $evt = clone $this;
        if ($this->rrule == 'mensuel') {
          $start->modify('+1 month');
          $end->modify('+1 month');
        }
        if ($this->rrule == 'trimestriel') {
          $start->modify('+3 months');
          $end->modify('+3 months');
        }
        if ($this->rrule == 'semestriel') {
          $start->modify('+6 months');
          $end->modify('+6 months');
        }
        if ($this->rrule == 'annuel') {
            $start->modify('+1 year');
            $end->modify('+1 year');
        }
        $evt->start = $start->format('Y-m-d');
        $evt->end = $end->format('Y-m-d');
        $result = $result + Evenement::getInfos($evt);
        unset($evt);
      }
      return $result;
    }

    public static function getInfos($evenement) {
      $key = str_replace('-','',$evenement->start).'_'.$evenement->id;
      return array($key => array(
          'id' => $evenement->id,
          'start' => $evenement->start,
          'end' => $evenement->end,
          'simpleTitle' => $evenement->title,
          'title' => $evenement->getTitleWithOrganismesGommettes(),
          'organismes' => $evenement->htmlOrganismesList(),
          'active' => $evenement->active,
          'color' => '#eeeeee',
          'textColor' => '#000000',
          'borderColor' => '#adb5bd'
      ));
    }

    public function getTitleWithOrganismesGommettes() {
        $html = '';
        foreach($this->organismes as $organisme) {
          $html .= '<i class="fas fa-circle" style="color: '.$organisme->couleur.'" title="'.$organisme->nom.'"></i> ';
        }
        $html .= $this->title;
        return $html;
    }

    public function setRrule($dstart,$freq,$interval)
    {
      // DTSTART:20210301T103000Z\nRRULE:FREQ=MONTHLY;INTERVAL=2;UNTIL=20220601
      // $$rrule = "DSTART".$dstart."T103000Z\n".$freq...$interval;
    }
}
