-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 09:28 AM
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
  `price` decimal(11,2) NOT NULL,
  `addtl_info` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event-id`, `title`, `description`, `date`, `time`, `location`, `price`, `addtl_info`) VALUES
(20240001, 'Feb-Ibig 2024', 'The Central Student Government presents Feb-Ibig 2024. Get ready for an event filled with activities, fun, and romance!', '2024-03-06', '08:00:00', 'CvSU Bacoor City Campus: Gymnasium', 15.00, 'Pagod ka na ba kakahintay sa chance na makasama mo ang crush mo? Finally, the prolonged wait is over!\n\nGet your partners and friends ready. Join us in 𝗠𝗮𝗿𝗰𝗵 𝟲, 𝟮𝟬𝟮𝟰 (𝗪𝗲𝗱𝗻𝗲𝘀𝗱𝗮𝘆) 𝟴:𝟬𝟬 𝗮𝗺 - 𝟱:𝟬𝟬 𝗽𝗺 for the much awaited 𝗡𝗮𝗸𝗮𝗸𝗮𝗽𝗮𝗴𝗽𝗮𝗯𝗮𝗴𝗮𝗯𝗮𝗴 𝗻𝗮 𝗙𝗲𝗯-𝗜𝗯𝗶𝗴 𝟮𝟬𝟮𝟰: 𝗨𝗻𝗲𝘅𝗽𝗲𝗰𝘁𝗲𝗱 𝗹𝗼𝘃𝗲 𝗰𝗼𝗺𝗲𝘀 𝗳𝗿𝗼𝗺 𝗨𝗻𝗲𝘅𝗽𝗲𝗰𝘁𝗲𝗱 𝗧𝗶𝗺𝗲 (𝗠𝗮𝗿𝗰𝗵 𝗘𝗱𝗶𝘁𝗶𝗼𝗻) at 𝗖𝗮𝘃𝗶𝘁𝗲 𝗦𝘁𝗮𝘁𝗲 𝗨𝗻𝗶𝘃𝗲𝗿𝘀𝗶𝘁𝘆 - 𝗕𝗮𝗰𝗼𝗼𝗿 𝗖𝗶𝘁𝘆 𝗖𝗮𝗺𝗽𝘂𝘀. 🏫🎊\n\nGet excited because there will be a lot of bonding and exciting events, performances, and celebrations—you could say it\'s giving—and don\'t forget to stay connected.'),
(20240002, 'DCS Week 2024\r\n', 'Gear up for DCS Week 2024! Join the Alliance of Computer Scientists and Information Technology Society in a week-long celebration of the Department of Computer Studies.', '2024-04-11', '08:00:00', 'CvSU Bacoor City Campus: Gymnasium', 25.00, 'Get ready to Refresh, Reconnect, and Reload at Hello World! April 11 & 13, 2024 ⏰ 8:00 AM to 5:00 PM Cavite State University - Bacoor City Campus Gymnasium and Computer Laboratory 1 to 4 & Room 301, 303 Hello World is the perfect way to: Level Up your skills with workshops and seminars led by our guest speaker! Party Up with fellow students through interactive sessions and activities. Power Up for the upcoming semester with a refreshing and fun environment.');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `reg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `yearlvl` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `reg_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `addtl_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`reg_id`, `user_id`, `event_id`, `program`, `yearlvl`, `section`, `reg_at`, `payment_mode`, `payment_status`, `addtl_data`) VALUES
(5, 2, 20240001, 'BSCS', '3', '1', '2024-05-23 07:29:19', 'Cash', 'Paid', ''),
(6, 8, 20240001, 'BSIT', '2', '3', '2024-05-23 16:44:48', 'Online', 'Paid', ''),
(7, 1, 20240001, 'admin', 'admin', 'admin', '2024-05-25 05:12:41', 'Online', 'Pending', ''),
(8, 1, 20240002, 'bs', '1', '2', '2024-05-25 05:16:16', 'Cash', 'Pending', '');

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
(2, 'user', 'user@email.com', 123456, '$2y$10$N.SOxT4ePz2uyFfhEBGPGuRkkYNruJoQhfP49kb8K2J7qe1WQg7wC', 'User'),
(8, 'New User', 'newuser@email.com', 123123, '$2y$10$jx7syq7jPx.J1NewsCRXFOrLbwJxmQ/d68OcGW7stRC4tI9hgcpn2', 'User'),
(9, 'Full name', 'fullname@email.com', 123412, '$2y$10$CTJKgM0BLL.hsGhzl5O5UunS0i1YP7JCUxnh96DvEPqDu0XSuLwGO', 'User');

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
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `User foreign key` (`user_id`),
  ADD KEY `Event foreign key` (`event_id`);

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
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `Event foreign key` FOREIGN KEY (`event_id`) REFERENCES `events` (`event-id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `User foreign key` FOREIGN KEY (`user_id`) REFERENCES `users` (`user-id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
