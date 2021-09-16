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



29 - SELECT SUBSTRING(nom, 1, n) AS "5 premières lettres noms" FROM employe;

30 - SELECT nom, LOCATE("r", nom) FROM employe;

31 - SELECT nom, LOWER(nom), UPPER(nom) FROM employe WHERE nom = "Vrante";

32 - SELECT nom, LENGTH(nom) FROM employe;

-- PART 2 --

1 - SELECT titre, COUNT(nom) AS "nombre d'employés" FROM employe GROUP BY titre; 

2 - SELECT nom.dept, AVG(salaire) AS "moyenne des salaires", SUM(salaire) FROM dept,employe GROUP BY nom.dept;

-- BASE HOTEL --


1 - SELECT hot_nom AS "Hôtel", hot_ville AS "Ville" FROM hotel;

2 - SELECT cli_nom AS "Nom", cli_ville