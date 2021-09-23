DELIMITER |
CREATE DEFINER=`root`@`localhost` PROCEDURE `Lst_Suppliers`()
    NO SQL
SELECT sup_name FROM suppliers, products, orders_details 
WHERE suppliers.sup_id = products.pro_sup_id AND products.pro_id = orders_details.ode_pro_id AND ode_id IS NOT NULL GROUP BY sup_name;
DELIMITER ;

DELIMITER |
CREATE DEFINER=`root`@`localhost` PROCEDURE `Lst_Rush_Orders`(IN `p_libelle` VARCHAR(50))
    NO SQL
SELECT ord_id FROM orders 
WHERE ord_status = p_libelle;
DELIMITER ;




DROP PROCEDURE IF EXISTS CA_Supplier ;

DELIMITER |

CREATE PROCEDURE CA_Supplier(IN p_id INT, 
                             IN p_date YEAR, 
                             OUT p_CA INT
                             )  

BEGIN
  IF ISNULL(SELECT sup_id FROM suppliers WHERE sup_id = p_id)) 
  THEN
     SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Le fournisseur n'existe pas";
   ELSE      
      SELECT SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity) INTO p_CA 
      FROM suppliers, products, orders_details, orders WHERE orders.ord_id = orders_details.ode_ord_id AND suppliers.sup_id = products.pro_sup_id 
      AND products.pro_id = orders_details.ode_pro_id AND sup_id = p_id AND YEAR(ord_order_date) = p_date;
   END IF;
END;

DELIMITER ;
