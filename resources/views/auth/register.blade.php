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

        <form method="POST" action="{{ route('register.post') }}" class="login-form">
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