<x-master>
    <!-- Page principale pour l'ajout d'un entrepreneur -->
    <div class="main">
        <!-- Affiche le message d'erreur ou de succès -->
        <div class="row" my-3>
            @include('partials.flashbag')
        </div>
        
        <!-- Barre de navigation avec bouton de menu déroulant -->
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
        
        <!-- Formulaire pour l'ajout d'un entrepreneur -->
        <form method="POST" action="{{ route('entrepreneurs.store') }}">
            @csrf
            <!-- Collapsible contenant les informations personnelles de l'entrepreneur -->
            <x-collapsefield title="INFORMATIONS PERSONNELLES" id="1">
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le matricule SILAE -->
                    <x-form-field name="MatriculeSILAE" label="Matricule SILAE" :value="old('MatriculeSILAE')" required />
                </div>
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le code analytique -->
                    <x-form-field name="codeAnalytique" label="Code analytique" :value="old('codeAnalytique')" required />
                    <div class="col-md-5">
                        <!-- Champ de sélection pour le sexe -->
                        <div class="form-group">
                            <label for="sexe" style="font-size: 0.95rem;"><strong>Civilité</strong></label>
                            <select class="form-control" name="sexe" required style="font-size: 0.9rem;">
                                <option value="Mme" {{ old('sexe') == 'Mme' ? 'selected' : '' }}>Mme</option>
                                <option value="Mr" {{ old('sexe') == 'Mr' ? 'selected' : '' }}>Mr</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le prénom -->
                    <x-form-field name="prenom" label="Prénom" :value="old('prenom')" required />
                    <!-- Champ de saisie pour le nom -->
                    <x-form-field name="nom" label="Nom" :value="old('nom')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour la date de naissance -->
                    <x-form-field name="dateNaissance" label="Date de naissance" type="date" :value="old('dateNaissance')" required />
                    <!-- Champ de saisie pour le lieu de naissance -->
                    <x-form-field name="lieuNaissance" label="Lieu de naissance" :value="old('lieuNaissance')" required />
                </div>
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le numéro de sécurité sociale -->
                    <x-form-field name="numeroSS" label="Numéro de sécurité sociale:" :value="old('numeroSS')" required />
                    <!-- Champ de saisie pour la nationalité -->
                    <x-form-field name="nationalite" label="Nationalité:" :value="old('nationalite')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le numéro d'adresse -->
                    <x-form-field name="num" label="N°" :value="old('num')" required />
                    <!-- Champ de saisie pour la rue -->
                    <x-form-field name="rue" label="Rue" :value="old('rue')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le code postal -->
                    <x-form-field name="cp" label="CP" :value="old('cp')" required />
                    <!-- Champ de saisie pour la ville -->
                    <x-form-field name="ville" label="Ville" :value="old('ville')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de sélection pour le département -->
                    <x-form-field name="departement" label="Département" type="select" :options="$departements->pluck('nom_dpt', 'id')" :value="old('departement')" required />
                    <div class="col-md-5">
                        <!-- Champ de sélection pour la région -->
                        <div class="form-group">
                            <label for="region" style="font-size: 0.95rem;"><strong>Région</strong></label>
                            <select class="form-control" name="region" id="region" style="font-size: 0.9rem;">
                                <option value="">Sélectionnez une option</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region', $region->id) == $region->id ? 'selected' : '' }}>
                                        {{ $region->nom_region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le téléphone 1 -->
                    <x-form-field name="telephone1" label="Téléphone 1" :value="old('telephone1')" required />
                    <!-- Champ de saisie pour le téléphone 2 -->
                    <x-form-field name="telephone2" label="Téléphone 2" :value="old('telephone2')" />
                </div>
                
                <div class="d-md-flex mt-10">
                    <!-- Champ de saisie pour l'adresse e-mail -->
                    <x-form-field name="email" label="Email" type="email" :value="old('email')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <!-- Champ de sélection pour l'accompagnant -->
                        <div class="form-group">
                            <label for="accompagnant" style="font-size: 0.95rem;"><strong>Accompagnant</strong></label>
                            <select class="form-control" name="accompagnant" style="font-size: 0.9rem;">
                                <option value="">Sélectionnez une option</option>
                                @foreach($accompagnants as $accompagnant)
                                        <option value="{{ $accompagnant->id }}">{{ $accompagnant->nom_accompagnant }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Champ de saisie pour la date de fin d'accompagnement -->
                    <x-form-field name="datefinaccompagnement" label="Date de fin d'accompagnement" type="date" :value="old('datefinaccompagnement')"/>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de sélection pour le département d'entrée -->
                    <x-form-field name="dptentree" label="Département d'entrée" type="select" :options="$departements->pluck('nom_dpt', 'id')" :value="old('dptentree')" required />
                    <!-- Champ de sélection pour demandeur d'emploi -->
                    <x-form-field name="demandeurEmploi" type="radio" label="Demandeur d'emploi" :options="['0' => 'Non', '1' => 'Oui']" :value="old('demandeurEmploi')" required/>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <!-- Champ de sélection pour le cadeau -->
                        <div class="form-group">
                            <label for="cadeau" style="font-size: 0.95rem;"><strong>Cadeau</strong></label>
                            <select class="form-control" name="cadeau" style="font-size: 0.9rem;">
                                <option value="">Sélectionnez une option</option>
                                @foreach($cadeaus as $cadeau)
                                    <option value="{{ $cadeau->id }}">{{ $cadeau->id . " - " . $cadeau->libelle_cadeau }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </x-collapsefield>

            <!-- Collapsible contenant les informations liées au contrat de l'entrepreneur -->
            <x-collapsefield title="CONTRAT" id="2">
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <!-- Champ de sélection pour l'entité -->
                        <div class="form-group">
                            <label for="entite" style="font-size: 0.95rem;"><strong>Entité</strong></label>
                            <select class="form-control" name="entite" style="font-size: 0.9rem;">
                                @foreach($entites as $entite)
                                        <option value="{{ $entite->id }}">{{ $entite->nom_entite }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Champ de sélection pour le chèque CREA -->
                    <x-form-field name="chequecrea" type="radio" label="Chèque CREA" :options="['0' => 'Non', '1' => 'Oui']" :value="old('chequecrea')" required/>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <div class="col-md-5">
                        <!-- Champ de sélection pour le contrat -->
                        <div class="form-group">
                            <label for="contrat" style="font-size: 0.95rem;"><strong>Contrat</strong></label>
                            <select class="form-control" name="contrat" id="contrat" style="font-size: 0.9rem;">
                                <option value="">Sélectionnez une option</option>
                                @foreach($typecontrats as $contrat)
                                    <option value="{{ $contrat->id }}" {{ old('contrat', $contrat->id) == $contrat->id ? 'selected' : '' }}>
                                        {{ $contrat->nom_contrat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Champ de saisie pour le poste -->
                    <x-form-field name="poste" label="Poste" :value="old('poste')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour la date de signature -->
                    <x-form-field name="datesignature" label="Date de signature" type="date" :value="old('datesignature')" required />
                    <!-- Champ de saisie pour la date d'expiration du contrat -->
                    <x-form-field name="expirationducontrat" label="Date d'expiration du contrat" type="date" :value="old('expirationducontrat')" required />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour la date de visite médicale -->
                    <x-form-field name="datevisitemedicale" label="Date de visite médicale" type="date" :value="old('datevisitemedicale')"/>
                    <!-- Champ de saisie pour la situation / visite -->
                    <x-form-field name="situationvisite" label="Situation / visite" :value="old('situationvisite')"/>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour la date de prochaine visite -->
                    <x-form-field name="dateprochainevisite" label="Date de prochaine visite" type="date" :value="old('dateprochainevisite')"/>
                </div>
            </x-collapsefield>

            <!-- Collapsible contenant les informations liées à l'activité de l'entrepreneur -->
            <x-collapsefield title="ACTIVITE" id="3">
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour l'activité -->
                    <x-form-field name="Activite" label="Activité" :value="old('Activite')" required />
                    <!-- Champ de saisie pour le nom commercial -->
                    <x-form-field name="nomcommercial" label="Nom commercial" :value="old('nomcommercial')"/>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le mot clé de l'activité -->
                    <x-form-field name="motcleactivite" label="Mot clé de l'activité" :value="old('motcleactivite')"/>
                    <!-- Champ de saisie pour la description -->
                    <x-form-field name="description" label="Description" :value="old('description')"/>
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de sélection pour la fiche présente sur le site -->
                    <x-form-field name="fiche_site" type="radio" label="Fiche présente sur le site" :options="['0' => 'Non', '1' => 'Oui', '' => 'À faire']" :value="old('fiche_site')" />
                    <!-- Champ de saisie pour la boutique en ligne -->
                    <x-form-field name="boutiqueenligne" label="Boutique en ligne" :value="old('boutiqueenligne')" />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de sélection pour la réalisation d'un état des stocks -->
                    <x-form-field name="necessitestock" type="radio" label="Activité nécessitant la réalisation d’un état des stocks" :options="['0' => 'Non', '1' => 'Oui']" :value="old('necessitestock')"/>
                    <!-- Champ de saisie pour la date du dernier état des stocks -->
                    <x-form-field name="datedernieretat" label="Date du dernier état des stocks" type="date" :value="old('datedernieretat')" />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour la marge salaire -->
                    <x-form-field name="margesalaire" label="Marge salaire" :value="old('margesalaire')" />
                    <!-- Champ de saisie pour le salaire de l'activité -->
                    <x-form-field name="salaireactivite" label="Salaire de l'activité" :value="old('salaireactivite')" />
                </div>
                
                <div class="d-md-flex justify-content-between mt-2">
                    <!-- Champ de saisie pour le nom de boitier SUM UP -->
                    <x-form-field name="boitiersumup" label="Nom de boitier SUM UP" :value="old('boitiersumup')" />
                    <!-- Champ de saisie pour le RCPRPO MACIF -->
                    <x-form-field name="rcprpo" label="RCPRPO MACIF" :value="old('rcprpo')" />
                </div>
            </x-collapsefield>
            <div class="text-center mt-2">
                <!-- Bouton pour envoyer le formulaire -->
                <button id="saveButton" class="btn btn-success" type="submit" onclick="" style="font-family: Arial, sans-serif;">Ajouter</button>
            </div>
        </form>
    </div>
</x-master>