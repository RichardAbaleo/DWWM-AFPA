-- util1 --

CREATE USER 'util1'@'%' IDENTIFIED BY 'mot_de_passe';
GRANT ALL PRIVILEGES ON . TO `util1`@`%` IDENTIFIED BY PASSWORD 'password' WITH GRANT OPTION;

-- util2 --

CREATE USER 'util2'@'%' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT ON papyrus TO `util2`@`%` IDENTIFIED BY PASSWORD 'password';

-- util3 --

CREATE USER 'util3'@'%' IDENTIFIED BY 'mot_de_passe';
GRANT SELECT ON papyrus.fournis TO `util3`@`%` IDENTIFIED BY PASSWORD 'password';