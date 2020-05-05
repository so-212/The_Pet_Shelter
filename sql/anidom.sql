-- SCRIPT SQL DE CREATION DE LA BASE anidom 

CREATE DATABASE anidom;

USE anidom; 

CREATE TABLE proprietaire (
id_prop MEDIUMINT NOT NULL AUTO_INCREMENT,
titre VARCHAR(20) DEFAULT 'Monsieur ou Madame',
nom char(30) NOT NULL,
prenom char(30),
tel char(10), /*s'assurer en front ou back que ce sont des numeros*/
PRIMARY KEY(id_prop)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE espece(
id_esp MEDIUMINT NOT NULL AUTO_INCREMENT,
nom_espece char (30) NOT NULL, /*rentrer un nom obligatoire*/
PRIMARY KEY(id_esp)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE animal (
id_ani MEDIUMINT NOT NULL AUTO_INCREMENT,
nom_animal char(20) NOT NULL,
photo blob,
id_esp  MEDIUMINT ,
id_prop MEDIUMINT,
PRIMARY KEY(id_ani),
FOREIGN KEY (id_esp) REFERENCES espece(id_esp) ,
FOREIGN KEY (id_prop) REFERENCES proprietaire(id_prop)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; 

/* précise l'interclassement cad la maniére dont Sql 
compare les caracteres ds un jeu de caracteres

COLLATE=utf8_general_ci supprime les accents
et converti le texte en minucule*/


