-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2015 at 09:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laf`
--

-- --------------------------------------------------------

--
-- Table structure for table `centre`
--

CREATE TABLE IF NOT EXISTS `centre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `LOCATION` varchar(150) NOT NULL,
  `CONTACTS` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `centre`
--

INSERT INTO `centre` (`ID`, `NAME`, `LOCATION`, `CONTACTS`) VALUES
(1, 'NAIROBI', 'qwwewee', 'wwrwr'),
(2, 'NAKURU', 'wewerew', 'eerer');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NUMBER` varchar(100) NOT NULL,
  `OWNER` varchar(100) NOT NULL,
  `PICTURE` varchar(100) NOT NULL,
  `FINDER` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NUMBER` (`NUMBER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`ID`, `NUMBER`, `OWNER`, `PICTURE`, `FINDER`) VALUES
(3, '3', 'BEVERLY', 'bee.jpg', 3),

-- --------------------------------------------------------

--
-- Table structure for table `document_center`
--

CREATE TABLE IF NOT EXISTS `document_center` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NUMBER` int(11) NOT NULL,
  `CENTER` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `document_center`
--

INSERT INTO `document_center` (`ID`, `NUMBER`, `CENTER`) VALUES
(4, 3, 1),

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NAMES` varchar(200) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `ROLE` varchar(100) NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USERNAME` (`USERNAME`,`EMAIL`,`PHONE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `NAMES`, `PHONE`, `ROLE`) VALUES
(1, 'vini', '8f84ff3b2d2442da8a4e4fd0f770dcb2', 'vini@eml.cc', 'vince', '565767668778', 'USER'),
(3, 'ashken', '8f84ff3b2d2442da8a4e4fd0f770dcb2', 'v@yahoo.com', 'fraire', '23233434', 'MEMBER'),
(4, 'karyn', 'ba952731f97fb058035aa399b1cb3d5c', 'karyn@eml.cc', 'karyn white', '444545', 'USER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
