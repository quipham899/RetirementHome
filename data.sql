CREATE DATABASE IF NOT EXISTS `Data`;
USE `Data`;

DROP TABLE IF EXISTS Accounts;
DROP TABLE IF EXISTS Patient;
DROP TABLE IF EXISTS Doctor;
DROP TABLE IF EXISTS Caregiver;
DROP TABLE IF EXISTS Medication;
DROP TABLE IF EXISTS Roster;
DROP TABLE IF EXISTS Schedule;
DROP TABLE IF EXISTS Salary;
DROP TABLE IF EXISTS Role;
CREATE TABLE `Role` (
  `roleId` serial PRIMARY KEY,
  `roleName` varchar(50),
  `accessLevel` TEXT NOT NULL
);
INSERT INTO `Role`( roleName, accessLevel)
VALUES('Admin', 'A'),('Supervisor','B'),
('Doctor','C'),('Caregiver','D'),('Patient','F'),
('Family','G');

CREATE TABLE `Accounts` (
  `id` serial PRIMARY KEY,
  `email` TEXT UNIQUE NOT NULL,
  `password` TEXT NOT NULL,
  `firstName` TEXT NOT NULL,
  `lastName` TEXT NOT NULL,
  `phone` bigint NOT NULL,
  `role` Text references Role(accessLevel),
  `DOB` TEXT NOT NULL,
  `approved` TEXT NOT NULL
);
INSERT INTO `Accounts`(email,password,firstName,lastName,phone,role,DOB,approved)VALUES('shakira@gmail.com','gsnjdgoishgio','Shakira','Juarez','88865790876','F','1995-11-17','True'),
('shaktia@gmail.com','gsnjdgoishgio','Shaktia','loon','88865790873','F','1995-11-15','True'),('addy@gmail.com','gsnjdgoishgio','Addie','Lee','8885906788','A','1995-11-20','True'),
('weinguy@gmail.com','gsnjdgoishgio','Wei','Nguy','8886579090','F','1995-11-20','True'), ('quyen3279@gmail.com','gsnjdgoishgio','Quyen','Pham','8886579646','D','1995-11-30','True'),
('mo@gmail.com','gsnjdgoishgio','Mo','Bamba','88865756876','D','1995-01-15','True'), ('NANO@gmail.com','gsnjdgoishgio','Nano','Banda','88865756876','B','1995-02-20','True'),
('mojiao@gmail.com','gsnjdgoishgio','Ba','NANO','888657545676','D','1995-05-20','True'),('mojang@gmail.com','gsnjdgoishgio','Jiang','Yu','888657545676','B','1995-05-20','False'),
('quanzhen@gmail.com','gsnjdgoishgio','Liu','Bang','888657545676','B','1995-05-20','False');
CREATE TABLE `Salary` (
  `salaryID` bigint references Accounts(id),
  `salary` bigint(50) NOT NULL
);
INSERT INTO `Salary`(salaryID,salary)VALUES('3','900'),('5','800'),('6','350'),('7','850');

CREATE TABLE `Patient` (
  `id` bigint REFERENCES Accounts(id),
  `FamilyCode` bigint DEFAULT NULL,
  `EmergencyContact` bigint DEFAULT NULL,
  `Relation` TEXT DEFAULT NULL,
  `GroupName` TEXT DEFAULT NULL,
  `AdmissionDate` DATE DEFAULT NULL,
  `Debt` bigint,
  `updateDate` DATE
);
INSERT INTO `Patient`(id,FamilyCode,EmergencyContact,Relation,GroupName,AdmissionDate,Debt,updateDate) VALUES('1','505','4894958884','Side-GF','C','2020-11-16','900','2020-10-20'),
('2','666','4894958884','Dark master','C','2020-11-26','150','2020-11-20'),('4','999','4894958884','Daddy','C','2020-01-16','200','2020-11-20');

CREATE TABLE `Appointment` (
  `id` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `Appointments` DATE,
  `PatientID` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `Comment` TEXT DEFAULT NULL,
  `complete` TEXT
);

CREATE TABLE `Caregiver` (
  `id` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `PatientID` bigint REFERENCES Accounts(id) ON DELETE CASCADE
);
CREATE TABLE `Medication` (
  `PatientID` bigint REFERENCES Accounts(id) ON DELETE CASCADE,
  `assignDate` DATE NOT NULL,
  `MornMed` TEXT,
  `AfternoonMed` TEXT,
  `NightMed` TEXT
);
CREATE TABLE `Schedule`(
  `RecordDate` DATE NOT NULL,
  `careID` bigint REFERENCES Caregiver(id),
  `patientID` bigint REFERENCES Caregiver(patientID),
  `MornMed` TEXT NOT NULL,
  `AfterMed` TEXT NOT NULL,
  `NightMed` TEXT NOT NULL,
  `Breakfast` TEXT NOT NULL,
  `Lunch` Text NOT NULL,
  `Dinner` TEXT NOT NULL
);
CREATE TABLE `Roster`(
  `rotationDate` DATE,
  `groupName` TEXT REFERENCES Patient(GroupName),
  `supervisor` bigint NOT NULL,
  `doctor` bigint NOT NULL,
  `caregiver1` bigint NOT NULL,
  `caregiver2` bigint NOT NULL,
  `caregiver3` bigint NOT NULL,
  `caregiver4` bigint NOT NULL
);
