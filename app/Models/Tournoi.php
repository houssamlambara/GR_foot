<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournoi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'date_debut',
        'date_fin',
        'nombre_equipes',
        'prix_inscription',
        'description',
        'image',
    ];
}
