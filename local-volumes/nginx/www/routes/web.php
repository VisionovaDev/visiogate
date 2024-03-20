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
    /*
    Route::resource('azienda', App\Http\Controllers\AziendaController::class)->only([
        'show', 'edit', 'update'
    ]);
    */
    Route::get('azienda/edit_dati/{id?}', [App\Http\Controllers\AziendaController::class, 'edit_dati'])->name('imposta.azienda.edit_dati');
    Route::get('azienda/{id?}', [App\Http\Controllers\AziendaController::class, 'show'])->name('imposta.azienda.show');
    
    
});

//Pagina a cui viene rediretto l'utente che fa login (da rivedere)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');