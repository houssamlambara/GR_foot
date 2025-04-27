<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'user_id'
    ];

    /**
     * Get the creator of the team.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the users that belong to the team.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the tournaments this team participates in.
     */
    public function tournois()
    {
        return $this->belongsToMany(Tournoi::class, 'equipe_tournoi');
    }
}
