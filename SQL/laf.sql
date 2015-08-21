-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2015 at 09:58 PM
-- Server version: 10.0.20-MariaDB-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laf`
--
CREATE DATABASE IF NOT EXISTS `laf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `laf`;

-- --------------------------------------------------------

--
-- Table structure for table `centre`
--

CREATE TABLE IF NOT EXISTS `centre` (
`ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `LOCATION` varchar(150) NOT NULL,
  `CONTACTS` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
`ID` int(11) NOT NULL,
  `DOCUMENT_TYPE` varchar(32) NOT NULL,
  `DOCUMENT_NUMBER` varchar(100) NOT NULL,
  `OWNER` varchar(100) NOT NULL,
  `PICTURE` varchar(100) NOT NULL,
  `FINDER` varchar(32) NOT NULL,
  `LOCATION_FOUND` varchar(23) NOT NULL,
  `DATE` date NOT NULL,
  `DOC_STATUS` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`ID`, `DOCUMENT_TYPE`, `DOCUMENT_NUMBER`, `OWNER`, `PICTURE`, `FINDER`, `LOCATION_FOUND`, `DATE`, `DOC_STATUS`) VALUES
(1, '', '', 'Dennis Kiptugen', '0', 'Alfred Mutua', 'Kenyatta hospital', '2015-08-19', 1),
(2, 'birth certifica', 'c09566732', 'dennis kiptugen', '0', 'maureen Njeri', 'Nairobi Hospital', '2015-08-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_center`
--

CREATE TABLE IF NOT EXISTS `document_center` (
`ID` int(11) NOT NULL,
  `NUMBER` int(11) NOT NULL,
  `CENTER` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_center`
--

INSERT INTO `document_center` (`ID`, `NUMBER`, `CENTER`) VALUES
(4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invalid_logins`
--

CREATE TABLE IF NOT EXISTS `invalid_logins` (
`id` int(11) NOT NULL,
  `employee_name` varchar(30) DEFAULT NULL,
  `tel_no` varchar(15) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `local_ip` varchar(18) DEFAULT NULL,
  `public_ip` varchar(18) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invalid_logins`
--

INSERT INTO `invalid_logins` (`id`, `employee_name`, `tel_no`, `username`, `password`, `local_ip`, `public_ip`, `date`, `status`) VALUES
(1, 'INVALID USER', '00000001', 'admin', 'password', '127.0.0.1', '197.237.80.55\n', '2015-08-19 19:08:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `id` varchar(8) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `email_address` varchar(39) NOT NULL,
  `tel_no` varchar(12) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `image` varchar(100) DEFAULT '../../INCLUDES/USER_IMAGES/images.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `employee_name`, `email_address`, `tel_no`, `branch`, `image`) VALUES
('U9smI84t', 'Dennis Kiptoo', 'dennis.kiptoo@programmer.net', '0713154085', 'Hurlingam Nairobi', '../../INCLUDES/USER_IMAGES/images.jpeg'),
('ZNi1JF8s', 'Allan Kimaina', 'allan@safisol.com', '0713221674', 'Hurlingam Nairobi', '../../INCLUDES/USER_IMAGES/images.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(8) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `passwordstatus` int(11) NOT NULL,
  `usertype` varchar(12) NOT NULL,
  `perm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `passwordstatus`, `usertype`, `perm`) VALUES
('U9smI84t', 'admin', 'd625662744e4c61e46c8c51042a7a989', 1, 'ADMIN', 1),
('ZNi1JF8s', 'clerk', 'dc231b3189c5f7b36f58ac258f30334c', 1, 'CLERK', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centre`
--
ALTER TABLE `centre`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `NUMBER` (`DOCUMENT_NUMBER`);

--
-- Indexes for table `document_center`
--
ALTER TABLE `document_center`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invalid_logins`
--
ALTER TABLE `invalid_logins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centre`
--
ALTER TABLE `centre`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `document_center`
--
ALTER TABLE `document_center`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invalid_logins`
--
ALTER TABLE `invalid_logins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `userdetails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
