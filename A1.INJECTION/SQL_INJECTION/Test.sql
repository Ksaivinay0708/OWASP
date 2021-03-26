-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2018 at 05:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Names`
--

CREATE TABLE `Names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `First Name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Last Name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Login` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Names`
--

INSERT INTO `Names` (`id`, `First Name`, `Last Name`, `Login`, `Password`) VALUES
(1, 'Petr', 'Petrov', 'Petr123', 'Pass123'),
(2, 'Ivan', 'Ivanov', 'Ivan123', 'Ivan123'),
(3, 'Sidor', 'Sidorov', 'Sidor123', 'pass123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Names`
--
ALTER TABLE `Names`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Names`
--
ALTER TABLE `Names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
