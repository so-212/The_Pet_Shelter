-- SCRIPT SQL DE CREATION DE LA BASE anidom 

CREATE DATABASE anidom;

USE anidom; 

CREATE TABLE proprietaire (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
titre VARCHAR(20) DEFAULT 'Monsieur ou Madame',
nom char(30) NOT NULL,
prenom char(30),
tel char(10), /*s'assurer en front ou back que ce sont des numeros*/
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE espece(
id MEDIUMINT NOT NULL AUTO_INCREMENT,
nom_espece char (30) NOT NULL, /*rentrer un nom obligatoire*/
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE animal (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
nom_animal char(20) NOT NULL,
photo blob,
id_generique MEDIUMINT ,
id_proprietaire MEDIUMINT,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 

/* précise l'interclassement cad la maniére dont Sql 
compare les caracteres ds un jeu de caracteres

COLLATE=utf8_general_ci supprime les accents
et converti le texte en minucule*/


