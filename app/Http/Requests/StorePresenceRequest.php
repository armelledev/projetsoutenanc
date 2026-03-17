<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePresenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Seul l'admin peut enregistrer une présence
        return auth()->user()->role === 'ADMIN';
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            
            // RÈGLE 1 : Pas de date dans le futur
            'date_pointage' => 'required|date|before_or_equal:today',
            
            'heure_arrivee' => 'required|date_format:H:i',
            
            // RÈGLE 2 : L'heure de départ doit être APRÈS l'heure d'arrivée
            'heure_depart' => 'nullable|date_format:H:i|after:heure_arrivee',
            
            'statut' => 'required|in:PRESENT,ABSENT,RETARD,JUSTIFIE',
        ];
    }

    /**
     * Personnalisation des messages pour ton rapport au CFPC
     */
    public function messages(): array
    {
        return [
            'date_pointage.before_or_equal' => "Impossible d'enregistrer une présence pour une date future.",
            'heure_depart.after' => "L'heure de départ ne peut pas être inférieure à l'heure d'arrivée.",
            'heure_arrivee.required' => "L'heure d'arrivée est obligatoire pour valider le pointage.",
        ];
    }
}