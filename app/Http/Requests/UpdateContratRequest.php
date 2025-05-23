<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContratRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ou votre logique d'autorisation
    }

    public function rules(): array
    {
        return [
            'entite' => 'required|exists:entites,id',
            'adhesionencoursNon' => 'required|in:0,1',
            'contrat' => 'required|exists:type_contrats,id',
            'poste' => 'required|string|max:255',
            'datesignaturecontrat' => 'required|date',
            'datefincontrat' => 'required|date|after:datesignaturecontrat',
            'datevisitemedicale' => 'nullable|date',
            'situationvisite' => 'nullable|string|max:255',
            'dateprochainevisite' => 'nullable|date|after:datevisitemedicale',
        ];
    }
}
