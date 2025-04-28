<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournoi;
use App\Models\Equipe;

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
            if ($tournoi->image && file_exists(public_path('img/' . $tournoi->image))) {
                unlink(public_path('img/' . $tournoi->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
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

    public function inscription(Request $request, Tournoi $tournoi)
    {
        $request->validate([
            'nom_equipe' => 'required|string|max:255',
        ]);

        // Vérifier si le tournoi est en cours
        if ($tournoi->statut !== 'en_cours') {
            return redirect()->back()->with('error', 'Les inscriptions sont fermées pour ce tournoi.');
        }

        // Vérifier si l'utilisateur est déjà inscrit
        $userTeam = $tournoi->equipes()
            ->where('user_id', auth()->id())
            ->first();

        if ($userTeam) {
            return redirect()->back()
                ->with('error', 'Vous êtes déjà inscrit à ce tournoi avec l\'équipe ' . $userTeam->nom);
        }

        try {
            // Créer une nouvelle équipe
            $equipe = Equipe::create([
                'nom' => $request->nom_equipe,
                'user_id' => auth()->id()
            ]);

            // Inscrire l'équipe au tournoi
            $tournoi->equipes()->attach($equipe->id);

            return redirect()->route('tournois.index')
                ->with('success', 'Votre équipe a été inscrite au tournoi avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.');
        }
    }
}
