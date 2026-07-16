<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $fillable = [

        'etudiant_id',
        'logement_id',
        'admin_id',
        'date_visite',
        'heure_visite',
        'message',
        'note_admin',
        'statut',
        'confirmee_at',

    ];

    protected $casts = [

        'date_visite' => 'date',
        'heure_visite' => 'datetime:H:i',
        'confirmee_at' => 'datetime',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }
}
