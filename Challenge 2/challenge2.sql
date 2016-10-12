DROP DATABASE IF EXISTS challenge2;
CREATE DATABASE challenge2;
use challenge2

CREATE TABLE team(
	City varchar(50) NOT NULL,
	Name varchar(50) NOT NULL,
	PRIMARY KEY(Name)
) ENGINE=InnoDB;

CREATE TABLE stadium(
	Name varchar(50) NOT NULL,
	Capacity int(7) NOT NULL,
	TicketPrice float(5) NOT NULL,
	TeamName varchar(50) NOT NULL,
	PRIMARY KEY(Name),
	FOREIGN KEY (TeamName) REFERENCES team(Name)
) ENGINE=InnoDB;

CREATE TABLE player(
	playerID int(10) AUTO_INCREMENT,
	FirstName varchar(50) NOT NULL,
	LastName varchar(50) NOT NULL,
	TeamName varchar(50) NOT NULL,
	Age int(4) NOT NULL,
	Salary float(7) NOT NULL,
	PRIMARY KEY (playerID),
	FOREIGN KEY (TeamName) REFERENCES team(Name)
) ENGINE=InnoDB;
