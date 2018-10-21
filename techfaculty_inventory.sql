-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2018 at 06:27 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techfaculty_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_submission`
--

DROP TABLE IF EXISTS `inventory_submission`;
CREATE TABLE IF NOT EXISTS `inventory_submission` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Code1` varchar(1000) NOT NULL,
  `Code2` varchar(1000) NOT NULL,
  `Code3` varchar(1000) NOT NULL,
  `Code4` varchar(1000) NOT NULL,
  `Price` varchar(1000) NOT NULL,
  `Quantity` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_submission`
--

INSERT INTO `inventory_submission` (`id`, `Code1`, `Code2`, `Code3`, `Code4`, `Price`, `Quantity`) VALUES
(1, 'A', 'A.4', 'TA', 'TA.5', '12121', '1'),
(2, 'A', 'A.4', 'TA', 'TA.5', '12121', '1');

-- --------------------------------------------------------

--
-- Table structure for table `main_locations`
--

DROP TABLE IF EXISTS `main_locations`;
CREATE TABLE IF NOT EXISTS `main_locations` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `main_val` varchar(1000) NOT NULL,
  `main_location` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_locations`
--

INSERT INTO `main_locations` (`id`, `main_val`, `main_location`) VALUES
(1, '', 'Choose...'),
(2, 'A', '(A) Old Building'),
(3, 'B', '(B) New Building'),
(4, 'C', '(C) Physics Lab'),
(5, 'D', '(D) Chemistry Lab'),
(6, 'E', '(E) Bio Lab');

-- --------------------------------------------------------

--
-- Table structure for table `new_inventory`
--

DROP TABLE IF EXISTS `new_inventory`;
CREATE TABLE IF NOT EXISTS `new_inventory` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Code1` varchar(200) NOT NULL,
  `Main_location` varchar(200) NOT NULL,
  `Sub_location` varchar(200) NOT NULL,
  `Main_inventory_type` varchar(200) NOT NULL,
  `Inventory_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_locations`
--

DROP TABLE IF EXISTS `sub_locations`;
CREATE TABLE IF NOT EXISTS `sub_locations` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `sub_val` varchar(1000) NOT NULL,
  `sub_location` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_locations`
--

INSERT INTO `sub_locations` (`id`, `sub_val`, `sub_location`) VALUES
(1, '', 'Choose...'),
(2, 'A.1', '(A.1) Department of Engineering Technology'),
(3, 'A.2', '(A.2) Mr. Nalin\'s Room'),
(4, 'A.3', '(A.3) Mr. Koswaththa\'s Room'),
(5, 'A.4', '(A.4) Dasith\'s Room'),
(6, 'A.5', '(A.5) Miss. Pabasara\'s Room'),
(7, 'A.6', '(A.6) Mechanical Lecture\'s Room'),
(8, 'A.7', '(A.7) Electrical Lecture\'s Room'),
(9, 'A.8', '(A.8) Computer Lecture\'s Room'),
(10, 'A.9', '(A.9) Computer Lab'),
(11, 'A.10', '(A.10) Dining Room'),
(12, 'A.11', '(A.11) P.I.U(Project Implementation Unit'),
(13, 'A.12', '(A.12) Corridors'),
(14, 'B.1', '(B.1) Office of Dean'),
(15, 'B.2', '(B.2) Sarath\'s Room'),
(16, 'B.3', '(B.3) Department of Bio System'),
(17, 'B.4', '(B.4) Dean\'s Room'),
(18, 'B.5', '(B.5) Sadun\'s Office'),
(19, 'B.6', '(B.6) Academic Registrar Room'),
(20, 'B.7', '(B.7) Corridors'),
(21, 'C.1', '(C.1) Physics Lab'),
(22, 'D.1', '(D.1) Chemistry Lab'),
(23, 'E.1', '(E.1) Bio Lab');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
