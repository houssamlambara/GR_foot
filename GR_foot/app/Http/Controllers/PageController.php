<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function activiter() {
        return view('activiter');
    }

    public function addterrain() {
        return view('addterrain');
    }

    public function addtounois() {
        return view('addtounois');
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
        return view('reservation');
    }

    public function signin() {
        return view('signin');
    }

    public function tournois() {
        return view('tournois');
    }

    public function utilisateur() {
        return view('utilisateur');
    }
}
