<?php

namespace App\Http\Controllers;

use App\Models\dpt;
use App\Models\Cadeau;
use App\Models\Entite;
use App\Models\region;
use App\Models\Contrat;
use App\Models\Activite;
use App\Models\achat_part;
use App\Models\Travailler;
use App\Models\cheque_crea;
use App\Models\Accompagnant;
use App\Models\Entrepreneur;
use App\Models\type_contrat;
use Illuminate\Http\Request;
use App\Models\boitier_sum_up;
use App\Models\visite_medicale;
use App\Models\utilisation_sum_up;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\domicile_entrepreneur;
use App\Http\Requests\StoreEntrepreneurRequest;
use App\Http\Requests\UpdateEntrepreneurRequest;
use App\Http\Requests\updateActiviteRequest;
use App\Http\Requests\updateContratRequest;
use App\Models\College;

class EntrepreneurController extends Controller
{
    // Fonction pour récupérer les données nécessaires pour les listes déroulantes
    public function listederoulante()
    {
        // Récupération des départements, régions, accompagnants, types de contrats, entités, cadeaux et collèges
        $departements = dpt::select('id', 'nom_dpt')->get();
        $regions = region::select('id', 'nom_region')->get();
        $accompagnants = Accompagnant::select('id', 'nom_accompagnant')->get();
        $typecontrats = type_contrat::select('id', 'nom_contrat')->get();
        $entites = Entite::select('id', 'nom_entite')->get();
        $cadeaus = Cadeau::select('id', 'libelle_cadeau')->get();
        $colleges = College::select('id', 'nom_college')->get();
        return compact('departements', 'regions', 'accompagnants', 'typecontrats', 'entites', 'cadeaus', 'colleges');
    }

    // Fonction pour récupérer les données nécessaires pour le tableau des entrepreneurs et gérer la barre de recherche
    public function index(Request $request){
        // Initialisation de la requête pour la recherche des entrepreneurs
        $query = Entrepreneur::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            // Filtrage par nom, prénom ou code analytique
            $query->where('nom_entrepreneur', 'LIKE', "%{$search}%")
                  ->orWhere('prenom_entrepreneur', 'LIKE', "%{$search}%")
                  ->orWhere('code_analytique_entrepreneur', 'LIKE', "%{$search}%");
        }
        // Récupération avec pagination des entrepreneurs
        $entrepreneurs = $query->with(['Travailler.Contrat.type_contrat'])->paginate(20);
        return view('entrepreneur.accueil', compact('entrepreneurs'));
    }

    // Fonction pour afficher la page de création d'un nouvel entrepreneur
    public function create()
    {
        // Récupération des listes déroulantes nécessaires pour le formulaire de création
        $data = $this->listederoulante();
        return view('entrepreneur.ajouter', $data);
    }

    // Fonction pour enregistrer les données du formulaire d'ajout dans la base
    public function store(StoreEntrepreneurRequest $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            // Création d'un nouvel entrepreneur
            $entrepreneur = Entrepreneur::create([
                'matricule_silae' => $validatedData['MatriculeSILAE'],
                'code_analytique_entrepreneur' => $validatedData['codeAnalytique'],
                'nom_entrepreneur' => $validatedData['nom'],
                'prenom_entrepreneur' => $validatedData['prenom'],
                'sexe_entrepreneur' => $validatedData['sexe'],
                'date_naissance_entrepreneur' => $validatedData['dateNaissance'],
                'lieu_naissance_entrepreneur' => $validatedData['lieuNaissance'],
                'nationalite_entrepreneur' => $validatedData['nationalite'],
                'numero_ss_entrepreneur' => $validatedData['numeroSS'],
                'telephone1_entrepreneur' => $validatedData['telephone1'],
                'telephone2_entrepreneur' => $validatedData['telephone2'] ?? ' ',
                'mail_entrepreneur' => $validatedData['email'],
                'demandeur_emploi' => $validatedData['demandeurEmploi'] ?? null,
                'entrepreneur_actif' => null,
                'cadeau_id' => $validatedData['cadeau'] ?? null,
                'dpt_entree_id' => $validatedData['dptentree'],
                'dpt_actuel_id' => $validatedData['dptentree'],
                'Accompagnant_id' => $validatedData['accompagnant'] ? $validatedData['accompagnant'] : null,
                'date_fin_accompagnement' => $validatedData['datefinaccompagnement'] ?? null,
            ]);

            // Création du domicile de l'entrepreneur
            domicile_entrepreneur::create([
                'Entrepreneur_id' => $entrepreneur->id,
                'rue_domicile_entrepreneur' => $validatedData['rue'],
                'num_rue_domicile_entrepreneur' => $validatedData['num'],
                'ville_domicile_entrepreneur' => $validatedData['ville'],
                'cp_domicile_entrepreneur' => $validatedData['cp'],
                'dpt_id' => $validatedData['departement'],
                'region_id' => $validatedData['region'],
            ]);

            // Création du contrat
            $contrat = Contrat::create([
                'type_Contrat_id' => $validatedData['contrat'],
                'date_signature_contrat' => $validatedData['datesignature'],
                'date_fin_contrat' => $validatedData['expirationducontrat'],
                'poste_contrat' => $validatedData['poste'],
            ]);

            // Création de l'activité
            $activite = Activite::create([
                'nom_activite' => $validatedData['Activite'],
                'nom_commercial' => $validatedData['nomcommercial'] ?? null,
                'mot_cle_activite' => $validatedData['motcleactivite'] ?? null,
                'lien_boutique_en_ligne' => $validatedData['boutiqueenligne'] ?? null,
                'description_activite' => $validatedData['description'] ?? null,
                'rcpro_activite' => $validatedData['rcprpo'] ?? null,
                'marge_salaire_activite' => $validatedData['margesalaire'] ?? null,
                'salaire_activite' => $validatedData['salaireactivite'] ?? null,
                'necessite_stock' => $validatedData['necessitestock'],
                'date_dernier_etat_stock' => $validatedData['datedernieretat'] ?? null,
            ]);

            // Création de la visite médicale
            $visiteMedicale = visite_medicale::create([
                'Entrepreneur_id' => $entrepreneur->id,
                'date_visite' => $validatedData['datevisitemedicale'] ?? null,
                'resultat_visite' => $validatedData['situationvisite'] ?? null,
                'date_prochaine_visite' => $validatedData['dateprochainevisite'] ?? null,
            ]);

            // Création de l'entrée dans la table Travailler
            Travailler::create([
                'Entrepreneur_id' => $entrepreneur->id,
                'Entite_id' => $validatedData['entite'],
                'Contrat_id' => $contrat->id,
                'Activite_id' => $activite->id,
                'visite_medicale_id' => $visiteMedicale->id,
                'dpt_id' => $validatedData['departement'],
                'region_id' => $validatedData['region'],
                'adhesion_en_cours' => null,
                'fiche_site' => $validatedData['fiche_site'] === null ? null : (bool) $validatedData['fiche_site'],
                'College_id' => null,
                'date_access_societariat' => null,
            ]);

            // Création de l'entrée dans la table cheque_crea
            cheque_crea::create([
                'Contrat_id' => $contrat->id,
                'est_obtenu' => $validatedData['chequecrea'],
            ]);
            // Si un boitier SUM UP est spécifié, créez une entrée dans la table utilisation_sum_up
            if (!empty($validatedData['boitiersumup'])) {
                $boitierSumUp = boitier_sum_up::firstOrCreate(['num_sum_up' => $validatedData['boitiersumup']]);
                utilisation_sum_up::create([
                    'Entrepreneur_id' => $entrepreneur->id,
                    'Activite_id' => $activite->id,
                    'boitier_sum_up_id' => $boitierSumUp->id,
                ]);
            }
            DB::commit();
    
            return redirect()->route('entrepreneurs.create')->with('success', 'Enregistrement réussi !');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollback();
            // Renvoie les erreurs de validation
            return redirect()->route('entrepreneurs.create')
                             ->withErrors($e->errors())  // Transmet les erreurs de validation à la vue
                             ->withInput();  // Revenir aux valeurs précédemment entrées dans le formulaire
        } catch (\Exception $e) {
            DB::rollback();
            // Log l'erreur
            Log::error($e);
            // Redirigez avec un message d'erreur
            return redirect()->route('entrepreneurs.create')
                             ->withInput()  // Revenir aux valeurs précédemment entrées dans le formulaire
                             ->with('error', 'Une erreur s\'est produite lors de l\'enregistrement : ' . $e->getMessage());
        }
    }

    // Fonction pour afficher les informations détaillées d'un entrepreneur
    public function show(Request $request){
        // Récupération des informations de l'entrepreneur 
        $entrepreneur = Entrepreneur::with('Cadeau', 'domicile_entrepreneur', 'dpt_entree', 'dpt_actuel', 'accompagnant')->findOrFail($request->id);

        // Récupération des informations du dernier contrat associé à l'entrepreneur
        $travailler = Travailler::with(['Contrat.type_contrat', 'visite_medicale', 'Entite', 'Activite', 'College'])
            ->where('Entrepreneur_id', $request->id)
            ->orderBy('id', 'desc')
            ->first();

        // Préparer les données du contrat
        $contrat = null;
        if ($travailler && $travailler->Contrat) {
            $contrat = [
                'type_contrat_id' => $travailler->Contrat->type_Contrat_id ?? null,
                'date_signature' => $travailler->Contrat->date_signature_contrat,
                'date_fin' => $travailler->Contrat->date_fin_contrat,
                'poste' => $travailler->Contrat->poste_contrat,
                'date_visite' => $travailler->visite_medicale->date_visite,
                'date_prochaine_visite' => $travailler->visite_medicale->date_prochaine_visite,
                'resultat_visite' => $travailler->visite_medicale->resultat_visite ?? null,
                'id_entite' => $travailler->Entite_id ?? null,
                'nom_college' => $travailler->College->nom_college ?? null,
                'date_access_societariat' => $travailler->date_access_societariat ? $travailler->date_access_societariat : null,
            ];
        }

        // Préparer les données de l'activité
        $activite = null;
        if ($travailler && $travailler->activite) {
            $activite = [
                'nom_activite' => $travailler->activite->nom_activite ?? null,
                'lien_boutique_en_ligne' => $travailler->activite->lien_boutique_en_ligne ?? null,
                'description_activite' => $travailler->activite->description_activite ?? null,
                'rcpro_activite' => $travailler->activite->rcpro_activite ?? null,
                'marge_salaire_activite' => $travailler->activite->marge_salaire_activite ?? null,
                'salaire_activite' => $travailler->activite->salaire_activite ?? null,
                'nom_commercial' => $travailler->activite->nom_commercial ?? null,
                'mot_cle_activite' => $travailler->activite->mot_cle_activite ?? null,
                'necessite_stock' => $travailler->activite->necessite_stock ?? null,
                'date_dernier_etat_stock' => $travailler->activite->date_dernier_etat_stock ? date('d-m-Y', strtotime($travailler->activite->date_dernier_etat_stock)) : null,
                'fiche_site' => $travailler->fiche_site ?? null,
                'adhesion_en_cours' => $travailler->adhesion_en_cours ?? null,
            ];
        }

        // Récupérer la date de début d'emploi
        $travailler2 = Travailler::with(['Contrat.type_contrat'])
            ->where('Entrepreneur_id', $request->id)
            ->orderBy('id', 'asc')
            ->first();

        // Préparation des informations du contrat précédent
        $contrat2 = null;
        if ($travailler2 && $travailler2->Contrat) {
            $contrat2 = [
                'date_signature' => $travailler2->Contrat->date_signature_contrat,
            ];
        }

        // Récupérer le nombre total de parts
        $totalParts = achat_part::where('Entrepreneur_id', $request->id)->sum('nbr_parts');

        // Récupérer le numéro SUM UP
        $numsumup = utilisation_sum_up::with(['boitierSumUp'])
                                        ->where('Entrepreneur_id', $request->id)
                                        ->where('Activite_id', $travailler->activite->id)
                                        ->first();
        if ($numsumup) {
            $boitierSumUp = $numsumup->boitierSumUp->num_sum_up;
        } else {
            $boitierSumUp = null;
        }

        // Récupérer les informations sur le chèque CREA
        $cheque_crea = cheque_crea::where('Contrat_id', $travailler->Contrat->id)->first();
        
        // Rassembler toutes les données nécessaires pour la vue
        $data = $this->listederoulante();
        $data['entrepreneur'] = $entrepreneur;
        $data['contrat'] = $contrat;
        $data['contrat2'] = $contrat2;
        $data['totalParts'] = $totalParts;
        $data['activite'] = $activite;
        $data['boitierSumUp'] = $boitierSumUp;
        $data['cheque_crea'] = $cheque_crea;
        // Affichage de la vue avec les données collectées
        return view('entrepreneur.informations', $data);
    }

    // Fonction pour mettre à jour les informations personnelles d'un entrepreneur
    public function update(UpdateEntrepreneurRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();
            $entrepreneur = Entrepreneur::findOrFail($id);
            
            // Mise à jour des données personnelles de l'entrepreneur
            $entrepreneur->update([
                'matricule_silae' => $validatedData['MatriculeSILAE'],
                'code_analytique_entrepreneur' => $validatedData['codeAnalytique'],
                'nom_entrepreneur' => $validatedData['nom'],
                'prenom_entrepreneur' => $validatedData['prenom'],
                'sexe_entrepreneur' => $validatedData['sexe'],
                'date_naissance_entrepreneur' => $validatedData['dateNaissance'],
                'lieu_naissance_entrepreneur' => $validatedData['lieuNaissance'],
                'nationalite_entrepreneur' => $validatedData['nationalite'],
                'numero_ss_entrepreneur' => $validatedData['numeroSS'],
                'telephone1_entrepreneur' => $validatedData['telephone1'],
                'telephone2_entrepreneur' => $validatedData['telephone2'] ?? ' ',
                'mail_entrepreneur' => $validatedData['email'],
                'demandeur_emploi' => $validatedData['demandeurEmploi'] ?? null,
                'entrepreneur_actif' => $validatedData['entrepreneurActif'] ?? null,
                'cadeau_id' => $validatedData['cadeau'] ?? null,
                'dpt_entree_id' => $validatedData['dptentree'],
                'dpt_actuel_id' => $validatedData['dptactuel'] ?? $validatedData['dptentree'],
                'Accompagnant_id' => $validatedData['accompagnant'] ? $validatedData['accompagnant'] : null,
                'date_fin_accompagnement' => $validatedData['datefinaccompagnement'] ?? null,
                'date_sortie' => $validatedData['datesortie'] ?? null,
            ]);

            // Création ou mise à jour de l'adresse de l'entrepreneur
            $domicile = domicile_entrepreneur::where('Entrepreneur_id', $id)->first();
            
            $domicileData = [
                'Entrepreneur_id' => $id,
                'num_rue_domicile_entrepreneur' => $validatedData['numRue'],
                'rue_domicile_entrepreneur' => $validatedData['rue'],
                'ville_domicile_entrepreneur' => $validatedData['ville'],
                'cp_domicile_entrepreneur' => $validatedData['cp'],
                'dpt_id' => $validatedData['departement'],
                'region_id' => $validatedData['region'],
            ];

            if ($domicile) {
                $domicile->update($domicileData);
            } else {
                domicile_entrepreneur::create($domicileData);
            }

            DB::commit();
            return redirect()->route('entrepreneurs.show', $id)->with('success', 'Informations personnelles mises à jour avec succès !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }

    // Fonction pour mettre à jour les informations de contrat d'un entrepreneur
    public function updateContrat(UpdateContratRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            // Validation des données spécifiques au contrat
            $validatedData = $request->validated();
            $entrepreneur = Entrepreneur::findOrFail($id);

            // Récupération du dernier contrat
            $dernierTravailler = Travailler::where('entrepreneur_id', $id)->latest()->first();
            if (!$dernierTravailler) {
                throw new \Exception('Aucun contrat trouvé pour cet entrepreneur');
            }

            // Mise à jour des données de contrat
            $contrat = Contrat::findOrFail($dernierTravailler->Contrat_id);
            $contrat->update([
                'type_contrat_id' => $validatedData['contrat'],
                'poste_contrat' => $validatedData['poste'],
                'date_signature_contrat' => $validatedData['datesignaturecontrat'],
                'date_fin_contrat' => $validatedData['datefincontrat'],
            ]);

            // Mise à jour ou création de la visite médicale
            if (!empty($validatedData['datevisitemedicale'])) {
                $visiteMedicale = visite_medicale::find($dernierTravailler->visite_medicale_id);
                
                $visiteMedicaleData = [
                    'Entrepreneur_id' => $id,
                    'date_visite' => $validatedData['datevisitemedicale'],
                    'resultat_visite' => $validatedData['situationvisite'],
                    'date_prochaine_visite' => $validatedData['dateprochainevisite'],
                ];

                if ($visiteMedicale && $validatedData['datevisitemedicale'] == $visiteMedicale->date_visite) {
                    $visiteMedicale->update($visiteMedicaleData);
                } else {
                    $nouvelleVisite = visite_medicale::create($visiteMedicaleData);
                    $dernierTravailler->update(['visite_medicale_id' => $nouvelleVisite->id]);
                }
            }

            // Mise à jour des données Travailler
            $dernierTravailler->update([
                'id_entite' => $validatedData['entite'],
                'adhesion_en_cours' => $validatedData['adhesionencoursNon'],
            ]);

            DB::commit();
            return redirect()->route('entrepreneurs.show', $id)->with('success', 'Informations de contrat mises à jour avec succès !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour du contrat : ' . $e->getMessage());
        }
    }

    // Fonction pour mettre à jour les informations d'activité d'un entrepreneur
    public function updateActivite(UpdateActiviteRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            // Validation des données spécifiques à l'activité
            $validatedData = $request->validated();
            $entrepreneur = Entrepreneur::findOrFail($id);
            
            // Récupération du dernier contrat de travail
            $dernierTravailler = Travailler::where('entrepreneur_id', $id)->latest()->first();
            if (!$dernierTravailler) {
                throw new \Exception('Aucune activité trouvée pour cet entrepreneur');
            }

            // Mise à jour de la fiche site dans Travailler
            $dernierTravailler->update([
                'fiche_site' => $validatedData['fiche_site'],
            ]);

            // Mise à jour des données de l'activité
            $activite = Activite::findOrFail($dernierTravailler->Activite_id);
            $activite->update([
                'nom_activite' => $validatedData['nom_activite'],
                'nom_commercial' => $validatedData['nom_commercial'],
                'mot_cle_activite' => $validatedData['mot_cle_activite'],
                'description_activite' => $validatedData['description_activite'],
                'lien_boutique_en_ligne' => $validatedData['lien_boutique_en_ligne'],
                'necessite_stock' => $validatedData['necessite_stock'],
                'date_dernier_etat_stock' => $validatedData['date_dernier_etat_stock'],
                'marge_salaire_activite' => $validatedData['marge_salaire_activite'],
                'salaire_activite' => $validatedData['salaire_activite'],
                'rcpro_activite' => $validatedData['rcpro_activite'],
            ]);

            // Mise à jour des informations du boitier SUM UP si fourni
            if (!empty($validatedData['boitier_sum_up'])) {
                $utilisationSumUp = utilisation_sum_up::where('Activite_id', $dernierTravailler->Activite_id)->latest()->first();
                if ($utilisationSumUp) {
                    $boitierSumUp = boitier_sum_up::find($utilisationSumUp->boitier_sum_up_id);
                    if ($boitierSumUp) {
                        $boitierSumUp->update([
                            'num_sum_up' => $validatedData['boitier_sum_up'],
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('entrepreneurs.show', $id)->with('success', 'Informations d\'activité mises à jour avec succès !');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'activité : ' . $e->getMessage());
        }
    }
}