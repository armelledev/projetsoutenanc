<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
      $middleware->alias([
        'role' => \App\Http\Middleware\RestrictByRole::class,
        // Tu peux en ajouter d'autres ici
    ]);
    // ← AJOUTE ÇA : redirection personnalisée après login
    $middleware->redirectUsersTo(function ($request) {
        if (! $user = $request->user()) {
            return '/login';
        }

        if ($user->isEmployee()) {
            return route('dashboard');
        }

        // admin ou superadmin
        return route('admin.dashboard');
    });

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
    
