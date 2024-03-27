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
      return redirect()->route('imposta.varco.show', ['id' => $varco_id])->with('success', 'Link aggiunto');
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


}
