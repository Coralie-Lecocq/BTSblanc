<?php

/* ################################### REQUÊTE INSERT CLIENT ################################### */
INSERT INTO clients (nom, prenom, adresse, cp, ville, email, tel, siret, pwd) 
VALUES ('Bernezet', 'Julien', '6 Allée des Marronniers', '59229', 'TETEGHEM', 'julien.bernezet@hotmail.fr', '0678270200', null, '123');


/* ################################### REQUÊTE INSERT EVENEMENT ################################### */
INSERT INTO evenement (libelle) 
VALUES ('Mariage');


/* ################################### REQUÊTE INSERT CONSOMMABLES ################################### */
INSERT INTO consommables (nom, stock, prix, description) 
VALUES ('Papier photo', 12, 2, 'Papier photo Haute Qualité');
?>