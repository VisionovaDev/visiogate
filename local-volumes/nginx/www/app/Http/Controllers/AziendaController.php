<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAziendaDatiRequest;
use App\Http\Requests\UpdateAziendaPrivacyRequest;

class AziendaController extends Controller
{
     // Mostra una specifica azienda
     public function show($id)
     {
        $azienda=Azienda::first();
        return view('imposta.azienda_show',['azienda'=>$azienda]);
     }
 
     // Mostra il form per modificare una specifica azienda
     public function edit_dati($id)
     {
        $azienda=Azienda::first();
        //$azienda = Azienda::findOrFail($id);
        return view('imposta.azienda_edit_dati',['azienda'=>$azienda]);
     }
 
     // Aggiorna i dati dell' azienda nel database
     public function update_dati(UpdateAziendaDatiRequest $request, $id)
     {
         $validatedData = $request->validated();
         $azienda=Azienda::first();
         $azienda->update($validatedData);
         return redirect()->route('imposta.azienda.show')->with('success', 'Risorsa aggiornata con successo!');
     }

       // Mostra il form per modificare i documenti privacy specifica azienda
       public function edit_privacy($id)
       {
          $azienda=Azienda::first();          
          return view('imposta.azienda_edit_privacy',['azienda'=>$azienda]);
       }

        // Mostra il form per modificare i documenti privacy specifica azienda
        public function update_privacy(UpdateAziendaPrivacyRequest $request, $id)
        {
         $validatedData = $request->validated();
         $azienda=Azienda::first();
         $azienda->update($validatedData);
         return redirect()->route('imposta.azienda.show')->with('success', 'Risorsa aggiornata con successo!');
        }
}
