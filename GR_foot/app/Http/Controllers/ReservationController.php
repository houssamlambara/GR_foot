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
        $selectedDate = request('date', date('Y-m-d'));
        $selectedTerrain = null;
        
        if ($selectedTerrainId) {
            $selectedTerrain = Terrain::find($selectedTerrainId);
        }

        // Récupérer toutes les réservations pour le JavaScript
        $reservations = Reservation::where('date', $selectedDate)
            ->when($selectedTerrainId, function($query) use ($selectedTerrainId) {
                return $query->where('terrain_id', $selectedTerrainId);
            })
            ->get(['terrain_id', 'date', 'heure_debut', 'heure_fin'])
            ->map(function($reservation) {
                return [
                    'terrain_id' => $reservation->terrain_id,
                    'date' => $reservation->date,
                    'heure_debut' => substr($reservation->heure_debut, 0, 5),
                    'heure_fin' => substr($reservation->heure_fin, 0, 5)
                ];
            });

        return view('reservation', compact('terrains', 'selectedTerrain', 'selectedDate', 'reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'terrain_id' => 'required|exists:terrains,id',
                'date' => 'required|date',
                'heure_debut' => 'required',
                'heure_fin' => 'required|after:heure_debut',
                'montant' => 'required|numeric|min:0',
                'telephone' => 'required|string|max:20',
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

            // Préparer les données pour la création
            $data = $request->only([
                'terrain_id',
                'date',
                'heure_debut',
                'heure_fin',
                'montant',
                'telephone'
            ]);
            
            $data['user_id'] = Auth::id();
            
            // Créer la réservation
            $reservation = Reservation::create($data);
            
            return redirect()->route('reservation')->with('success', 'Réservation créée avec succès.');
            
        } catch (\Exception $e) {
            return redirect()->route('reservation')
                ->with('error', 'Une erreur est survenue lors de la création de la réservation: ' . $e->getMessage())
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
        $reservationToEdit = $reservation;
        return view('dashboardReservation', compact('reservationToEdit', 'terrains', 'reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        try {
            $request->validate([
                'terrain_id' => 'required|exists:terrains,id',
                'date' => 'required|date',
                'heure_debut' => 'required',
                'heure_fin' => 'required|after:heure_debut',
                'telephone' => 'required|string|max:20',
            ]);

            // Vérifier si le créneau est déjà réservé (en excluant la réservation actuelle)
            $creneauExistant = Reservation::where('terrain_id', $request->terrain_id)
                ->where('date', $request->date)
                ->where('id', '!=', $reservation->id)
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
                return back()
                    ->with('error', 'Ce créneau est déjà réservé. Veuillez choisir un autre horaire.')
                    ->withInput();
            }

            // Mettre à jour la réservation
            $reservation->update($request->only([
                'terrain_id',
                'date',
                'heure_debut',
                'heure_fin',
                'telephone'
            ]));

            return redirect()->route('dashboardReservation')
                ->with('success', 'Réservation mise à jour avec succès.');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Une erreur est survenue lors de la modification de la réservation: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        try {
            $reservation->delete();
            return redirect()->route('dashboardReservation')
                ->with('success', 'La réservation a été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('dashboardReservation')
                ->with('error', 'Une erreur est survenue lors de la suppression de la réservation.');
        }
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

        $reservations = $query->orderBy('date', 'desc')
                            ->orderBy('heure_debut', 'desc')
                            ->paginate(10);

        $terrains = Terrain::all();

        return view('dashboardreservation', compact('reservations', 'terrains'));
    }

    public function checkAvailability(Request $request)
    {
        $date = $request->get('date');
        $terrainId = $request->get('terrain_id');

        // Récupérer toutes les réservations pour cette date et ce terrain
        $reservedSlots = Reservation::where('date', $date)
            ->where('terrain_id', $terrainId)
            ->get();

        // Générer tous les créneaux horaires avec leur statut
        $availableSlots = [];
        for($hour = 9; $hour <= 22; $hour++) {
            $timeSlot = sprintf('%02d:00', $hour);
            $isReserved = false;

            // Vérifier si ce créneau est dans une période réservée
            foreach($reservedSlots as $reservation) {
                $debutReservation = substr($reservation->heure_debut, 0, 5);
                $finReservation = substr($reservation->heure_fin, 0, 5);
                
                if ($timeSlot >= $debutReservation && $timeSlot < $finReservation) {
                    $isReserved = true;
                    break;
                }
            }

            $availableSlots[] = [
                'time' => $timeSlot,
                'reserved' => $isReserved
            ];
        }

        return response()->json([
            'availableSlots' => $availableSlots
        ]);
    }
}
