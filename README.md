 #StockManager - Application de Gestion de Stock
👥 Équipe
Étudiant : LAIDI Rayane , XAVIER Carrier .

Projet : MVP Symfony - Gestion de Stock

Formation : IIM - Framework Backend

📝 Description
StockManager est une application web de gestion de stock développée avec Symfony. Elle permet aux entreprises de gérer leur inventaire de produits, de les organiser par catégories et de suivre les niveaux de stock en temps réel.

Fonctionnalités principales :
✅ CRUD complet pour les produits

✅ CRUD complet pour les catégories

✅ Interface responsive avec Bootstrap 5

✅ Gestion des relations entre produits et catégories

✅ Système d'alertes pour stocks bas

✅ Formulaires Symfony avec validation

✅ Architecture MVC respectée

✅ Base de données MySQL/SQLite

🚀 Installation
Prérequis
PHP 8.3 ou supérieur

Composer

MySQL 5.7+ ou SQLite

Symfony CLI 

Méthode 1 : Installation rapide avec SQLite
bash
# 1. Cloner le projet
git clone https://github.com/RayaneLaidi/FrameWork_Symfony
cd gestion-stock-new

# 2. Installer les dépendances
composer install

# 3. Configurer l'environnement (SQLite pour simplicité)
cp .env .env.local
# (Pas besoin de modifier, SQLite est configuré par défaut)

# 4. Créer la base de données
mkdir -p var
php bin/console doctrine:database:create

# 5. Exécuter les migrations
php bin/console doctrine:migrations:migrate

# 6. (Optionnel) Charger des données de test
php bin/console doctrine:fixtures:load

# 7. Lancer le serveur
symfony server:start
# OU
php -S localhost:8000 -t public/ 

# 8. Accéder à l'application
http://localhost:8000/produit
Méthode 2 : Installation avec MySQL
bash
# 1. Cloner le projet
git clone https://github.com/[ton-compte]/gestion-stock.git
cd gestion-stock

# 2. Installer les dépendances
composer install

# 3. Configurer MySQL dans .env.local
cp .env .env.local
# Modifier la ligne DATABASE_URL dans .env.local :
DATABASE_URL="mysql://root:@127.0.0.1:3306/stockmanager?serverVersion=8.0&charset=utf8mb4"

# 4. Créer la base de données MySQL
php bin/console doctrine:database:create

# 5. Exécuter les migrations
php bin/console doctrine:migrations:migrate

# 6. Lancer le serveur
symfony server:start
Méthode 3 : Installation avec WAMP/XAMPP (Windows)
Installer WAMP ou XAMPP

Placer le projet dans C:\wamp64\www\ ou C:\xampp\htdocs\

Créer une base de données stockmanager via phpMyAdmin

Configurer .env.local :

text
DATABASE_URL="mysql://root:@127.0.0.1:3306/stockmanager"
Ouvrir un terminal dans le dossier du projet et exécuter :

bash
composer install
php bin/console doctrine:migrations:migrate
Accéder à : http://localhost/gestion-stock/public/produit

🗄️ Structure de la Base de Données
Entités principales :
Produit
id (integer, auto-increment)

nom (string, 255)

description (text, nullable)

prix (decimal, 10.2)

quantite (integer)

categorie_id (foreign key)

created_at (datetime)

updated_at (datetime)

Categorie
id (integer, auto-increment)

nom (string, 255)

description (text, nullable)

Relation : Une Catégorie → Plusieurs Produits (OneToMany/ManyToOne)

🛠️ Commandes Utiles
bash
# Générer une nouvelle migration
php bin/console make:migration

# Exécuter les migrations
php bin/console doctrine:migrations:migrate

# Vider le cache
php bin/console cache:clear

# Lister toutes les routes
php bin/console debug:router

# Valider le schéma de base de données
php bin/console doctrine:schema:validate

# Créer des fixtures
php bin/console make:fixture

# Charger les fixtures
php bin/console doctrine:fixtures:load
📁 Structure du Projet
text
gestion-stock/
├── src/
│   ├── Entity/
│   │   ├── Produit.php           # Entité Produit
│   │   └── Categorie.php         # Entité Categorie
│   ├── Controller/
│   │   ├── ProduitController.php # CRUD Produit
│   │   └── CategorieController.php # CRUD Categorie
│   ├── Form/
│   │   ├── ProduitType.php       # Formulaire Produit
│   │   └── CategorieType.php     # Formulaire Categorie
│   └── Repository/               # Repositories Doctrine
├── templates/
│   ├── base.html.twig            # Template principal
│   ├── produit/                  # Vues Produit
│   │   ├── index.html.twig       # Liste
│   │   ├── new.html.twig         # Création
│   │   ├── edit.html.twig        # Édition
│   │   └── show.html.twig        # Détail
│   └── categorie/                # Vues Categorie
├── migrations/                   # Migrations de base de données
├── public/                       # Dossier web accessible
└── var/                          # Cache, logs, base SQLite
🎨 Technologies Utilisées
Backend : Symfony 6.4

ORM : Doctrine

Base de données : MySQL / SQLite

Frontend : Bootstrap 5, FontAwesome 6

Templating : Twig

Validation : Symfony Forms

Serveur : Symfony Local Web Server

🔧 Dépannage
Problème : "Could not find driver"
bash
# Activez les extensions PHP nécessaires dans php.ini :
extension=mysqli
extension=pdo_mysql
extension=sqlite3
extension=pdo_sqlite
Problème : Erreurs de permissions
bash

# Windows (PowerShell)
icacls var /grant Everyone:F /T
Problème : Cache corrompu
bash
php bin/console cache:clear
rm -rf var/cache/*
📚 Documentation
Documentation Symfony

Documentation Doctrine

Documentation Bootstrap

📄 Licence
Ce projet est réalisé dans le cadre d'un projet éducatif à l'IIM.
