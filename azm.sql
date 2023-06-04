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
