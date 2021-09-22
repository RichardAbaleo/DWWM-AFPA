Q1 - SELECT CONCAT(emp_lastname, " ", emp_firstname) AS "Employé", emp_children AS "Nb_enfants" FROM employees ORDER BY emp_children DESC;

Q2 - SELECT cus_lastname, cus_firstname, cus_countries_id FROM customers, countries WHERE customers.cus_countries_id = countries.cou_id AND cou_id != "FR";

Q3 - SELECT cus_city, cus_countries_id, cou_name FROM countries, customers WHERE customers.cus_countries_id = countries.cou_id ORDER BY cus_city ASC;

Q4 - SELECT cus_lastname, cus_update_date FROM customers WHERE cus_update_date IS NOT NULL;

Q5 - SELECT cus_id, cus_lastname, cus_firstname, cus_city FROM customers WHERE cus_city LIKE "%divos%";

Q6 - SELECT pro_id, pro_name, pro_price FROM products ORDER BY pro_price ASC LIMIT 1;

Q7 - SELECT pro_id, pro_ref, pro_name FROM products WHERE pro_id NOT IN (SELECT ode_pro_id FROM orders_details) ;

Q8 - SELECT pro_id, pro_ref, pro_color, pro_name, cus_id, cus_lastname, ord_id, ode_id FROM products, customers, orders, orders_details WHERE customers.cus_id = orders.ord_cus_id 
    AND orders.ord_id = orders_details.ode_ord_id AND orders_details.ode_pro_id = products.pro_id AND cus_lastname = "Pikatchien"; 

Q9 - SELECT cat_id, cat_name, pro_name FROM categories, products WHERE categories.cat_id = products.pro_cat_id ORDER BY cat_name ASC;

Q10 - SELECT CONCAT(emp2.emp_lastname, " ", emp2.emp_firstname) AS "Employé", pos2.pos_libelle AS "Poste", CONCAT(emp1.emp_lastname, " ", emp1.emp_firstname) AS "Supérieur", pos1.pos_libelle AS "Poste"
    FROM employees AS emp1 , employees AS emp2, posts AS pos2, posts AS pos1 WHERE emp1.emp_id = emp2.emp_superior_id AND pos2.pos_id = emp2.emp_pos_id  AND pos1.pos_id = emp1.emp_pos_id AND emp2.emp_sho_id = 3 ORDER BY "Employé" ASC;

Q11 - SELECT CONCAT("produit n° ", pro_id, " ", pro_name, " (", pro_ref, " ", pro_color, ")") AS "Produit", ord_id AS "commande n°", ode_id AS "ligne de commande n°", CONCAT(ode_discount, "%") AS "Remise"
    FROM orders_details, orders, products WHERE orders.ord_id = orders_details.ode_ord_id AND orders_details.ode_pro_id = products.pro_id ORDER BY ode_discount DESC LIMIT 1;

Q12 - SELECT COUNT(cus_id) AS "Nb clients Canada" FROM customers, countries WHERE customers.cus_countries_id = countries.cou_id AND cou_name = "Canada";

Q13 - SELECT ode_id, ode_unit_price, ode_discount, ode_quantity, ode_ord_id, ode_pro_id, ord_order_date FROM orders_details, orders
    WHERE orders_details.ode_ord_id = orders.ord_id AND ord_order_date >= "2019-31-12" AND ord_order_date <= "2021-01-01";

Q14 - SELECT sup_id, sup_name, sup_address, sup_zipcode, sup_city, sup_contact, sup_phone, sup_mail FROM suppliers, countries, customers, orders WHERE suppliers.sup_countries_id = countries.cou_id
    AND countries.cou_id = customers.cus_countries_id AND customers.cus_id = orders.ord_cus_id GROUP BY sup_name;

Q15 - SELECT SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity) AS "Chiffre d'affaires" FROM orders_details, orders 
    WHERE orders_details.ode_ord_id = orders.ord_id AND YEAR(ord_order_date) = 2020;

Q16 - SELECT ord_id, cus_lastname, ord_order_date, ode_quantity, SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity) 
    FROM orders, orders_details, customers WHERE orders_details.ode_ord_id = orders.ord_id AND customers.cus_id = orders.ord_cus_id
    GROUP BY ord_id ORDER BY SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity) DESC;

Q17 - SELECT (SUM((ode_unit_price-(ode_unit_price*ode_discount/100))*ode_quantity))/COUNT(DISTINCT(ord_id)) AS "panier moyen" FROM orders_details, orders 
    WHERE orders_details.ode_ord_id = orders.ord_id;

Q18 - UPDATE products SET pro_name = "Camper", pro_price = pro_price*0.9, pro_update_date = CURRENT_TIME() WHERE pro_ref = "barb004";

Q19 - UPDATE products SET pro_price = pro_price*1.011 WHERE pro_cat_id = 25;

Q20 - DELETE FROM products WHERE pro_cat_id = (SELECT cat_id FROM categories WHERE cat_name ="Tondeuses électriques")  AND pro_id NOT IN (SELECT ode_pro_id FROM orders_details);
