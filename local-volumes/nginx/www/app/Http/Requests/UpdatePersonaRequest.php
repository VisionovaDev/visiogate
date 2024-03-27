<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonaRequest extends FormRequest
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
            
            'reparto_id' => 'required|exists:reparti,id', 
            'nome' => 'required|string|max:255',   
            'cognome' => 'required|string|max:255',   
            'email' => 'required|email',   
            'interno' => 'required|string|max:255',   
            'telefono' => 'nullable|string|max:255',   
            'accetta_visite' => 'required|boolean',   
        ];
    }
}
