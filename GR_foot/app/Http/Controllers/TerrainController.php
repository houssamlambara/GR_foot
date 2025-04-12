<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    /**
     * Affiche le formulaire d'ajout de terrain
     */
    public function create()
    {
        $terrains = Terrain::all();
        return view('addterrain', compact('terrains'));
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
            'localisation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $data['image'] = $imageName;
        }

        Terrain::create($data);

        return redirect('/addterrain')
            ->with('success', 'Terrain ajouté avec succès.');
    }

    /**
     * Affiche la liste des terrains
     */
    public function index()
    {
        $terrains = Terrain::all();
        return view('addterrain', compact('terrains'));
    }

    /**
     * Affiche le formulaire d'édition d'un terrain
     */
    public function edit(Terrain $terrain)
    {
        return view('terrains.edit', compact('terrain'));
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
            'localisation' => 'required|string|max:255',
        ]);

        $terrain->update($validatedData);

        return redirect()->route('terrains.index')
            ->with('success', 'Le terrain a été mis à jour avec succès.');
    }

    /**
     * Supprime un terrain
     */
    public function destroy(Terrain $terrain)
    {
        $terrain->delete();

        return redirect()->route('terrains.index')
            ->with('success', 'Le terrain a été supprimé avec succès.');
    }
}
