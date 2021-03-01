<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profils extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nom', 'couleur'];

    public function __toString() {
      return $this->nom;
    }
}
