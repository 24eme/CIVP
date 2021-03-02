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
}
