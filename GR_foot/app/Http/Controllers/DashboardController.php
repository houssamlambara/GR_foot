<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Terrain;
use App\Models\User;
use App\Models\Tournoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques
        $stats = [
            'total_reservations' => Reservation::count(),
            'terrains_disponibles' => Terrain::count(),
            'tournois_actifs' => Tournoi::whereDate('date_fin', '>=', now())->count(), // Tournois non terminés
            'total_users' => User::count()
        ];

        // Récupérer les 5 dernières réservations avec les relations
        $recent_reservations = Reservation::with(['user', 'terrain'])
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // Statistiques pour le graphique avec syntaxe PostgreSQL
        $monthly_stats = Reservation::select(
            DB::raw('EXTRACT(MONTH FROM created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        // Formater les données pour le graphique
        $chart_data = array_fill(1, 12, 0); // Initialiser tous les mois à 0
        foreach ($monthly_stats as $month => $total) {
            $chart_data[(int)$month] = $total;
        }

        return view('dashboard', compact('stats', 'recent_reservations', 'chart_data'));
    }

    public function getRealtimeStats()
    {
        $stats = [
            'total_reservations' => Reservation::count(),
            'terrains_disponibles' => Terrain::count(),
            'tournois_actifs' => Tournoi::whereDate('date_fin', '>=', now())->count(), // Tournois non terminés
            'total_users' => User::count()
        ];

        return response()->json($stats);
    }
}
