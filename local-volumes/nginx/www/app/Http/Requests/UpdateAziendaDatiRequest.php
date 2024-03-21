<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAziendaDatiRequest extends FormRequest
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
                'sito' => 'nullable|url|max:255',
                'email' => 'required|email|max:255',
                'telefono' => 'required|string|max:20'
    
        ];
    }
}
