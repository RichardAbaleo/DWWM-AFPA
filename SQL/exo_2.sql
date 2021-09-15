CREATE DATABASE `exo_2`;

USE `exo_2`;

CREATE TABLE `chambre` (
  `chambre_num` int(11) NOT NULL,
  `chambre_capacite` int(11) NOT NULL,
  `chambre_degre_confort` int(11) NOT NULL,
  `chambre_expostion` varchar(50) NOT NULL,
  `chambre_type` varchar(20) NOT NULL,
  `hotel_num` int(11) NOT NULL);

CREATE TABLE `client` (
  `client_num` int(11) NOT NULL,
  `client_adresse` varchar(50) NOT NULL,
  `client_nom` varchar(20) NOT NULL,
  `client_prenom` varchar(20) NOT NULL);

CREATE TABLE `hotel` (
  `hotel_num` int(11) NOT NULL,
  `hotel_capacite` int(11) NOT NULL,
  `hotel_categorie` varchar(20) NOT NULL,
  `hotel_nom` varchar(50) NOT NULL,
  `hotel_adresse` varchar(50) NOT NULL,
  `station_num` int(11) NOT NULL);

CREATE TABLE `reservation` (
  `chambre_num` int(11) NOT NULL,
  `client_num` int(11) NOT NULL,
  `reservation_date_debut` datetime NOT NULL,
  `reservation_date_fin` datetime NOT NULL,
  `reservation_date_reservation` int(11) NOT NULL,
  `reservation_montant_arrhes` int(11) NOT NULL,
  `reservation_prix_total` int(11) NOT NULL);

CREATE TABLE `station` (
  `station_num` int(11) NOT NULL,
  `station_nom` varchar(50) NOT NULL);

ALTER TABLE `chambre`
  ADD PRIMARY KEY (`chambre_num`),
  ADD KEY `hotel_num` (`hotel_num`);

ALTER TABLE `client`
  ADD PRIMARY KEY (`client_num`);

ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_num`),
  ADD KEY `station_num` (`station_num`);

ALTER TABLE `reservation`
  ADD KEY `chambre_num` (`chambre_num`),
  ADD KEY `client_num` (`client_num`);

ALTER TABLE `station`
  ADD PRIMARY KEY (`station_num`);

ALTER TABLE `chambre`
  MODIFY `chambre_num` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `client`
  MODIFY `client_num` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `hotel`
  MODIFY `hotel_num` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `station`
  MODIFY `station_num` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`hotel_num`) REFERENCES `hotel` (`hotel_num`);

ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`station_num`) REFERENCES `station` (`station_num`);

ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`chambre_num`) REFERENCES `chambre` (`chambre_num`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`client_num`) REFERENCES `client` (`client_num`);

