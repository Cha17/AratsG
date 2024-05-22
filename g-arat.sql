-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 07:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g-arat`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event-id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `addtl_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event-id`, `title`, `description`, `date`, `time`, `location`, `price`, `addtl_info`) VALUES
(20240001, 'Feb-Ibig 2024', 'The Central Student Government presents Feb-Ibig 2024. Get ready for an event filled with activities, fun, and romance!', '2024-03-06', '09:00:00', 'CvSU Bacoor City Campus: Gymnasium', 15, ''),
(20240002, 'DCS Week 2024\r\n', 'Gear up for DCS Week 2024! Join the Alliance of Computer Scientists and Information Technology Society in a week-long celebration of the Department of Computer Studies.', '2024-04-11', '09:00:00', 'CvSU Bacoor City Campus: Gymnasium', 15, '');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `reg-id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL,
  `event-id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reg_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `addtl_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user-id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `studentNum` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user-id`, `fullname`, `email`, `studentNum`, `password`, `role`) VALUES
(1, 'admin', 'admin@email.com', 245245, '$2y$10$GBVjt27rSqldANCqQl/2Zecs7zHrD9MLBZz5.LMRXGSiEr007Yu4y', 'Admin'),
(2, 'user', 'user@email.com', 123456, '$2y$10$N.SOxT4ePz2uyFfhEBGPGuRkkYNruJoQhfP49kb8K2J7qe1WQg7wC', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event-id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`reg-id`),
  ADD KEY `User foreign key` (`user-id`),
  ADD KEY `Event foreign key` (`event-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20240003;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `reg-id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `Event foreign key` FOREIGN KEY (`event-id`) REFERENCES `events` (`event-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User foreign key` FOREIGN KEY (`user-id`) REFERENCES `users` (`user-id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
