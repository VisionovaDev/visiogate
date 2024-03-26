<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSedeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nome' => 'required|string|max:255',
            'indirizzo' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:5',
            'provincia' => 'required|string|max:2',
            'nazione' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            
            'oggetto_email_entrata_it' => 'nullable|string',
            'oggetto_email_entrata_en' => 'nullable|string',
            'oggetto_email_entrata_de' => 'nullable|string',
            'oggetto_email_entrata_fr' => 'nullable|string',
            'oggetto_email_entrata_es' => 'nullable|string',

            'msg_email_entrata_it' => 'nullable|string',
            'msg_email_entrata_en' => 'nullable|string',
            'msg_email_entrata_de' => 'nullable|string',
            'msg_email_entrata_fr' => 'nullable|string',
            'msg_email_entrata_es' => 'nullable|string',
          
            'oggetto_email_uscita_it' => 'nullable|string',
            'oggetto_email_uscita_en' => 'nullable|string',
            'oggetto_email_uscita_de' => 'nullable|string',
            'oggetto_email_uscita_fr' => 'nullable|string',
            'oggetto_email_uscita_es' => 'nullable|string',
 
            'msg_email_uscita_it' => 'nullable|string',
            'msg_email_uscita_en' => 'nullable|string',
            'msg_email_uscita_de' => 'nullable|string',
            'msg_email_uscita_fr' => 'nullable|string',
            'msg_email_uscita_es' => 'nullable|string',

          
            'regolamento_it' => 'nullable|string',
            'regolamento_en' => 'nullable|string',
            'regolamento_de' => 'nullable|string',
            'regolamento_fr' => 'nullable|string',
            'regolamento_es' => 'nullable|string',
            
            'is_email_entrata_abilitata' => 'required|boolean',
            'is_email_uscita_abilitata' => 'required|boolean',
            
        ];
    }
}
