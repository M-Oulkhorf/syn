<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('connexion')) {
            return redirect()->route('login.show')
                ->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        $userId = session('connexion');
        $utilisateur = Utilisateur::find($userId);

        if (!$utilisateur) {
            session()->forget('connexion');
            return redirect()->route('login.show')
                ->with('error', 'Votre session est invalide. Veuillez vous reconnecter.');
        }

        $request->merge(['utilisateur_connecte' => $utilisateur]);
        return $next($request);
    }
}

