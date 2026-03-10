<?php

namespace App\Http\Controllers;

use App\Models\ReasonAbsences;
use Illuminate\Http\Request;
use App\Models\Presence; 
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
{
    $user = auth()->user();
    $aujourdhui = now()->format('Y-m-d');
    $heureActuelle = now()->hour;

    // Si il est 17h ou plus
    if ($heureActuelle >= 17) {
      
        \App\Models\Presence::firstOrCreate(
            ['user_id' => $user->id, 'date' => $aujourdhui],
            [
                'statut' => 'absent',
                'heure_arrivee' => null,
                'heure_depart' => null,
                'commentaire' => 'Absence automatique : aucun pointage avant 17h'
            ]
        );
    }

    $mesPresences = \App\Models\Presence::where('user_id', $user->id)
                            ->orderBy('date', 'desc')
                            ->paginate(10);

    return view('dashboard', compact('mesPresences'));
}

    public function storeJustification(Request $request, Presence $presence)
{
    $request->validate([
        'motif' => 'required|string|min:10',
        'document' => 'nullable|mimes:pdf,jpg,png|max:2048' // Optionnel : limite à 2Mo
    ]);

    $path = null;
    if ($request->hasFile('document')) {
        $path = $request->file('document')->store('justificatifs', 'public');
    }

    ReasonAbsences::create([
        'presence_id' => $presence->id,
        'user_id' => auth()->id(),
        'motif' => $request->motif,
        'piece_jointe' => $path,
    ]);

    return back()->with('success', 'Votre justification a été transmise à l\'administrateur.');
}
}
