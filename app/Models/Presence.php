<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Presence.php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'heure_arrivee',
        'heure_depart',
        'statut',
        'commentaire',
    ];

    protected $casts = [
        'date' => 'date',
        'heure_arrivee' => 'datetime:H:i',
        'heure_depart' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function justification()
{
    return $this->hasOne(ReasonAbsence::class);
}
}