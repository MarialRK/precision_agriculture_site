-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 04:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `precision_agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `soil_health`
--

CREATE TABLE `soil_health` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `soil_moisture` decimal(5,2) DEFAULT NULL,
  `soil_nutrients` decimal(5,2) DEFAULT NULL,
  `temperature` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soil_health`
--

INSERT INTO `soil_health` (`id`, `user_id`, `soil_moisture`, `soil_nutrients`, `temperature`, `created_at`) VALUES
(1, NULL, '65.50', '45.20', '22.50', '2024-11-24 01:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` enum('farmer','admin') DEFAULT 'farmer',
  `language` enum('en','ar','din') DEFAULT 'en',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone`, `role`, `language`, `created_at`) VALUES
(1, 'Jaden', '$2y$10$.bmyvKswVic1VIal/xHOS.7ccDsZw/md43zn13t2YfiepCNZnvOm6', 'jaden@gmail.com', '0926221199', 'admin', 'en', '2024-11-24 01:37:17'),
(2, 'Reeng', '$2y$10$FqWzfw018TU2CTnYB7Nrwe0k8c/kyb1K54Fs9MGbkDJs7EX6viJnW', 'reengbior@gmail.com', '0926778899', 'farmer', 'ar', '2024-11-24 01:38:09'),
(4, 'Deng', '$2y$10$zib2orhBForOeyFphxfcUO/EQgWlJHtGY2yzDncvLB87b02Rcj9h2', 'deng@gmail.com', '0926778810', 'farmer', 'en', '2024-11-24 02:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `weather_updates`
--

CREATE TABLE `weather_updates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `weather_condition` varchar(255) DEFAULT NULL,
  `temperature` decimal(5,2) DEFAULT NULL,
  `humidity` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weather_updates`
--

INSERT INTO `weather_updates` (`id`, `user_id`, `weather_condition`, `temperature`, `humidity`, `created_at`) VALUES
(1, NULL, 'Sunny', '28.50', '60.00', '2024-11-24 01:31:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `soil_health`
--
ALTER TABLE `soil_health`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `weather_updates`
--
ALTER TABLE `weather_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `soil_health`
--
ALTER TABLE `soil_health`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weather_updates`
--
ALTER TABLE `weather_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `soil_health`
--
ALTER TABLE `soil_health`
  ADD CONSTRAINT `soil_health_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `weather_updates`
--
ALTER TABLE `weather_updates`
  ADD CONSTRAINT `weather_updates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
