-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 08:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poultry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8 ');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batch_no` varchar(50) CHARACTER SET latin1 NOT NULL,
  `arrived` date NOT NULL DEFAULT current_timestamp(),
  `source` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_no`, `arrived`, `source`) VALUES
(1, 'batch-pms-654', '2023-11-11', 'purchase'),
(2, 'batch-pms-8616', '2023-11-12', 'hatchery'),
(3, 'batch-pms-7376', '2023-11-13', 'hatchery');

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `id` int(11) NOT NULL,
  `birdno` varchar(255) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `health_status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`id`, `birdno`, `breed_id`, `batch_id`, `weight`, `gender`, `health_status`) VALUES
(1, 'bird-fms-9117', 1, 1, '50', 'M', 'healthy'),
(2, 'bird-fms-8180', 1, 2, '40', 'F', 'healthy'),
(19, 'bird-fms-1203', 1, 2, '30', 'M', 'healthy');

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`id`, `name`) VALUES
(1, 'Broiler'),
(2, 'Layer');

-- --------------------------------------------------------

--
-- Table structure for table `contactbook`
--

CREATE TABLE `contactbook` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phoneNumber` varchar(10) CHARACTER SET latin1 NOT NULL,
  `emailAddress` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactbook`
--

INSERT INTO `contactbook` (`id`, `name`, `phoneNumber`, `emailAddress`) VALUES
(15, 'Vet', '9013253100', 'vet@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `egginventory`
--

CREATE TABLE `egginventory` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `date_collected` date NOT NULL,
  `eggs_collected` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `egginventory`
--

INSERT INTO `egginventory` (`id`, `batch_id`, `date_collected`, `eggs_collected`) VALUES
(3, 2, '2023-11-11', '2000'),
(4, 1, '2023-11-11', '100');

-- --------------------------------------------------------

--
-- Table structure for table `feedingschedule`
--

CREATE TABLE `feedingschedule` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `feeding_time` varchar(20) CHARACTER SET latin1 NOT NULL,
  `feed_type` varchar(10) CHARACTER SET latin1 NOT NULL,
  `feed_qty` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedingschedule`
--

INSERT INTO `feedingschedule` (`id`, `batch_id`, `feeding_time`, `feed_type`, `feed_qty`) VALUES
(1, 1, '06:00 AM', 'starter', '5'),
(2, 2, '06:00 PM', 'grower', '10');

-- --------------------------------------------------------

--
-- Table structure for table `quarantine`
--

CREATE TABLE `quarantine` (
  `id` int(11) NOT NULL,
  `bird_no` varchar(50) NOT NULL,
  `date_q` varchar(10) NOT NULL,
  `reason` text NOT NULL,
  `breed` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactbook`
--
ALTER TABLE `contactbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egginventory`
--
ALTER TABLE `egginventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedingschedule`
--
ALTER TABLE `feedingschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarantine`
--
ALTER TABLE `quarantine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactbook`
--
ALTER TABLE `contactbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `egginventory`
--
ALTER TABLE `egginventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedingschedule`
--
ALTER TABLE `feedingschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quarantine`
--
ALTER TABLE `quarantine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
