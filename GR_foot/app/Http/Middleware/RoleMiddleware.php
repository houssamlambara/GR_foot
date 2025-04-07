<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            // Vérifie si l'utilisateur connecté a le rôle demandé
            if (Auth::user()->role === $role) {
                return $next($request);
            } else {
                // Si le rôle ne correspond pas, redirige l'utilisateur
                return redirect('/');
            }
        }

        // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
        return redirect()->route('login');
    }
}
