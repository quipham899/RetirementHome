CREATE DATABASE IF NOT EXISTS `Users`;
USE `Users`;

DROP TABLE IF EXISTS Accounts;
DROP TABLE IF EXISTS Patient;
DROP TABLE IF EXISTS Doctor;
DROP TABLE IF EXISTS Caregiver;
DROP TABLE IF EXISTS Medication;
CREATE TABLE `Role` (
  `roleName` varchar(50) PRIMARY KEY,
  `accessLevel` TEXT NOT NULL
);

CREATE TABLE `Accounts` (
  `id` serial PRIMARY KEY,
  `email` TEXT UNIQUE NOT NULL,
  `password` TEXT NOT NULL,
  `firstName` TEXT NOT NULL,
  `lastName` TEXT NOT NULL,
  `phone` bigint NOT NULL,
  `role` TEXT NOT NULL,
  `DOB` TEXT NOT NULL,
  `approved` TEXT NOT NULL,
  `salary` bigint
);

CREATE TABLE `Salary` (
  `id` bigint references Accounts(id),
  `salary` varchar(50) NOT NULL
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

CREATE TABLE `Appointment` (
  `id` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `Appointments` DATE,
  `PatientID` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
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

CREATE TABLE `Roster`(
  `rotationDate` DATE,
  `supervisor` bigint NOT NULL,
  `doctor` bigint NOT NULL,
  `caregiver1` bigint NOT NULL,
  `caregiver2` bigint NOT NULL,
  `caregiver3` bigint NOT NULL,
  `caregiver4` bigint NOT NULL
);
