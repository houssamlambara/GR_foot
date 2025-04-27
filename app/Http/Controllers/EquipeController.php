<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function create()
    {
        return view('equipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'sport' => 'required|string|max:255',
            'nombre_joueurs' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Store the image in the public disk
            $image->move(public_path('img'), $imageName);
            
            // Make sure the image path is relative to public directory
            $data['image'] = $imageName;
        }

        Equipe::create($data);

        return redirect()->route('equipes.index')
            ->with('success', 'Équipe créée avec succès.');
    }

    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'sport' => 'required|string|max:255',
            'nombre_joueurs' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($equipe->image && file_exists(public_path('img/' . $equipe->image))) {
                unlink(public_path('img/' . $equipe->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Store the new image
            $image->move(public_path('img'), $imageName);
            
            // Update the image path
            $data['image'] = $imageName;
        }

        $equipe->update($data);

        return redirect()->route('equipes.index')
            ->with('success', 'Équipe mise à jour avec succès.');
    }

    public function destroy(Equipe $equipe)
    {
        // Supprimer l'image si elle existe
        if ($equipe->image && file_exists(public_path('img/' . $equipe->image))) {
            unlink(public_path('img/' . $equipe->image));
        }

        $equipe->delete();

        return redirect()->route('equipes.index')
            ->with('success', 'Équipe supprimée avec succès.');
    }
} 