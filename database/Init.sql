# Schema scrapper lba
# Created : 16/01/2018

USE lba;

CREATE TABLE `User` (
   idUser INT PRIMARY KEY,
   name VARCHAR(25),
   mdp VARCHAR(25)
);

CREATE TABLE `Page` (
   idPage INTEGER PRIMARY KEY,
   idUser INT,
   url VARCHAR(200),

   FOREIGN KEY(idUser) REFERENCES User(idUser)
);

CREATE TABLE `Advertisement` (
   idAvertisement INTEGER PRIMARY KEY,
   title VARCHAR(25),
   hour INTEGER,
   minute INTEGER,
   idPage INTEGER, 

   FOREIGN KEY(idPage) REFERENCES Page(idPage)
);