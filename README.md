# 🌱 AgriGest

## Description

AgriGest est une application web développée avec **Laravel 12** permettant à une coopérative agricole de gérer ses parcelles agricoles.

L'application permet de centraliser les informations des parcelles afin de remplacer le suivi manuel sur papier et de préparer l'ajout de futures fonctionnalités (récoltes, météo, statistiques, etc.).

---

## Fonctionnalités

- Afficher la liste des parcelles
- Consulter les détails d'une parcelle
- Ajouter une nouvelle parcelle
- Modifier une parcelle
- Supprimer une parcelle
- Validation des formulaires
- Génération de données de test avec Factory et Seeder

---

## Technologies utilisées

- Laravel 12
- PHP 8.2
- MySQL
- Bootstrap 5
- Blade
- Eloquent ORM

---

## Structure de la base de données

### Table : parcelles

| Champ | Type |
|--------|------|
| id | bigint |
| nom | string |
| culture | string |
| superficie | decimal |
| date_plantation | date |
| statut | string |
| created_at | timestamp |
| updated_at | timestamp |

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-utilisateur/AgriGest.git
```

### 2. Accéder au dossier

```bash
cd AgriGest
```

### 3. Installer les dépendances

```bash
composer install
```

### 4. Copier le fichier d'environnement

```bash
cp .env.example .env
```

Sous Windows :

```bash
copy .env.example .env
```

### 5. Générer la clé de l'application

```bash
php artisan key:generate
```

### 6. Configurer la base de données

Modifier le fichier `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agrigest
DB_USERNAME=root
DB_PASSWORD=
```

---

### 7. Exécuter les migrations

```bash
php artisan migrate
```

Ou avec les données de test :

```bash
php artisan migrate:fresh --seed
```

---

### 8. Lancer le serveur

```bash
php artisan serve
```

Puis ouvrir :

```
http://127.0.0.1:8000/parcelles
```

---

## Données de test

Les données fictives sont générées grâce à :

- ParcelleFactory
- ParcelleSeeder

Commande :

```bash
php artisan db:seed
```

ou

```bash
php artisan migrate:fresh --seed
```

---

## Architecture du projet

```
app/
│
├── Models/
│      Parcelle.php
│
├── Http/
│      Controllers/
│             ParcelleController.php
│
database/
│
├── migrations/
├── factories/
├── seeders/
│
resources/
│
├── views/
│      layouts/
│      parcelles/
│
routes/
│
└── web.php
```

---

## Fonctionnalités CRUD

### Liste des parcelles

- Affichage de toutes les parcelles.

### Ajouter

- Création d'une nouvelle parcelle.

### Modifier

- Mise à jour des informations.

### Supprimer

- Suppression avec confirmation.

### Voir

- Consultation détaillée d'une parcelle.

---

## Validation

Les formulaires vérifient :

- Nom obligatoire
- Culture obligatoire
- Superficie numérique
- Date valide
- Statut obligatoire

---

## Jeu de données

Le Seeder crée automatiquement plusieurs parcelles fictives pour faciliter les tests.

---

## Auteur

**RIDA SABRAR**

Développeuse Full Stack Junior

---

## Licence

Projet réalisé dans le cadre d'un exercice pédagogique.
