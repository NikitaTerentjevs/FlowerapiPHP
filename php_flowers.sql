-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 11:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_flowers`
--

-- --------------------------------------------------------

--
-- Table structure for table `flowers`
--

CREATE TABLE `flowers` (
  `name` char(60) NOT NULL,
  `season` char(60) DEFAULT NULL,
  `harvest_country` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flowers`
--

INSERT INTO `flowers` (`name`, `season`, `harvest_country`) VALUES
('Carnation', 'Winter', 'India'),
('Cherry Blossom', 'Spring', 'Japan'),
('Daffodil', 'Spring', 'Canada'),
('Daisy', 'Spring', 'UK'),
('Lily', 'Summer', 'France'),
('Orchid', 'Fall', 'Thailand'),
('Poinsettia', 'Winter', 'Mexico'),
('Rose', 'Spring', 'USA'),
('Sunflower', 'Summer', 'Argentina'),
('Tulip', 'Spring', 'Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `ID` int(11) NOT NULL,
  `flower_name` char(60) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`ID`, `flower_name`, `price`, `description`) VALUES
(1, 'Orchid', 12.03, 'Description for Orchid'),
(2, 'Carnation', 58.69, 'Description for Carnation'),
(3, 'Sunflower', 44.09, 'Description for Sunflower'),
(4, 'Cherry Blossom', 19.85, 'Description for Cherry Blossom'),
(5, 'Daffodil', 58.99, 'Description for Daffodil'),
(6, 'Daisy', 52.13, 'Description for Daisy'),
(7, 'Rose', 44.69, 'Description for Rose'),
(8, 'Poinsettia', 12.79, 'Description for Poinsettia'),
(9, 'Lily', 19.54, 'Description for Lily'),
(10, 'Tulip', 45.55, 'Description for Tulip'),
(16, 'Daisy', 57.14, 'Description for Daisy'),
(17, 'Carnation', 24.18, 'Description for Carnation'),
(18, 'Cherry Blossom', 30.94, 'Description for Cherry Blossom'),
(19, 'Daffodil', 30.3, 'Description for Daffodil'),
(20, 'Orchid', 30.97, 'Description for Orchid'),
(21, 'Lily', 22.9, 'Description for Lily'),
(22, 'Poinsettia', 42.37, 'Description for Poinsettia'),
(23, 'Tulip', 48.25, 'Description for Tulip'),
(24, 'Rose', 36.2, 'Description for Rose'),
(25, 'Sunflower', 16.53, 'Description for Sunflower'),
(31, 'Cherry Blossom', 28.6, 'Description for Cherry Blossom'),
(32, 'Orchid', 46.97, 'Description for Orchid'),
(33, 'Poinsettia', 26.43, 'Description for Poinsettia'),
(34, 'Daisy', 35.93, 'Description for Daisy'),
(35, 'Daffodil', 14.91, 'Description for Daffodil'),
(36, 'Rose', 39.53, 'Description for Rose'),
(37, 'Sunflower', 23.2, 'Description for Sunflower'),
(38, 'Tulip', 44.97, 'Description for Tulip'),
(39, 'Lily', 58.44, 'Description for Lily'),
(40, 'Carnation', 59.82, 'Description for Carnation');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `listing` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `date_ordered` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` char(60) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `username` char(60) DEFAULT NULL,
  `user_type` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `username`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(6, 'iqwndqwnq@sdfasf.com', '1234', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `flower_name` (`flower_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `listing` (`listing`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`flower_name`) REFERENCES `flowers` (`name`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`listing`) REFERENCES `listings` (`ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
