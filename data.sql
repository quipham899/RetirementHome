CREATE DATABASE IF NOT EXISTS `Users`;
USE `Users`;


CREATE TABLE `Accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` TEXT NOT NULL,
  `password` TEXT NOT NULL,
  `firstName` TEXT NOT NULL,
  `role` TEXT NOT NULL,
   PRIMARY KEY(`id`),
   UNIQUE(`email`, `password`,`id`)
)AUTO_INCREMENT = 1;
