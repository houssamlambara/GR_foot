<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ville_id'
    ];

    /**
     * Get the ville that owns the region
     */
    public function ville(): BelongsTo
    {
        return $this->belongsTo(Ville::class);
    }

    /**
     * Get the terrains associated with the region
     */
    public function terrains(): HasMany
    {
        return $this->hasMany(Terrain::class);
    }
} 