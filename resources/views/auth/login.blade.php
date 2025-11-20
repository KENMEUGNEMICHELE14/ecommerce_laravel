<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Compte - Connexion</title>
    <!-- Lien CSS simple -->
    <link rel="stylesheet" href="/css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
    <div class="top-nav">
        <a href="{{ url('/') }}" class="logo">BÉBÉCONFORT</a>

        <div class="search-bar">
            <input type="text" placeholder="Que recherchez-vous ?" aria-label="Rechercher">
            <button aria-label="Lancer la recherche"><i class="fa fa-search"></i></button>
        </div>

        <div class="account-cart">
            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Mon Compte</a>
            <a href="#"><i class="fa fa-shopping-cart"></i> Panier</a>
        </div>
    </div>

    <div class="bottom-nav">
        <span class="menu-icon" aria-label="Menu" role="button" tabindex="0">
            <i class="fa fa-bars"></i>
        </span>
        <div class="menu-dropdown">
            <a href="{{ url('/') }}">Accueil</a>
            <div class="category-dropdown">
                <a href="#" class="dropdown-trigger">Catégories <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                    <a href="#">Vêtements</a>
                    <a href="#">Alimentation</a>
                    <a href="#">Accessoires</a>
                    <a href="#">Chaussures</a>
                    <a href="#">Textile de Maternité</a>
                    <a href="#">Poussettes</a>
                    <a href="#">Aménagement de La chambre</a>
                </div>
            </div>
            <a href="#">À propos</a>
            <a href="#">Contact</a>
        </div>
    </div>
</header>

<main>
    <section class="login-section">
        <h2>Connexion à votre compte</h2>
        
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

        <form method="POST" action="{{ route('authentificate') }}" class="login-form">
            @csrf

            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="ex: vous@email.com">
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required placeholder="Votre mot de passe">
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror

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
    <div class="footer-content">
        <div class="footer-column">
            <h4>Service Client</h4>
            <ul>
                <li><a href="#">Centre D'aide</a></li>
                <li><a href="#">Votre compte</a></li>
                <li><a href="#">Vos Commandes</a></li>
                <li><a href="#">Comment Payer</a></li>
                <li><a href="#">Comment Acheter</a></li>
                <li><a href="#">Contactez Nous</a></li>
                <li><a href="#">Mentions Légales</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Liens Utiles</h4>
            <ul>
                <li><a href="#">Vêtements</a></li>
                <li><a href="#">Accessoires</a></li>
                <li><a href="#">Chaussures</a></li>
                <li><a href="#">Aménagement de La chambre</a></li>
                <li><a href="#">Alimentation</a></li>
                <li><a href="#">Couches et Lingettes</a></li>
                <li><a href="#">Textile de Maternité</a></li>
                <li><a href="#">Poussettes</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>A propos</h4>
            <ul>
                <li><a href="#">Qui Sommes Nous</a></li>
                <li><a href="#">Carrière</a></li>
                <li><a href="#">Conditions Générales</a></li>
            </ul>
        </div>
        
        <div class="footer-column">
            <h4>Methode De paiement</h4>
            <div class="payment-methods">
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" class="payment-logo"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="payment-logo"></a>
                <a href="#"><img src="/images/téléchargement.png" alt="American Express" class="payment-logo"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="payment-logo"></a>
                <a href="#"><img src="/images/mtn-mobile-money-logo.jpg" alt="Mtn Money" class="payment-logo"></a>
                <a href="#"><img src="/images/orange-money-logo-png_seeklogo-440383.png" alt="orange money" class="payment-logo"></a>
            </div>
        </div>

        <div class="footer-column">
            <h4>Réseaux Sociaux</h4>
            <ul>
                <li><a href="#"><img src="/images/facebook.jpg" alt="Facebook" class="social-logo"></a></li>
                <li><a href="#"><img src="/images/instagram.jpg" alt="Instagram" class="social-logo"></a></li>
                <li><a href="#"><img src="/images/twitter.png" alt="Twitter" class="social-logo"></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <h5>&copy; <strong>BébéConfort 2025 - Tous droits réservés</strong></h5>
    </div>
</footer>

</body>
</html>