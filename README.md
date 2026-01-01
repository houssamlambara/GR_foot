# ⚽ GR_foot - Plateforme de Gestion de Terrains de Football

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

**Une solution complète pour la gestion et la réservation de terrains de football au Maroc**

[Démo](#) · [Documentation](#fonctionnalités) · [Report Bug](https://github.com/houssamlambara/GR_foot/issues)

</div>

---

## 📋 Table des Matières

- [À propos du projet](#-à-propos-du-projet)
- [Fonctionnalités principales](#-fonctionnalités-principales)
- [Architecture technique](#-architecture-technique)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Structure du projet](#-structure-du-projet)
- [Modèles de données](#-modèles-de-données)
- [API Routes](#-api-routes)
- [Captures d'écran](#-captures-décran)
- [Contribuer](#-contribuer)
- [Licence](#-licence)
- [Contact](#-contact)

---

## 🎯 À propos du projet

**GR_foot** est une plateforme web moderne développée avec Laravel 10, conçue pour simplifier la gestion et la réservation de terrains de football. L'application offre une solution complète pour les propriétaires de terrains, les joueurs et les organisateurs de tournois.

### Pourquoi GR_foot ?

- 🏟️ **Gestion centralisée** : Gérez tous vos terrains depuis un seul tableau de bord
- ⏰ **Réservations en temps réel** : Système de vérification de disponibilité instantanée
- 🏆 **Organisation de tournois** : Créez et gérez des compétitions sportives
- 👥 **Gestion d'équipes** : Formez et administrez vos équipes de football
- 📊 **Statistiques détaillées** : Tableaux de bord avec analyses en temps réel
- 🔒 **Sécurité avancée** : Authentification Laravel Sanctum et gestion des rôles

---

## ✨ Fonctionnalités principales

### 🏟️ Gestion des Terrains
- ✅ Création et modification de terrains de football
- ✅ Catégorisation par type (5v5, 7v7, 11v11)
- ✅ Gestion des capacités et tarifs personnalisés
- ✅ Upload d'images de terrains
- ✅ Organisation géographique par villes et régions
- ✅ Suivi des disponibilités en temps réel

### 📅 Système de Réservation
- ✅ Interface intuitive de réservation
- ✅ Vérification automatique des disponibilités
- ✅ Gestion des créneaux horaires (heure de début/fin)
- ✅ Calcul automatique des montants
- ✅ Historique complet des réservations utilisateur
- ✅ Confirmation par téléphone
- ✅ Annulation de réservation
- ✅ Dashboard de suivi pour administrateurs

### 🏆 Tournois et Compétitions
- ✅ Création de tournois avec dates et nombre d'équipes
- ✅ Gestion du statut des tournois (à venir, en cours, terminé, en attente)
- ✅ Inscription d'équipes aux tournois
- ✅ Upload d'images promotionnelles
- ✅ Association équipes-tournois (many-to-many)
- ✅ Tableau de bord de gestion des tournois

### 👥 Gestion des Équipes
- ✅ Création d'équipes par les utilisateurs
- ✅ Attribution d'un créateur d'équipe
- ✅ Gestion des membres d'équipe
- ✅ Participation aux tournois
- ✅ Historique des activités

### 👤 Gestion des Utilisateurs
- ✅ Authentification sécurisée (Laravel Sanctum)
- ✅ Système de rôles (Admin / Utilisateur)
- ✅ Fonctionnalité de bannissement des utilisateurs
- ✅ Gestion des profils utilisateurs
- ✅ Vérification du statut de bannissement lors de la connexion
- ✅ Dashboard personnalisé selon le rôle

### 📊 Tableaux de Bord
- ✅ **Dashboard Admin** : Vue d'ensemble des statistiques en temps réel
- ✅ **Dashboard Réservations** : Gestion complète des réservations
- ✅ **Dashboard Activités** : Suivi des activités utilisateurs
- ✅ Statistiques de performance
- ✅ Graphiques et analyses

### 🌍 Géolocalisation
- ✅ Gestion hiérarchique : Villes → Régions → Terrains
- ✅ Recherche par localisation
- ✅ Interface CRUD complète pour villes et régions

### 💳 Intégration PayPal
- ✅ Configuration PayPal (Sandbox & Live)
- ✅ Prêt pour les paiements en ligne
- ✅ Gestion des transactions

---

## 🏗️ Architecture technique

### Stack Technologique

**Backend:**
- **Framework:** Laravel 10.x
- **Langage:** PHP 8.1+
- **Base de données:** MySQL/PostgreSQL
- **Authentification:** Laravel Sanctum
- **API:** RESTful API

**Frontend:**
- **Template Engine:** Blade
- **JavaScript:** Vanilla JS
- **Build Tool:** Vite 4.x
- **CSS:** Custom CSS / Bootstrap (à vérifier dans les views)
- **HTTP Client:** Axios

**Outils de développement:**
- **Package Manager:** Composer & NPM
- **Testing:** PHPUnit
- **Code Quality:** Laravel Pint

### Modèles et Relations

```
User (Utilisateur)
├── hasMany → Reservations
└── hasMany → Equipes (créées)

Terrain
├── belongsTo → Region
└── hasMany → Reservations

Reservation
├── belongsTo → User
└── belongsTo → Terrain

Equipe
├── belongsTo → User (créateur)
├── hasMany → Users (membres)
└── belongsToMany → Tournois

Tournoi
└── belongsToMany → Equipes

Region
├── belongsTo → Ville
└── hasMany → Terrains

Ville
└── hasMany → Regions
```

---

## 📦 Prérequis

Assurez-vous d'avoir installé les éléments suivants sur votre machine :

- **PHP** >= 8.1
- **Composer** >= 2.0
- **Node.js** >= 16.x
- **NPM** ou **Yarn**
- **MySQL** >= 8.0 ou **PostgreSQL** >= 13
- **Git**

Extensions PHP requises :
```
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
```

---

## 🚀 Installation

### 1. Cloner le repository

```bash
git clone https://github.com/houssamlambara/GR_foot.git
cd GR_foot
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
# ou
yarn install
```

### 4. Configuration de l'environnement

```bash
# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé d'application
php artisan key:generate
```

### 5. Configurer la base de données

Éditez le fichier `.env` avec vos informations de base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gr_foot
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

### 6. Créer la base de données

```bash
# Créer la base de données manuellement ou via commande
mysql -u root -p
CREATE DATABASE gr_foot CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. (Optionnel) Importer les données de démonstration

Si vous avez un fichier `database.sql` :

```bash
mysql -u root -p gr_foot < database.sql
```

Ou utiliser les seeders Laravel :

```bash
php artisan db:seed
```

### 9. Lancer le serveur de développement

**Terminal 1 - Backend Laravel:**
```bash
php artisan serve
```

**Terminal 2 - Frontend Vite:**
```bash
npm run dev
# ou
yarn dev
```

### 10. Accéder à l'application

Ouvrez votre navigateur et accédez à :
```
http://localhost:8000
```

---

## ⚙️ Configuration

### Configuration PayPal

Pour activer les paiements PayPal, ajoutez les clés dans votre fichier `.env` :

```env
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID=your_client_id
PAYPAL_SANDBOX_CLIENT_SECRET=your_client_secret
PAYPAL_CURRENCY=MAD
PAYPAL_PAYMENT_ACTION=Sale
```

### Configuration de l'email (optionnel)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@grfoot.com
MAIL_FROM_NAME="${APP_NAME}"
```

---

## 📁 Structure du projet

```
GR_foot/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php          # Authentification
│   │   │   ├── TerrainController.php       # Gestion des terrains
│   │   │   ├── ReservationController.php   # Système de réservation
│   │   │   ├── TournoiController.php       # Gestion des tournois
│   │   │   ├── EquipeController.php        # Gestion des équipes
│   │   │   ├── UtilisateurController.php   # Gestion des utilisateurs
│   │   │   ├── VilleController.php         # Gestion des villes
│   │   │   ├── DashboardController.php     # Tableaux de bord
│   │   │   ├── ActiviteController.php      # Suivi d'activités
│   │   │   └── PageController.php          # Pages statiques
│   │   └── Middleware/
│   │       ├── RoleMiddleware.php          # Vérification des rôles
│   │       └── Authenticate.php            # Authentification
│   ├── Models/
│   │   ├── User.php                        # Modèle Utilisateur
│   │   ├── Terrain.php                     # Modèle Terrain
│   │   ├── Reservation.php                 # Modèle Réservation
│   │   ├── Tournoi.php                     # Modèle Tournoi
│   │   ├── Equipe.php                      # Modèle Équipe
│   │   ├── Region.php                      # Modèle Région
│   │   └── Ville.php                       # Modèle Ville
├── database/
│   ├── migrations/                          # Migrations de base de données
│   └── seeders/                             # Données de test
├── resources/
│   ├── views/                               # Templates Blade
│   │   ├── dashboard.blade.php
│   │   ├── reservation.blade.php
│   │   ├── tournois.blade.php
│   │   ├── activiter.blade.php
│   │   └── layout/
│   ├── css/                                 # Styles CSS
│   └── js/                                  # Scripts JavaScript
├── routes/
│   ├── web.php                              # Routes web
│   ├── api.php                              # Routes API
│   └── console.php                          # Commandes Artisan
├── public/
│   ├── img/                                 # Images publiques
│   └── js/                                  # Scripts compilés
├── config/
│   ├── database.php                         # Configuration BDD
│   ├── auth.php                             # Configuration auth
│   └── paypal.php                           # Configuration PayPal
├── tests/                                   # Tests unitaires et features
├── .env.example                             # Template environnement
├── composer.json                            # Dépendances PHP
├── package.json                             # Dépendances JavaScript
├── vite.config.js                           # Configuration Vite
└── README.md                                # Ce fichier
```

---

## 🗄️ Modèles de données

### User (Utilisateur)
```php
- id
- name
- email
- password
- role (Admin/Utilisateur)
- is_banned (boolean)
- banned_at (datetime)
- created_at, updated_at
```

### Terrain
```php
- id
- type (5v5, 7v7, 11v11)
- capacite (integer)
- tarif (decimal)
- image (string)
- region_id (foreign key)
- created_at, updated_at
```

### Reservation
```php
- id
- user_id (foreign key)
- terrain_id (foreign key)
- date (date)
- heure_debut (time)
- heure_fin (time)
- montant (decimal)
- telephone (string)
- created_at, updated_at
```

### Tournoi
```php
- id
- nom (string)
- date_debut (date)
- date_fin (date)
- nombre_equipes (integer)
- image (string)
- statut (a_venir/en_cours/termine/en_attente)
- created_at, updated_at
```

### Equipe
```php
- id
- nom (string)
- user_id (foreign key - créateur)
- created_at, updated_at
```

### Region
```php
- id
- nom (string)
- ville_id (foreign key)
- created_at, updated_at
```

### Ville
```php
- id
- nom (string)
- created_at, updated_at
```

---

## 🛣️ API Routes

### Routes publiques
```
GET  /                          - Page d'accueil
GET  /about                     - À propos
GET  /contact                   - Contact
GET  /signin                    - Connexion/Inscription
POST /register                  - Inscription
POST /login                     - Connexion
```

### Routes authentifiées
```
GET  /dashboard                 - Dashboard admin
GET  /dashboardReservation      - Dashboard réservations
GET  /activiter                 - Page activités
GET  /tournois                  - Liste des tournois
GET  /reservation               - Formulaire de réservation
POST /reservations              - Créer une réservation
GET  /mesReservations           - Mes réservations
GET  /check-availability        - Vérifier disponibilité
POST /logout                    - Déconnexion
```

### Routes administrateur
```
# Terrains
GET     /terrains               - Liste des terrains
GET     /terrains/create        - Formulaire création
POST    /terrains               - Créer un terrain
GET     /terrains/{id}/edit     - Formulaire édition
PUT     /terrains/{id}          - Mettre à jour
DELETE  /terrains/{id}          - Supprimer

# Tournois
GET     /tournois/create        - Formulaire création
POST    /tournois               - Créer un tournoi
GET     /tournois/{id}/edit     - Formulaire édition
PUT     /tournois/{id}          - Mettre à jour
DELETE  /tournois/{id}          - Supprimer
PUT     /tournois/{id}/terminer - Terminer le tournoi

# Utilisateurs
GET     /utilisateurs           - Liste des utilisateurs
GET     /utilisateurs/{id}/edit - Éditer utilisateur
PUT     /utilisateurs/{id}      - Mettre à jour
DELETE  /utilisateurs/{id}      - Supprimer
PUT     /utilisateurs/{id}/ban  - Bannir utilisateur
PUT     /utilisateurs/{id}/unban- Débannir utilisateur

# Villes
Resource: /villes               - CRUD complet pour villes
```

---

## 📸 Captures d'écran

> **Note:** Ajoutez ici des captures d'écran de votre application une fois prêtes

```markdown
### Page d'accueil
![Homepage](screenshots/home.png)

### Dashboard Admin
![Dashboard](screenshots/dashboard.png)

### Réservation de terrain
![Reservation](screenshots/reservation.png)

### Gestion des tournois
![Tournois](screenshots/tournois.png)
```

---

## 🧪 Tests

Pour exécuter les tests unitaires et fonctionnels :

```bash
# Tous les tests
php artisan test

# Tests spécifiques
php artisan test --filter=ReservationTest

# Avec couverture de code
php artisan test --coverage
```

---

## 🔧 Commandes utiles

```bash
# Nettoyer le cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Optimiser l'application
php artisan optimize

# Créer un nouveau contrôleur
php artisan make:controller NomController

# Créer un nouveau modèle avec migration
php artisan make:model NomModel -m

# Créer une nouvelle migration
php artisan make:migration create_table_name

# Rollback migrations
php artisan migrate:rollback

# Rafraîchir la base de données
php artisan migrate:fresh --seed

# Générer un lien symbolique pour le storage
php artisan storage:link
```

---

## 🤝 Contribuer

Les contributions sont les bienvenues ! Voici comment vous pouvez contribuer :

1. **Fork** le projet
2. Créez votre branche de fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Poussez vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une **Pull Request**

### Règles de contribution

- Suivez les conventions de codage Laravel
- Écrivez des tests pour les nouvelles fonctionnalités
- Mettez à jour la documentation si nécessaire
- Assurez-vous que tous les tests passent avant de soumettre

---

## 📝 Roadmap

- [ ] Intégration complète du système de paiement PayPal
- [ ] Application mobile (React Native / Flutter)
- [ ] Système de notation et avis pour les terrains
- [ ] Chat en temps réel entre utilisateurs
- [ ] Notifications push et email
- [ ] Export des données en PDF/Excel
- [ ] API publique avec documentation Swagger
- [ ] Multi-langue (FR/AR/EN)
- [ ] Intégration de cartes interactives (Google Maps)
- [ ] Système de fidélité et réductions

---

## 📄 Licence

Ce projet est sous licence **MIT**. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

---

## 👨‍💻 Contact

**Lambara Houssam**

- 📧 Email: [lambarahoussam@gmail.com](mailto:lambarahoussam@gmail.com)
- 🐙 GitHub: [@houssamlambara](https://github.com/houssamlambara)
- 💼 LinkedIn: [Votre profil LinkedIn](#)

**Lien du projet:** [https://github.com/houssamlambara/GR_foot](https://github.com/houssamlambara/GR_foot)

---

## 🙏 Remerciements

- [Laravel](https://laravel.com/) - Le framework PHP pour artisans web
- [Vite](https://vitejs.dev/) - Build tool moderne et rapide
- [Laravel Sanctum](https://laravel.com/docs/sanctum) - Authentification API
- [PayPal SDK](https://github.com/srmklive/laravel-paypal) - Intégration PayPal
- Tous les contributeurs qui ont participé à ce projet

---

<div align="center">

**⭐ Si ce projet vous a été utile, n'hésitez pas à lui donner une étoile ! ⭐**

Made with ❤️ by [Houssam Lambara](https://github.com/houssamlambara)

</div>
