-- BASE EXEMPLE --

-- PART 1 --

1 - SELECT * FROM employe;

2 - SELECT * FROM dept;

3 - SELECT nom, dateemb, nosup, nodep, salaire FROM employe;

4 - SELECT nom, titre FROM employe;

5 - SELECT DISTINCT nosup, titre FROM employe;

6 - SELECT nom, noemp, nodep FROM employe WHERE titre = "secrétaire";

7 - SELECT nom, nodep FROM employe WHERE nodep > 40;

8 - SELECT nom, prenom FROM employe WHERE nom < prenom;

9 - SELECT nom, salaire, nodep FROM employe WHERE titre = "Représentant" AND nodep = 35 AND salaire > 20000;

10 - SELECT nom, salaire, nodep FROM employe WHERE titre = "Représentant" OR titre = "Président";

11 - SELECT nom, titre, nodep, salaire FROM employe WHERE nodep = 34 AND (titre = "Représentant" OR titre = "Secrétaire");

12 - SELECT nom, titre, nodep, salaire FROM employe WHERE titre = "Représentant" OR (titre = "Secrétaire" AND nodep = 34);

13 - SELECT nom, salaire FROM employe WHERE salaire > 20000 AND salaire < 30000;

15 - SELECT nom FROM employe WHERE nom LIKE "H%";

16 - SELECT nom FROM employe WHERE RIGHT(nom, 1) LIKE "n";

17 - SELECT nom FROM employe WHERE INSTR(nom, "u") = 3;

18 - SELECT salaire, employe.nom FROM employe, dept WHERE nodept = 41 ORDER BY salaire ASC;

19 - SELECT salaire, employe.nom FROM employe, dept WHERE nodept = 41 ORDER BY salaire DESC;

20 - SELECT titre, salaire, nom FROM employe ORDER BY nosup ASC, salaire DESC; 

21 - SELECT tauxcom, salaire, nom FROM employe ORDER BY tauxcom ASC;

22 - SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom IS NULL;

23 - SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom IS NOT NULL;

24 - SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom < 15;

25 - SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom > 15;

26 - SELECT nom, salaire, tauxcom, (tauxcom * salaire) AS "commission" FROM employe WHERE tauxcom IS NOT NULL;

27 - SELECT nom, salaire, tauxcom, (tauxcom * salaire) AS "commission" FROM employe WHERE tauxcom IS NOT NULL ORDER BY "commission" ASC;

28 - SELECT CONCAT(prenom, " ", nom) AS "prenom et nom" FROM employe;

29 - SELECT SUBSTRING(nom, 1, 5) AS "5 premières lettres noms" FROM employe;

30 - SELECT nom, LOCATE("r", nom) FROM employe;

31 - SELECT nom, LOWER(nom), UPPER(nom) FROM employe WHERE nom = "Vrante";

32 - SELECT nom, LENGTH(nom) FROM employe;

-- PART 2 --

1 - SELECT titre, COUNT(nom) AS "nombre d'employés" FROM employe GROUP BY titre; 

2 - SELECT nodep, AVG(salaire) AS "moyenne des salaires", SUM(salaire) AS "Total salaire" FROM employe GROUP BY nodep;

3 - SELECT nodep, COUNT(nom) FROM employe GROUP BY nodep HAVING COUNT(nom) > 2;

4 - SELECT SUBSTRING(nom, 1, 1), COUNT(SUBSTRING(nom, 1, 1)) FROM employe GROUP BY SUBSTRING(nom, 1, 1) HAVING COUNT(SUBSTRING(nom, 1, 1)) > 2; 

5 - SELECT MAX(salaire), MIN(salaire), (MAX(salaire) - MIN(salaire)) FROM employe;

6 - SELECT DISTINCT COUNT(titre) FROM employe;

7 - SELECT titre, COUNT(nom) FROM employe GROUP BY titre;

8 - SELECT dept.nodept, dept.nom, COUNT(employe.nom) FROM employe, dept WHERE employe.nodep = dept.nodept GROUP BY dept.nodept;

9 - SELECT titre, AVG(salaire) FROM employe GROUP BY titre -- HAVING --;

10 - SELECT COUNT(salaire), COUNT(tauxcom) FROM employe;


-- BASE HOTEL --


1 - SELECT hot_nom AS "Hôtel", hot_ville AS "Ville" FROM hotel;

2 - SELECT cli_nom AS "Nom", cli_prenom AS "prenom", cli_adresse AS "adresse", cli_ville AS "ville" FROM CLIENT WHERE cli_nom = "Mr White";

3 - SELECT sta_nom AS "nom station" FROM station WHERE sta_altitude < 1000;

4 - SELECT cha_numero AS "numéro de chambre", cha_capacite AS "capacité" FROM chambre WHERE cha_capacite > 1;

5 - SELECT cli_nom, cli_ville FROM CLIENT WHERE cli_ville != "Londre";

6 - SELECT hot_nom, hot_ville, hot_categorie FROM hotel WHERE nom_ville = "Bretou" AND hot_categorie > 3;

7 - SELECT sta_nom, hot_nom, hot_categorie, hot_ville FROM station, hotel WHERE station.sta_id = hotel.hot_sta_id;

8 - SELECT hot_nom, hot_categorie, hot_ville, cha_numero FROM hotel, chambre WHERE hotel.hot_id = chambre.cha_hot_id;

9 - SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite FROM hotel, chambre WHERE hotel.hot_id = chambre.chat_hot_id AND hot_ville = "Bretou" AND cha_capacite > 1;

10 - SELECT cli_nom, hot_nom, res_date FROM client, hotel, reservation;

11 - SELECT sta_nom, hot_nom, cha_numero, cha_capacite FROM station, hotel, chambre;

12 - SELECT cli_nom, hot_nom, res_date_debut, res_date_fin FROM client, hotel, reservation;

13 - SELECT sta_nom, COUNT(hot_nom) AS "nombre d'hotel" FROM station, hotel WHERE station.sta_id = hotel.hot_sta_id GROUP BY sta_nom; 

14 - SELECT sta_nom, COUNT(cha_id) AS "nombre de chambre par station" FROM hotel, station, chambre WHERE station.sta_id = hotel.hot_sta_id AND chambre.cha_hot_id = hotel.hot_id GROUP BY sta_nom;

15 - SELECT sta_nom, COUNT(cha_id) AS "nombre de chambre par station" FROM hotel, station, chambre WHERE station.sta_id = hotel.hot_sta_id AND chambre.cha_hot_id = hotel.hot_id AND cha_capacite > 1 GROUP BY sta_nom;

16 - SELECT hot_nom, cli_nom FROM hotel, client, reservation, chambre WHERE client.cli_id = reservation.res_cli_id AND reservation.res_cha_id = chambre.cha_id AND chambre.cha_hot_id = hotel.hot_id HAVING cli_nom = "Squire";

17 - SELECT AVG(res_date_fin - res_date_debut) FROM reservation;
