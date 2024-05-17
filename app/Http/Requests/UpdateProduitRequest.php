<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduitRequest extends FormRequest
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
            "type_produit"=>['nullable','string','max:255'],
            "nom_produit"=>['nullable','string','max:255'],
            "prix_produit"=>['nullable','integer','min:3'],
            "quantite_stock"=>['nullable','integer','min:0'],
            //"image_produit"=>['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
            "image_produit"=>['nullable|image|mimes:jpeg,png,jpg,gif|max:2048'],

        ];
    }
}
