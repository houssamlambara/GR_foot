<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Region;
use App\Models\Ville;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function index()
    {
        $terrains = Terrain::with('region.ville')->get();
        $regions = Region::with('ville')->get();
        $villes = Ville::all();
        
        return view('activiter', compact('terrains', 'regions', 'villes'));
    }
} 