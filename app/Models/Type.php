<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nom', 'couleur'];

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function findByLibelle($value)
    {
      switch ($value) {
        case 'Aide':
          return 1;
        case 'Evenement':
          return 2;
        case 'Obligation':
          return 3;
        default:
          return 2;
          break;
      }
    }
}
