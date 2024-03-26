<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Varco;
use App\Http\Requests\UpdateVarcoRequest;
use App\Models\LinkTransito;

class LinkTransitoController  extends Controller
{

   public function add($varco_id)
   {
      Varco::findOrFail($varco_id);
      $data['varco_id']=$varco_id;
      LinkTransito::create($data);
      return redirect()->route('imposta.varco.show', ['id' => $varco_id])->with('success', 'Link aggiunto con successo');
   }

   public function delete($id)
   {      
      $linkTransito = LinkTransito::findOrFail($id); 
      $varco_id=$linkTransito->varco_id;
      $linkTransito->delete();
      return redirect()->route('imposta.varco.show', ['id' => $varco_id])->with('success', 'Link rimosso');
   }


     
   public function is_abilitato_toggle($id)
   {
      $linkTransito = LinkTransito::findOrFail($id); 
      $data['is_abilitato'] = !$linkTransito->is_abilitato;    
      $linkTransito->update($data);

      return view('partials.htmx.linktransito_is_abilitato_toggle_checkbox', ['link' => $linkTransito]);
   }

   
   /*
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

  
   
    // Mostra una specifica azienda
    public function show($id)
    {
       $varco = Varco::findOrFail($id); 
       return view('imposta.varco_show', ['varco'=> $varco]);
    }
 */
}
