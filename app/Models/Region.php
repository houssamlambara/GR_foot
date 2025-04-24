<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = [
        'id',
        'nom_ville'
    ];

    /**
     * Get the terrains associated with the region
     */
    public function terrains(): HasMany
    {
        return $this->hasMany(Terrain::class);
    }
} 