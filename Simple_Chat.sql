-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2017 at 04:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Simple_Chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_user`
--

CREATE TABLE `all_user` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `all_user`
--

INSERT INTO `all_user` (`id`, `name`, `pass`) VALUES
(4, 'phucdeptrai', '$2y$10$rGLS0QALZSPNTLPbu4j26OmO5vZQwWackPXBiWJz5gtMjDi1KtwDi'),
(5, 'test1', '$2y$10$HnBQAXRljHrYAEp3ZfIS5.jwXl/USJ.zbG9/iXQxzgEOgiOPU/iGi'),
(6, 'test2', '$2y$10$mWv9xp0P1TtyU/t5VIbwZeugl8PiLXEob/Ga4VNhI4cOOEpm/tMKW'),
(7, 'test3', '$2y$10$0KxlS72.o42nsO4hIllK9uIf48SL//tMzrPWHMEx60MH/PFysN7.q'),
(8, 'test4', '$2y$10$ZKNp3uyzcPKI/zyrBANlCuk87f.AdAWA1fKBi21gcNzycccCdoGvG'),
(9, 'anny', '$2y$10$0oRv7RTgdTCfKfe1RHYoMOMTwbQ2FBU9FzxUMxKqxN2bux7IZLb36'),
(10, 'baby', '$2y$10$cCfQF7u0CN59CerfQvqYMefxwBYS0wTruvqwKaIolz4RD8kTy1lXm');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `from_user` int(5) DEFAULT NULL,
  `to_user` int(5) DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `state` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'not_seen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `content`, `from_user`, `to_user`, `send_time`, `state`) VALUES
(29, 'abc', 4, 5, '2017-09-01 21:28:07', 'not_seen'),
(30, 'tui dep trai lam nha', 4, 5, '2017-09-01 21:28:20', 'not_seen'),
(31, 'ddd', 4, 5, '2017-09-01 21:28:25', 'not_seen'),
(32, 'ddd', 4, 5, '2017-09-01 21:28:27', 'not_seen'),
(33, 'ddd', 4, 5, '2017-09-01 21:28:28', 'not_seen'),
(34, 'ddd', 4, 5, '2017-09-01 21:28:28', 'not_seen'),
(35, 'ddd', 4, 5, '2017-09-01 21:28:28', 'not_seen'),
(36, 'ddd', 4, 5, '2017-09-01 21:28:28', 'not_seen'),
(37, 'ddd', 4, 5, '2017-09-01 21:28:29', 'not_seen'),
(38, 'ddd', 4, 5, '2017-09-01 21:28:29', 'not_seen'),
(39, 'ddd', 4, 5, '2017-09-01 21:28:29', 'not_seen'),
(40, 'ddd', 4, 5, '2017-09-01 21:28:29', 'not_seen'),
(41, 'ddd', 4, 5, '2017-09-01 21:28:29', 'not_seen'),
(42, 'ddd', 4, 5, '2017-09-01 21:28:30', 'not_seen'),
(43, 'ddd', 4, 5, '2017-09-01 21:28:30', 'not_seen'),
(44, 'ddd', 4, 5, '2017-09-01 21:28:30', 'not_seen'),
(45, 'ddd', 4, 5, '2017-09-01 21:28:30', 'not_seen'),
(46, 'ddd', 4, 5, '2017-09-01 21:28:30', 'not_seen'),
(47, 'ddd', 4, 5, '2017-09-01 21:28:30', 'not_seen'),
(48, 'ddd', 4, 5, '2017-09-01 21:28:31', 'not_seen'),
(49, 'ddd', 4, 5, '2017-09-01 21:28:31', 'not_seen'),
(50, 'ddd', 4, 5, '2017-09-01 21:28:31', 'not_seen'),
(51, 'ddd', 4, 5, '2017-09-01 21:28:31', 'not_seen'),
(52, 'ddd', 4, 5, '2017-09-01 21:28:31', 'not_seen'),
(53, 'ddd', 4, 5, '2017-09-01 21:28:32', 'not_seen'),
(54, 'ddd', 4, 5, '2017-09-01 21:28:32', 'not_seen'),
(55, 'ddd', 4, 5, '2017-09-01 21:28:32', 'not_seen'),
(56, 'ddd', 4, 5, '2017-09-01 21:28:32', 'not_seen'),
(57, 'ddd', 4, 5, '2017-09-01 21:28:32', 'not_seen'),
(58, 'ddd', 4, 5, '2017-09-01 21:28:32', 'not_seen'),
(59, 'ddd', 4, 5, '2017-09-01 21:28:33', 'not_seen'),
(60, 'ddd', 4, 5, '2017-09-01 21:28:33', 'not_seen'),
(61, 'ddd', 4, 5, '2017-09-01 21:28:34', 'not_seen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_user`
--
ALTER TABLE `all_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_user`
--
ALTER TABLE `all_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
