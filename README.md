# GR_foot

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

## À propos

GR_foot est une plateforme de gestion et réservation de terrains de football. Elle permet aux utilisateurs de réserver des terrains, gérer des équipes et organiser des tournois.

## Fonctionnalités

### Gestion des Terrains
- Création et gestion de terrains
- Système de localisation par ville et région
- Gestion des disponibilités
- Détails des installations et équipements

### Système de Réservation
- Réservation de créneaux horaires
- Gestion des disponibilités en temps réel
- Historique des réservations
- Système de confirmation

### Gestion des Équipes
- Création et gestion d'équipes
- Profils d'équipe personnalisés
- Gestion des membres et rôles
- Historique des matchs et statistiques

### Tournois et Compétitions
- Création et gestion de tournois
- Inscription des équipes
- Gestion des matchs et résultats
- Classements et statistiques

### Administration
- Dashboard administrateur
- Gestion des utilisateurs et droits
- Gestion des villes et régions
- Suivi des activités et réservations

## Installation

```bash
# Cloner le projet
git clone https://github.com/houssamlambara/GR_foot.git
cd GR_foot

# Installer les dépendances
composer install
npm install

# Configuration
cp .env.example .env
php artisan key:generate

# Base de données
php artisan migrate
php artisan db:seed

# Lancer l'application
php artisan serve
npm run dev
```

## Technologies

- Laravel 10
- PHP 8.2
- PostgreSQL
- JavaScript
- Bootstrap

## Contact

Lambara Houssam - lambarahoussam@gmail.com
