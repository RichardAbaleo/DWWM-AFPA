USE hotel;
CREATE VIEW v_hotel AS SELECT hot_nom, sta_nom FROM hotel, station WHERE hotel.hot_sta_id = station.sta_id;
SELECT * FROM v_hotel;

CREATE VIEW v_chambre_hotel AS SELECT cha_numero, hot_nom FROM hotel, chambre 
WHERE hotel.hot_id = chambre.cha_hot_id;

CREATE VIEW v_reservation AS SELECT cha_numero, cli_nom FROM client, chambre, reservation
WHERE chambre.cha_id = reservation.res_cha_id AND reservation.res_cli_id = client.cli_id;

CREATE VIEW v_cha_hot_sta AS SELECT cha_numero, hot_nom, sta_nom FROM hotel, chambre, station WHERE hotel.hot_id = chambre.cha_hot_id AND hotel.hot_sta_id = station.sta_id;
SELECT * FROM v_chambre_hotel;

CREATE VIEW v_res_cli_hot AS SELECT cha_numero, cli_nom, hot_nom FROM client, chambre, reservation, hotel 
WHERE hotel.hot_id = chambre.cha_hot_id AND chambre.cha_id = reservation.res_cha_id AND reservation.res_cli_id = client.cli_id;



CREATE VIEW v_Details AS SELECT pro_ean AS "Code Produit", SUM(ode_quantity) AS "QteTot", ode_quantity * ode_unit_price * (1-(0.01 * ode_discount)) AS "PrixTot" 
FROM products, orders_details WHERE orders_details.ode_pro_id = products.pro_id GROUP BY pro_ean;
-- (Il n'y a que des code produit NULL dans la base de données hotel fourni, mais celà marche par exemple en utilisant pro_id à la place de pro_ean)

CREATE VIEW v_Ventes_Zoom AS SELECT ode_id, ode_unit_price, ode_discount, ode_quantity FROM orders_details, products WHERE orders_details.ode_pro_id = products.pro_id AND pro_ean = "ZOOM";

-- (idem)