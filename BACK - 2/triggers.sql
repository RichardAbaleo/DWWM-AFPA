DELIMITER |
CREATE TRIGGER maj_total 
AFTER INSERT ON lignedecommande
FOR EACH ROW
BEGIN
	DECLARE id_c INT;
	DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
END;

DELIMITER |
CREATE TRIGGER maj_total 
AFTER UPDATE ON lignedecommande
FOR EACH ROW
BEGIN
	DECLARE id_c INT;
	DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
END;

DELIMITER |
CREATE TRIGGER maj_total 
AFTER DELETE ON lignedecommande
FOR EACH ROW
BEGIN
	DECLARE id_c INT;
	DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total=tot WHERE id=id_c; -- on stock le total dans la table commande
END;



DELIMITER |	
CREATE TRIGGER commander_articles
AFTER UPDATE ON products
FOR EACH ROW
WHEN (qte_c < pro_stock_alert)
BEGIN
    DECLARE id_c INT;
	DECLARE date_c DATE;
	DECLARE qte_c INT;
	SET date_c = NOW();
	SET id_c = products.pro_id;
	SET qte_c = NEW.pro_stock;
	INSERT INTO commander_articles(codart, qte, date)
    VALUES (id_c, (pro_stock_alert-qte_c), date_c);
END;


DELIMITER |	
CREATE TRIGGER commander_articles
AFTER UPDATE ON `products`
FOR EACH ROW
BEGIN
	DECLARE id_c INT;
	DECLARE date_c DATE;
	DECLARE qte_c INT;
	SET date_c = NOW();
	SET id_c = OLD.pro_id;
	SET qte_c = NEW.pro_stock;
IF (qte_c < OLD.pro_stock_alert)
THEN
	INSERT INTO commander_articles(codart, qte, date)
    VALUES (id_c, (NEW.pro_stock_alert-qte_c), date_c);
END IF;
END
