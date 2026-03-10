<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReasonAbsences extends Model
{
    protected $fillable = ['presence_id', 'user_id', 'motif', 'piece_jointe', 'statut_justification'];

public function presence()
{
    return $this->belongsTo(Presence::class);
}
}
