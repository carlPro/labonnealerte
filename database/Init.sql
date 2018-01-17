# Schema scrapper lba
# Created : 16/01/2018

USE lba;

DROP TABLE IF EXISTS `Advertisement`;
DROP TABLE IF EXISTS `Page`;
DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
   idUser INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(25),
   mdp VARCHAR(25)
);

CREATE TABLE `Page` (
   idPage INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
   idUser INT,
   url VARCHAR(200),

   FOREIGN KEY(idUser) REFERENCES User(idUser)
);

CREATE TABLE `Advertisement` (
   idAvertisement INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(25),
   hour INTEGER,
   minute INTEGER,
   idPage INTEGER, 

   FOREIGN KEY(idPage) REFERENCES Page(idPage)
);

INSERT INTO `User`(name, mdp) VALUE("fasteel", "fasteel");