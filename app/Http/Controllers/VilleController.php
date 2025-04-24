<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Enregistre une nouvelle ville
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        Ville::create($request->all());

        return redirect()->back()
            ->with('success', 'Ville ajoutée avec succès.');
    }

    /**
     * Met à jour une ville
     */
    public function update(Request $request, Ville $ville)
    {
        $request->validate([
            'nom' => 'required|string|max:255'
        ]);

        $ville->update($request->all());

        return redirect()->back()
            ->with('success', 'Ville mise à jour avec succès.');
    }

    /**
     * Supprime une ville
     */
    public function destroy(Ville $ville)
    {
        $ville->delete();

        return redirect()->back()
            ->with('success', 'Ville supprimée avec succès.');
    }
}
