<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntrepreneurRequest extends FormRequest
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
            'MatriculeSILAE' => 'nullable|string|max:50',
            'codeAnalytique' => 'required|string|max:50',
            'sexe' => 'required|in:Mme,Mr',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'dateNaissance' => 'required|date',
            'lieuNaissance' => 'required|string|max:255',
            'numeroSS' => 'required|string|max:15',
            'nationalite' => 'required|string|max:255',
            'numRue' => 'required|string|max:10',
            'rue' => 'required|string|max:255',
            'cp' => 'required|string|max:10',
            'ville' => 'required|string|max:255',
            'departement' => 'required|exists:dpts,id',
            'region' => 'required|exists:regions,id',
            'telephone1' => 'required|string|max:20',
            'telephone2' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'accompagnant' => 'nullable|exists:accompagnants,id',
            'datefinaccompagnement' => 'nullable|date',
            'dptentree' => 'required|exists:dpts,id',
            'dptactuel' => 'nullable|exists:dpts,id',
            'demandeurEmploi' => 'nullable|in:0,1',
            'entrepreneurActif' => 'nullable|in:0,1',
            'dateaccesssocietariat' => 'nullable|date',
            'college' => 'nullable|exists:colleges,id',
            'nbreparts' => 'nullable|integer',
            'datedebut' => 'nullable|date',
            'datesortie' => 'nullable|date',
            'cadeau' => 'nullable|exists:cadeaus,id',
           
        ];
    }
    public function messages()
    {
        return [
            'codeAnalytique.required' => 'Le code analytique est requis.',
            'dateNaissance.required' => 'La date de naissance est requise.',
            
        ];
    }
}
