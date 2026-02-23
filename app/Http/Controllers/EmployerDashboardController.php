<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerDashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $todayPointage = $user->pointages()
        ->whereDate('date', today())
        ->first();

    $pointages = $user->pointages()
        ->latest('date')
        ->take(15)           // derniers 15 jours par ex.
        ->get();

    // Stats optionnelles (à calculer selon ton modèle)
    $heuresCeMois = $user->pointages()
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->sum('duree_en_heures') ?? 0;   // suppose que tu as un champ calculé

    $presencesCeMois = $user->pointages()
        ->whereMonth('date', now()->month)
        ->whereYear('date', now()->year)
        ->whereNotNull('arrivee')
        ->count();

    // ... autres stats

    return view('layouts.admin.employer', compact(
        'todayPointage',
        'pointages',
        'heuresCeMois',
        'presencesCeMois'
        // ...
    ));
}
}
