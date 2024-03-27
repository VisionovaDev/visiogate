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

   public function list (){
      $sedi=Sede::all();
      return view('imposta.sede_list',['sedi'=>$sedi]);
    }

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
      $sede=Sede::create($validatedData)  ;
      //return redirect()->route('imposta.azienda.show')->with('success', 'Sede aggiunta');
      return redirect()->route('imposta.sede.show',$sede->id)->with('success', 'Sede aggiornata');
   }


   public function update(UpdateSedeRequest $request,$id)
   {      
      $validatedData = $request->validated();   
      $sede = Sede::findOrFail($id); 
      $sede->update($validatedData);
      return redirect()->route('imposta.sede.show',$id)->with('success', 'Sede aggiornata');
   }

   public function delete($id)
   {      
      $sede = Sede::findOrFail($id); 
      $sede->delete();
      return redirect()->route('imposta.sede.list')->with('success', 'Sede cancellata');
   }

   
    // Mostra una specifica azienda
    public function show($id)
    {
       $sede = Sede::findOrFail($id);
       return view('imposta.sede_show', ['sede'=> $sede]);
    }
 
}
