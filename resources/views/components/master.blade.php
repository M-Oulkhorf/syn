<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Métadonnées de base -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion</title>

    <!-- CSS de Bootstrap pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Fichier CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Conteneur principal en pleine largeur -->
    <div class="container-fluid">
        <!-- Inclusion du menu depuis le fichier partials/menu.blade.php -->
        @include('partials.menu')

        <!-- Slot dynamique où le contenu principal de chaque page sera injecté -->
        {{ $slot }}

        <!-- Inclusion du pied de page depuis le fichier partials/footer.blade.php -->
        @include('partials.footer')
    </div>

    <!-- Scripts JS nécessaires pour le bon fonctionnement de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Fichier JS personnalisé -->
    <script src="{{ asset('js/script.js') }}"></script>
    
    <!-- Scripts Ionicons pour les icônes -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
