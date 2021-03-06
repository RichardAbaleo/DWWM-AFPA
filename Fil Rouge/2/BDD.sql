DROP DATABASE IF EXISTS `Village_Green`;

CREATE DATABASE `Village_Green`;

USE `Village_Green`;

CREATE TABLE category(
   cat_id INT AUTO_INCREMENT,
   cat_name VARCHAR(20) NOT NULL,
   cat_sup_id INT NULL,
   PRIMARY KEY(cat_id),
   FOREIGN KEY(cat_sup_id) REFERENCES category(cat_id)
);

CREATE TABLE commercial(
   com_id INT AUTO_INCREMENT,
   com_name VARCHAR(20) NOT NULL,
   com_mail VARCHAR(50) NOT NULL,
   com_password VARCHAR(50) NOT NULL,
   PRIMARY KEY(com_id)
);

CREATE TABLE type(
   typ_id INT AUTO_INCREMENT,
   typ_name VARCHAR(20) NOT NULL,
   typ_coef DECIMAL(2,2) NOT NULL,
   PRIMARY KEY(typ_id)
);

CREATE TABLE country(
   cou_id VARCHAR(2),
   cou_name VARCHAR(20) NOT NULL,
   PRIMARY KEY(cou_id)
);

CREATE TABLE supplier(
   sup_id INT AUTO_INCREMENT,
   sup_name VARCHAR(30) NOT NULL,
   sup_city VARCHAR(20) NOT NULL,
   sup_address VARCHAR(50) NOT NULL,
   sup_zipcode VARCHAR(5) NOT NULL,
   sup_contact VARCHAR(30) NOT NULL,
   sup_phone VARCHAR(20) NOT NULL,
   sup_mail VARCHAR(50) NOT NULL,
   sup_cou_id VARCHAR(2) NOT NULL,
   PRIMARY KEY(sup_id),
   FOREIGN KEY(sup_cou_id) REFERENCES country(cou_id)
);

CREATE TABLE users(
   use_id INT AUTO_INCREMENT,
   use_lastname VARCHAR(50) NOT NULL,
   use_firstname VARCHAR(50) NOT NULL,
   use_address VARCHAR(50) NOT NULL,
   use_zipcode VARCHAR(5) NOT NULL,
   use_city VARCHAR(50) NOT NULL,
   use_mail VARCHAR(50) NOT NULL,
   use_phone VARCHAR(50) NOT NULL,
   use_password VARCHAR(50) NOT NULL,
   use_coef DECIMAL(2,2) NOT NULL,
   use_cou_id VARCHAR(2) NOT NULL,
   use_typ_id INT NOT NULL,
   use_com_id INT NOT NULL,
   PRIMARY KEY(use_id),
   FOREIGN KEY(use_cou_id) REFERENCES country(cou_id),
   FOREIGN KEY(use_typ_id) REFERENCES type(typ_id),
   FOREIGN KEY(use_com_id) REFERENCES commercial(com_id)
);

CREATE TABLE orders(
   ord_id INT AUTO_INCREMENT,
   ord_order_date DATETIME NOT NULL,
   ord_payment_date DATETIME,
   ord_ship_date DATE,
   ord_reception_date DATE,
   ord_status VARCHAR(20),
   ord_address VARCHAR(50) NOT NULL,
   ord_city VARCHAR(50) NOT NULL,
   ord_zipcode VARCHAR(5) NOT NULL,
   ord_cou_id VARCHAR(2) NOT NULL,
   ord_bill_address VARCHAR(50) NOT NULL,
   ord_bill_city VARCHAR(50) NOT NULL,
   ord_bill_zipcode VARCHAR(5) NOT NULL,
   ord_bill_cou_id VARCHAR(2) NOT NULL,
   ord_use_id INT NOT NULL,
   PRIMARY KEY(ord_id),
   FOREIGN KEY(ord_cou_id) REFERENCES country(cou_id),
   FOREIGN KEY(ord_bill_cou_id) REFERENCES country(cou_id),
   FOREIGN KEY(ord_use_id) REFERENCES users(use_id)
);

CREATE TABLE product(
   pro_id INT AUTO_INCREMENT,
   pro_name VARCHAR(50) NOT NULL,
   pro_ref VARCHAR(10) NOT NULL,
   pro_ean INT,
   pro_price DECIMAL(5,2) NOT NULL,
   pro_description TEXT,
   pro_stock INT NOT NULL,
   pro_picture TEXT,
   pro_add_date DATE,
   pro_update_date DATETIME,
   pro_sup_id INT NOT NULL,
   pro_cat_id INT NOT NULL,
   PRIMARY KEY(pro_id),
   FOREIGN KEY(pro_sup_id) REFERENCES supplier(sup_id),
   FOREIGN KEY(pro_cat_id) REFERENCES category(cat_id)
);

CREATE TABLE order_details(
   ode_id INT AUTO_INCREMENT,
   ode_unit_price DECIMAL(5,2) NOT NULL,
   ode_quantity INT NOT NULL,
   ode_vat DECIMAL(2,2) NOT NULL,
   ode_discount DECIMAL(2,2),
   ode_ord_id INT NOT NULL,
   ode_pro_id INT NOT NULL,
   PRIMARY KEY(ode_id),
   FOREIGN KEY(ode_ord_id) REFERENCES orders(ord_id),
   FOREIGN KEY(ode_pro_id) REFERENCES product(pro_id)
);

CREATE ROLE 'r_village_visiteur', 'r_village_client', 'r_village_gestion', 'r_village_admin';
GRANT SELECT ON Village_Green.product TO 'r_village_visiteur';
GRANT SELECT ON Village_Green.* TO 'r_village_client';
GRANT INSERT, UPDATE ON Village_Green.orders TO 'r_village_client';
GRANT INSERT, UPDATE ON Village_Green.users TO 'r_village_client';
GRANT SELECT, INSERT ON Village_Green.* TO 'r_village_gestion';
GRANT SELECT, INSERT, UPDATE, DELETE ON Village_Green.* TO 'r_village_admin';
