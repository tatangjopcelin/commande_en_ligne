<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUtilisateurRequest extends FormRequest
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
            "nom"=>['required','string','max:255'],
            "numero"=>['required','integer','max:9'],
            "adresse"=>['required','string','max:255'],
            "role_utilisateur"=>['nullable','in:CESSIER,ADMIN'],
            "password"=>['required','string','max:8'],
        ];
    }
}
