-- L'ordre a adopter est en fonction des clés primaires et des clés étrangères. Les clés étrangères ont besoin de la clé primaire d'un
-- autre tableau pour aller chercher la valeur de celle ci, c'est pour celà que l'ordre à adopter est d'abord de remplir les tableaux
-- avec les clés primaires, pour ensuite remplir le tableau avec les clés étrangères.


DROP DATABASE IF EXISTS gescom;

CREATE DATABASE gescom;

USE gescom;

CREATE TABLE suppliers(
   sup_id INT AUTO_INCREMENT,
   sup_name VARCHAR(30),
   sup_commercial_name VARCHAR(20),
   sup_country VARCHAR(20),
   PRIMARY KEY(sup_id)
);

CREATE TABLE employes(
   emp_id INT AUTO_INCREMENT,
   emp_name VARCHAR(20),
   emp_firstname VARCHAR(20),
   emp_sex VARCHAR(20),
   emp_hierarchy INT,
   emp_post VARCHAR(20),
   emp_location VARCHAR(50),
   emp_service VARCHAR(20),
   emp_salary DECIMAL(6,2),
   emp_arrival DATE,
   emp_child DECIMAL(2,0),
   PRIMARY KEY(emp_id)
);

CREATE TABLE client(
   cli_id INT AUTO_INCREMENT,
   cli_name VARCHAR(20),
   cli_firstname VARCHAR(20),
   cli_password VARCHAR(30),
   cli_mail VARCHAR(50),
   cli_number VARCHAR(20),
   cli_address VARCHAR(50),
   cli_zipcode VARCHAR(10),
   cli_country VARCHAR(20),
   cli_city VARCHAR(20),
   cli_creationdate DATETIME,
   cli_updatedate DATETIME,
   PRIMARY KEY(cli_id)
);

CREATE TABLE admins(
   admin_id INT,
   admin_name VARCHAR(20),
   admin_log VARCHAR(20),
   admin_password VARCHAR(30),
   PRIMARY KEY(admin_id)
);

CREATE TABLE categories(
   cat_id INT AUTO_INCREMENT,
   cat_name VARCHAR(20),
   cat_sub_name VARCHAR(50),
   PRIMARY KEY(cat_id)
);

CREATE TABLE product(
   pro_id INT AUTO_INCREMENT,
   pro_ref VARCHAR(20),
   pro_name VARCHAR(30),
   pro_price DECIMAL(6,2),
   pro_eancode DECIMAL(25,0),
   pro_stock INT,
   pro_stock_critic INT,
   pro_color VARCHAR(20),
   pro_label VARCHAR(20),
   pro_description TEXT,
   pro_creation_date DATETIME,
   pro_update_date DATETIME,
   pro_picture_name VARCHAR(50),
   pro_on_sale BINARY(1),
   pro_discount DECIMAL(2,2),
   cat_id INT NOT NULL,
   sup_id INT NOT NULL,
   PRIMARY KEY(pro_id),
   FOREIGN KEY(cat_id) REFERENCES categories(cat_id),
   FOREIGN KEY(sup_id) REFERENCES suppliers(sup_id)
);

CREATE TABLE orders(
   ord_id INT AUTO_INCREMENT,
   ord_date DATETIME,
   ord_estimated_date DATE,
   ord_delivery_date DATE,
   ord_status VARCHAR(20),
   cli_id INT NOT NULL,
   PRIMARY KEY(ord_id),
   FOREIGN KEY(cli_id) REFERENCES client(cli_id)
);

CREATE TABLE order_details(
   pro_id INT,
   ord_id INT,
   ordd_price_all_included DECIMAL(6,2),
   ordd_shopping_cart TEXT,
   ordd_commentary TEXT,
   ordd_quantity DECIMAL(3,0),
   ordd_adress VARCHAR(50),
   ordd_zipcode VARCHAR(10),
   ordd_city VARCHAR(50),
   ordd_country VARCHAR(20),
   ordd_vat DECIMAL(2,2),
   FOREIGN KEY(pro_id) REFERENCES product(pro_id),
   FOREIGN KEY(ord_id) REFERENCES orders(ord_id)
);

CREATE TABLE moderate(
   pro_id INT,
   admin_id INT,
   FOREIGN KEY(pro_id) REFERENCES product(pro_id),
   FOREIGN KEY(admin_id) REFERENCES admins(admin_id)
);

CREATE TABLE watch(
   emp_id INT,
   admin_id INT,
   FOREIGN KEY(emp_id) REFERENCES employes(emp_id),
   FOREIGN KEY(admin_id) REFERENCES admins(admin_id)
);
