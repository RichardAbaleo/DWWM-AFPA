START TRANSACTION;
SELECT nom FROM client WHERE id = 1;    
UPDATE client SET nom = 'GROSBRI' WHERE id = 1;
SELECT nom FROM client WHERE id = 1; 

1 - Sans ROLLBACK/COMMIT,l'instruction ne fonctionne pas et les changements s'appliquent ligne par ligne.

2 - Les données ne sont pas modifiable par d'autres utilisateurs quand que la transaction n'est pas achevé (TIMEOUT).
Par contre elles restent consultable avec un SELECT

3 - La transaction n'est pas fini tant que COMMIT/ROLLBACK n'est pas entré.

4 - Pour la rendre permanente il faut finir avec un COMMIT.

5 - Pour l'annuler il faut faire un ROLLBACK.