CREATE DATABASE IF NOT EXISTS `Users`;
USE `Users`;

DROP TABLE IF EXISTS Accounts CASCADE;
DROP TABLE IF EXISTS Patient CASCADE;
DROP TABLE IF EXISTS Doctor CASCADE;
DROP TABLE IF EXISTS Caregiver CASCADE;
DROP TABLE IF EXISTS Medication CASCADE;

CREATE TABLE `Accounts` (
  `id` serial UNIQUE PRIMARY KEY NOT NULL,
  `email` TEXT UNIQUE NOT NULL,
  `password` TEXT UNIQUE NOT NULL,
  `firstName` TEXT UNIQUE NOT NULL,
  `role` TEXT NOT NULL,
  `DOB` TEXT NOT NULL
);

CREATE TABLE `Patient` (
  `id` serial REFERENCES Accounts(id),
  `FamilyCode` TEXT NOT NULL,
  `EmergencyContact` TEXT NOT NULL,
  `Name` TEXT UNIQUE NOT NULL,
  `Relation` TEXT NOT NULL,
  'Group' TEXT NOT NULL,
  `AdmissionDate` DATE NOT NULL
);

CREATE TABLE `Doctor` (
  `id` serial REFERENCES Accounts(id) ON DELETE CASCADE,
  `Appointments` DATE,
  `PatientID` serial REFERENCES Accounts(id) ON DELETE CASCADE,
  `Patient` text REFERENCES Patient(Name) ,
  `Comment` TEXT
);

CREATE TABLE `Caregiver` (
  `id` serial REFERENCES Accounts(id) ON DELETE CASCADE,
  `PatientID` serial REFERENCES Accounts(id) ON DELETE CASCADE,
  `Name` TEXT NOT NULL
);
CREATE TABLE `Medication` (
  `PatientID` serial REFERENCES Accounts(id) ON DELETE CASCADE,
  `MornMed` TEXT,
  `AfternoonMed` TEXT,
  `NightMed` TEXT
);
