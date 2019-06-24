-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2019 at 01:58 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secured_login_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `remember_me`
--

CREATE TABLE `remember_me` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `expire_date` datetime NOT NULL,
  `is_expired` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `remember_me`
--

INSERT INTO `remember_me` (`id`, `user_name`, `selector`, `expire_date`, `is_expired`) VALUES
(1, 'lala1234', 'MzYzZDE5NzRjMDJiMTQ5NWY4ZTliMzM4', '2019-06-26 17:55:45', -1),
(2, 'lala1234', 'OGNhZGVhMDgzOGZhOGQzYTZjNjI5YWRl', '2019-06-26 17:57:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `validation_key` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `user_email`, `user_password`, `validation_key`, `registration_date`, `is_active`) VALUES
(1, 'Sani', 'Kamal', 'sani12', 'sani@example.com', '1234', 'ssdiasiovsaahdsuis', '2019-06-15 00:00:00', 0),
(2, 'maya', 'priya', 'priya123', 'priya123@gmail.com', '$2y$10$0LJdE6nX0YMbrifBt2YMQ.RZsUvTJt6SR1XF49z4GBjjI72dKdBay', '0', '0000-00-00 00:00:00', 0),
(3, 'john', 'mala', 'mala12', 'mala@gmail.com', '$2y$10$5dj.qFEvwV8OcWIxBs3b3OMfY/gLc3jo2ds6Lo6Kf/.V/NNfjtNnC', '0', '2019-06-15 17:53:05', 0),
(4, 'rashmi', 'ahmed', 'rashmi1234', 'rashmi@domain.com', '$2y$10$l3a.Iyp7bf/fx.rBzdL9bODzguN61uIV0BYqZM5W/b5GesqE01yKO', '0', '2019-06-15 18:31:19', 0),
(5, 'sani', 'kamal', 'sani', 'inquiry.qinnovation@gmail.com', '$2y$10$8QPIwCG44pZkKNt5YAfmX.e/Qz4jekHXH6k09oEwHdrML24FIBZh6', '0', '2019-06-17 13:13:32', 0),
(6, 'sani', 'kamal', 'sani78', 'sanikamal223@gmail.com', '$2y$10$OFTHT16jQg1gGge63KqdLud1y.6bsS4jzXoyQ8rAGuQonyj6YZJnq', '0', '2019-06-17 13:23:32', 0),
(7, 'Sani', 'kamal', 'sani87', 'sanikamal223@gmail.com', '$2y$10$0iD2JXnIlOa61BSz4XmuNuqbul3pnn3NcP.sN8VrEA1vRjoTF3YXq', 'ODRhZjdjYTAxZGE2ZTE5MWZmMTkxMzFk', '2019-06-17 13:41:03', 0),
(8, 'sani', 'kamal', 'sani23', 'sanikamal223@gmail.com', '$2y$10$OZhY2dzSrm6X2z.nF37lw.oWRprgcJw8mwX7rZuMdERixEivVtMJi', 'ZGU1ZWM5MmUyMGFjMDgxNWQ3MDkyZDRl', '2019-06-17 16:14:26', 1),
(9, 'sani', 'asasd', 'maya', 'stock1@gmail.com', '$2y$10$IknkA/DT4qHv45sxfqqyG.dLzPHCkYR/WSvP1b7XbuoeipTMvBR9G', 'YjQ4NTAxMDBjODgwMTFhZTRkMDMyOTgw', '2019-06-17 16:36:35', 0),
(10, 'Sami', 'Aktar', 'aktar123', 'sanikamal223@gmail.com', '$2y$10$plnWOxk3fbBNzCBGb41f6eqtAXQG5WvQOG6PeHIhVXSrrugdHfF2q', 'NDAwOGM0OTE0N2UwZDFkYTRhNzAzYjIy', '2019-06-17 18:09:52', 1),
(11, 'kala', 'mala', 'mala1234', 'sanikamal223@gmail.com', '$2y$10$lmmEPUUJpygAPFMU.c4dmebnAUId3uP6vDzAOG1kKK6iOp97KHmpe', 'Zjc2N2QyYjlhNWM4NWIyNjU0NzA1N2Ri', '2019-06-24 12:50:30', 0),
(12, 'maya', 'lala', 'lala1234', 'sanikamal223@gmail.com', '$2y$10$8..HdzbG2RMPWJY6K7SPQO29LhHAHlAC6ld3CL1TIFXdThPf9PwdK', '0', '2019-06-24 17:23:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remember_me`
--
ALTER TABLE `remember_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remember_me`
--
ALTER TABLE `remember_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
