DROP DATABASE azm_test;
/*
CREATE USER 'hrn'@'localhost' IDENTIFIED BY 
'my_pass';
GRANT ALL PRIVILEGES ON azm.* TO 
'hrn'@'localhost';
*/
/*user, lagertyp, lieferanten, arikel, artikel_lieferanten, eingang*/
CREATE DATABASE azm_test
  CHARACTER SET utf8
  COLLATE utf8_general_ci;
use azm_test;
CREATE TABLE user(
user_id int(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL CHECK (name <> ''),
username VARCHAR(50) NOT NULL CHECK (username <> ''),
password VARCHAR(255) NOT NULL CHECK (password <> ''),
roles VARCHAR(50) NOT NULL CHECK (roles <> ''),
enabled BOOLEAN  NOT NULL DEFAULT FALSE,
PRIMARY KEY (user_id),
UNIQUE KEY(username,password)
);
/*Datensatz in der Tabelle user einfügen*/
insert into user (name,username,password,roles,enabled) values
('Max','MM',SHA2('Muster',256),'USER',TRUE),
('Hans','HM',SHA2('Muster',256),'USER ADMIN',TRUE),
('Harouna','HC',SHA2('Muster',256),'USER SUPERADMIN',TRUE),
('Eve','EM',SHA2('Muster',256),'USER',FALSE),
('Robert ','RM',SHA2('Muster',256),'USER ADMIN',FALSE),
('Thomas','TM',SHA2('Muster',256),'USER SUPERADMIN',FALSE);
CREATE TABLE depot (
depot_id int(11) NOT NULL AUTO_INCREMENT,
description VARCHAR(50) NOT NULL  CHECK (description <> ''),
PRIMARY KEY (depot_id)
);
/*Datensatz in der Tabelle Lagertyp einfügen*/
insert into depot (description) values
('Konsignation'),
('Hersteller');
CREATE TABLE supplier (
supplier_id int(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
street VARCHAR(50) NOT NULL,
city VARCHAR(50) NOT NULL,
code VARCHAR(50) NOT NULL,
tel VARCHAR(50) NOT NULL,
fax VARCHAR(50) NOT NULL,
mail VARCHAR(50) NOT NULL,
PRIMARY KEY (supplier_id)
);
CREATE TABLE article (
article_id int(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(200) NOT NULL CHECK (name <> ''),
price float NOT NULL CHECK (price > 0),
depot_id int(11) NOT NULL CHECK (depot_id >= 1),
backup tinyint(1) NOT NULL,
user_id int(11) NOT NULL,
article_number int(11) NOT NULL,
ean VARCHAR(25) NOT NULL  CHECK (ean <> ''),
notice VARCHAR(100) NOT NULL,
PRIMARY KEY (article_id),
UNIQUE KEY (name)
);
CREATE TABLE article_supplier (
article_supplier_id int(11) NOT NULL AUTO_INCREMENT,
supplier_id int(11) NOT NULL,
article_id int(11) NOT NULL,
price_net float NOT NULL,
tax float NOT NULL,
PRIMARY KEY (article_supplier_id)
);
CREATE TABLE stock (
stock_id int(11) NOT NULL AUTO_INCREMENT,
article_id int(11) NOT NULL,
quantity int(11) NOT NULL CHECK (quantity <> 0),
notice VARCHAR(100) ,
PRIMARY KEY (stock_id)
);

ALTER TABLE article ADD CONSTRAINT article_ibfk_1 FOREIGN KEY (depot_id) REFERENCES depot
(depot_id) ;
ALTER TABLE article ADD CONSTRAINT article_ibfk_2 FOREIGN KEY (user_id) REFERENCES user (user_id);
ALTER TABLE stock ADD CONSTRAINT stock_ibfk_1 FOREIGN KEY (article_id) REFERENCES article (article_id);
ALTER TABLE article_supplier ADD CONSTRAINT article_supplier_ibfk_1 FOREIGN KEY (article_id) REFERENCES article (article_id);
ALTER TABLE article_supplier ADD CONSTRAINT article_supplier_ibfk_2 FOREIGN KEY (supplier_id) REFERENCES supplier (supplier_id);
/**
 * Insert test data
 */
INSERT INTO article (name, price, depot_id, backup, user_id, article_number, ean, notice) VALUES
('Paracétamole', 18.76, 1, 0, 1, 3, 'e1', 'Anzahl'),
('Doliprane', 59.98, 3, 1, 1, 2, 'e2', ''),
('CAC1000', 726.89, 2, 1, 1, 3, 'e3', 'je nesaisn'),
('Aspirine', 45.76, 1, 1, 2, 4, 'e4', 'hn'),
('Téromicine', 18.98, 2, 0, 2, 2889, 'e10', 'bcmm'),
('Antibiotique', 12.89, 2, 1, 1, 2021, 'e100', 'xcll'),
('Nerediem', 26.98, 1, 1, 1, 888888, 'ee1', 'mks');


INSERT INTO supplier (name, street, city, code, tel, fax, mail) VALUES
('SLS GmbH', 'Maarstraße 26', 'München', '88065', '215678917826', '676217621871', 'support@sls.de'),
('MED GmbH', 'Hauptstraße 33', 'Berlin', '76656', '637388363876', '638738736387', 'personal@med.de'),
('MEDMIT Gmbh', 'Saarstraße 27', 'Köln', '29277', '216623783688237', '7278263688819768', 'personal@medmit.de'),
('LSFMED GmbH', 'straße', 'ort', '99999', '99999999999999', '88888888888888', 'support@lsfmed.de'),
('AMLS GmbH', 'straße', 'ort2', '13z8i', '7777777888', '999999999', 'support@amls.de'),
('LI Service GmbH', 'straßße', 'ooort', '99999', '8888888', '7777777', 'support@ls.de');


INSERT INTO article_supplier (supplier_id, article_id, price_net, tax) VALUES
(1, 1, 25.05, 0.07),
(1, 2, 20, 0.15),
(1, 3, 23.98, 0.07),
(2, 2, 34.76, 0.07),
(4, 5, 36.83, 0.07),
(5, 6, 56.89, 0.07),
(3, 6, 54.25, 0.15),
(6, 7, 65.19, 0.07);


INSERT INTO stock (article_id, quantity, notice) VALUES
(1, 77, ''),
(2, 66, ''),
(3, 89, ''),
(4, 87, ''),
(2, 65, ''),
(5, 67, ''),
(6, 88, ''),
(7, 98, 'Test'),
(1, -30, ''),
(1, 1, ''),
(2, 25, '');



