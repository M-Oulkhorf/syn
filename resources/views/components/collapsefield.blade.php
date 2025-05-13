<!--
Le composant est pour créer un champ collapsible (rétractable) avec un titre et un contenu dynamique.
Il utilise Bootstrap pour le style et la fonctionnalité de collapsibilité.
-->

@props([
    'title', // Titre du champ collapsible
    'id'     // ID unique pour le champ collapsible
])

<!--
Le code HTML créé un conteneur et un card pour afficher le titre et le contenu dynamique.
-->

<div class="container my-5"> 
    <div class="card shadow-lg"> 
        <!-- Bouton qui contrôle la collapsibilité -->
        <button class="btn btn-primary" type="button" 
                data-toggle="collapse" 
                data-target="#collapse{{ $id }}" 
                aria-expanded="false" 
                aria-controls="collapse{{ $id }}" 
                style="font-family: Arial, sans-serif;"> 
            {{ $title }} 
        </button>
        <!-- Contenu collapsible -->
        <div class="collapse" id="collapse{{ $id }}"> 
            <div class="card-body" style="font-family: Arial, sans-serif;"> 
                {{ $slot }} 
            </div>
        </div>
    </div>
</div>