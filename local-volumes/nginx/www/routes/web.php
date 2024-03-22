<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(); //per la gestione dellee route di gestione login/logout/registrazion dimenticato password etc.


Route::get('/', function () {
    return view('welcome');
});


// Gruppo di route con prefisso /imposta
Route::prefix('imposta')->group(function () {
  
    //Gestione Azienda intestataria dell'applicazione
    Route::get('azienda/{id?}', [App\Http\Controllers\AziendaController::class, 'show'])->defaults('id', '1')->name('imposta.azienda.show');
    Route::get('azienda/edit_dati/{id?}', [App\Http\Controllers\AziendaController::class, 'edit_dati'])->defaults('id', '1')->name('imposta.azienda.edit_dati');
    Route::put('azienda/edit_dati/{id?}', [App\Http\Controllers\AziendaController::class, 'update_dati'])->defaults('id', '1')->name('imposta.azienda.update_dati');
    Route::get('azienda/edit_privacy/{id?}', [App\Http\Controllers\AziendaController::class, 'edit_privacy'])->defaults('id', '1')->name('imposta.azienda.edit_privacy');
    Route::put('azienda/edit_privacy/{id?}', [App\Http\Controllers\AziendaController::class, 'update_privacy'])->defaults('id', '1')->name('imposta.azienda.update_privacy');
    Route::put('azienda/update_logo/{id?}', [App\Http\Controllers\AziendaController::class, 'update_logo'])->defaults('id', '1')->name('imposta.azienda.update_logo');

    //Gestione Sedi
    Route::get('sede/edit/{id?}', [App\Http\Controllers\SedeController::class, 'edit'])->defaults('id', '1')->name('imposta.sede.edit');
    Route::put('sede/update/{id?}', [App\Http\Controllers\SedeController::class, 'update'])->name('imposta.sede.update');
    Route::get('sede/add/', [App\Http\Controllers\SedeController::class, 'add'])->name('imposta.sede.add');
    Route::post('sede/store/', [App\Http\Controllers\SedeController::class, 'store'])->name('imposta.sede.store');
    Route::delete('sede/delete/{id?}', [App\Http\Controllers\SedeController::class, 'delete'])->name('imposta.sede.delete');
    
    
    
});

//Pagina a cui viene rediretto l'utente che fa login (da rivedere)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');