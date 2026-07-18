<?php

namespace App\Models;
use App\Models\Logement;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[fillable([

    'name',

    'email',

    'password',

    'role',

    'is_verified',

    'is_suspended',

    'telephone',

    'adresse_residence',

    'etablissement',

    'photo_profil',

])]

#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',

            'password' => 'hashed',
            'is_verified',

            'is_suspended',

        ];
    }

    public function logements()
    {
        return $this->hasMany(
            Logement::class,
            'proprietaire_id'
        );
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isProprietaire(): bool
    {
        return $this->role === 'proprietaire';
    }

    public function isEtudiant(): bool
    {
        return $this->role === 'etudiant';
    }

    public function favoris()
    {
        return $this->belongsToMany(
            Logement::class,
            'favoris',
            'etudiant_id',
            'logement_id'
        );
    }

    public function favorisRelation()
    {
        return $this->hasMany(Favori::class, 'etudiant_id');
    }

    public function visitesEtudiant()
    {
        return $this->hasMany(Visite::class,'etudiant_id');
    }

    public function visitesAdmin()
    {
        return $this->hasMany(Visite::class, 'admin_id');
    }

    public function conversationsEtudiant()
    {
        return $this->hasMany(
            Conversation::class,
            'etudiant_id'
        );
    }

    public function conversationsProprietaire()
    {
        return $this->hasMany(
            Conversation::class,
            'proprietaire_id'
        );
    }

    public function conversationsAdmin()
    {
        return $this->hasMany(
            Conversation::class,
            'admin_id'
        );
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
