-- SCRIPT SQL DE CREATION DE LA BASE anidom 
DROP DATABASE IF EXISTS ANIDOM; 

CREATE DATABASE ANIDOM;

USE ANIDOM; 

CREATE TABLE REGIONS (
	id INT(9) NOT NULL AUTO_INCREMENT,
    nom_région VARCHAR(50),
    PRIMARY KEY (id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_GENERAL_CI;

CREATE TABLE UTILISATEURS (
    id INT(9) NOT NULL AUTO_INCREMENT,
    titre TINYINT,
    nom CHAR(30) NOT NULL,
    prenom CHAR(30),
    tel CHAR(10),
    mail VARCHAR(50),
    pass VARCHAR(20),
    pseudo VARCHAR(20),
    login VARCHAR(50),
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
























 

/* précise l'interclassement cad la maniére dont Sql 
compare les caracteres ds un jeu de caracteres

COLLATE=utf8_general_ci supprime les accents
et converti le texte en minucule*/


