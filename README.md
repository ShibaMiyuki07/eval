💻 Application de Gestion des Ventes - MIKOLO

Cette application permet à l'entreprise MIKOLO de gérer efficacement les stocks et ventes de laptops d'occasion, en séparant clairement les rôles du magasin central et des points de vente.

🚀 Fonctionnalités principales
------------
* 📦 Transfert de stock entre le magasin central et les points de vente

* 🛒 Vente au niveau des points de vente

* 📥 Réception de stock aux points de vente

* 📊 Statistiques de vente globales et par point de vente


* 📋 Suivi des stocks par point de vente


👤 Profils utilisateurs
------------

1- Magasin

  * Gère les stocks centraux

  * Effectue les transferts vers les points de vente

  * Suit les réceptions en retour

2 - Point de vente

  * Réalise les ventes

  * Reçoit les laptops transférés

  * Peut effectuer des retours vers le magasin

🏗️ Technologies utilisées
------------

Backend : Laravel / PHP

Frontend : Blade / Bootstrap / JavaScript

Base de données : MySQL

⚙️ Installation locale
------------

Cloner le dépôt

```sh
 git clone https://github.com/ShibaMiyuki07/eval.git
 cd eval
```
Installer les dépendances

```sh
composer install
```

Configurer l'environnement
```sh
cp .env.example .env
php artisan key:generate
```

Créer la base de données

Configurer .env avec les bonnes infos MySQL

Puis lancer les migrations :
```sh
php artisan migrate
```
Démarrer l'application
```sh
php artisan serve
```

L’application sera accessible sur http://localhost:8000

🧪 Fonctions à tester
Ajout d'un laptop au stock central

Transfert de laptop vers un point de vente

Vente à un client au point de vente

Visualisation du stock restant

Statistiques de vente par point de vente
