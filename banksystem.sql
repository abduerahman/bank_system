-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2023 at 01:09 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `age`, `balance`) VALUES
(1, 'abdelrhman', 'abc@gmail.com', 20, 2000),
(2, 'ahmed', 'ahmed@gmail.com', 21, 9000),
(3, 'salah', 'salah@gmail.com', 22, 1000),
(4, 'mai', 'mai@gmail.com', 21, 100100),
(5, 'khaled', 'khaled@gmail.com', 23, 100),
(6, 'somia', 'somia@gmail.com', 19, 9500),
(7, 'noone', 'noone@gmail.com', 10, 700),
(8, 'omer', 'omer@gmail.com', 12, 600),
(9, 'shady', 'shady@gmail.com', 42, 1000),
(10, 'soha', 'soha@gmail.com', 22, 100);

-- --------------------------------------------------------

--
-- Table structure for table `transfars`
--

CREATE TABLE `transfars` (
  `id` int(11) NOT NULL,
  `transfar_to` int(11) DEFAULT NULL,
  `transfar_from` int(11) DEFAULT NULL,
  `amount_of_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfars`
--

INSERT INTO `transfars` (`id`, `transfar_to`, `transfar_from`, `amount_of_money`) VALUES
(1, 7, 4, 1),
(2, 7, 4, 100),
(3, 4, 7, 16),
(4, 4, 10, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfars`
--
ALTER TABLE `transfars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfar_to` (`transfar_to`),
  ADD KEY `transfar_from` (`transfar_from`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfars`
--
ALTER TABLE `transfars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfars`
--
ALTER TABLE `transfars`
  ADD CONSTRAINT `transfars_ibfk_1` FOREIGN KEY (`transfar_to`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transfars_ibfk_2` FOREIGN KEY (`transfar_from`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
