<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MembreAuthController;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.doLogin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Dashboard admin protégé
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('admin.auth')
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| CRUD Admin (protégés par middleware)
|--------------------------------------------------------------------------
*/

Route::middleware('admin.auth')->group(function () {
    Route::resource('auteurs', AuteurController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('livres', LivreController::class);
    Route::resource('membres', MembreController::class);
    Route::resource('emprunts', EmpruntController::class);
});


/*
|--------------------------------------------------------------------------
| Authentification Membre
|--------------------------------------------------------------------------
*/

Route::get('/membre/login', [MembreAuthController::class, 'showLogin'])->name('membre.login');
Route::post('/membre/login', [MembreAuthController::class, 'login'])->name('membre.login.submit');
Route::get('/membre/logout', [MembreAuthController::class, 'logout'])->name('membre.logout');


/*
|--------------------------------------------------------------------------
| Espace Membre (protégé par middleware membre.auth)
|--------------------------------------------------------------------------
*/

Route::middleware('membre.auth')->group(function () {

    // Dashboard
    Route::get('/membre/dashboard', function() {
        return view('membre.dashboard');
    })->name('membre.dashboard');

    // Consulter livres
    Route::get('/membre/livres', [LivreController::class, 'listePourMembre'])
        ->name('membre.livres');

    // Historique membre
    Route::get('/membre/historique', [EmpruntController::class, 'historiquePourMembre'])
        ->name('membre.historique');

    /*
    |----------------------------------------------------------------------
    | Profil Membre
    |----------------------------------------------------------------------
    */

    Route::get('/membre/profil', function () {
        $membre = \App\Models\Membre::find(session('membre_id'));
        return view('membre.profil', compact('membre'));
    })->name('membre.profil');

    Route::get('/membre/profil/historique', [EmpruntController::class, 'historiquePourMembre'])
        ->name('membre.profil.historique');
});

Route::get('/membre/dashboard', function () {
    $membre = \App\Models\Membre::find(session('membre_id'));
    return view('membre.dashboard', compact('membre'));
})->name('membre.dashboard');
