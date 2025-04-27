<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make($validateData['password']),
                'role' => 'Utilisateur',
                'is_banned' => false,
            ]);

            if (!$user) {
                throw new \Exception('Échec de la création de l\'utilisateur');
            }

            Auth::login($user);
            
            return redirect()->route('index')
                ->with('success', 'Inscription réussie ! Bienvenue ' . $user->name);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'inscription : ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        // Vérifier d'abord si l'utilisateur est banni
        $user = User::where('email', $validatedData['email'])->first();
        
        if ($user && $user->is_banned) {
            return back()
                ->with('error', 'Votre compte a été suspendu. Veuillez contacter l\'administrateur.')
                ->withInput();
        }

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ])) {
            $user = Auth::user();

            // Double vérification du bannissement après la connexion
            if ($user->is_banned) {
                Auth::logout();
                return back()
                    ->with('error', 'Votre compte a été suspendu. Veuillez contacter l\'administrateur.')
                    ->withInput();
            }

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
