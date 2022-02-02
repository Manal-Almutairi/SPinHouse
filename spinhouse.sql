-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 مارس 2019 الساعة 17:00
-- إصدار الخادم: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spinhouse`
--

-- --------------------------------------------------------

--
-- بنية الجدول `request`
--

CREATE TABLE `request` (
  `requestId` int(10) NOT NULL,
  `Status` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'waiting',
  `rDate` date NOT NULL,
  `rFrom` int(2) NOT NULL,
  `rTo` int(2) NOT NULL,
  `sId` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fpath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `student`
--

CREATE TABLE `student` (
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `universityID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `Ename` varchar(100) NOT NULL,
  `Erelationship` varchar(50) NOT NULL,
  `Ephone` varchar(20) NOT NULL,
  `language` varchar(20) NOT NULL,
  `healthcare` varchar(20) NOT NULL,
  `SP` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `healthProblem` varchar(200) DEFAULT NULL,
  `medication` varchar(200) DEFAULT NULL,
  `allergie` varchar(200) DEFAULT NULL,
  `hour` int(11) NOT NULL DEFAULT '0',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `SecurityLevel` int(2) NOT NULL DEFAULT '1',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestId`),
  ADD KEY `sId` (`sId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`universityID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestId` int(10) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`sId`) REFERENCES `student` (`universityID`);

--
-- القيود للجدول `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
