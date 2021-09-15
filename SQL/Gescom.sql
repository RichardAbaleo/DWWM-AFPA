CREATE DATABASE `gescom`;

USE `gescom`;

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_parent_id` int(11) NOT NULL);

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_lastname` varchar(20) NOT NULL,
  `cus_firstname` varchar(20) NOT NULL,
  `cus_adress` varchar(50) NOT NULL,
  `cus_zipcode` varchar(10) NOT NULL,
  `cus_city` varchar(20) NOT NULL,
  `cus_mail` varchar(50) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_password` varchar(30) NOT NULL);

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `ord_order_date` datetime NOT NULL,
  `ord_payment_date` datetime NOT NULL,
  `ord_ship_date` datetime NOT NULL,
  `ord_reception_date` date NOT NULL,
  `ord_status` varchar(20) NOT NULL,
  `ord_cus_id` int(11) NOT NULL);

CREATE TABLE `orders_details` (
  `ode_id` int(11) NOT NULL,
  `ode_unit_price` decimal(6,2) NOT NULL,
  `ode_quantity` int(11) NOT NULL,
  `ode_ord_id` int(11) NOT NULL,
  `ode_pro_id` int(11) NOT NULL);

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_cat_id` int(11) NOT NULL,
  `pro_price` decimal(6,2) NOT NULL,
  `pro_ref` varchar(20) NOT NULL,
  `pro_name` int(30) NOT NULL,
  `pro_desc` int(20) NOT NULL,
  `pro_publish` int(11) NOT NULL,
  `pro_sup_id` int(11) NOT NULL,
  `pro_picture` varchar(80) NOT NULL);


CREATE TABLE `suppliers` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(20) NOT NULL,
  `sup_city` varchar(20) NOT NULL,
  `sup_coutries_id` varchar(20) NOT NULL,
  `sup_address` varchar(50) NOT NULL,
  `sup_zipcode` varchar(10) NOT NULL,
  `sup_contact` varchar(20) NOT NULL,
  `sup_phone` varchar(20) NOT NULL,
  `sup_mail` varchar(50) NOT NULL);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `ord_cus_id` (`ord_cus_id`);

ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`ode_id`),
  ADD KEY `ode_ord_id` (`ode_ord_id`),
  ADD KEY `ode_pro_id` (`ode_pro_id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_cat_id` (`pro_cat_id`),
  ADD KEY `pro_sup_id` (`pro_sup_id`);

ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sup_id`);

ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders_details`
  MODIFY `ode_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `suppliers`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ord_cus_id`) REFERENCES `customers` (`cus_id`);

ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`ode_ord_id`) REFERENCES `orders` (`ord_id`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`ode_pro_id`) REFERENCES `products` (`pro_id`);

ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pro_cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`pro_sup_id`) REFERENCES `suppliers` (`sup_id`);
