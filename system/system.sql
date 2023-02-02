-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `user_type` varchar(10) NOT NULL COMMENT 'Type',
  `user_name` varchar(50) NOT NULL COMMENT 'Name',
  `user_date` date NOT NULL COMMENT 'Date',
  `user_time` time NOT NULL COMMENT 'Time',
  `user_note` varchar(500) NOT NULL COMMENT 'Note',
  `pet_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`user_id`, `user_type`, `user_name`, `user_date`, `user_time`, `user_note`, `pet_desc`) VALUES
(1, 'ลาป่วย', '', '2023-01-27', '15:58:00', 'ติดโควิดด', NULL),
(87, 'ลาป่วย', 'มูนมิน', '2023-01-27', '14:25:00', 'ติดโควิด', NULL),
(88, 'ลากิจ', '', '2023-01-27', '12:50:00', 'ไปงานบวช', NULL),
(89, 'ลากิจ', '', '2023-01-27', '12:50:00', 'ไปงานบวช', NULL),
(90, 'ลากิจ', '', '2023-01-27', '12:53:00', 'ไปงานบวช', NULL),
(103, 'ลากิจ', '', '2023-02-05', '08:30:00', 'ไปงานแต่งงาน', NULL),
(104, 'ลาป่วย', '', '2023-01-13', '18:46:00', 'ปวดท้อง', NULL),
(105, 'ลาป่วย', '', '2023-01-28', '06:00:00', 'ไปทำฟัน', NULL),
(106, 'ลากิจ', '', '2023-01-27', '16:58:00', '222', NULL),
(107, 'ลากิจ', '', '2023-02-18', '12:01:00', '123', NULL),
(108, 'ลาป่วย', '', '2023-02-03', '19:42:00', 'ลาป่วย', NULL),
(109, 'ลาป่วย', '', '2023-02-03', '19:42:00', 'ลาป่วย', NULL),
(110, '', '', '2023-02-02', '15:44:00', 'ลาป่วย', NULL),
(111, '', 'ฉัตรชัย สมสกุล', '2023-02-02', '15:44:00', 'ลาป่วย', NULL),
(112, '', 'ฉัตรชัย สมสกุล', '2023-02-02', '15:46:00', 'ลาป่วย', NULL),
(113, '', 'ฉัตรชัย สมสกุล', '2023-02-02', '15:46:00', 'ลาป่วย', NULL),
(114, '', 'ฉัตรชัย สมสกุล', '2023-02-02', '15:48:00', 'ลาป่วย', NULL),
(115, '', 'ฉัตรชัย สมสกุล', '2023-02-02', '15:48:00', 'ลาป่วย', NULL),
(7702506, 'ลากิจ', 'ฉัตรชัย สมสกุล', '2023-02-02', '15:54:00', 'ลาป่วย', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `user_id` int(7) NOT NULL COMMENT 'รหัสพนักงาน',
  `user_name` varchar(50) NOT NULL COMMENT 'Name',
  `user_email` varchar(50) NOT NULL COMMENT 'Username',
  `user_passwd` varchar(100) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`user_id`, `user_name`, `user_email`, `user_passwd`) VALUES
(7702502, 'ธันย์ชนก เจริญฟูประเสริฐ', 'thanchanokcha@cpall.co.th', '1'),
(7702506, 'ฉัตรชัย สมสกุล', 'chatchaisom@cpall.co.th', '2');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_passwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`user_id`, `user_name`, `user_email`, `user_passwd`) VALUES
(7702506, 'ฉัตรชัย สมสกุล', 'chatchaisom@cpall.co.th', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=7702507;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
