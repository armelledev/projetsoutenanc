<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next, string ...$allowedRoles)
    {
        if (! $user = $request->user()) {
            return redirect()->route('login');
        }

        $userRoleValue = $user->role?->value;

        if (in_array($userRoleValue, $allowedRoles)) {
            return $next($request);
        }

        abort(403, 'Accès refusé – rôle non autorisé.');
        // ou : return redirect('/dashboard')->with('error', 'Accès non autorisé.');
    }
}
