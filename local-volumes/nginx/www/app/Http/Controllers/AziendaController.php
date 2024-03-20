<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;

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
        return view('imposta.azienda_edit_dati',['azienda'=>$azienda]);
     }
 
     // Aggiorna una specifica azienda nel database
     public function update(Request $request, $id)
     {
         // Qui va la logica per aggiornare l'azienda
     }
}
