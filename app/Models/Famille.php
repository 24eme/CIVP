<?php

namespace App\Models;
use App\Models\Evenement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Famille extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nom', 'couleur'];

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function evenements() {
      return $this->belongsToMany(Evenement::class);
    }
}
