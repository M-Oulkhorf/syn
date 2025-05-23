// Fonction pour activer/désactiver le mode d'édition d'un formulaire
function toggleEditMode(formId, editButtonId, saveButtonId) {
    const form = document.getElementById(formId);

    // Vérifier la présence du champ _method
    const methodField = form.querySelector('input[name="_method"]');

    // Vérifier la présence du token CSRF
    const csrfField = form.querySelector('input[name="_token"]');

    form.querySelectorAll("input, select, textarea").forEach((input) => {
        // On garde les hidden (csrf + method) toujours actifs
        if (input.type === "hidden") {
            return;
        }
        input.disabled = !input.disabled;
    });

    document.getElementById(editButtonId).classList.toggle("d-none");
    document.getElementById(saveButtonId).classList.toggle("d-none");
}

// Sélectionner tous les éléments de liste de navigation
let list = document.querySelectorAll(".navigation li");

// Fonction pour ajouter une classe survolée à l'élément de liste sélectionné
function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

// Ajouter un événement de survol à chaque élément de liste de navigation
list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Sélectionner le bouton bascule et les éléments de navigation et de contenu principal
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

// Fonction pour basculer l'affichage du menu de navigation
toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};
