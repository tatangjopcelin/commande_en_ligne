<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUtilisateurRequest extends FormRequest
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
            "nom"=>['nullable','string','max:255'],
            "numero"=>['nullable','integer','max:9'],
            "adresse"=>['nullable','string','max:255'],
            "role"=>['nullable','in:CESSIER,ADMIN'],
            "password"=>['nullable','string','max:8'],

        ];
    }
}
