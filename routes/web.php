<?php

use Illuminate\Http\Request;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\NotificationsController;

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
*/


// Route pour afficher le formulaire de connexion
Route::get('/login', [ConnexionController::class, 'index'])->name('login.show');

// Route pour gérer la soumission du formulaire de connexion
Route::post('/login', [ConnexionController::class, 'login'])->name('login');

// Route pour gérer la déconnexion de l'utilisateur
Route::post('/logout', [ConnexionController::class, 'logout'])->name('logout');

// Groupe de routes nécessitant une authentification
Route::middleware(['custom.auth'])->group(function () {
    // Route pour afficher la page principale des entrepreneurs
    Route::get('/', [EntrepreneurController::class, 'index'])->name('entrepreneurs.index');

    // Route pour afficher les détails d'un entrepreneur spécifique (ID doit être numérique)
    Route::get('/entrepreneurs/{id}', [EntrepreneurController::class, 'show'])->where('id', '\d+')->name('entrepreneurs.show');

    // Route pour afficher le formulaire de création d'un entrepreneur
    Route::get('/entrepreneurs/create', [EntrepreneurController::class, 'create'])->name('entrepreneurs.create');

    // Route pour gérer la soumission des données d'un nouvel entrepreneur
    Route::post('/entrepreneurs/store', [EntrepreneurController::class, 'store'])->name('entrepreneurs.store');

    // Routes pour mettre à jour les informations d'un entrepreneur existant
    Route::put('/entrepreneurs/update/{id}', [EntrepreneurController::class, 'update'])->name('entrepreneurs.update');
    Route::put('/entrepreneurs/update-contrat/{id}', [EntrepreneurController::class, 'updateContrat'])->name('contrat.update');
    Route::put('/entrepreneurs/update-activite/{id}', [EntrepreneurController::class, 'updateActivite'])->name('activite.update');
});


