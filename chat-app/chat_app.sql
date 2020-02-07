-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 08:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `message`, `created_at`) VALUES
(1, 'Rashmi', 'Hello world', '2019-10-23 10:30:23'),
(2, 'Sani Kamal', 'Hey everyone...', '2019-10-23 10:30:23'),
(3, '', '', '2020-02-07 07:01:02'),
(4, 'dfgdf', 'fgdfg', '2020-02-07 07:01:06'),
(5, 'dfgdf', 'fgdfg', '2020-02-07 07:02:14'),
(6, 'ftger', 'ertwer', '2020-02-07 07:02:17'),
(7, 'erter', 'erter', '2020-02-07 07:02:21'),
(8, 'ertret', 'erter', '2020-02-07 07:02:26'),
(9, 'ertret', 'erter', '2020-02-07 07:05:50'),
(10, 'ertret', 'erter', '2020-02-07 07:14:09'),
(11, 'ertret', 'erter', '2020-02-07 07:14:42'),
(12, 'ghdfyj', 'fghstyhrt', '2020-02-07 07:14:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
