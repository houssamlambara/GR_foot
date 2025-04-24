<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terrain;
use App\Models\Region;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function activiter() {
        $terrains = Terrain::all();
        return view('activiter', compact('terrains'));
    }

    public function addterrain() {
        $terrains = Terrain::all();
        $regions = Region::all();
        return view('addterrain', compact('terrains', 'regions'));
    }

    public function addtournois() {
        return view('addtournois');
    }

    public function contact() {
        return view('contact');
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function dashboardReservation() {
        return view('dashboardReservation');
    }

    public function reservation() {
        $controller = new \App\Http\Controllers\ReservationController();
        return $controller->create();
    }

    public function signin() {
        return view('signin');
    }

    public function tournois() {
        return view('tournois');
    }

    public function utilisateur() {
        $controller = new \App\Http\Controllers\UtilisateurController();
        return $controller->index();
    }
}
