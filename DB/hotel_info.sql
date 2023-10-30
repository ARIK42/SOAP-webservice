-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 11:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `UnitID` varchar(5) NOT NULL,
  `Hotel` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Rate` decimal(6,2) NOT NULL,
  `Available` varchar(3) NOT NULL,
  `Capacity` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`UnitID`, `Hotel`, `Location`, `Rate`, `Available`, `Capacity`) VALUES
('1', 'Sofitel', 'Kuala Lumpur', '350.00', 'Yes', '2'),
('2', 'Hilton', 'Petaling Jaya', '400.00', 'No', '3'),
('3', 'Ramada', 'Cyberjaya', '250.00', 'Yes', '1'),
('4', 'Royal Chulan', 'Damansara', '189.00', 'Yes', '1'),
('5', 'Ascott', 'Penang', '500.00', 'No', '2'),
('6', 'Berjaya Hotels & Resort', 'Kuala Lumpur', '750.00', 'Yes', '2'),
('7', 'Sheraton', 'Petaling Jaya', '325.00', 'Yes', '2'),
('8', 'Grand Hyatt', 'Kuala Lumpur', '425.00', 'No', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`UnitID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
