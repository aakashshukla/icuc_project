CREATE DATABASE IF NOT EXISTS icucdb;


CREATE TABLE IF NOT EXISTS icucdb.`client_registry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `assigned_lawyer` varchar(255) NOT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;