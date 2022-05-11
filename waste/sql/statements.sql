DROP DATABASE IF EXISTS superiorwaste;

CREATE DATABASE superiorwaste;

USE superiorwaste;

CREATE TABLE apparaten(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    Naam VARCHAR(40) NOT NULL UNIQUE,
    Omschrijving VARCHAR(200),
    Vergoeding FLOAT,
    GewichtGram INT(11),
    PRIMARY KEY(ID)
);

CREATE TABLE onderdelen(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    Naam VARCHAR(40) NOT NULL UNIQUE,
    Omschrijving VARCHAR(200),
    VoorraadKg FLOAT NOT NULL,
    PrijsPerKg FLOAT NOT NULL,
    PRIMARY KEY(ID) 
);

CREATE TABLE rollen(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    Naam VARCHAR(200) NOT NULL UNIQUE,
    Omschrijving VARCHAR(200),
    Waarde INT NOT NULL,
    PRIMARY KEY(ID)
);

CREATE TABLE medewerkers(
    ID INT(255) NOT NULL AUTO_INCREMENT,
    RollID INT(11) NOT NULL,
    Naam VARCHAR(40) NOT NULL,
    Wachtwoord VARCHAR(40) NOT NULL,
    Emailadres VARCHAR(100) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(RollID) REFERENCES rollen(ID) ON DELETE CASCADE
);

CREATE TABLE innames(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    MedewerkerID INT NOT NULL,
    Tijdstip TIMESTAMP NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(MedewerkerID) REFERENCES medewerkers(ID) ON DELETE CASCADE
);

CREATE TABLE innameapparaat(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    InnameID INT(11) NOT NULL,
    ApparaatID INT(11) NOT NULL, 
    Ontleed TINYINT(1) NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(InnameID) REFERENCES Innames(ID) ON DELETE CASCADE, 
    FOREIGN KEY(ApparaatID) REFERENCES apparaten(ID) ON DELETE CASCADE 
);

CREATE TABLE onderdeelapparaat(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    OnderdeelID INT(11) NOT NULL,
    ApparaatID INT(11) NOT NULL,
    Percentage INT(11),
    PRIMARY KEY(ID),
    FOREIGN KEY(OnderdeelID) REFERENCES onderdelen(ID) ON DELETE CASCADE,
    FOREIGN KEY(ApparaatID) REFERENCES apparaten(ID) ON DELETE CASCADE 
);


CREATE TABLE uitgiftes(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    MedewerkerID INT NOT NULL,
    OnderdeelID INT(11) NOT NULL,
    Tijdstip DATETIME NOT NULL,
    GewichtKg INT(11) NOT NULL, 
    Prijs FLOAT,
    PRIMARY KEY(ID),
    FOREIGN KEY(OnderdeelID) REFERENCES onderdelen(ID) ON DELETE CASCADE,
    FOREIGN KEY(MedewerkerID) REFERENCES medewerkers(ID) ON DELETE CASCADE
);