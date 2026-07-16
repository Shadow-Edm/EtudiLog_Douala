<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogementImage extends Model
{
    protected $fillable=[
        'logement_id',
        'image',
        'is_cover'
    ];

    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }

}
