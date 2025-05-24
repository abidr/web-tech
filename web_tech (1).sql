-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2025 at 07:59 AM
-- Server version: 10.11.6-MariaDB-log
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `balance` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `dob`, `gender`, `business_name`, `business_type`, `logo`, `balance`) VALUES
(13, 'Abidur', 'Rahman', 'abid@test.com', '12345678', '01631262589', '2025-05-13', 'Male', 'Acme', 'food', '683231b41046e.jpg', 4059),
(14, 'Abidur', 'Rahman', 'abid2@test.com', '12345678', '01631262589', '2025-05-13', 'Male', 'Acme', 'food', '683231b41046e.jpg', 941);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `merchant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `description`, `amount`, `status`, `type`, `merchant_id`) VALUES
(3, '2025-05-24 23:52:53', 'Received from abid@test.com', 322, 'Completed', 'credit', 14),
(4, '2025-05-24 23:52:53', 'Sent to abid2@test.com', 322, 'Completed', 'debit', 13),
(5, '2025-05-24 23:53:17', 'Received from abid@test.com', 500, 'Completed', 'credit', 14),
(6, '2025-05-24 23:53:17', 'Sent to abid2@test.com', 500, 'Completed', 'debit', 13),
(7, '2025-05-24 23:54:26', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(8, '2025-05-24 23:54:26', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(9, '2025-05-24 23:54:36', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(10, '2025-05-24 23:54:36', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(11, '2025-05-24 23:54:41', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(12, '2025-05-24 23:54:41', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(13, '2025-05-24 23:54:55', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(14, '2025-05-24 23:54:55', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(15, '2025-05-24 23:56:19', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(16, '2025-05-24 23:56:19', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(17, '2025-05-24 23:56:34', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(18, '2025-05-24 23:56:34', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(19, '2025-05-24 23:56:54', 'Received from abid@test.com', 10, 'Completed', 'credit', 14),
(20, '2025-05-24 23:56:54', 'Sent to abid2@test.com', 10, 'Completed', 'debit', 13),
(21, '2025-05-24 23:57:35', 'Received from abid@test.com', 28, 'Completed', 'credit', 14),
(22, '2025-05-24 23:57:35', 'Sent to abid2@test.com', 28, 'Completed', 'debit', 13),
(23, '2025-05-24 23:58:35', 'Received from abid@test.com', 21, 'Completed', 'credit', 14),
(24, '2025-05-24 23:58:35', 'Sent to abid2@test.com', 21, 'Completed', 'debit', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_id` (`merchant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
