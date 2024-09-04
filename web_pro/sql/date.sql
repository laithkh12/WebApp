-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2023 at 02:37 PM
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
-- Table structure for table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `dateto` date NOT NULL,
  `time` varchar(45) NOT NULL,
  `forwhat` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`dateto`, `time`, `forwhat`) VALUES
('2023-05-01', '15:05', 'lack jl'),
('2023-05-01', '15:13', 'lack jl'),
('2023-05-01', '10:00', 'lack jl'),
('2023-05-08', '10:00', 'lack jl'),
('2023-05-01', '12:00', 'lack jl'),
('2023-05-16', '14:30', 'lack jl'),
('2023-05-14', '10:30', 'lack jl'),
('2023-05-02', '12:00', 'lack jl'),
('2023-05-09', '9:30', 'lack jl'),
('2023-06-01', '10:00', 'lack jl'),
('2023-06-12', '9:00', 'lack jl'),
('2023-06-12', '10:00', 'lack jl');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
