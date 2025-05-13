<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntrepreneurRequest extends FormRequest
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
            'num' => 'required|string|max:10',
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
            'chequecrea' => 'required|in:0,1',
            'demandeurEmploi' => 'nullable|in:0,1',
            'cadeau' => 'nullable|exists:cadeaus,id',
            'entite' => 'required|exists:entites,id',
            'contrat' => 'required|exists:type_contrats,id',
            'poste' => 'required|string|max:255',
            'datesignature' => 'required|date',
            'expirationducontrat' => 'required|date',
            'datevisitemedicale' => 'nullable|date',
            'situationvisite' => 'nullable|string|max:255',
            'dateprochainevisite' => 'nullable|date',
            'Activite' => 'required|string|max:255',
            'nomcommercial' => 'nullable|string|max:255',
            'motcleactivite' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'fiche_site' => 'nullable|boolean',
            'boutiqueenligne' => 'nullable|string|max:255',
            'necessitestock' => 'required|in:0,1',
            'datedernieretat' => 'nullable|date',
            'margesalaire' => 'nullable|numeric',
            'salaireactivite' => 'nullable|numeric',
            'boitiersumup' => 'nullable|string|max:255',
            'rcprpo' => 'nullable|string|max:255',
            'dptactuel' => 'nullable|exists:dpts,id',
            'entrepreneurActif' => 'nullable|in:0,1',
            'dateaccesssocietariat' => 'nullable|date',
            'college' => 'nullable|exists:colleges,id',
            'nbreparts' => 'nullable|int',
            'datedebut' => 'nullable|date',
            'datesortie' => 'nullable|date',
            'adhesionencours' => 'nullable|in:0,1',
        ];
    }
}
