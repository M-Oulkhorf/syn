<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActiviteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom_activite' => 'nullable|string|max:255',
            'nom_commercial' => 'nullable|string|max:255',
            'mot_cle_activite' => 'nullable|string|max:255',
            'description_activite' => 'nullable|string',
            'fiche_site' => 'nullable|in:0,1',
            'lien_boutique_en_ligne' => 'nullable|url|max:255',
            'necessite_stock' => 'required|in:0,1',
            'date_dernier_etat_stock' => 'nullable|date',
            'marge_salaire_activite' => 'nullable|numeric|min:0',
            'salaire_activite' => 'nullable|numeric|min:0',
            'boitier_sum_up' => 'nullable|string|max:255',
            'rcpro_activite' => 'nullable|string|max:255',
        ];
    }
}
