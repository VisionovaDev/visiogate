<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Persona;
use App\Models\Reparto;
use App\Http\Requests\UpdatePersonaRequest;


class PersonaController  extends Controller
{

 public function list() {
   $sedi=Sede::all();
   return view('imposta.persona_list',['sedi'=>$sedi]);
 }

 public function edit($id)
 {
    $persona = Persona::findOrFail($id);
    return view('imposta.persona_edit', ['persona' => $persona]);
    
 }

 public function update(UpdatePersonaRequest $request,$id)
 {    
    
    $validatedData = $request->validated();   
    $persona = Persona::findOrFail($id);
    $persona->update($validatedData);
    return redirect()->route('imposta.persona.list')->with('success', 'Dati di '.$persona->Cognome.' aggiornati');
    
 }
 public function add($reparto_id)
 {      
    $reparto=Reparto::findOrFail($reparto_id);
    return view('imposta.persona_add',['reparto'=> $reparto]);
 }

 public function store(UpdatePersonaRequest $request)
 {     
  
    $validatedData = $request->validated();      
    $persona=Persona::create($validatedData)  ;
    return redirect()->route('imposta.persona.list')->with('success', $persona->cognome. ' ' .$persona->nome .' aggiunto/a');
   
 }
  
   public function delete($id)
   {      
      $persona = Persona::findOrFail($id); 
      $persona->delete();
      return redirect()->route('imposta.persona.list')->with('success',  $persona->cognome. ' ' .$persona->nome . ' cancellato/a');
   }

   
    
}
