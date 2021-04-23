-- Adminer 4.8.0 MySQL 5.5.5-10.4.11-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `crud` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crud`;

DROP TABLE IF EXISTS `account_info`;
CREATE TABLE `account_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `account_info` (`user_id`, `account`, `name`, `gender`, `birthday`, `email`, `note`) VALUES
(1,	'abc123456',	'王小明',	'1',	'2021-04-23',	'abc123@yahoo.com',	''),
(2,	'canajohn',	'john cena',	'1',	'2020-12-02',	'johngood@bbb.cc',	'無'),
(3,	'qewr123',	'susan',	'0',	'2021-04-09',	'ewewe@ewe.ewe',	''),
(4,	'helloabc',	'sam',	'1',	'2021-03-31',	'eqwew@ewq.e',	''),
(5,	'mary132',	'sandy',	'0',	'2021-03-31',	'qwe@re.clo',	''),
(6,	'qweqwe',	'harry',	'1',	'2015-12-29',	'wwww@cc.com',	''),
(10,	'test',	'小名',	'1',	'2021-04-08',	'erer@re.re',	'');

-- 2021-04-23 04:28:08
