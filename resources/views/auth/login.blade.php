<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Compte - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
    <div class="top-nav">
        <a href="{{ url('/') }}" class="logo">BÉBÉCONFORT</a>
    </div>
</header>

<main>
    <section class="login-section">
        <h2>Connexion à votre compte</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('authentificate') }}" class="login-form">
            @csrf

            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="ex: vous@email.com">
            @error('email')<span class="error-message">{{ $message }}</span>@enderror

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
            @error('password')<span class="error-message">{{ $message }}</span>@enderror

            <a href="#" class="forgot-password">Mot de passe oublié ?</a>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit">Se connecter</button>

            <div class="form-links">
                <a href="{{ route('register') }}">Pas de compte ? Créer un compte</a>
            </div>
        </form>
    </section>
</main>

<footer class="site-footer">
    <div class="footer-bottom">
        <h5>&copy; <strong>BébéConfort 2025 - Tous droits réservés</strong></h5>
    </div>
</footer>

</body>
</html>