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

        // Récupérer toutes les réservations existantes
        $reservations = Reservation::where('disponibilite', true)
            ->select('terrain_id', 'date', 'heure_debut', 'heure_fin')
            ->get()
            ->map(function ($reservation) {
                return [
                    'terrain_id' => $reservation->terrain_id,
                    'date' => $reservation->date,
                    'heure_debut' => substr($reservation->heure_debut, 0, 5),
                    'heure_fin' => substr($reservation->heure_fin, 0, 5)
                ];
            });
        
        return view('reservation', compact('terrains', 'selectedTerrain', 'reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Log des données reçues pour le débogage
        logger('Données de réservation reçues:', $request->all());
        
        $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'montant' => 'required|numeric|min:0',
            'telephone' => 'required|string|max:20',
            'activite' => 'required|string',
        ]);

        // Vérifier si le créneau est déjà réservé
        $creneauExistant = Reservation::where('terrain_id', $request->terrain_id)
            ->where('date', $request->date)
            ->where(function($query) use ($request) {
                $query->where(function($q) use ($request) {
                    $q->where('heure_debut', '<=', $request->heure_debut)
                      ->where('heure_fin', '>', $request->heure_debut);
                })
                ->orWhere(function($q) use ($request) {
                    $q->where('heure_debut', '<', $request->heure_fin)
                      ->where('heure_fin', '>=', $request->heure_fin);
                })
                ->orWhere(function($q) use ($request) {
                    $q->where('heure_debut', '>=', $request->heure_debut)
                      ->where('heure_fin', '<=', $request->heure_fin);
                });
            })
            ->exists();

        if ($creneauExistant) {
            return redirect()->route('reservation')
                ->with('error', 'Ce créneau est déjà réservé. Veuillez choisir un autre horaire.')
                ->withInput();
        }

        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['disponibilite'] = true;
            
            // Log des données avant création
            logger('Données préparées pour la création:', $data);
            
            $reservation = Reservation::create($data);
            
            // Log de confirmation
            logger('Réservation créée avec succès:', ['id' => $reservation->id]);
            
            return redirect()->route('reservation')->with('success', 'Réservation créée avec succès.');
        } catch (\Exception $e) {
            // Log de l'erreur
            logger('Erreur lors de la création de la réservation:', ['error' => $e->getMessage()]);
            
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
