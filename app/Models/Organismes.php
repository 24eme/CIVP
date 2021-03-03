<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organismes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nom', 'adresse', 'code_postal', 'ville', 'telephone', 'email'];
}