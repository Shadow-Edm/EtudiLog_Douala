<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property-read \App\Models\User|null $admin
 * @property-read \App\Models\User|null $etudiant
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User|null $proprietaire
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation query()
 */
	class Conversation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etudiant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etudiant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etudiant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etudiant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etudiant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etudiant whereUpdatedAt($value)
 */
	class Etudiant extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori query()
 */
	class Favori extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $proprietaire_id
 * @property string $titre
 * @property string $description
 * @property string $adresse
 * @property string $etablissement_proche
 * @property numeric|null $distance_ecole
 * @property numeric $prix
 * @property string $type
 * @property int $nombre_chambres
 * @property int $nombre_douches
 * @property int|null $superficie
 * @property bool $wifi
 * @property bool $forage
 * @property bool $gardien
 * @property bool $est_verifie
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LogementImage|null $coverImage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $favoris
 * @property-read int|null $favoris_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LogementImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User|null $proprietaire
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereDistanceEcole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereEstVerifie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereEtablissementProche($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereForage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereGardien($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereNombreChambres($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereNombreDouches($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereProprietaireId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereSuperficie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logement whereWifi($value)
 */
	class Logement extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $logement_id
 * @property int $is_cover
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Logement|null $logement
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage whereIsCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage whereLogementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogementImage whereUpdatedAt($value)
 */
	class LogementImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message query()
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proprietaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proprietaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proprietaire query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proprietaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proprietaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Proprietaire whereUpdatedAt($value)
 */
	class Proprietaire extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $etudiant_id
 * @property int $logement_id
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereEtudiantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereLogementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reservation whereUpdatedAt($value)
 */
	class Reservation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Logement> $favoris
 * @property-read int|null $favoris_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Logement> $logements
 * @property-read int|null $logements_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite query()
 */
	class Visite extends \Eloquent {}
}

