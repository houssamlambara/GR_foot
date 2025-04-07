<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);

        try {
            $user = User::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => bcrypt($validateData['password']),
                'role' => 'Utilisateur',
            ]);

            Auth::login($user);

            return redirect()->route('index')->with('success', 'Inscription réussie ! Bienvenue.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'inscription.'])->withInput();
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])) {
            $user = Auth::user();

            if ($user->role == 'Admin') {
                return redirect()->route('dashboard')->with('success', 'Connexion réussie ! Bienvenue Admin.');
            } elseif ($user->role == 'Utilisateur') {
                return redirect()->route('activiter')->with('success', 'Connexion réussie ! Bienvenue Utilisateur.');
            }

            return redirect()->route('index')->with('error', 'Rôle inconnu, veuillez contacter l\'administrateur.');
        } else {
            return back()->withErrors(['error' => 'Identifiants incorrects'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Vous avez été déconnecté.');
    }
}
