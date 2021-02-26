## Coding System

Ce projet vise à reproduire une ambiance à la Poudlard avec un système de maisons pour la Coding Factory.
Le projet a été fait avec le framework laravel.

## Installation en local (macOS/Linux)

Composer, npm, MAMP (ou équivalent) et laravel devrait être installés au préalable.

Cloner le projet.

Recopier le .env.example en .env

Utiliser ces commandes dans le répertoire du projet:

`php artisan key:generate`

`composer install`

`npm run dev`

Le projet peut ensuite être lancé avec la commande `php artisan serve` et on peut y accéder à l'adresse http://127.0.0.1:8000.

Cependant en raison d'un problème d'encodage d'url avec le callback de Google Oauth, si l'on veut utiliser ce service il
faudra passer par un serveur autre que celui de base, par exemple le serveur apache de MAMP/XAMP/WAMP. Il faut créer un 
hôte virtuel pour le projet.


