<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Terrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('terrain')->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $terrains = Terrain::all();
        $selectedTerrainId = request('terrain_id');
        $selectedTerrain = null;
        
        if ($selectedTerrainId) {
            $selectedTerrain = Terrain::find($selectedTerrainId);
        }
        
        return view('reservation', compact('terrains', 'selectedTerrain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Log des données reçues pour le débogage
        \Log::info('Données de réservation reçues:', $request->all());
        
        $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'montant' => 'required|numeric|min:0',
            'telephone' => 'required|string|max:20',
            'activite' => 'required|string',
        ]);

        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['disponibilite'] = true;
            
            // Log des données avant création
            \Log::info('Données préparées pour la création:', $data);
            
            $reservation = Reservation::create($data);
            
            // Log de confirmation
            \Log::info('Réservation créée avec succès:', ['id' => $reservation->id]);
            
            return redirect()->route('reservation')->with('success', 'Réservation créée avec succès.');
        } catch (\Exception $e) {
            // Log de l'erreur
            \Log::error('Erreur lors de la création de la réservation:', ['error' => $e->getMessage()]);
            
            return redirect()->route('reservation')
                ->with('error', 'Une erreur est survenue lors de la création de la réservation. Veuillez réessayer.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $terrains = Terrain::all();
        return view('reservations.edit', compact('reservation', 'terrains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'montant' => 'required|numeric|min:0',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }

    public function dashboard(Request $request)
    {
        $query = Reservation::with(['terrain', 'user']);

        // Filtrage par date
        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }

        // Filtrage par terrain
        if ($request->has('terrain_id') && $request->terrain_id != '') {
            $query->where('terrain_id', $request->terrain_id);
        }

        // Filtrage par disponibilité
        if ($request->has('disponibilite') && $request->disponibilite != '') {
            $query->where('disponibilite', $request->disponibilite);
        }

        $reservations = $query->orderBy('date', 'desc')
                            ->orderBy('heure_debut', 'desc')
                            ->paginate(10);

        $terrains = Terrain::all();

        return view('dashboardreservation', compact('reservations', 'terrains'));
    }
}
