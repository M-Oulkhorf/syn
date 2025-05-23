<x-master>
    <!-- Page principale pour l'affichage des informations d'un entrepreneur -->
    <div class="main">
        <!-- Affiche le message d'erreur ou de succès -->
        <div class="row" my-3>
            @include('partials.flashbag')
        </div>
        {{-- Barre de navigation supérieure avec un bouton de menu --}}
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
        
        {{-- Titrage des informations de l'entrepreneur --}}
        <h1 style="text-align: center; font-family: Times New Roman, serif; margin-top:10px;">
             <strong>{{$entrepreneur->sexe_entrepreneur}} {{ $entrepreneur->nom_entrepreneur }} {{ $entrepreneur->prenom_entrepreneur }}</strong>
        </h1>

        {{-- Préparation des dates avec Carbon pour le contrat et l'activité --}}
        @php
            $datesignature = $contrat['date_signature']->format('Y-m-d');
            $datefin = $contrat['date_fin']->format('Y-m-d');
            $datevisite = $contrat['date_visite']->format('Y-m-d');
            $dateprochainevisite = $contrat['date_prochaine_visite']->format('Y-m-d');
            $datedernieretatstock = $activite['date_dernier_etat_stock'];
        @endphp

        {{-- Affichage des informations personnelles de l'entrepreneur sous forme d'une collapse --}}
        <x-collapsefield title="INFORMATIONS PERSONNELLES" id="1">
            <form method="POST" action="{{ route('entrepreneurs.update', $entrepreneur->id) }}" id="form1" class="editable-form">
            @csrf
            @method('PUT')
            
                {{-- Informations de base de l'entrepreneur : N° Enregistrement et Matricule SILAE --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="NEnregistrement" label="N° Enregistrement" :value="$entrepreneur->id" :disabled="true" required />
                    <x-form-field name="MatriculeSILAE" label="Matricule SILAE" :value="$entrepreneur->matricule_silae" :disabled="true" required />
                </div>

                {{-- Civilité et code analytique de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="codeAnalytique" label="Code analytique" :value="$entrepreneur->code_analytique_entrepreneur" :disabled="true" required />
                    <x-form-field name="sexe" label="Civilité" :value="$entrepreneur->sexe_entrepreneur" :disabled="true" required />
                </div>

                {{-- Prénom et Nom de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="prenom" label="Prénom" :value="$entrepreneur->prenom_entrepreneur" :disabled="true" required />
                    <x-form-field name="nom" label="Nom" :value="$entrepreneur->nom_entrepreneur" :disabled="true" required />
                </div>

                {{-- Date et lieu de naissance de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="dateNaissance" label="Date de naissance" type="date" :value="$entrepreneur->date_naissance_entrepreneur ? $entrepreneur->date_naissance_entrepreneur->format('Y-m-d') : now()->format('Y-m-d')" :disabled="true" required />
                    <x-form-field name="lieuNaissance" label="Lieu de naissance" :value="$entrepreneur->lieu_naissance_entrepreneur" :disabled="true" required />
                </div>

                {{-- Informations de contact : Numéro de sécurité sociale et nationalité --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="numeroSS" label="Numéro de sécurité sociale" :value="$entrepreneur->numero_ss_entrepreneur" :disabled="true" required />
                    <x-form-field name="nationalite" label="Nationalité" :value="$entrepreneur->nationalite_entrepreneur" :disabled="true" required />
                </div>

                {{-- Adresse personnelle : N°, rue, CP et ville --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="numRue" label="N°" :value="$entrepreneur->domicile_entrepreneur->num_rue_domicile_entrepreneur" :disabled="true" required />
                    <x-form-field name="rue" label="Rue" :value="$entrepreneur->domicile_entrepreneur->rue_domicile_entrepreneur" :disabled="true" required />
                </div>

                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="cp" label="CP" :value="$entrepreneur->domicile_entrepreneur->cp_domicile_entrepreneur" :disabled="true" required />
                    <x-form-field name="ville" label="Ville" :value="$entrepreneur->domicile_entrepreneur->ville_domicile_entrepreneur" :disabled="true" required />
                </div>

                {{-- Département et région de l'adresse de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="departement" label="Département" type="select" :options="$departements->pluck('nom_dpt', 'id')" :value="$entrepreneur->domicile_entrepreneur->dpt_id" :disabled="true" required />
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="region" style="font-size: 0.95rem;"><strong>Région:</strong></label>
                            <select id="region" class="form-control" name="region" style="font-size: 0.9rem;" disabled>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ $entrepreneur->domicile_entrepreneur->region_id == $region->id ? 'selected' : '' }}>
                                        {{ $region->id . " - " . $region->nom_region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Informations de contact supplémentaires : Téléphone et Email --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="telephone1" label="Téléphone 1" :value="$entrepreneur->telephone1_entrepreneur" :disabled="true" required />
                    <x-form-field name="telephone2" label="Téléphone 2" :value="$entrepreneur->telephone2_entrepreneur" :disabled="true" />
                </div>
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="email" label="Email" :value="$entrepreneur->mail_entrepreneur" :disabled="true" required />
                </div>

                {{-- Accompagnant et date de fin d'accompagnement --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="accompagnant" style="font-size: 0.95rem;"><strong>Accompagnant</strong></label>
                            <select id="accompagnant" class="form-control" name="accompagnant" style="font-size: 0.9rem;" disabled>
                                @foreach($accompagnants as $accompagnant)
                                    <option value="{{ $accompagnant->id }}" {{ $entrepreneur->Accompagnant_id == $accompagnant->id ? 'selected' : '' }}>
                                        {{ $accompagnant->nom_accompagnant }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <x-form-field name="datefinaccompagnement" label="Date de fin d'accompagnement" :value="$entrepreneur->date_fin_accompagnement ? $entrepreneur->date_fin_accompagnement->format('Y-m-d') : now()->format('Y-m-d')" :disabled="true" required />
                </div>

                {{-- Départements d'entrée et actuel de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="dptentree" id="dptentree" label="Département d'entrée" type="select" :options="$departements->pluck('nom_dpt', 'id')" :value="$entrepreneur->dpt_entree_id" :disabled="true" required />
                    <x-form-field name="dptactuel" id="dptactuel" label="Département actuel" type="select" :options="$departements->pluck('nom_dpt', 'id')" :value="$entrepreneur->dpt_actuel_id" :disabled="true"  />
                </div>

                {{-- Statuts d'emploi de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="demandeurEmploi" type="radio" label="Demandeur d'emploi" :options="['0' => 'Non', '1' => 'Oui']" :value="$entrepreneur->demandeur_emploi" :disabled="true" />
                    <x-form-field name="entrepreneurActif" type="radio" label="Entrepreneur actif" :options="['0' => 'Non', '1' => 'Oui']" :value="$entrepreneur->entrepreneur_actif" :disabled="true" />
                </div>

                {{-- Informations sur l'accès au sociétariat et collège --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="dateaccesssocietariat" label="Date accées sociétariat" type="date" :value="$contrat['date_access_societariat'] ? $contrat['date_access_societariat']->format('Y-m-d') : now()->format('Y-m-d')" :disabled="true"  />
                    <x-form-field name="college" label="Collège" type="select"  :options="$colleges->pluck('nom_college', 'id')" :value="$contrat['nom_college'] ?? 'Non spécifié'" :disabled="true"/>
                </div>

                {{-- Informations supplémentaires sur les parts et le chèque CRE --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="nbreparts" label="Nbre parts" :value="$totalParts" :disabled="true"  />
                    <x-form-field name="chequecrea"  label="Chèque CREA" type="radio" :options="['0' => 'Non', '1' => 'Oui']" :value="$cheque_crea->est_obtenu" :disabled="true" />
                </div>

                {{-- Informations sur les dates de début et de cadeau de bienvenue --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="datedebut" label="Date de début" type="date" :value="$contrat2['date_signature'] ? $contrat2['date_signature']: 'Aucune date'" :disabled="true"  />
                    <x-form-field name="cadeau" type="select"  :options="$cadeaus->pluck('libelle_cadeau', 'id')" label="Cadeau de bienvenue" :value="$entrepreneur->cadeau->libelle_cadeau ?? 'Aucun'" :disabled="true"  />
                </div>

                {{-- Date de sortie de l'entrepreneur --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="datesortie" label="Date de sortie" type="date" :value="$entrepreneur->date_sortie ? $entrepreneur->date_sortie: 'Aucune date'" :disabled="true"  />
                </div>

                {{-- Boutons pour modifier et enregistrer les informations de l'entrepreneur --}}
                <div class="text-center mt-4">
                    <button id="editButton1" class="btn btn-primary mr-2" type="button" onclick="toggleEditMode('form1', 'editButton1', 'saveButton1')" style="font-family: Arial, sans-serif;">Modifier</button>
                    <button id="saveButton1" type="submit" class="btn btn-success d-none" style="font-family: Arial, sans-serif;">Enregistrer</button>
                </div>
            </form>
        </x-collapsefield>

        {{-- Affichage des informations liées au contrat de l'entrepreneur sous forme d'une collapse --}}
        <x-collapsefield title="CONTRAT (Statut actuel ou dernier statut avant sortie)" id="2">
            <form method="POST" action="{{ route('contrat.update', $entrepreneur->id) }}" id="form2" class="editable-form">
            @csrf
            @method('PUT')

                {{-- Sélection de l'entité et statut d'adhésion --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="entite" style="font-size: 0.95rem;"><strong>Entité</strong></label>
                            <select id="entite" class="form-control" name="entite" style="font-size: 0.9rem;" disabled>
                                @foreach($entites as $entite)
                                    <option value="{{ $entite->id }}" {{ $contrat['id_entite'] == $entite->id ? 'selected' : '' }}>
                                        {{ $entite->nom_entite }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <x-form-field name="adhesionencoursNon" type="radio" label="Adhesion en cours" :options="['0' => 'Non', '1' => 'Oui']" :value="$activite['adhesion_en_cours']" :disabled="true" />
                </div>

                {{-- Sélection du type de contrat et information sur le poste --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nomcontrat" style="font-size: 0.95rem;"><strong>Contrat</strong></label>
                            <select id="contrat" class="form-control" name="contrat" style="font-size: 0.9rem;" disabled>
                                @foreach($typecontrats as $contrat)
                                    <option value="{{ $contrat->id }}" {{ $contrat['type_contrat_id'] == $contrat->id ? 'selected' : '' }}>
                                        {{ $contrat->nom_contrat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <x-form-field name="poste" label="Poste" :value="$contrat['poste'] ?? 'Non spécifié'" :disabled="true" required />
                </div>

                {{-- Dates importantes liées au contrat : signature et fin --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="datesignaturecontrat" label="Date de signature" type="date" :value="$datesignature ? $datesignature : ''" :disabled="true" required />
                    <x-form-field name="datefincontrat" label="Date de fin" type="date" :value="$datefin ? $datefin : ''" :disabled="true" required />
                </div>

                {{-- Informations sur la visite médicale et sa situation --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="datevisitemedicale" label="Date de visite médicale" type="date" :value="$datevisite ? $datevisite : ''" :disabled="true"  />
                    <x-form-field name="situationvisite" label="Situation / visite" :value="$contrat['resultat_visite'] ? $contrat['resultat_visite'] : 'Non spécifiée'" :disabled="true"  />
                </div>

                {{-- Date de prochaine visite médicale --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="dateprochainevisite" label="Date de prochaine visite" type="date" :value="$dateprochainevisite ? $dateprochainevisite : ''" :disabled="true"  />
                </div>  

                {{-- Boutons pour modifier et enregistrer les informations de l'entrepreneur --}}
                <div class="text-center mt-4">
                    <button id="editButton2" class="btn btn-primary mr-2" type="button" onclick="toggleEditMode('form2', 'editButton2', 'saveButton2')" style="font-family: Arial, sans-serif;">Modifier</button>
                    <button id="saveButton2" type="submit" class="btn btn-success d-none" style="font-family: Arial, sans-serif;">Enregistrer</button>
                </div>
            </form>       
        </x-collapsefield>
        
        {{-- Affichage des informations liées à l'activité de l'entrepreneur sous forme d'une collapse --}}
        <x-collapsefield title="ACTIVITE" id="3">
            <form method="POST" action="{{ route('activite.update', $entrepreneur->id) }}" id="form3" class="editable-form">
            @csrf
            @method('PUT')
                {{-- Informations sur l'activité et le nom commercial --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="nom_activite" label="Activite" :value="$activite['nom_activite'] ? $activite['nom_activite'] : 'pas concerné'" :disabled="true"  />
                    <x-form-field name="nom_commercial" label="Nom commercial" :value="$activite['nom_commercial'] ? $activite['nom_commercial'] : 'pas concerné'" :disabled="true"  />
                </div>

                {{-- Détails supplémentaires sur l'activité --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="mot_cle_activite" label="Mot clé de l'activité" :value="$activite['mot_cle_activite'] ? $activite['mot_cle_activite'] : 'pas concerné'" :disabled="true"  />
                    <x-form-field name="description_activite" label="Description" :value="$activite['description_activite'] ? $activite['description_activite'] : 'pas concerné'" :disabled="true"  />
                </div>

                {{-- État de la fiche sur le site et lien vers la boutique en ligne --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="fiche_site" type="radio" label="Fiche présente sur le site" :options="['0' => 'Non', '1' => 'Oui', '' => 'À faire']" :value="$activite['fiche_site']" :disabled="true"/>
                    <x-form-field name="lien_boutique_en_ligne" label="Boutique en ligne" :value="$activite['lien_boutique_en_ligne'] ? $activite['lien_boutique_en_ligne'] : 'pas concerné'" :disabled="true"  />
                </div>

                {{-- Informations sur le stock et la marge de salaire --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="necessite_stock" type="radio" label="Activitée nécessitant la réalisation d’un état des stocks" :options="['0' => 'Non', '1' => 'Oui']" :value="$activite['necessite_stock']" :disabled="true" />
                    <x-form-field name="date_dernier_etat_stock" label="Date du dernier état des stocks" type="date" :value="$datedernieretatstock ? $datedernieretatstock : ''" :disabled="true"  />
                </div>

                {{-- Informations sur les marges et salaires liés à l'activité --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="marge_salaire_activite" label="Marge salaire" :value="$activite['marge_salaire_activite'] ? $activite['marge_salaire_activite'] : ''" :disabled="true"  />
                    <x-form-field name="salaire_activite" label="Salaire de l'activité" :value="$activite['salaire_activite'] ? $activite['salaire_activite'] : ''" :disabled="true"  />
                </div>

                {{-- Informations sur le boîtier SUM UP et assurance RCP --}}
                <div class="d-md-flex justify-content-between mt-2">
                    <x-form-field name="boitier_sum_up" label="Nom de boitier SUM UP" :value="$boitierSumUp" :disabled="true"  />
                    <x-form-field name="rcpro_activite" label="RCPRPO MACIF" :value="$activite['rcpro_activite'] ? $activite['rcpro_activite'] : 'pas concerné'" :disabled="true"  />
                </div>

                {{-- Boutons pour modifier et enregistrer les informations de l'entrepreneur --}}
                <div class="text-center mt-4">
                    <button id="editButton3" class="btn btn-primary mr-2" type="button" onclick="toggleEditMode('form3', 'editButton3', 'saveButton3')" style="font-family: Arial, sans-serif;">Modifier</button>
                    <button id="saveButton3" type="submit" class="btn btn-success d-none" style="font-family: Arial, sans-serif;">Enregistrer</button>
                </div>
            </form>
        </x-collapsefield>
    </div>
</x-master>