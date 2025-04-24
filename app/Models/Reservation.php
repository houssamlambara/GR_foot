<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Cette classe représente une réservation dans la base de données
class Reservation extends Model
{
    // Liste des champs qu'on peut remplir lors d'une réservation
    protected $fillable = [
        'user_id',      // Qui fait la réservation
        'terrain_id',   // Quel terrain
        'date',         // Quel jour
        'heure_debut',  // À quelle heure ça commence
        'heure_fin',    // À quelle heure ça finit
        'montant',      // Combien ça coûte
        'telephone'     // Numéro de téléphone
        
    ];

    // Pour que la date soit plus facile à utiliser
    protected $casts = [
        'date' => 'date'
    ];

    // Lien avec le terrain
    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }

    // Lien avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Chercher les réservations d'une date précise
    public function trouverParDate($date)
    {
        return $this->whereDate('date', $date)->get();
    }

    // Chercher les réservations d'un terrain précis
    public function trouverParTerrain($terrainId)
    {
        return $this->where('terrain_id', $terrainId)->get();
    }

    // Vérifier si un créneau est libre
    public function estDisponible($date, $terrainId, $heureDebut, $heureFin)
    {
        // On cherche s'il existe déjà une réservation qui chevauche ce créneau
        $reservationExistante = $this->where('terrain_id', $terrainId)
            ->where('date', $date)
            ->where(function($query) use ($heureDebut, $heureFin) {
                // Vérifie si l'heure demandée est déjà prise
                $query->where('heure_debut', '<', $heureFin)
                      ->where('heure_fin', '>', $heureDebut);
            })
            ->first();

        // Si on ne trouve aucune réservation, le créneau est libre
        return $reservationExistante === null;
    }
}
