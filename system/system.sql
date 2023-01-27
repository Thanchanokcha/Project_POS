-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 07:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `user_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Type',
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name',
  `user_date` date NOT NULL COMMENT 'Date',
  `user_time` time NOT NULL COMMENT 'Time',
  `user_note` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Note',
  `pet_desc` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`user_id`, `user_type`, `user_name`, `user_date`, `user_time`, `user_note`, `pet_desc`) VALUES
(1, 'ลาป่วย', '', '2023-01-27', '15:58:00', 'ติดโควิดด', NULL),
(86, 'สุนัข', 'ชานม', '2023-01-27', '00:00:00', '086-xxx-xxxx', NULL),
(87, 'ลาป่วย', 'มูนมิน', '2023-01-27', '14:25:00', 'ติดโควิด', NULL),
(88, 'ลากิจ', '', '2023-01-27', '12:50:00', 'ไปงานบวช', NULL),
(89, 'ลากิจ', '', '2023-01-27', '12:50:00', 'ไปงานบวช', NULL),
(90, 'ลากิจ', '', '2023-01-27', '12:53:00', 'ไปงานบวช', NULL),
(91, 'ลากิจ', 'ชานม', '2023-01-29', '17:34:00', 'ขก', NULL),
(92, 'ลากิจ', 'ชานม', '2023-01-29', '17:34:00', 'ขก', NULL),
(93, 'ลากิจ', 'เต้าหู้', '2023-01-27', '15:34:00', 'ขก', NULL),
(94, 'ลากิจ', 'เต้าหู้', '2023-01-27', '15:34:00', 'ขก', NULL),
(95, 'ลากิจ', 'เต้าหู้', '2023-01-27', '15:34:00', 'ขก', NULL),
(96, 'ลากิจ', 'เต้าหู้', '2023-01-27', '15:34:00', 'ขก', NULL),
(97, 'ลาป่วย', '', '2023-01-29', '19:43:00', 'น่าโง่', NULL),
(98, 'ลาป่วย', '', '2023-01-29', '19:43:00', 'น่าโง่', NULL),
(99, 'ลาป่วย', '', '2023-01-29', '19:44:00', 'น่่าโง่', NULL),
(100, 'ลากิจ', '', '2023-01-24', '13:40:00', 'ขิต', NULL),
(101, 'ลากิจ', '', '2023-01-24', '13:40:00', 'ขิต', NULL),
(102, 'ลากิจ', '', '2023-01-24', '13:40:00', 'ขิต', NULL),
(103, 'ลากิจ', '', '2023-02-05', '08:30:00', 'ไปงานแต่งงาน', NULL),
(104, 'ลาป่วย', '', '2023-01-13', '18:46:00', 'ปวดท้อง', NULL),
(105, 'ลาป่วย', '', '2023-01-28', '06:00:00', 'ไปทำฟัน', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `user_id` int(7) NOT NULL COMMENT 'รหัสพนักงาน',
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name',
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Username',
  `user_passwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`user_id`, `user_name`, `user_email`, `user_passwd`) VALUES
(7702502, 'ธันย์ชนก เจริญฟูประเสริฐ', 'thanchanokcha@cpall.ac.th', '1'),
(7702506, 'ฉัตรชัย สมสกุล', 'chatchaisom@cpall.ac.th', '2');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
