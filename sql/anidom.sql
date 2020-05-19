-- SCRIPT SQL DE CREATION DE LA BASE anidom 
DROP DATABASE IF EXISTS ANIDOM; 

CREATE DATABASE ANIDOM;

USE ANIDOM; 

CREATE TABLE REGIONS (
	id INT(9) NOT NULL AUTO_INCREMENT,
    nom_region VARCHAR(50),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE UTILISATEURS (
    id INT(9) NOT NULL AUTO_INCREMENT,
    titre TINYINT,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30),
    tel CHAR(10),
    mail VARCHAR(50),
    pass VARCHAR(100),
    username VARCHAR(20),
    login VARCHAR(50),
    regions VARCHAR(50),
    regions_id INT(9),
    statut_utilisateur ENUM('01', '02', '03'),
    note_petsitter DECIMAL(2 , 1 ),
    PRIMARY KEY (id),
     FOREIGN KEY (regions_id)
        REFERENCES REGIONS (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE ESPECES (
    id INT(9) NOT NULL AUTO_INCREMENT,
    nom_espece CHAR(30) NOT NULL,
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE ANIMAUX (
    id INT(9) NOT NULL AUTO_INCREMENT,
    nom_animal CHAR(20) NOT NULL,
    statut_animal ENUM('garde', 'adoption'),
    photo BLOB,
    esp_id INT(9),
    prop_id INT(9),
    PRIMARY KEY (id),
    FOREIGN KEY (esp_id)
        REFERENCES ESPECES (id),
    FOREIGN KEY (prop_id)
        REFERENCES UTILISATEURS (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE PRODUITS (
    id INT(9) NOT NULL AUTO_INCREMENT,
    nom_produit VARCHAR(45) NOT NULL,
    description VARCHAR(100),
    prix DECIMAL(5, 2),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;


CREATE TABLE ASSOC_UTILISATEURS_PRODUITS (
    id INT(9) NOT NULL AUTO_INCREMENT,
    utilisateurs_id INT(9),
    produits_id INT(9),
    PRIMARY KEY (id),
    FOREIGN KEY (utilisateurs_id)
        REFERENCES UTILISATEURS (id),
    FOREIGN KEY (produits_id)
        REFERENCES PRODUITS (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE DEMANDES_GARDES (
    id INT(9) NOT NULL AUTO_INCREMENT,
    date_debut DATETIME,
    date_fin DATETIME,
    utilisateurs_id INT(9),
    animaux_id INT(9),
    PRIMARY KEY (id),
    FOREIGN KEY (utilisateurs_id)
        REFERENCES UTILISATEURS (id),
    FOREIGN KEY (animaux_id)
        REFERENCES ANIMAUX (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE ASSOC_UTILISATEURS_DEMANDES_GARDES (
	id INT(9) NOT NULL AUTO_INCREMENT,
    utilisateurs_id INT(9),
    commentaires VARCHAR(100),
    demandes_gardes_id INT(9),
    date_candidature DATETIME,
    date_acceptation DATETIME,
    PRIMARY KEY (id),
    FOREIGN KEY (utilisateurs_id)
        REFERENCES UTILISATEURS (id),
    FOREIGN KEY (demandes_gardes_id)
        REFERENCES DEMANDES_GARDES (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;



-- insertions enoncé 
-- 
INSERT INTO ESPECES (nom_espece) VALUES ('cheval'),('chien'), ('chat');

INSERT INTO UTILISATEURS (titre, nom, prenom) VALUES (1, 'BLANC-SEC', 'Adèle');
INSERT INTO UTILISATEURS (titre, nom, prenom) VALUES (0, 'CASTAFIORE', 'Bianca');
INSERT INTO UTILISATEURS (titre, nom, prenom) VALUES (2, 'LUKE', 'Lucky');
INSERT INTO UTILISATEURS (titre, nom, prenom) VALUES (2, 'TALON', 'Achille');

INSERT INTO ANIMAUX (nom_animal, photo, esp_id, prop_id) VALUES ('Félix', '', 3, 1);
INSERT INTO ANIMAUX (nom_animal, photo, esp_id, prop_id) VALUES ('Jolly Jumper', '', 1, 2);
INSERT INTO ANIMAUX (nom_animal, photo, esp_id, prop_id) VALUES ('Garfield', '', 3, 3);
INSERT INTO ANIMAUX (nom_animal, photo, esp_id, prop_id) VALUES ('Rantanplan', '', 2, 4);
INSERT INTO ANIMAUX (nom_animal, photo, esp_id, prop_id) VALUES ('Idefix', '', 2, 4);

-- insertion régions ds table REGIONS
INSERT INTO REGIONS (nom_region) VALUES ('Guadeloupe'),('Martinique'),('Guyane'),
('La Réunion'),('Mayotte'),('Ile-de-France'),('Centre-Val de Loire'),
('Bourgogne-Franche-Comté'),('Normandie'),('Haut-de-France'),('Grand Est'),
('Pays de la Loire'),('Bretagne'),('Nouvelle-Aquitaine'),('Occitanie'),('Auvergne-Rhône-Alpes'),
('Provence-Alpes-Côte d\'Azur'), ('Corse');







/* précise l'interclassement cad la maniére dont Sql 
compare les caracteres ds un jeu de caracteres

COLLATE=utf8_general_ci supprime les accents
et converti le texte en minucule*/


