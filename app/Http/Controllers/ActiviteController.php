<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Region;
use App\Models\Ville;

class ActiviteController extends Controller
{
    public function index()
    {
        $terrains = Terrain::with('region.ville')->paginate(6);
        $regions = Region::with('ville')->get();
        $villes = Ville::all();
        
        return view('activiter', compact('terrains', 'regions', 'villes'));
    }
} 