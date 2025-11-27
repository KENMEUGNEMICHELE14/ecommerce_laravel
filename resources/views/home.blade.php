<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/king.css') }}">
    <title>Bébéconfort</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- ===== HEADER - INCHANGÉ ===== -->
<header>
    <div class="top-nav">
        <a href="{{ url('/') }}" class="logo">BÉBÉCONFORT</a>

        <div class="search-bar">
              <input type="text" placeholder="Que recherchez-vous ?" aria-label="Rechercher">
            <button aria-label="Lancer la recherche"><i class="fa fa-search"></i></button>
        </div>

        <div class="account-cart">
            @guest
                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Mon Compte</a>
            @else
                <span>{{ auth()->user()->name }}</span>
                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Mon Compte</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('dashboard') }}"><i class="fa fa-cog"></i> Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:inherit;cursor:pointer">
                        <i class="fa fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            @endguest

            <a href="{{ url('/panier') }}"><i class="fa fa-shopping-cart"></i> Panier</a>
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
                    <a href="{{ url('pages/vêtements/pageCategorieVetement.html') }}">Vêtements</a>
                    <a href="{{ url('pages/Accessoires/Accessoires.html') }}">Accessoires</a>
                    <a href="{{ url('pages/chaussures/chaussures.html') }}">Chaussures</a>
                    <a href="{{ url('pages/amenagement_de_chambre/amenagement.html') }}">Aménagement de La chambre</a>
                    <a href="{{ url('pages/alimentation/alimentation.html') }}">Alimentation</a>
                    <a href="{{ url('pages/couches_et_lingettes/couche_lingette.html') }}">Couches et Lingettes</a>
                    <a href="{{ url('pages/textile_de_maternité/textile.html') }}">Textile de Maternité</a>
                    <a href="{{ url('pages/poussettes/pouset.html') }}">Poussettes</a>
                </div>
            </div>
            <a href="#">À propos</a>
            <a href="#">Contact</a>
        </div>
    </div>
</header>

<!-- ===== HERO - INCHANGÉ ===== -->
<section class="hero">
    <div class="hero-slider">
        <div class="hero-content active">
            <div class="hero-container">
                <div class="hero-left">
                    <div class="hero-image">
                        <img src="{{ asset('images/images_index/bebe_noir.jpg') }}" alt="Bébé" >
                    </div>
                </div>
                <div class="hero-right">
                    <div class="hero-text">
                        <h2><strong>GRANDIR EN BEAUTÉ, S'ÉPANOUIR EN DOUCEUR</strong></h2>
                        <h3><strong>Bienvenue dans l'univers où chaque détail compte pour votre bébé</strong></h3>
                        <div class="hero-buttons">
                            <a href="#flash-sales" class="btn-primary">Découvrir</a>
                            <a href="#" class="btn-secondary">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== NAV-WRAPPER - INCHANGÉ ===== -->
<section>
    <div class="nav-wrapper">
        <div class="nav-container">
            <div data-spm="millions_offers" class="home-dot-element nav-cube" data-appeared="true">
                <div class="icon-container">
                    <img src="https://s.alicdn.com/@img/imgextra/i1/O1CN01tbfptg1Fv1tsyww7q_!!6000000000548-2-tps-96-96.png" alt="Des millions d'offres commerciales">
                </div>
                <div class="title-container home-fw-semi-bold">Des millions d'offres commerciales</div>
                <div class="content-container">Découvrez des produits et accessoires pour votre bébé parmi des milliers d'offres que nous mettons à votre disposition.</div>
            </div>
            <div data-spm="service_guarantee" class="home-dot-element nav-cube" data-appeared="true">
                <div class="icon-container">
                    <img src="https://s.alicdn.com/@img/imgextra/i2/O1CN01VxEwc91YXeNmcyV6j_!!6000000003069-2-tps-96-96.png" alt="Qualité et transactions garanties">
                </div>
                <div class="title-container home-fw-semi-bold">Qualité et transactions garanties</div>
                <div class="content-container">Assurez la qualité d'achat auprès de nous, grâce à vos commandes protégées du paiement à la livraison.</div>
            </div>
            <div data-spm="one_stop_solution" class="home-dot-element nav-cube" data-appeared="true">
                <div class="icon-container">
                    <img src="https://s.alicdn.com/@img/imgextra/i2/O1CN01WxanpW1Hv9ESW9cfs_!!6000000000819-2-tps-96-96.png" alt="Une solution commerciale à guichet unique">
                </div>
                <div class="title-container home-fw-semi-bold">Une solution commerciale à guichet unique</div>
                <div class="content-container">Commandez en toute transparence, de la recherche de produits et à la gestion des commandes, du paiement à la livraison.</div>
            </div>
            <div data-spm="personalized_experience" class="home-dot-element nav-cube" data-appeared="true">
                <div class="icon-container">
                    <img src="https://s.alicdn.com/@img/imgextra/i4/O1CN010nrLfB25RaSKdVtHu_!!6000000007523-2-tps-96-96.png" alt="Une expérience sur mesure">
                </div>
                <div class="title-container home-fw-semi-bold">Une expérience sur mesure</div>
                <div class="content-container">Bénéficiez de nombreux avantages tels que des réductions exclusives, une protection renforcée ainsi qu'une assistance supplémentaire, pour vous aider à mieux elever votre bébé à chaque étape.</div>
            </div>
        </div>
    </div>
</section>

<!-- ===== INDUSTRY CATEGORY - INCHANGÉ ===== -->
<section>
    <div class="industry-category-wrapper floor-container" id="ServiceNavigation1" data-spm-anchor-id="a2700.product_home_newuser.0.i7.243e299aHq80zd">
        <div class="industry-category">
            <div class="category-info">
                <div class="title home-util-ellipsis line3 home-fw-bold">Explorez des millions d'offres adaptées aux besoins de votre entreprise</div>
                <div class="category-number">
                    <div class="number-item">
                        <span>Plus de 400 millions</span>
                        <p>de produits</p>
                    </div>
                    <div class="number-item">
                        <span>+2 000</span>
                        <p>articles</p>
                    </div>
                    <div class="number-item">
                        <span>30</span>
                        <p>catégories de produits</p>
                    </div>
                    <div class="number-item">
                        <span>200+</span>
                        <p>boutiques et régions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== PRODUCTS SECTION - NETTOYÉ (DYNAMIQUE) ===== -->
<section>
    <div class="floor-container">
    <div class="new-user-business-floor" data-spm-anchor-id="a2700.product_home_newuser.0.i8.243e299aHq80zd">
        <div class="business-floor-title home-fz-large-x home-util-ellipsis">Découvrez vos prochaines opportunités commerciales et accessoires de qualité</div>
        <div class="all-floor">
            <!-- MEILLEURES VENTES - DYNAMIQUE -->
            <div class="ranking-card-box">
                <div class="ranking-title">
                    <div class="title home-fw-semi-bold">Meilleures ventes</div>
                    <a class="home-dot-element home-fz-medium view-more" data-spm="topRanking" href="#" target="_blank" data-spm-protocol="i" data-appeared="true">En savoir plus</a>
                </div>
                <div class="ranking-card-slider-box">
                    <div class="rx-carousel-container">
                        <div class="rx-image-list" style="transform: translateX(-300%); transition: transform 0.5s;">
                            @if($featured && count($featured) > 0)
                                @foreach($featured as $produit)
                                    <div class="rx-image-item">
                                        <div class="ranking-card-item">
                                            <div class="title home-util-ellipsis">{{ $produit->nom }}</div>
                                            <a class="home-dot-element hot-product" data-spm="topRanking" href="{{ url('produits/'.$produit->id) }}" target="_blank" data-spm-protocol="i">
                                                <div class="mask-img hot-image">
                                                    <img src="{{ $produit->primary_image }}" alt="{{ $produit->nom }}">
                                                    <div class="mask"></div>
                                                </div>
                                                <div class="order-tag">
                                                    <span class="tag-score">{{ number_format($produit->prix, 2, ',', ' ') }} €</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p style="padding:20px;">Aucun produit en vedette pour le moment.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- NOUVEAUTÉS - DYNAMIQUE -->
            <div class="new-arrival-box">
                <div>
                    <div class="new-arrival-title">
                        <div class="title home-fw-semi-bold">Nouveautés</div>
                        <a class="home-dot-element home-fz-medium view-more" data-spm="newArrivals" href="#" target="_blank" data-spm-protocol="i" data-appeared="true">En savoir plus</a>
                    </div>
                    <div class="new-this-week">
                        <div class="title home-util-ellipsis">Derniers produits ajoutés</div>
                        <div class="this-week-product-box">
                            @if($latest && count($latest) > 0)
                                @foreach($latest->take(4) as $p)
                                    <a class="home-dot-element this-week-product" data-spm="newArrivals" href="{{ url('produits/'.$p->id) }}" target="_blank" data-spm-protocol="i" data-appeared="true">
                                        <div class="mask-img this-week-product-image">
                                            <img class="bimg" src="{{ $p->primary_image }}" alt="{{ $p->nom }}">
                                            <div class="mask"></div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <p>Aucun produit récent.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- BONNES AFFAIRES - DYNAMIQUE -->
            <div class="saving-spotlight-box">
                <div>
                    <div class="saving-spotlight-title">
                        <div class="title home-fw-semi-bold">Bonnes affaires</div>
                        <a class="home-dot-element home-fz-medium view-more" data-spm="savingSpotlight" href="#" target="_blank" data-spm-protocol="i" data-appeared="false">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- ===== FOOTER - INCHANGÉ ===== -->
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
                <li><a href="{{ url('pages/vêtements/pageCategorieVetement.html') }}">Vêtements</a></li>
                <li><a href="{{ url('pages/accessoires/accessoires.html') }}">Accessoires</a></li>
                <li><a href="{{ url('pages/chaussures/chaussures.html') }}">Chaussures</a></li>
                <li><a href="{{ url('pages/amenagement_de_chambre/amenagement.html') }}">Aménagement de La chambre</a></li>
                <li><a href="{{ url('pages/alimentation/alimentation.html') }}">Alimentation</a></li>
                <li><a href="{{ url('pages/couches_et_lingettes/couche_lingette.html') }}">Couches et Lingettes</a></li>
                <li><a href="{{ url('pages/textile_de_maternité/textile.html') }}">Textile de Maternité</a></li>
                <li><a href="{{ url('pages/poussettes/pouset.html') }}">Poussettes</a></li>
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
                <a href="#"><img src="{{ asset('images/images_index/téléchargement.png') }}" alt="American Express" class="payment-logo"></a>
                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="payment-logo"></a>
                <a href="#"><img src="{{ asset('images/images_index/mtn-mobile-money-logo.jpg') }}" alt="Mtn Money" class="payment-logo"></a>
                <a href="#"><img src="{{ asset('images/images_index/orange-money-logo-png_seeklogo-440383.png') }}" alt="orange money" class="payment-logo"></a>
            </div>
        </div>
        <div class="footer-column">
            <h4>Réseaux Sociaux</h4>
            <ul>
                <li><a href="#"><img src="{{ asset('images/images_index/facebook.jpg') }}" alt="Facebook" class="social-logo"></a></li>
                <li><a href="#"><img src="{{ asset('images/images_index/instagram.jpg') }}" alt="Instagram" class="social-logo"></a></li>
                <li><a href="#"><img src="{{ asset('images/images_index/twitter.png') }}" alt="Twitter" class="social-logo"></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <h5>&copy; <strong>BébéConfort 2025 - Tous droits réservés</strong></h5>
    </div>
</footer>

</body>
</html>