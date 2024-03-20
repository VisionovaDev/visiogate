<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(); //per la gestione dellee route di gestione login/logout/registrazion dimenticato password etc.


Route::get('/', function () {
    return view('welcome');
});


// Gruppo di route con prefisso /imposta
Route::prefix('imposta')->group(function () {
    // Definisce la route per /imposta/azienda che include solo le operazioni di visualizzazione, modifica e aggiornamento
    Route::resource('azienda', App\Http\Controllers\AziendaController::class)->only([
        'show', 'edit', 'update'
    ]);
});

//Pagina a cui viene rediretto l'utente che fa login (da rivedere)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');