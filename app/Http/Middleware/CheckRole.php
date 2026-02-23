<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }
        
        $userRole = $request->user()->role; // ← ta colonne role

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Option : page 403 personnalisée ou redirection
        abort(403, 'Accès non autorisé. Vous n\'avez pas les droits nécessaires.');
        // ou : return redirect()->route('dashboard')->with('error', 'Accès refusé');
    }
}