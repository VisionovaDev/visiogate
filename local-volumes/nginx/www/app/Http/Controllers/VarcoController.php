<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Varco;
use App\Http\Requests\UpdateVarcoRequest;


class VarcoController  extends Controller
{


 

   public function add($id_sede)
   {
      $sede=Sede::findOrFail($id_sede);

      return view('imposta.varco_add',['sede'=> $sede]);
   }

   public function store(UpdateVarcoRequest $request)
   {      
      $validatedData = $request->validated();      
      $sede_id=$validatedData['sede_id'];
      Varco::create($validatedData)  ;
      return redirect()->route('imposta.sede.show',['id' => $sede_id])->with('success', 'Varco aggiunto con successo');
   }

  
   public function edit($id)
   {
      $varco = Varco::findOrFail($id);
      $sede=Sede::findOrFail( $varco->sede_id);
      return view('imposta.varco_edit', ['varco' => $varco,'sede'=>$sede]);
   }
  
   public function update(UpdateVarcoRequest $request,$id)
   {      
      $validatedData = $request->validated();   
      $varco = Varco::findOrFail($id);
      $varco->update($validatedData);
      return redirect()->route('imposta.sede.show',['id'=>$varco->sede_id])->with('success', 'Varco aggiornato con successo');
   }

   public function delete($id)
   {      
      $varco = Varco::findOrFail($id); 
      $varco->delete();
      return redirect()->route('imposta.sede.show')->with('success', 'Varco rimosso');
   }

   
    // Mostra una specifica azienda
    public function show($id)
    {
       $varco = Varco::findOrFail($id); 
       return view('imposta.varco_show', ['varco'=> $varco]);
    }
 
}
