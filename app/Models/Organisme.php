<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Organisme extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['nom', 'adresse', 'code_postal', 'ville', 'contact', 'telephone', 'email'];

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function findByLibelle($value)
    {
      switch ($value) {
        case 'FranceAgrimer':
          return 1;
        case 'Ardeche':
          return 2;
        case 'AVA':
          return 3;
        case 'InterRhones':
          return 4;
        case 'IGP':
          return 5;
        case 'CIVP':
          return 6;
        default:
          return 6;
          break;
      }
    }
}
