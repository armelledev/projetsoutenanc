<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmindDashboardController extends Controller
{
    public function index()
{
    $totalEmployes      = User::where('role', 'employe')->count(); // ou selon ton modèle
    $presentsAujourdhui = Pointage::whereDate('date', today())
                                  ->whereNotNull('arrivee')
                                  ->count(); // distinct employé si besoin

    $absentsAujourdhui  = $totalEmployes - $presentsAujourdhui;

    $dernierPointages   = Pointage::with('employe')
                                  ->latest('date')
                                  ->take(10)
                                  ->get();

    return view('layouts.admin.dashboard', compact(
        'totalEmployes',
        'presentsAujourdhui',
        'absentsAujourdhui',
        'dernierPointages'
    ));
}
}
