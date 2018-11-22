-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 01:45 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hitek_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) COLLATE utf8_estonian_ci NOT NULL,
  `status` int(1) NOT NULL,
  `email_address` text COLLATE utf8_estonian_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `admin_name`, `status`, `email_address`, `username`, `password`) VALUES
(1, 'admin', 1, 'admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `creative`
--

CREATE TABLE `creative` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_estonian_ci NOT NULL,
  `content` text COLLATE utf8_estonian_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `creative`
--

INSERT INTO `creative` (`id`, `type`, `content`, `status`) VALUES
(1, 'jokes', 'hahahadx', 1),
(2, 'quotes', 'shhhhs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_question`
--

CREATE TABLE `general_question` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8_estonian_ci NOT NULL,
  `response` text COLLATE utf8_estonian_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `general_question`
--

INSERT INTO `general_question` (`id`, `question`, `response`, `status`) VALUES
(1, 'adadas', '', 0),
(2, 'asd', '', 0),
(4, 'kkks', 'kkks', 1),
(6, 'asdasds', 's', 1),
(7, 'Cagas', 'agagaga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unrecognize`
--

CREATE TABLE `unrecognize` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8_estonian_ci NOT NULL,
  `date_save` date NOT NULL,
  `time_save` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `unrecognize`
--

INSERT INTO `unrecognize` (`id`, `question`, `date_save`, `time_save`) VALUES
(4, 'hello', '2018-11-09', '17:00:00'),
(5, 'awerwer', '2018-11-09', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fi_id` int(11) NOT NULL,
  `fb_name` varchar(150) COLLATE utf8_estonian_ci NOT NULL,
  `status` int(1) NOT NULL,
  `date_save` date NOT NULL,
  `time_save` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creative`
--
ALTER TABLE `creative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_question`
--
ALTER TABLE `general_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unrecognize`
--
ALTER TABLE `unrecognize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `creative`
--
ALTER TABLE `creative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_question`
--
ALTER TABLE `general_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unrecognize`
--
ALTER TABLE `unrecognize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
