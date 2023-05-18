-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2023 at 10:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `building-mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `id` int(11) NOT NULL,
  `balance` float NOT NULL,
  `person_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `building_unit_id` int(11) NOT NULL,
  `accounting_id` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `type`, `price`, `status`, `building_unit_id`, `accounting_id`, `date_created`, `date_updated`) VALUES
(1, 1, 10000, 0, 19, NULL, '2023-05-17 14:55:57', '0000-00-00 00:00:00'),
(2, 3, 20000, 0, 19, NULL, '2023-05-17 14:55:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `person_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `person_id`, `date_created`, `date_updated`) VALUES
(8, 'ساختمان شماره ۸ ویرایش شده', 3, '2023-05-15 14:34:09', '2023-05-15 14:34:09'),
(9, 'ساختمان علی هست', 6, '2023-05-15 16:03:52', '2023-05-15 16:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `building_unit`
--

CREATE TABLE `building_unit` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `number` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building_unit`
--

INSERT INTO `building_unit` (`id`, `building_id`, `person_id`, `number`, `date_created`, `date_updated`) VALUES
(1, 8, NULL, '16', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(2, 8, NULL, '17', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(3, 8, NULL, '18', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(4, 8, NULL, '19', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(5, 8, NULL, '20', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(6, 8, NULL, '21', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(7, 8, NULL, '22', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(8, 8, NULL, '23', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(9, 8, NULL, '24', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(10, 8, NULL, '25', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(11, 8, NULL, '26', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(12, 8, NULL, '27', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(13, 8, NULL, '28', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(14, 8, NULL, '29', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(15, 8, NULL, '30', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(16, 8, NULL, '31', '2023-05-15 14:34:09', '0000-00-00 00:00:00'),
(17, 9, 6, '5', '2023-05-15 16:03:52', '0000-00-00 00:00:00'),
(18, 9, NULL, '6', '2023-05-15 16:03:52', '0000-00-00 00:00:00'),
(19, 9, 7, '7', '2023-05-15 16:03:52', '0000-00-00 00:00:00'),
(20, 9, NULL, '8', '2023-05-15 16:03:52', '0000-00-00 00:00:00'),
(21, 9, NULL, '9', '2023-05-15 16:03:52', '0000-00-00 00:00:00'),
(22, 9, NULL, '10', '2023-05-15 16:03:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `email`, `phone`, `password`, `type`) VALUES
(3, 'amirhossein', 'amir@gmail.com', '12312123123', '$2y$10$MEvsC.VYXHPSos1/Lwjo5uofgOi0RQ9KgQT8hX8mubwCCOELNFX5O', 0),
(4, 'امیرحسین زارعیان', 'amirhossein@gmail.com', '123912412', '$2y$10$AFDO0WsUv6bgX51EEXKOReu.uLYHJKPNdlF3zQ30yE7epqLiikLc2', 1),
(6, 'ali', 'ali@gmail.com', '123124125', '$2y$10$o6.Qe6X6ktZE7P005ReQ0u5TsGesmIcAE2fcjaP/LS7XwMZSuvS9i', 1),
(7, 'm', 'mm@gmail.com', '0129401824', '$2y$10$ZrFcocjbGwSEolHnWjTt0e9yDgPHgI1NRzTLjwoYJSxB.FBT4Ij9e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounting_id` (`accounting_id`),
  ADD KEY `building_unit_id` (`building_unit_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `building_unit`
--
ALTER TABLE `building_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `building_unit`
--
ALTER TABLE `building_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounting`
--
ALTER TABLE `accounting`
  ADD CONSTRAINT `accounting_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`accounting_id`) REFERENCES `accounting` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`building_unit_id`) REFERENCES `building_unit` (`id`);

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Constraints for table `building_unit`
--
ALTER TABLE `building_unit`
  ADD CONSTRAINT `building_unit_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`),
  ADD CONSTRAINT `building_unit_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
