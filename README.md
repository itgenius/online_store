# Laravel Online Store avec Panier

Ce projet est une boutique en ligne de démonstration construite avec Laravel, intégrant Vite pour la gestion des assets, Bootstrap pour le design, un système d'administration, de gestion de produits, et un panier de base.

---

## 🚀 Technologies utilisées

- Laravel 10+
- Vite
- Bootstrap 5
- Blade (Laravel views)
- MySQL
- PHP 8.1+
- npm

---

## Fonctionnalités

- Authentification administrateur
- CRUD Produits (admin)
- Affichage de tous les produits (public)
- Ajout au panier
- Modification de la quantité
- Suppression d'éléments du panier
- Vidage du panier

---

Installation locale :
### Clonez le dépôt :
git clone https://github.com/itgenius/online_store.git
cd online_store
### Installez les dépendances PHP & JS :
composer install
npm install
### Configurez votre .env :
cp .env.example .env
Mettez à jour les informations de la base de données :
DB_DATABASE=online_store
DB_USERNAME=root
DB_PASSWORD=secret
Configurez les paramètres de votre serveur SMTP pour recevoir les emails du formulaire de contact dans Gmail :
MAIL_FROM_ADDRESS="votreCompte@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
# Configurez les paramètres de votre serveur SMTP
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=votreCompte@gmail.com
MAIL_PASSWORD="cleSecret"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=votreCompte@gmail.com
MAIL_FROM_NAME="Online Store"
### Générez la clé de l'application avec cette commande :
php artisan key:generate
Base de données 
### Générez la clé de l'application avec cette commande :
Créez une base de données appelée online_store
### Lancez la migrations :
php artisan migrate
Lancez le projet :
Démarrer le backend Laravel :
php artisan serve
Démarrer le frontend Vite (JS, CSS)
npm run dev
Mettre en place un design personnalisé avec :
resources/css/app.css
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


