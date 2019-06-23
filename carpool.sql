-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 10:09 AM
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
  `id` varchar(20) NOT NULL,
  `draft_id` varchar(20) NOT NULL,
  `applicant` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `application_date` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `req_date` varchar(10) NOT NULL,
  `ending_date` varchar(10) NOT NULL,
  `vehicle_req` varchar(50) NOT NULL,
  `vechile_issue` varchar(20) NOT NULL,
  `notification` varchar(1) NOT NULL,
  `issued_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` text NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `house_no` varchar(10) NOT NULL,
  `address l1` varchar(20) NOT NULL,
  `address l2` varchar(20) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `country` varchar(20) NOT NULL,
  `mail_id` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `blood_group` varchar(2) NOT NULL,
  `identification` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `auth_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vechile`
--

CREATE TABLE `vechile` (
  `v_no` varchar(20) NOT NULL,
  `v_type` varchar(20) NOT NULL,
  `subtype` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `location` varchar(30) NOT NULL,
  `app_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicatioin`
--
ALTER TABLE `applicatioin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `draft_id` (`draft_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_id` (`mail_id`);

--
-- Indexes for table `vechile`
--
ALTER TABLE `vechile`
  ADD PRIMARY KEY (`v_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
