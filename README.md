<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
















Pour compiler le projet laravel ci present :


###  ATTENTION : Installez CES versions exactes et creer dabors chacun vos branches

## 1. INSTALLATION DES LOGICIELS (VERSIONS EXACTES)

### 1.1 XAMPP avec PHP 7.4
- **Télécharger** : https://www.apachefriends.org/xampp-files/7.4.33/xampp-windows-x64-7.4.33-0-VS16-installer.exe
- **Version** : XAMPP 7.4.33
- **PHP** : PHP 7.4.6 (cli) (built: May 12 2020 11:38:54)
- **Installer** en suivant les étapes par défaut

### 1.2 Composer
- **Télécharger** : https://getcomposer.org/Composer-Setup.exe
- **Version** :version 2.8.12
- **Installer** en cochant "Add to PATH"


## Verification
Vérification** : `php -v` 
 `composer -v` 


## 2. CONFIGURATION INITIALE

### 2.1 Démarrer XAMPP (version 3.2.4)
- Ouvrir **XAMPP Control Panel**
- Démarrer **Apache** et **MySQL**
- Vérifier qu'ils deviennent **VERTS**

### 2.2 Cloner le projet
```cmd
git clone https://github.com/KENMEUGNEMICHELE14/ecommerce-laravel.git
cd ecommerce-laravel


### 3.1 Créer la base de données

    Aller sur : http://localhost/phpmyadmin ou sur admin à coté de mysql dans xampp

    Cliquer Nouvelle base de données

    Nom : nvecommerce

    Cliquer Créer
 ### 3.2  Configuration Laravel

     copy .env.example .env
     php artisan key:generate

 ### 3.3 Modifier le fichier .env

    Ouvrir le fichier .env et modifier :
    env

    DB_DATABASE=nvecommerce
    DB_USERNAME=root
    DB_PASSWORD=

### 3.4 Dépendances PHP (COMPOSER)
    composer install

### 3.5 MIGRATIONS BASE DE DONNÉES
         Créer les tables(ou importer juste celles qui sont déjà crées)
    php artisan migrate

### 3.6 Démarrer le serveur
    php artisan serve






// Creation des tables

## Structure de la base de données

Le projet comprend les tables suivantes :

- **utilisateurs** : Informations des utilisateurs
- **clients** : Profils clients (hérite de utilisateur)
- **administrateurs** : Profils administrateurs
- **categories** : Catégories de produits
- **produits** : Catalogue de produits
- **paniers** : Paniers d'achat
- **ligne_paniers** : Détails des produits dans les paniers
- **commandes** : Historique des commandes
- **ligne_commandes** : Détails des produits dans les commandes
- **paiements** : Informations de paiement