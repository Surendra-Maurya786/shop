-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2021 at 10:15 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `itemshow`
--

DROP TABLE IF EXISTS `itemshow`;
CREATE TABLE IF NOT EXISTS `itemshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemshow`
--

INSERT INTO `itemshow` (`id`, `name`, `image`, `price`) VALUES
(1, 'Coke', 'cokeicon.jpg', '20'),
(2, 'Fries', 'frenchicon.jpg', '40'),
(3, 'Aloo Tikki', 'alooicon.jpg', '20'),
(4, 'Veg Thali', 'vegthali.jpg', '50'),
(5, 'Vada Pav', 'vadapavicon.jpg', '10'),
(7, 'Frankie', 'frankie.jpg', '50'),
(8, 'Chiken Frankie', 'frankie.jpg', '40');

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

DROP TABLE IF EXISTS `userregister`;
CREATE TABLE IF NOT EXISTS `userregister` (
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`fullname`, `username`, `password`, `email`) VALUES
('surendra', 'surendra', '123', 'surendra@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
