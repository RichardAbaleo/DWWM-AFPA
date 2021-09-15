CREATE DATABASE `exo_1`;

USE `exo_1`;

CREATE TABLE `Appartient` (
  `per_num` int(11) NOT NULL,
  `gro_libelle` int(11) NOT NULL );

CREATE TABLE `groupe` (
  `gro_num` int(11) NOT NULL,
  `gro_libelle` varchar(30) NOT NULL );


CREATE TABLE `personne` (
  `per_num` int(11) NOT NULL,
  `per_nom` varchar(30) NOT NULL,
  `per_prenom` varchar(30) NOT NULL,
  `per_adress` varchar(50) NOT NULL,
  `per_ville` int(20) NOT NULL);


ALTER TABLE `Appartient`
  ADD KEY `gro_libelle` (`gro_libelle`),
  ADD KEY `per_num` (`per_num`);

ALTER TABLE `groupe`
  ADD PRIMARY KEY (`gro_num`);

ALTER TABLE `personne`
  ADD PRIMARY KEY (`per_num`);

ALTER TABLE `Appartient`
  ADD CONSTRAINT `Appartient_ibfk_1` FOREIGN KEY (`gro_libelle`) REFERENCES `groupe` (`gro_num`),
  ADD CONSTRAINT `Appartient_ibfk_2` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`);
