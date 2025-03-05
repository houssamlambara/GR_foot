CREATE DATABASE gestion_terrain_sport;

-- Table Utilisateur
CREATE TABLE utilisateur (
    id SERIAL PRIMARY KEY, -- Utilisation de SERIAL pour l'auto-incrémentation de l'ID
    login VARCHAR(50) NOT NULL UNIQUE, -- Login de l'utilisateur (unique)
    password VARCHAR(255) NOT NULL,       
    email VARCHAR(100) NOT NULL UNIQUE,   
    role VARCHAR(50) NOT NULL,            
    est_actif BOOLEAN DEFAULT TRUE,       
    cree_le TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP, 
    CONSTRAINT valid_role CHECK (role IN ('admin', 'utilisateur'))
);


-- Table Ville
CREATE TABLE
    ville (
        id SERIAL PRIMARY KEY,
        nom_ville VARCHAR(100) NOT NULL
    );

-- Table Terrain (Terrain de sport)
CREATE TABLE
    terrain (
        id SERIAL PRIMARY KEY,
        type VARCHAR(50) NOT NULL,
        capacite INTEGER NOT NULL,
        tarif INTEGER NOT NULL,
        localisation VARCHAR(255) NOT NULL,
        ville_id INTEGER,
        FOREIGN KEY (ville_id) REFERENCES ville (id)
    );

-- Table Client
CREATE TABLE
    client (
        id SERIAL PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        telephone VARCHAR(20) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        cree_le TIMESTAMP
        WITH
            TIME ZONE DEFAULT CURRENT_TIMESTAMP
    );

-- Table Réservation
CREATE TABLE
    reservation (
        id SERIAL PRIMARY KEY,
        date DATE NOT NULL,
        heure_debut TIME NOT NULL,
        heure_fin TIME NOT NULL,
        disponibilite BOOLEAN NOT NULL DEFAULT TRUE,
        terrain_id INTEGER,
        client_id INTEGER,
        FOREIGN KEY (terrain_id) REFERENCES terrain (id),
        FOREIGN KEY (client_id) REFERENCES client (id),
        CONSTRAINT valid_time_range CHECK (heure_fin > heure_debut)
    );

-- Table Tournoi
CREATE TABLE
    tournoi (
        id SERIAL PRIMARY KEY,
        date_debut DATE NOT NULL,
        date_fin DATE NOT NULL,
        terrain_id INTEGER,
        FOREIGN KEY (terrain_id) REFERENCES terrain (id),
        CONSTRAINT valid_date_range CHECK (date_fin >= date_debut)
    );

-- Table Paiement
CREATE TABLE
    paiement (
        id SERIAL PRIMARY KEY,
        montant REAL NOT NULL,
        methode VARCHAR(50) NOT NULL,
        reservation_id INTEGER,
        FOREIGN KEY (reservation_id) REFERENCES reservation (id),
        CONSTRAINT positive_amount CHECK (montant > 0)
    );

-- Indexes pour performance
CREATE INDEX idx_reservation_terrain ON reservation (terrain_id);

CREATE INDEX idx_reservation_client ON reservation (client_id);

CREATE INDEX idx_tournoi_terrain ON tournoi (terrain_id);

CREATE INDEX idx_paiement_reservation ON paiement (reservation_id);

CREATE INDEX idx_utilisateur_email ON utilisateur (email);

CREATE INDEX idx_client_email ON client (email);

CREATE INDEX idx_client_telephone ON client (telephone);