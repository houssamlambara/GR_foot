<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Terrain extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'capacite',
        'tarif',
        'region_id',
        'image'
    ];

    /**
     * Get the region that owns the terrain
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Check if the terrain is available
     */
    public function disponibiliter(): bool
    {
        return true;
    }

    /**
     * Reserve the terrain
     */
    public function reserverTerrain(): bool
    {
        return true;
    }

    /**
     * Display terrain information
     */
    public function afficher(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'capacite' => $this->capacite,
            'tarif' => $this->tarif,
            'image' => $this->image,
            'region' => $this->region ? $this->region->nom : null,
            'ville' => $this->region && $this->region->ville ? $this->region->ville->nom : null
        ];
    }
}
