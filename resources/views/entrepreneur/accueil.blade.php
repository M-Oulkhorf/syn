<x-master>
    <div class="main">
        <!-- Barre supérieure -->
        <div class="topbar">
            <!-- Menu Toggle -->
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            
            <!-- Barre de recherche -->
            <div class="search">
                <form method="GET" action="{{ route('entrepreneurs.index') }}">
                    <label>
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search here" 
                            value="{{ request('search') }}">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </form>
            </div>
        </div>

        <!-- ======================= Cartes ======================= -->
        <div class="cardBox">
            <!-- Carte Total SY + PDA -->
            <div class="card">
                <div>
                    <div class="numbers">358</div>
                    <div class="cardName">Total SY + PDA</div>
                </div>
            </div>

            <!-- Carte POOL D'AVENIR -->
            <div class="card">
                <div>
                    <div class="numbers">96</div>
                    <div class="cardName">POOL D'AVENIR</div>
                </div>
            </div>

            <!-- Carte Synercoop -->
            <div class="card">
                <div>
                    <div class="numbers">262</div>
                    <div class="cardName">Synercoop</div>
                </div>
            </div>
        </div>

        <!-- ======================= Liste des entrepreneurs ======================= -->
        <div class="details">
            <div class="entrepreneurs">
                <!-- En-tête de la section -->
                <div class="cardHeader">
                    <h2>Entrepreneurs</h2>
                    <a href="{{ route('entrepreneurs.create') }}" class="btn">Ajouter</a>
                </div>

                <!-- Tableau des entrepreneurs -->
                <table>
                    <thead>
                        <tr>
                            <td>Code Analytique</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Contrat</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entrepreneurs as $entrepreneur)
                            <tr>
                                <!-- Code analytique (limité à 8 caractères) -->
                                <td>{{ Str::limit($entrepreneur->code_analytique_entrepreneur, 8, '') }}</td>
                                <!-- Nom et prénom -->
                                <td>{{ $entrepreneur->prenom_entrepreneur }}</td>
                                <td>{{ $entrepreneur->nom_entrepreneur }}</td>
                                <!-- Type de contrat -->
                                <td>
                                    @if($entrepreneur->Travailler->isNotEmpty())
                                        {{ optional($entrepreneur->Travailler->last()->Contrat->type_contrat)->nom_contrat ?? 'N/A' }}
                                    @else
                                        A saisir
                                    @endif
                                </td>
                                <!-- Bouton pour afficher les détails -->
                                <td>
                                    <a 
                                        class="status inProgress" 
                                        href="{{ route('entrepreneurs.show', $entrepreneur->id) }}" 
                                        role="button">Afficher
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="d-flex justify-content-end">
                    {{ $entrepreneurs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-master>
