<?php

namespace App\Models;
use App\Models\Organismes;
use App\Models\Profils;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    use HasFactory;
    protected $fillable = ['profil_id', 'organisme_id', 'titre', 'description', 'date_debut', 'date_fin'];

    public function profil()
    {
        return $this->belongsTo(Profils::class, 'profil_id');
    }

    public function organisme()
    {
        return $this->belongsTo(Organismes::class, 'organisme_id');
    }
}
