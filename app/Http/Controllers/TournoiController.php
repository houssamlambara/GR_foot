<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournoi;

class TournoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournoisActifs = Tournoi::where('statut', '!=', 'termine')
            ->orderBy('date_debut', 'desc')
            ->get();

        $tournoisTermines = Tournoi::where('statut', 'termine')
            ->orderBy('date_fin', 'desc')
            ->get();

        return view('tournois', compact('tournoisActifs', 'tournoisTermines'));
    }

    public function admin()
    {
        $tournois = Tournoi::orderBy('date_debut', 'desc')->get();
        return view('addtournois', compact('tournois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tournois.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'nombre_equipes' => 'required|integer|min:2',
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

        Tournoi::create($data);

        return redirect()->route('addtournois')
            ->with('success', 'Tournoi créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournoi $tournoi)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'nombre_equipes' => 'required|integer|min:2',
            'statut' => 'required|in:en_attente,en_cours,termine',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($tournoi->image && file_exists(public_path('img/' . $tournoi->image))) {
                unlink(public_path('img/' . $tournoi->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Store the new image
            $image->move(public_path('img'), $imageName);
            
            // Update the image path
            $data['image'] = $imageName;
        }

        $tournoi->update($data);

        return redirect()->route('addtournois')
            ->with('success', 'Tournoi mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournoi $tournoi)
    {
        // Supprimer l'image si elle existe
        if ($tournoi->image && file_exists(public_path('img/' . $tournoi->image))) {
            unlink(public_path('img/' . $tournoi->image));
        }

        $tournoi->delete();

        return redirect()->route('addtournois')
            ->with('success', 'Tournoi supprimé avec succès.');
    }

    /**
     * Marquer un tournoi comme terminé.
     */
    public function terminer(Tournoi $tournoi)
    {
        $tournoi->terminer();
        
        return redirect()->route('addtournois')
            ->with('success', 'Le tournoi a été marqué comme terminé.');
    }
}
