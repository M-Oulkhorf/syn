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
            'entite' => 'required|exists:entites,id',
            'contrat' => 'required|exists:type_contrats,id',
            'poste' => 'required|string|max:255',
            'datesignaturecontrat' => 'required|date',
            'datefincontrat' => 'required|date|after_or_equal:datesignaturecontrat',
            'datevisitemedicale' => 'nullable|date',
            'situationvisite' => 'nullable|string|max:255',
            'dateprochainevisite' => 'nullable|date|after_or_equal:datevisitemedicale',
            'adhesionencoursNon' => 'required|in:0,1',
            'nom_activite' => 'required|string|max:255',
            'nom_commercial' => 'nullable|string|max:255',
            'mot_cle_activite' => 'nullable|string|max:255',
            'description_activite' => 'nullable|string|max:500',
            'fiche_site' => 'nullable|in:0,1',
            'lien_boutique_en_ligne' => 'nullable|url|max:255',
            'necessite_stock' => 'required|in:0,1',
            'date_dernier_etat_stock' => 'nullable|date',
            'marge_salaire_activite' => 'nullable|numeric',
            'salaire_activite' => 'nullable|numeric',
            'boitier_sum_up' => 'nullable|string|max:255',
            'rcpro_activite' => 'nullable|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'codeAnalytique.required' => 'Le code analytique est requis.',
            'dateNaissance.required' => 'La date de naissance est requise.',
            'entite.required' => 'L\'entité est requise.',
            'contrat.required' => 'Le contrat est requis.',
            'poste.required' => 'Le poste est requis.',
            'datesignaturecontrat.required' => 'La date de signature est requise.',
            'datefincontrat.required' => 'La date de fin est requise.',
            'datefincontrat.after_or_equal' => 'La date de fin doit être égale ou postérieure à la date de signature.',
            'nom_activite.required' => 'Le nom de l\'activité est requis.',
            'fiche_site.required' => 'Veuillez indiquer si la fiche est présente sur le site.',
            'necessite_stock.required' => 'Veuillez indiquer si l\'activité nécessite la réalisation d’un état des stocks.',
        ];
    }
}
