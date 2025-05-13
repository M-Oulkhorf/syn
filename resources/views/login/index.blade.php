<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <div class="login-page">
        <div class="login-wrapper">
            <header class="login-header">Connexion</header>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-field {{ $errors->has('login') ? 'error' : '' }}">
                    <div class="login-input-area">
                        <input type="text" class="login-input" placeholder="Login" name="login" value="{{ old('login') }}" required>
                        <i class="login-icon fas fa-user"></i>
                        @if ($errors->has('login'))
                            <i class="login-error-icon fas fa-exclamation-circle"></i>
                        @endif
                    </div>
                    @error('login')
                        <div class="login-error-txt">{{ $message }}</div>
                    @enderror
                </div>
                <div class="login-field {{ $errors->has('mdp') ? 'error' : '' }}">
                    <div class="login-input-area">
                        <input type="password" class="login-input" placeholder="Mot de passe" name="password" required>
                        <i class="login-icon fas fa-lock"></i>
                        @if ($errors->has('mdp'))
                            <i class="login-error-icon fas fa-exclamation-circle"></i>
                        @endif
                    </div>
                    @error('mdp')
                        <div class="login-error-txt">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" class="login-submit" value="Se connecter">
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
