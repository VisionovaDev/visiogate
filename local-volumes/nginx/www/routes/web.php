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
    Route::get('azienda/show/{id?}', [App\Http\Controllers\AziendaController::class, 'show'])->defaults('id', '1')->name('imposta.azienda.show');
    Route::get('azienda/edit_dati/{id?}', [App\Http\Controllers\AziendaController::class, 'edit_dati'])->defaults('id', '1')->name('imposta.azienda.edit_dati');
    Route::put('azienda/edit_dati/{id?}', [App\Http\Controllers\AziendaController::class, 'update_dati'])->defaults('id', '1')->name('imposta.azienda.update_dati');
    Route::get('azienda/edit_privacy/{id?}', [App\Http\Controllers\AziendaController::class, 'edit_privacy'])->defaults('id', '1')->name('imposta.azienda.edit_privacy');
    Route::put('azienda/edit_privacy/{id?}', [App\Http\Controllers\AziendaController::class, 'update_privacy'])->defaults('id', '1')->name('imposta.azienda.update_privacy');
    Route::put('azienda/update_logo/{id?}', [App\Http\Controllers\AziendaController::class, 'update_logo'])->defaults('id', '1')->name('imposta.azienda.update_logo');

    //Gestione Sedi
    Route::get('sede/show/{id?}', [App\Http\Controllers\SedeController::class, 'show'])->defaults('id', '1')->name('imposta.sede.show');
    Route::get('sede/edit/{id?}', [App\Http\Controllers\SedeController::class, 'edit'])->defaults('id', '1')->name('imposta.sede.edit');
    Route::put('sede/update/{id}', [App\Http\Controllers\SedeController::class, 'update'])->name('imposta.sede.update');
    Route::get('sede/add/', [App\Http\Controllers\SedeController::class, 'add'])->name('imposta.sede.add');
    Route::post('sede/store/', [App\Http\Controllers\SedeController::class, 'store'])->name('imposta.sede.store');
    Route::delete('sede/delete/{id}', [App\Http\Controllers\SedeController::class, 'delete'])->name('imposta.sede.delete');
    

    //Gestione Varchi
    Route::get('varco/show/{id}', [App\Http\Controllers\VarcoController::class, 'show'])->name('imposta.varco.show');
    Route::get('varco/edit/{id}', [App\Http\Controllers\VarcoController::class, 'edit'])->name('imposta.varco.edit');
    Route::put('varco/update/{id}', [App\Http\Controllers\VarcoController::class, 'update'])->name('imposta.varco.update');
    Route::get('varco/add/{sede_id}', [App\Http\Controllers\VarcoController::class, 'add'])->name('imposta.varco.add');
    Route::post('varco/store/', [App\Http\Controllers\VarcoController::class, 'store'])->name('imposta.varco.store');
    Route::delete('varco/delete/{id}', [App\Http\Controllers\VarcoController::class, 'delete'])->name('imposta.varco.delete');

    //Gestion LinkTransito Varchi
    Route::get('linktransito/add/{varco_id}', [App\Http\Controllers\LinkTransitoController::class, 'add'])->name('imposta.linktransito.add');
    Route::delete('linktransito/delete/{id}', [App\Http\Controllers\LinkTransitoController::class, 'delete'])->name('imposta.linktransito.delete');
    Route::get('linktransito/is_abilitato_toggle/{id}', [App\Http\Controllers\LinkTransitoController::class, 'is_abilitato_toggle'])->name('imposta.linktransito.is_abilitato_toggle');
    
    
    
});

//Pagina a cui viene rediretto l'utente che fa login (da rivedere)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');