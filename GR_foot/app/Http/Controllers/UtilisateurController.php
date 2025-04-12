<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;

class UtilisateurController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        
        // Pour chaque utilisateur, compter le nombre de réservations
        foreach ($users as $user) {
            $user->reservations_count = Reservation::where('user_id', $user->id)->count();
        }
        
        return view('utilisateur', compact('users'));
    }

    /**
     * Affiche le formulaire de création d'un utilisateur.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return redirect()->route('utilisateurs.index')
            ->with('info', 'La création d\'utilisateurs est temporairement désactivée.');
    }

    /**
     * Enregistre un nouvel utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Affiche un utilisateur spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $reservations = Reservation::where('user_id', $id)->get();
        
        return view('utilisateurs.show', compact('user', 'reservations'));
    }

    /**
     * Affiche le formulaire d'édition d'un utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('utilisateurs.edit', compact('user'));
    }

    /**
     * Met à jour un utilisateur spécifique.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable|in:Admin,Utilisateur',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        
        if (isset($validated['role'])) {
            $user->role = $validated['role'];
        }
        
        $user->save();

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
} 