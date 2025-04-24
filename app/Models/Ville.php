<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    /**
     * Get the terrains for the ville
     */
    public function terrains()
    {
        return $this->hasMany(Terrain::class);
    }
}
