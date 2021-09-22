-- VUES 

CREATE VIEW v_catalogue AS SELECT pro_id AS "ID produit", pro_ref AS "Référence", pro_name AS "Nom", cat_id AS "ID catégorie", cat_name "nom catégorie" FROM products, categories WHERE categories.cat_id = products.pro_cat_id;
SELECT * FROM `v_catalogue`;

-- PROCÉDURES STOCKÉES

DROP PROCEDURE IF EXISTS facture;

DELIMITER |
CREATE PROCEDURE facture(IN p_id INT)

BEGIN

  DECLARE p_existe varchar(50); 
  SET p_existe = (SELECT ord_id FROM orders WHERE ord_id = p_id);

  IF ISNULL(p_existe) 
  THEN
     SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Pas de facture";
   ELSE      
      SELECT SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity) AS "prix total",
      CONCAT(cus_firstname, " ",cus_lastname, " ", cus_address) AS "INFOS CLIENT",
      ord_order_date AS "Date de commande",
      CONCAT(ode_quantity, " ", pro_name) AS "produits",
      ode_unit_price AS "€/unité",
      ord_id AS "numéro de commande"
      FROM products, orders_details, orders, customers WHERE customers.cus_id = orders.ord_cus_id AND orders.ord_id = orders_details.ode_ord_id 
      AND products.pro_id = orders_details.ode_pro_id AND ord_id = p_id;
   END IF;
END;

-- TRIGGERS

CREATE TABLE `commander_articles` (
  `codart` int(10) UNSIGNED NOT NULL,
  `qte` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `commander_articles`
  ADD KEY `codart` (`codart`);
ALTER TABLE `commander_articles`
  ADD CONSTRAINT `commander_articles_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `products` (`pro_id`);


DELIMITER |	
CREATE TRIGGER after_products_update
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