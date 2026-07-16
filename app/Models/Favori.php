<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $fillable = [

        'etudiant_id',
        'logement_id',

    ];

    public function etudiant()
    {
        return $this->belongsTo(User::class,'etudiant_id');
    }

    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }
}
