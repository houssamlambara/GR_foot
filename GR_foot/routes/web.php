<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\TournoiController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes publiques
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/reservation', [PageController::class, 'reservation'])->name('reservation')->middleware('auth');

// Routes principales
Route::middleware(['auth'])->group(function () {
    Route::get('/index', [PageController::class, 'index']);
    Route::get('/activiter', [PageController::class, 'activiter'])->name('activiter');
    Route::get('/addtounois', [PageController::class, 'addtounois']);
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboardreservation', [ReservationController::class, 'dashboard'])->name('dashboardreservation');
    Route::get('/tournois', [PageController::class, 'tournois']);
    Route::get('/addterrain', [PageController::class, 'addterrain'])->name('addterrain');
    Route::get('/utilisateur', [PageController::class, 'utilisateur'])->name('utilisateurs.index');
});

// Routes d'authentification
Route::get('/signin', [PageController::class, 'signin'])->name('signin');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes pour la gestion des tournois
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/tournois', [TournoiController::class, 'index'])->name('tournois.index');
    Route::get('/tournois/create', [TournoiController::class, 'create'])->name('tournois.create');
    Route::post('/tournois', [TournoiController::class, 'store'])->name('tournois.store');
    Route::get('/tournois/{tournoi}/edit', [TournoiController::class, 'edit'])->name('tournois.edit');
    Route::put('/tournois/{tournoi}', [TournoiController::class, 'update'])->name('tournois.update');
    Route::delete('/tournois/{tournoi}', [TournoiController::class, 'destroy'])->name('tournois.destroy');
});

// Routes pour la gestion des terrains (protégées pour les administrateurs)
Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/terrains', [TerrainController::class, 'index'])->name('terrains.index');
    Route::get('/terrains/create', [TerrainController::class, 'create'])->name('terrains.create');
    Route::post('/terrains', [TerrainController::class, 'store'])->name('terrains.store');
    Route::get('/terrains/{terrain}/edit', [TerrainController::class, 'edit'])->name('terrains.edit');
    Route::put('/terrains/{terrain}', [TerrainController::class, 'update'])->name('terrains.update');
    Route::delete('/terrains/{terrain}', [TerrainController::class, 'destroy'])->name('terrains.destroy');
});

// Routes pour la gestion des utilisateurs
// Route::middleware(['auth', 'Admin'])->group(function () {
//     Route::get('/utilisateurs', [UtilisateurController::class, 'index'])->name('utilisateurs.index');
//     Route::get('/utilisateurs/create', [UtilisateurController::class, 'create'])->name('utilisateurs.create');
//     Route::post('/utilisateurs', [UtilisateurController::class, 'store'])->name('utilisateurs.store');
//     Route::get('/utilisateurs/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateurs.edit');
//     Route::put('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'update'])->name('utilisateurs.update');
//     Route::delete('/utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
// });

// Routes pour les réservations
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

// Route API pour récupérer le tarif d'un terrain
Route::get('/api/terrains/{terrain}/tarif', function ($terrain) {
    $terrain = \App\Models\Terrain::findOrFail($terrain);
    return response()->json(['tarif' => $terrain->tarif]);
});

