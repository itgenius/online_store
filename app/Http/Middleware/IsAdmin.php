<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie que l'utilisateur est connecté et est admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Redirige vers la page d’accueil ou affiche une erreur 403
        abort(403, 'Accès réservé aux administrateurs.');
    }
}


