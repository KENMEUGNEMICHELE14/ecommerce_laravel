<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte - BébéConfort</title>
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
        <h2>Créer un compte</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="login-form">
            @csrf

            <!-- NOM COMPLET -->
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Ex: Jean Dupont">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="ex: vous@email.com">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- TÉLÉPHONE -->
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" placeholder="Ex: +237 6XX XXX XXX">
                @error('telephone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- MOT DE PASSE -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- CONFIRMATION MOT DE PASSE -->
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Répétez votre mot de passe">
            </div>

            <button type="submit" class="submit-btn">Créer mon compte</button>

            <div class="form-links">
                <a href="{{ route('login') }}">Déjà un compte ? Se connecter</a>
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