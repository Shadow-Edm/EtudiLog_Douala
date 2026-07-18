<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Etudiant\FavoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\VisiteController as AdminVisite;
use App\Http\Controllers\Proprietaire\DashboardController as ProprietaireDashboard;
use App\Http\Controllers\Etudiant\DashboardController as EtudiantDashboard;
use App\Http\Controllers\Proprietaire\LogementController;
use App\Http\Controllers\Etudiant\LogementController as EtudiantLogementController;
use App\Http\Controllers\LogementImageController;
use App\Http\Controllers\Etudiant\VisiteController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminLogementController;
use App\Models\Logement;


Route::get('/', function () {

    $logements = Logement::with([
        'coverImage',
        'proprietaire'
    ])
    ->where('statut', 'disponible')
    ->latest()
    ->take(6)
    ->get();

    return view('home', compact('logements'));

})->name('home');



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard',
        [AdminDashboard::class, 'index'])

        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/proprietaire/dashboard',
        [ProprietaireDashboard::class, 'index'])

        ->middleware('role:proprietaire')
        ->name('proprietaire.dashboard');

    Route::get('/etudiant/dashboard',
        [EtudiantDashboard::class, 'index'])

        ->middleware('role:etudiant')
        ->name('etudiant.dashboard');
});


// ===============================
// ADMINISTRATION
// ===============================

Route::middleware([
    'auth',
    'admin'
])
->prefix('admin')
->name('admin.')
->group(function(){


    // Dashboard

    Route::get('/dashboard',
        [AdminDashboard::class,'index']
    )->name('dashboard');



    // ===================
    // LOGEMENTS
    // ===================

    Route::resource(
        'logements',
        AdminLogementController::class
    );


    Route::patch(
        'logements/{logement}/verify',
        [AdminLogementController::class,'verify']
    )
    ->name('logements.verify');


    Route::patch(
        'logements/{logement}/unverify',
        [AdminLogementController::class,'unverify']
    )
    ->name('logements.unverify');



    // ===================
    // VISITES
    // ===================

    Route::resource(
        'visites',
        AdminVisite::class
    );


    Route::patch(
        'visites/{visite}/proposer',
        [AdminVisite::class,'proposer']
    )
    ->name('visites.proposer');


    Route::patch(
        'visites/{visite}/terminer',
        [AdminVisite::class,'terminer']
    )
    ->name('visites.terminer');



    // ===================
    // UTILISATEURS
    // ===================

    Route::resource(
        'users',
        UserManagementController::class
    );


    Route::patch(
        'users/{user}/suspend',
        [UserManagementController::class,'suspend']
    )
    ->name('users.suspend');


    Route::patch(
        'users/{user}/verify',
        [UserManagementController::class,'verify']
    )
    ->name('users.verify');


});


Route::middleware('auth')->group(function () {

    Route::get('/profile',
        [ProfileController::class,'edit']
    )->name('profile.edit');


    Route::patch('/profile',
        [ProfileController::class,'update']
    )->name('profile.update');


    Route::delete('/profile',
        [ProfileController::class,'destroy']
    )->name('profile.destroy');

});

    // ===================
    //      FAVORIS
    // ===================

Route::middleware(['auth'])->group(function () {
    Route::post('/favoris/{logement}', [FavoriController::class, 'toggle'])->name('favoris.toggle');
    Route::get('/mes-favoris', [FavoriController::class, 'index'])->name('favoris.index');
});




    // ===================
    //      DEMANDES
    // ===================


Route::middleware([
    'auth',
    'role:etudiant'
])->group(function () {

        Route::get(
            '/mes-demandes',
            [VisiteController::class,'index']
        )->name('visites.index');

        Route::post(
            '/logements/{logement}/visites',
            [VisiteController::class,'store']
        )->name('visites.store');

        Route::get(
            '/visites/{visite}',
            [VisiteController::class,'show']
        )->name('visites.show');

        Route::delete(
            '/visites/{visite}',
            [VisiteController::class, 'destroy']
        )->name('visites.destroy');

        Route::patch(
            '/visites/{visite}/confirmer',
            [VisiteController::class,'confirmer']
        )->name('visites.confirmer');

        Route::patch(
            '/visites/{visite}/annuler',
            [VisiteController::class,'annuler']
        )->name('visites.annuler');

    });


// ===============================
// PROPRIETAIRE
// ===============================

Route::middleware(['auth','role:proprietaire'])
->prefix('proprietaire')
->as('proprietaire.')
->group(function(){

    Route::resource(
        'logements',
        LogementController::class
    );

    Route::patch(
            'logements/{logement}/toggle-status',
            [LogementController::class, 'toggleStatus']
        )->name('logements.toggle-status');



    Route::post(
            '/logements/{logement}/images',
            [LogementImageController::class, 'store']
        )->name('logement-images.store');

    Route::delete(
        '/logement-images/{image}',
        [LogementImageController::class,'destroy']
    )->name('logement-images.destroy');

    Route::post(
        '/logement-images/{image}/cover',
        [LogementImageController::class,'cover']
    )->name('logement-images.cover');

});

// ===============================
// ETUDIANT - CONSULTATION LOGEMENTS
// ===============================


Route::get('/logements',
[EtudiantLogementController::class,'index'])
->name('logements.index');


Route::get('/logements/{logement}',
[EtudiantLogementController::class,'show'])
->name('logements.show');

require __DIR__.'/auth.php';
