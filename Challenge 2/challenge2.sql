DROP DATABASE IF EXISTS challenge2;
CREATE DATABASE challenge2;
use challenge2

CREATE TABLE stadium(
	stadiumName varchar(50) NOT NULL,
	capacity int(7) NOT NULL,
	ticketprice float(5) NOT NULL,
	PRIMARY KEY(stadiumName)
) ENGINE=InnoDB;

CREATE TABLE team(
	city varchar(50) NOT NULL,
	teamName varchar(50) NOT NULL,
	stadiumName varchar(50) NOT NULL,
	PRIMARY KEY(teamName),
	FOREIGN KEY (stadiumName) REFERENCES stadium(stadiumName)
) ENGINE=InnoDB;

CREATE TABLE player(
	playerID int(10) AUTO INCREMENT,
	fname varchar(50) NOT NULL,
	lname varchar(50) NOT NULL,
	teamName varchar(50) NOT NULL,
	age int(4) NOT NULL,
	salary float(7) NOT NULL,
	PRIMARY KEY (playerID),
	FOREIGN KEY (teamName) REFERENCES team(teamName)
) ENGINE=InnoDB;
