-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 03:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'admin@hs-weingarten.de', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `id` int(11) NOT NULL,
  `tracker_id` varchar(255) NOT NULL,
  `gsmogps` varchar(256) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `latitude` varchar(256) NOT NULL,
  `longitude` varchar(256) NOT NULL,
  `mcc` varchar(11) NOT NULL,
  `mnc` varchar(11) NOT NULL,
  `lac` varchar(11) NOT NULL,
  `cellid1` varchar(11) NOT NULL,
  `signal1` varchar(11) NOT NULL,
  `cellid2` varchar(11) NOT NULL,
  `signal2` varchar(11) NOT NULL,
  `cellid3` varchar(11) NOT NULL,
  `signal3` varchar(11) NOT NULL,
  `cellid4` varchar(11) NOT NULL,
  `signal4` varchar(11) NOT NULL,
  `cellid5` varchar(11) NOT NULL,
  `signal5` varchar(11) NOT NULL,
  `cellid6` varchar(11) NOT NULL,
  `signal6` varchar(11) NOT NULL,
  `cellid7` varchar(11) NOT NULL,
  `signal7` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`id`, `tracker_id`, `gsmogps`, `datetime`, `latitude`, `longitude`, `mcc`, `mnc`, `lac`, `cellid1`, `signal1`, `cellid2`, `signal2`, `cellid3`, `signal3`, `cellid4`, `signal4`, `cellid5`, `signal5`, `cellid6`, `signal6`, `cellid7`, `signal7`) VALUES
(38, '2', 'gsm', '2022-25-02-13-04-12', '47.810926', '9.637748', '262', '3', '59168', '39286', '-61', '59286', '-79', '19286', '-91', '9982', '-93', '29982', '-101', '19758', '-101', '0', '0'),
(40, '11', 'gps', '2022-25-02-13-04-12', '47.8031', '09.6540', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '11', 'gps', '2022-25-02-13-04-12', '47.8031', '09.6540', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, '11', 'gps', '2022-25-02-13-04-12', '47.8031', '09.6540', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, '11', 'gps', '2022-25-02-13-04-12', '47.8031', '09.6540', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '11', 'gps', '2022-25-02-13-04-12', '47.8031', '09.6540', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '11', 'gps', '2022-25-02-13-04-12', '47.8031', '09.6540', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracker`
--
ALTER TABLE `tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
