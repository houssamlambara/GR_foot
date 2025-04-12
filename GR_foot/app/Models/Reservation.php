<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'terrain_id',
        'date',
        'heure_debut',
        'heure_fin',
        'montant',
        'disponibilite',
        'telephone',
        'activite'
    ];

    // Relation avec le terrain
    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
