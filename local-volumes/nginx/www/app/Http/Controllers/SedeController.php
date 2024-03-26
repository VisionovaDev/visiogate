<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Azienda;
use App\Http\Requests\UpdateSedeRequest;
use App\Http\Requests\UpdateSedeDatiRequest;
use App\Http\Requests\UpdateAziendaDatiRequest;
use App\Http\Requests\UpdateAziendaLogoRequest;
use App\Http\Requests\UpdateAziendaPrivacyRequest;

class SedeController  extends Controller
{

   // Mostra il form per modificare una specifica azienda
   public function edit($id)
   {
      $sede = Sede::findOrFail($id);
      return view('imposta.sede_edit', ['sede' => $sede]);
   }

   public function add()
   {
      return view('imposta.sede_add');
   }
  

   public function store(UpdateSedeRequest $request)
   {      
      $validatedData = $request->validated();  
      Sede::create($validatedData)  ;
      return redirect()->route('imposta.azienda.show')->with('success', 'Sede aggiunta con successo');
   }


   public function update(UpdateSedeRequest $request,$id)
   {      
      $validatedData = $request->validated();   
      $sede = Sede::findOrFail($id); 
      $sede->update($validatedData);
      return redirect()->route('imposta.sede.show',$id)->with('success', 'Sede agiornata con successo');
   }

   public function delete($id)
   {      
      $sede = Sede::findOrFail($id); 
      $sede->delete();
      return redirect()->route('imposta.azienda.show')->with('success', 'Sede aggiunta con successo');
   }

   
    // Mostra una specifica azienda
    public function show($id)
    {
       $sede = Sede::findOrFail($id);
       return view('imposta.sede_show', ['sede'=> $sede]);
    }
 
}
