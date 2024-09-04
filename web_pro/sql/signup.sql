-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2023 at 02:38 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`firstname`, `lastname`, `email`, `dob`, `password`) VALUES
('laith', 'khater', 'leth123khater@gmail.com', '2001-08-31', 'Laith123@'),
('laith', 'khater', 'leth123khater@gmail.com', '2001-08-31', 'Laith123@'),
('laith', 'khater', 'leth123khater@gmail.com', '2001-09-22', 'LAith321@'),
('rawad', 'bdr', 'rawad3001@gmail.com', '1996-09-21', 'RawadB123@'),
('ads', 'asd', 'dasdasfas@fdsfsd', '1111-02-11', '123LKlklk'),
('Maya', 'Zahwy', 'mayazahwy123@gmail.com', '2004-04-21', 'Maya123@'),
('drcf', 'khater', 'dfvgb@ftg.com', '2017-11-16', 'Laith123#'),
('Raneem', 'KH', 'raneem@gmail.com', '2023-06-06', 'Raneem1@');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
