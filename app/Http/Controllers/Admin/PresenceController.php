<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePresenceRequest;
use App\Models\Presence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Affiche la liste des présences avec filtres.
     */
    public function index(Request $request)
    {
        $query = Presence::with('user');

        // Filtre par date
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        // Filtre par employé
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filtre par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $presences = $query->orderBy('date', 'desc')->paginate(5);
        $users = User::where('role', 'employe')->orderBy('name')->get();

        return view('admin.presences.index', compact('presences', 'users'));
    }

    /**
     * Affiche le formulaire de création manuelle par l'admin.
     */
    public function create()
    {
        $employes = User::where('role', 'employer')->orderBy('name')->get();

        return view('admin.presences.create', compact('employes'));
    }

    public function store(StorePresenceRequest $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'date' => 'required|date',
        //     'statut' => 'nullable|in:present,absent,retard,justifie',
        //     'commentaire' => 'nullable|string|max:500',
        // ]);

        $request->validated();

        // 1. Vérifier si une présence existe déjà pour cet employé ce jour-là
        $exists = Presence::where('user_id', $request->user_id)
            ->whereDate('date', $request->date)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Une présence est déjà enregistrée pour cet employé à cette date.');
        }

        // 2. Logique de calcul du statut automatique
        $heureActuelle = now();
        $heureLimite = Carbon::createFromTime(8, 15, 0); // Limite à 08:15:00

        // Si l'admin n'a pas choisi de statut spécifique (ex: absent), on calcule
        $statutFinal = $request->statut;

        if (! $statutFinal) {
            $statutFinal = $heureActuelle->greaterThan($heureLimite) ? 'retard' : 'present';
        }

        // 3. Création de l'enregistrement
        Presence::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'heure_arrivee' => ($statutFinal !== 'absent') ? $heureActuelle->format('H:i:s') : null,
            'statut' => $statutFinal,
            'commentaire' => $request->commentaire,
        ]);

        return redirect()->route('admin.presences.index')
            ->with('success', 'Pointage réussi. Statut : '.ucfirst($statutFinal));
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(Presence $presence)
    {
        $users = User::where('role', 'employee')->get(); // ou tous les employés

        return view('admin.presences.edit', compact('presence', 'users'));
    }

    public function update(Request $request, Presence $presence)
    {
        $validated = $request->validated([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'statut' => 'required|in:present,absent,retard,justifie',
            'commentaire' => 'nullable|string|max:500',
            'heure_arrivee' => 'nullable',
            // On valide l'heure de départ seulement si l'arrivée est présente
            'heure_depart' => $request->heure_arrivee ? 'nullable|after_or_equal:heure_arrivee' : 'nullable',
        ]);

        // Vérifier l'unicité (sauf pour cette fiche précise)
        $exists = Presence::where('user_id', $request->user_id)
            ->whereDate('date', $request->date)
            ->where('id', '!=', $presence->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['date' => 'Une fiche existe déjà pour cet employé à cette date.'])->withInput();
        }

        $presence->update($validated);

        return redirect()->route('admin.presences.index')
            ->with('success', 'Présence mise à jour avec succès.');
    }

    public function depart(Presence $presence)
    {
        if ($presence->heure_arrivee && ! $presence->heure_depart) {
            $presence->update([
                'heure_depart' => now()->format('H:i:s'),
            ]);

            return redirect()->back()->with('success', 'Heure de départ enregistrée.');
        }

        return redirect()->back()->with('error', 'Impossible d\'enregistrer le départ.');
    }

    /**
     * Supprime une présence.
     */
    public function destroy(Presence $presence)
    {
        $presence->delete();

        return redirect()->route('admin.presences.index')
            ->with('success', 'Présence supprimée avec succès.');
    }
}
