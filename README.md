💻 Application de Gestion des Ventes - MIKOLO
Cette application permet à l'entreprise MIKOLO de gérer efficacement les stocks et ventes de laptops d'occasion, en séparant clairement les rôles du magasin central et des points de vente.

🚀 Fonctionnalités principales
📦 Transfert de stock entre le magasin central et les points de vente

🛒 Vente au niveau des points de vente

📥 Réception de stock aux points de vente

📊 Statistiques de vente globales et par point de vente

📋 Suivi des stocks par point de vente

👤 Profils utilisateurs
Magasin

Gère les stocks centraux

Effectue les transferts vers les points de vente

Suit les réceptions en retour

Point de vente

Réalise les ventes

Reçoit les laptops transférés

Peut effectuer des retours vers le magasin

🏗️ Technologies utilisées
Backend : Laravel / PHP

Frontend : Blade / Bootstrap / JavaScript

Base de données : MySQL

⚙️ Installation locale
Cloner le dépôt

bash
Copier
Modifier
git clone https://github.com/ShibaMiyuki07/eval.git
cd eval
Installer les dépendances

bash
Copier
Modifier
composer install
Configurer l'environnement

bash
Copier
Modifier
cp .env.example .env
php artisan key:generate
Créer la base de données

Configurer .env avec les bonnes infos MySQL

Puis lancer les migrations :

bash
Copier
Modifier
php artisan migrate
Démarrer l'application

bash
Copier
Modifier
php artisan serve
L’application sera accessible sur http://localhost:8000

🧪 Fonctions à tester
Ajout d'un laptop au stock central

Transfert de laptop vers un point de vente

Vente à un client au point de vente

Visualisation du stock restant

Statistiques de vente par point de vente

🤝 Contribution
Les contributions sont les bienvenues ! Merci de créer une issue ou une pull request si vous souhaitez proposer une amélioration.

📄 Licence
Ce projet est sous licence MIT.
