<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAziendaPrivacyRequest extends FormRequest
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
           
                'privacy_it' => 'nullable|string',
                'privacy_en' => 'nullable|string',
                'privacy_de' => 'nullable|string',
                'privacy_fr' => 'nullable|string',
                'privacy_es' => 'nullable|string',
                
        ];
    }
}
