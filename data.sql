CREATE DATABASE IF NOT EXISTS `Users`;
USE `Users`;

DROP TABLE IF EXISTS Accounts;
DROP TABLE IF EXISTS Patient;
DROP TABLE IF EXISTS Doctor;
DROP TABLE IF EXISTS Caregiver;
DROP TABLE IF EXISTS Medication;

CREATE TABLE `Accounts` (
  `id` serial PRIMARY KEY,
  `email` TEXT UNIQUE NOT NULL,
  `password` TEXT NOT NULL,
  `firstName` TEXT NOT NULL,
  `lastName` TEXT NOT NULL,
  `phone` bigint NOT NULL,
  `role` TEXT NOT NULL,
  `DOB` TEXT NOT NULL
);

CREATE TABLE `Patient` (
  `id` bigint REFERENCES Accounts(id),
  `FamilyCode` TEXT NOT NULL,
  `EmergencyContact` TEXT NOT NULL,
  `Name` TEXT UNIQUE NOT NULL,
  `Relation` TEXT NOT NULL,
  `Group` TEXT NOT NULL,
  `AdmissionDate` DATE NOT NULL
);

CREATE TABLE `Doctor` (
  `id` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `Appointments` DATE,
  `PatientID` bigint Accounts(id) ON DELETE CASCADE,
  `Patient` text REFERENCES Patient(Name) ,
  `Comment` TEXT
);

CREATE TABLE `Caregiver` (
  `id` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `PatientID` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `Name` TEXT NOT NULL
);
CREATE TABLE `Medication` (
  `PatientID` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `MornMed` TEXT,
  `AfternoonMed` TEXT,
  `NightMed` TEXT
);
