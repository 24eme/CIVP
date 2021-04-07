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

    public function setRrule($dstart,$freq,$interval)
    {
      // DTSTART:20210301T103000Z\nRRULE:FREQ=MONTHLY;INTERVAL=2;UNTIL=20220601
      // $$rrule = "DSTART".$dstart."T103000Z\n".$freq...$interval;
    }
}
