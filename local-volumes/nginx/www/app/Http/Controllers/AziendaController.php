<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Azienda;
use App\Http\Requests\UpdateAziendaDatiRequest;
use App\Http\Requests\UpdateAziendaLogoRequest;
use App\Http\Requests\UpdateAziendaPrivacyRequest;

class AziendaController extends Controller
{
   // Mostra una specifica azienda
   public function show($id)
   {
      $azienda = Azienda::first();
      $sedi=Sede::all();
      return view('imposta.azienda_show', ['azienda' => $azienda, 'sedi'=> $sedi]);
   }

   // Mostra il form per modificare una specifica azienda
   public function edit_dati($id)
   {
      $azienda = Azienda::first();
      //$azienda = Azienda::findOrFail($id);
      return view('imposta.azienda_edit_dati', ['azienda' => $azienda]);
   }

   // Aggiorna i dati dell' azienda nel database
   public function update_dati(UpdateAziendaDatiRequest $request, $id)
   {
      $validatedData = $request->validated();
      $azienda = Azienda::first();
      $azienda->update($validatedData);
      return redirect()->route('imposta.azienda.show')->with('success', 'Dati aggiornati');
   }

   // Mostra il form per modificare i documenti privacy specifica azienda
   public function edit_privacy($id)
   {
      $azienda = Azienda::first();
      return view('imposta.azienda_edit_privacy', ['azienda' => $azienda]);
   }

   // Mostra il form per modificare i documenti privacy specifica azienda
   public function update_privacy(UpdateAziendaPrivacyRequest $request, $id)
   {
      $validatedData = $request->validated();
      $azienda = Azienda::first();
      $azienda->update($validatedData);
      return redirect()->route('imposta.azienda.show')->with('success', 'Privacy aggiornata');
   }

   public function update_logo(UpdateAziendaLogoRequest $request, $id)
   {
      $validatedData = $request->validated();
      $azienda = Azienda::first();
      if ($request->hasFile('image')) {
         // Rimuovi il primo media assegnato all'azienda, se presente
         $azienda->getMedia()->first()?->delete();

         // Carica e assegna il nuovo file come media all'azienda
         $azienda->addMediaFromRequest('image')->toMediaCollection();
         return redirect()->route('imposta.azienda.show')->with('success', 'Logo aggiornato');
      }
   }
}
