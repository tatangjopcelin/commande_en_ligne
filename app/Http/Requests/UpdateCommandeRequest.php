<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommandeRequest extends FormRequest
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
            "produit_id"=>['nullable','string','min:0'],
            "utilisateur_id"=>['nullable','string','min:0'],
            "table_id"=>['nullable','string','min:0'],
            "date"=>['nullable','date'],
        ];
    }
}
