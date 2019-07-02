-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 11:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicatioin`
--

CREATE TABLE `applicatioin` (
  `draft_id` varchar(20) NOT NULL,
  `applicant` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `pickup_location` varchar(100) NOT NULL,
  `application_date` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `ending_date` varchar(15) NOT NULL,
  `vehicle_req` varchar(50) NOT NULL,
  `vehicle_issue` varchar(20) NOT NULL,
  `notification` varchar(1) NOT NULL,
  `applied` varchar(1) NOT NULL DEFAULT 'N',
  `status` varchar(200) NOT NULL DEFAULT 'Applied',
  `forwarded` bigint(20) NOT NULL,
  `issued_by` varchar(20) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicatioin`
--

INSERT INTO `applicatioin` (`draft_id`, `applicant`, `receiver`, `message`, `pickup_location`, `application_date`, `department`, `start_date`, `ending_date`, `vehicle_req`, `vehicle_issue`, `notification`, `applied`, `status`, `forwarded`, `issued_by`, `log`) VALUES
('GPIQ62484', 2, 6, '', '', '', '1', '', '', 'Car', '', 'Y', 'Y', '', 0, '', ''),
('SCQZ230925', 6, 1, '', '', '', '1', '', '', '', '', 'Y', 'N', '', 0, '', ''),
('WEHR231059', 6, 1, '', '', '', '1', '', '', '', '', 'Y', 'N', '', 0, '', ''),
('ZGUA230553', 6, 1, 'pam pam', 'moti maa ke paas', '', '1', '2019-05-29', '2019-05-29', 'car', '', 'Y', 'Y', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` text NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `address_l1` varchar(20) NOT NULL,
  `address_l2` varchar(20) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `identification` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `auth_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `image`, `f_name`, `m_name`, `surname`, `dob`, `house_no`, `address_l1`, `address_l2`, `landmark`, `pincode`, `city`, `state`, `country`, `mail_id`, `phone`, `blood_group`, `identification`, `department`, `auth_level`) VALUES
(2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Pamela ', '', 'Banerjee', '', '', '', '', '', 0, '', '', '', 'pamelabanerjee11@gmail.com', 0, '', '', 'HR', 5),
(6, '5723fd42d69df94be995fe69de96dbbe0b12d1d5', '', 'Prashant', 'Kumar', 'Prasad', '', '', '', '', '', 832108, '', '', '', 'pkp@pkp.com', 2147483647, 'A+', '', 'IT', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `no` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `subtype` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `app_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`no`, `type`, `subtype`, `status`, `location`, `app_id`) VALUES
('JH05AC1234', 'Bus', 'TATA Sumo', 'Available', 'Inside company', 'OERG60476');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicatioin`
--
ALTER TABLE `applicatioin`
  ADD PRIMARY KEY (`draft_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_id` (`mail_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
