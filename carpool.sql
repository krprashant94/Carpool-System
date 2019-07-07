-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 12:28 PM
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
  `applicant` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `pickup_location` varchar(100) NOT NULL,
  `application_date` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `start_date` bigint(20) NOT NULL,
  `ending_date` bigint(20) NOT NULL,
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
('845949OHWN', 6, 6, 'cae', 'car', '1562403410', 'CSE', 1561923000, 1562268600, 'car', 'JH05AC1234', 'Y', 'Y', '0', 6, '6', '<br>Prashant Kumar Prasad (IT) : Forwarded to Prashant Kumar Prasad with message - pa<br>Prashant Kumar Prasad (IT) : Forwarded to Prashant Kumar Prasad with message - pass<br>Prashant Kumar Prasad (IT) : Approved your request.'),
('846040RYOM', 6, 6, 'sms', 'car', '1562431191', 'Transport', 1563521400, 1563525000, 'Bus', 'JH05AC1234', 'Y', 'Y', 'Approved by Pamela   Banerjee(Transport)', 2, '2', '<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - all ok<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - pass<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - pass<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - pass<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - s<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - s<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - ok pass<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Prashant Kumar Prasad with message - ok<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Pamela   Banerjee with message - pass checked<br>Pamela   Banerjee (Transport) : Approved your request.'),
('865178OBEG', 2, 6, 'no description', 'main gate', '1562432556', 'Human Resource', 1561923000, 1562578140, 'Bus', 'JH05AC1234', 'Y', 'Y', '', 6, '6', '<br>Prashant Kumar Prasad (Human Resource) : Forwarded to Pamela   Banerjee with message - pass<br>Prashant Kumar Prasad (Human Resource) : Approved your request.');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`name`) VALUES
('Transport'),
('Human Resource'),
('Finnance');

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
  `dl_no` varchar(20) NOT NULL,
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

INSERT INTO `user` (`id`, `password`, `image`, `f_name`, `m_name`, `surname`, `dob`, `dl_no`, `house_no`, `address_l1`, `address_l2`, `landmark`, `pincode`, `city`, `state`, `country`, `mail_id`, `phone`, `blood_group`, `identification`, `department`, `auth_level`) VALUES
(2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Pamela ', '', 'Banerjee', '', '1', '', 'l1', 'l2', 'landmark', 0, 'jsr', 'jhar', 'india', 'pamelabanerjee11@gmail.com', 123456789, '', 'idf', 'Transport', 5),
(6, '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'Prashant', 'Kumar', 'Prasad', '1', 'DDLJ2003', '12', 'line 1', 'line 2', 'Main road', 832108, 'Jamshedpur', 'Jharkhand', 'India', 'kr.prashant94@gmail.com', 2147483647, 'A+', 'mole mark', 'Human Resource', 5);

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
  `app_id` varchar(30) NOT NULL,
  `driver` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`no`, `type`, `subtype`, `status`, `location`, `app_id`, `driver`) VALUES
('JH05AC1234', 'Car', 'tata sumo', 'Last issue to Prashant Kumar Prasad', 'Inside company', '0', 0);

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
