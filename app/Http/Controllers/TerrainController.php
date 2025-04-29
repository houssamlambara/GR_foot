<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Region;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TerrainController extends Controller
{
    /**
     * Affiche le formulaire d'ajout de terrain
     */
    public function create()
    {
        $terrains = Terrain::with('region.ville')->get();
        $regions = Region::with('ville')->get();
        $villes = Ville::all();
        return view('addterrain', compact('terrains', 'regions', 'villes'));
    }

    /**
     * Enregistre un nouveau terrain
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'tarif' => 'required|numeric|min:0',
            'region' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        $data = $request->all();

        // Créer ou récupérer la ville et la région
        $ville = Ville::firstOrCreate(['nom' => $request->ville]);
        $region = Region::firstOrCreate(
            ['nom' => $request->region],
            ['ville_id' => $ville->id]
        );
        
        $data['region_id'] = $region->id;
        unset($data['region'], $data['ville']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Store the image in the public disk
            $image->move(public_path('img'), $imageName);
            
            // Make sure the image path is relative to public directory
            $data['image'] = $imageName;
        }

        Terrain::create($data);

        return redirect()->route('terrains.index')
            ->with('success', 'Terrain ajouté avec succès.');
    }

    /**
     * Affiche la liste des terrains
     */
    public function index()
    {
        $terrains = Terrain::with('region.ville')->get();
        $regions = Region::with('ville')->get();
        $villes = Ville::all();
        return view('addterrain', compact('terrains', 'regions', 'villes'));
    }

    /**
     * Affiche le formulaire d'édition d'un terrain
     */
    public function edit(Terrain $terrain)
    {
        $regions = Region::all();
        $villes = Ville::all();
        return view('terrains.edit', compact('terrain', 'regions', 'villes'));
    }

    /**
     * Met à jour un terrain
     */
    public function update(Request $request, Terrain $terrain)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:50',
            'capacite' => 'required|integer|min:1',
            'tarif' => 'required|integer|min:0',
            'region' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        // Créer ou récupérer la ville et la région
        $ville = Ville::firstOrCreate(['nom' => $request->ville]);
        $region = Region::firstOrCreate(
            ['nom' => $request->region],
            ['ville_id' => $ville->id]
        );
        
        // Mettre à jour les données du terrain
        $terrain->type = $validatedData['type'];
        $terrain->capacite = $validatedData['capacite'];
        $terrain->tarif = $validatedData['tarif'];
        $terrain->region_id = $region->id;
        
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($terrain->image && file_exists(public_path('img/' . $terrain->image))) {
                unlink(public_path('img/' . $terrain->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Store the new image
            $image->move(public_path('img'), $imageName);
            
            // Update the image path
            $terrain->image = $imageName;
        }

        $terrain->save();

        return redirect()->route('terrains.index')
            ->with('success', 'Le terrain a été mis à jour avec succès.');
    }

    /**
     * Supprime un terrain
     */
    public function destroy(Terrain $terrain)
    {
        // Supprimer l'image si elle existe
        if ($terrain->image && file_exists(public_path('img/' . $terrain->image))) {
            unlink(public_path('img/' . $terrain->image));
        }

        $terrain->delete();

        return redirect()->route('terrains.index')
            ->with('success', 'Le terrain a été supprimé avec succès.');
    }
}
