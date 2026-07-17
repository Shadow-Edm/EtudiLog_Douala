<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\LogementImage;

class Logement extends Model
{
    protected $fillable = [

        'proprietaire_id',
        'titre',
        'description',
        'adresse',
        'etablissement_proche',
        'distance_ecole',
        'prix',
        'type',
        'nombre_chambres',
        'nombre_douches',
        'superficie',
        'wifi',
        'forage',
        'gardien',
        'est_verifie',
        'statut',
        'vues',

    ];

    protected $casts = [

        'wifi' => 'boolean',

        'forage' => 'boolean',

        'gardien' => 'boolean',

        'est_verifie' => 'boolean',

        'distance_ecole' => 'decimal:2',

    ];

    public function images()
    {
        return $this->hasMany(LogementImage::class);
    }

    public function coverImage()
    {
        return $this->hasOne(LogementImage::class)
                    ->where('is_cover', true);
    }


    public function proprietaire()
    {
        return $this->belongsTo(
            User::class,
            'proprietaire_id'
        );
    }

    public function favoris()
    {
        return $this->belongsToMany(
            User::class,
            'favoris',
            'logement_id',
            'etudiant_id'
        );
    }
    public function favorisRelation()
    {
        return $this->hasMany(Favori::class, 'logement_id');
    }

    public function visites()
    {
        return $this->hasMany(Visite::class);
    }

}
