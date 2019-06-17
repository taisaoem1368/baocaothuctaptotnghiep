-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 06:22 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailieuweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `motos`
--

CREATE TABLE `motos` (
  `moto_id` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moto_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moto_weight` int(255) DEFAULT NULL,
  `moto_size` int(55) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motos`
--

INSERT INTO `motos` (`moto_id`, `moto_name`, `moto_color`, `moto_weight`, `moto_size`) VALUES
('59T1-55555', 'Xe máy Yamaha Exciter 150', 'Đen', 117, 150),
('12331as1dasd', 'hhhhhhhhhhh', 'asdasdasd', 12123, 123123),
('59T1-55554', '1', '2', 3, 4),
('59T1-77777', 'Xe máy Yamaha Exciter 150', 'Đen', 117, 150),
('59T1-77772', 'Xe máy Yamaha Exciter 150', 'Đen', 117, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`moto_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
