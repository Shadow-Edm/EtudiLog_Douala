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
 * @property int $id
 * @property int|null $etudiant_id
 * @property int|null $proprietaire_id
 * @property int $admin_id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $admin
 * @property-read \App\Models\User|null $etudiant
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User|null $proprietaire
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereEtudiantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereProprietaireId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereUpdatedAt($value)
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
 * @property int $id
 * @property int $etudiant_id
 * @property int $logement_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $etudiant
 * @property-read \App\Models\Logement|null $logement
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereEtudiantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereLogementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereUpdatedAt($value)
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Favori> $favorisRelation
 * @property-read int|null $favoris_relation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LogementImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User|null $proprietaire
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visite> $visites
 * @property-read int|null $visites_count
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
 * @property int $id
 * @property int $conversation_id
 * @property int $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $lu_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Conversation|null $conversation
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereLuAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereUserId($value)
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
 * @property string $telephone
 * @property string|null $adresse_residence
 * @property string|null $etablissement
 * @property string|null $photo_profil
 * @property int $est_verifie
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Conversation> $conversationsAdmin
 * @property-read int|null $conversations_admin_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Conversation> $conversationsEtudiant
 * @property-read int|null $conversations_etudiant_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Conversation> $conversationsProprietaire
 * @property-read int|null $conversations_proprietaire_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Logement> $favoris
 * @property-read int|null $favoris_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Favori> $favorisRelation
 * @property-read int|null $favoris_relation_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Logement> $logements
 * @property-read int|null $logements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visite> $visitesAdmin
 * @property-read int|null $visites_admin_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Visite> $visitesEtudiant
 * @property-read int|null $visites_etudiant_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAdresseResidence($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEstVerifie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEtablissement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhotoProfil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $etudiant_id
 * @property int $logement_id
 * @property int|null $admin_id
 * @property \Illuminate\Support\Carbon|null $date_visite
 * @property \Illuminate\Support\Carbon|null $heure_visite
 * @property string|null $message
 * @property string|null $note_admin
 * @property string $statut
 * @property \Illuminate\Support\Carbon|null $confirmee_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $admin
 * @property-read \App\Models\User|null $etudiant
 * @property-read \App\Models\Logement|null $logement
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereConfirmeeAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereDateVisite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereEtudiantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereHeureVisite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereLogementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereNoteAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Visite whereUpdatedAt($value)
 */
	class Visite extends \Eloquent {}
}

