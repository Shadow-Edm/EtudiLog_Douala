<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [

        'etudiant_id',
        'proprietaire_id',
        'admin_id',
        'type',

    ];

    public function etudiant()
    {
        return $this->belongsTo(User::class,'etudiant_id');
    }

    public function proprietaire()
    {
        return $this->belongsTo(User::class,'proprietaire_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
