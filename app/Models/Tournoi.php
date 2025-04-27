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
        'image',
        'statut'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    // Méthode pour marquer un tournoi comme terminé
    public function terminer()
    {
        $this->update(['statut' => 'termine']);
    }

    // Méthode pour vérifier si un tournoi est terminé
    public function estTermine()
    {
        return $this->statut === 'termine';
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class);
    }
}
