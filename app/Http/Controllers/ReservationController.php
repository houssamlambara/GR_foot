<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Terrain;
use App\Models\Region;
use App\Models\Ville;
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
     * Affiche le formulaire de création d'une réservation
     */
    public function create()
    {
        // Récupérer le terrain sélectionné s'il existe
        $terrainId = request('terrain_id');
        $selectedTerrain = null;

        if ($terrainId) {
            $selectedTerrain = Terrain::with(['region.ville'])->find($terrainId);
        }

        // Récupérer la date (aujourd'hui par défaut)
        $date = request('date', date('Y-m-d'));

        // Récupérer les réservations existantes pour ce jour
        $reservations = Reservation::where('date', $date)
            ->when($terrainId, function($query) use ($terrainId) {
                return $query->where('terrain_id', $terrainId);
            })
            ->get(['terrain_id', 'date', 'heure_debut', 'heure_fin']);

        return view('reservation', compact('selectedTerrain', 'date', 'reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'montant' => 'required|numeric|min:0',
            'telephone' => 'required|string|max:20',
        ]);

        // Vérifier la disponibilité
        $reservation = new Reservation();
        if (!$reservation->estDisponible(
            $request->date,
            $request->terrain_id,
            $request->heure_debut,
            $request->heure_fin
        )) {
            return back()
                ->with('error', 'Ce créneau est déjà réservé.')
                ->withInput();
        }

        // Créer la réservation
        $validated['user_id'] = Auth::id();
        Reservation::create($validated);

        return redirect()
            ->route('activiter')
            ->with('success', 'Votre réservation a été confirmée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', ['reservation' => $reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $terrains = Terrain::all();
        return view('dashboardReservation', compact('reservation', 'terrains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'terrain_id' => 'required|exists:terrains,id',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'telephone' => 'required|string|max:20',
        ]);

        if (!$reservation->estDisponible(
            $request->date,
            $request->terrain_id,
            $request->heure_debut,
            $request->heure_fin
        )) {
            return back()
                ->with('error', 'Ce créneau est déjà réservé.')
                ->withInput();
        }

        $reservation->update($validated);
        return redirect()
            ->route('dashboardReservation')
            ->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // Vérifier que l'utilisateur est bien le propriétaire de la réservation
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->route('mes.reservations')
                ->with('error', 'Vous n\'êtes pas autorisé à supprimer cette réservation.');
        }

        $reservation->delete();
        return redirect()
            ->route('mes.reservations')
            ->with('success', 'Réservation annulée avec succès.');
    }

    /**
     * Affiche les réservations de l'utilisateur connecté
     */
    public function mesReservations()
    {
        $reservations = Reservation::with(['terrain.region.ville'])
            ->where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->orderBy('heure_debut', 'desc')
            ->paginate(5);

        return view('mesReservations', compact('reservations'));
    }

    /**
     * Affiche le tableau de bord des réservations avec filtres
     */
    public function dashboard()
    {
        $reservations = Reservation::with(['terrain', 'user'])
            ->orderBy('date', 'desc')
            ->orderBy('heure_debut', 'desc')
            ->paginate(10);

        $terrains = Terrain::all();
        $regions = Region::all();
        return view('dashboardreservation', compact('reservations', 'terrains', 'regions'));
    }

    public function checkAvailability(Request $request)
    {
        $date = $request->get('date');
        $terrainId = $request->get('terrain_id');
        
        if (!$date || !$terrainId) {
            return response()->json([
                'error' => 'Date et terrain requis'
            ], 400);
        }

        $creneaux = [];
        $reservation = new Reservation();
        
        // Générer les créneaux de 9h à 22h
        for ($heure = 9; $heure <= 22; $heure++) {
            $debut = sprintf('%02d:00', $heure);
            $fin = sprintf('%02d:00', $heure + 1);
            
            $creneaux[] = [
                'heure' => $debut,
                'fin' => $fin,
                'disponible' => $reservation->estDisponible($date, $terrainId, $debut, $fin)
            ];
        }

        // Récupérer le tarif du terrain
        $terrain = Terrain::find($terrainId);
        $tarif = $terrain ? $terrain->tarif : 0;

        return response()->json([
            'creneaux' => $creneaux,
            'tarif' => $tarif
        ]);
    }
}
