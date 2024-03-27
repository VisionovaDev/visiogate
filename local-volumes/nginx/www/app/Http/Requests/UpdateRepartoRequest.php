<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRepartoRequest extends FormRequest
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
            
            'sede_id' => 'required|exists:sedi,id', 
            'nome_it' => 'required|string|max:255',   
            'nome_en' => 'required|string|max:255',   
            'nome_de' => 'required|string|max:255',   
            'nome_fr' => 'required|string|max:255',   
            'nome_es' => 'required|string|max:255',   
        ];
    }
}
