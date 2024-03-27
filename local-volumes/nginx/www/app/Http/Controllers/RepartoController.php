<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Reparto;
use App\Http\Requests\UpdateRepartoRequest;

class RepartoController  extends Controller
{

 public function list (){
   $sedi=Sede::all();
   return view('imposta.reparto_list',['sedi'=>$sedi]);
 }


 public function add($id_sede)
 {      
    $sede=Sede::findOrFail($id_sede);
    return view('imposta.reparto_add',['sede'=> $sede]);
   
 }

 public function store(UpdateRepartoRequest $request)
 {     
  
    $validatedData = $request->validated();      
    Reparto::create($validatedData)  ;
    return redirect()->route('imposta.reparto.list')->with('success', 'Reparto aggiunto');
   
 }

 public function edit($id)
   {
      $reparto = Reparto::findOrFail($id);
      $sede=Sede::findOrFail( $reparto->sede_id);
      return view('imposta.reparto_edit', ['reparto' => $reparto,'sede'=>$sede]);
   }
  
   public function update(UpdateRepartoRequest $request,$id)
   {      
      $validatedData = $request->validated();   
      $reparto = Reparto::findOrFail($id);
      $reparto->update($validatedData);
      return redirect()->route('imposta.reparto.list')->with('success', 'Reparto aggiornato');
   }
 

  

   public function delete($id)
   {      
      $reparto = Reparto::findOrFail($id); 
      $reparto->delete();
      return redirect()->route('imposta.reparto.list')->with('success', 'Reparto cancellato');
   }

   
    
}
