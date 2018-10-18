-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2018 at 05:20 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Code1` varchar(100) NOT NULL,
  `Main Location` varchar(100) NOT NULL,
  `Code2` varchar(100) NOT NULL,
  `Sub Location` varchar(100) NOT NULL,
  `Code3` varchar(100) NOT NULL,
  `Main Inventory Item` varchar(100) NOT NULL,
  `Code4` varchar(100) NOT NULL,
  `Sub Inventory Item` varchar(100) NOT NULL,
  `Price` varchar(10000) NOT NULL,
  `Quantity` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
