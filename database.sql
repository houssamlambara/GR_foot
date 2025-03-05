CREATE DATABASE gestion_terrain_sport;

-- Table Utilisateur
CREATE TABLE utilisateur (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL,
    est_actif BOOLEAN DEFAULT TRUE,
    cree_le TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- Table Ville
CREATE TABLE ville (
    id SERIAL PRIMARY KEY,
    nom_ville VARCHAR(100) NOT NULL
);

-- Table Terrain (Terrain de sport)
CREATE TABLE terrain (
    id SERIAL PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    capacite INTEGER NOT NULL CHECK (capacite > 0),
    tarif NUMERIC(10,2) NOT NULL CHECK (tarif >= 0),
    localisation VARCHAR(255) NOT NULL,
    ville_id INT,
    FOREIGN KEY (ville_id) REFERENCES ville(id)
);

-- Table Client
CREATE TABLE client (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    cree_le TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- Table Réservation
CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL,
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    disponibilite BOOLEAN NOT NULL DEFAULT TRUE,
    statut VARCHAR(20) DEFAULT 'en attente',
    terrain_id INT,
    client_id INT,
    cree_le TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (terrain_id) REFERENCES terrain(id),
    FOREIGN KEY (client_id) REFERENCES client(id),
    CONSTRAINT plage_horaire_valide CHECK (heure_fin > heure_debut)
);

-- Table Tournoi
CREATE TABLE tournoi (
    id SERIAL PRIMARY KEY,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    terrain_id INT,
    cree_le TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (terrain_id) REFERENCES terrain(id),
    CONSTRAINT plage_date_valide CHECK (date_fin >= date_debut)
);

-- Table Paiement
CREATE TABLE paiement (
    id SERIAL PRIMARY KEY,
    montant NUMERIC(10,2) NOT NULL CHECK (montant > 0),
    methode VARCHAR(50) NOT NULL,
    reservation_id INT,
    cree_le TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reservation_id) REFERENCES reservation(id)
);

-- Indexes pour performance
CREATE INDEX idx_reservation_terrain ON reservation(terrain_id);
CREATE INDEX idx_reservation_client ON reservation(client_id);
CREATE INDEX idx_tournoi_terrain ON tournoi(terrain_id);
CREATE INDEX idx_paiement_reservation ON paiement(reservation_id);
CREATE INDEX idx_utilisateur_email ON utilisateur(email);
CREATE INDEX idx_client_email ON client(email);
CREATE INDEX idx_client_telephone ON client(telephone);