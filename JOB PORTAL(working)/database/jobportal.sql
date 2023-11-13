-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2023 at 07:12 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int NOT NULL,
  `userID` int NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `fileMetaData` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `userID`, `username`, `fileMetaData`) VALUES
(1, 65, 'Parvez', '0'),
(2, 71, 'mehedi556', NULL),
(3, 72, 'shuvo778', NULL),
(4, 73, 'nahid105', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `license` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `approval` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `userID`, `name`, `email`, `type`, `contact`, `location`, `website`, `license`, `approval`) VALUES
(33, 63, 'Agro Limited', 'agr@gmail.com', 'Insurance', '12345678912', 'qwerty', 'ytrewq', 'qweryu', 1),
(34, 74, 'IT CO.', 'rrar@go.com', 'IT', '12345678901', 'eqweqw', 'efef', 'fqfasw', 0),
(35, 75, 'Tech Farm.', 'tt@u.co', 'Engineer', '22515479365', 'veg2', 'ev2ev', 'ewqfqw', 0),
(37, 77, 'qwevq rqrcd', 'ttt@gmail.com', 'Supplychain', '54789320147', 'dqwdqw', 'dqwd', 'qwdfgg', 0),
(38, 78, 'fqwefqv efqwb', 'wqrv@go.com', 'Bank/Non-Bank Fin. Institution', '54789310245', 'eqgvg', 'gqewf', 'efef', 0),
(39, 79, 'fqeb wnhqwb', 'v@go.com', 'Generalmanagment', '54785420136', 'vqwv1', 'vqwv', 'b1h', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `usertype` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `password`, `usertype`) VALUES
(63, 'agr@gmail.com', 'agro666', '12345678@', 'company'),
(65, '21-44998-2@student.aiub.edu', 'Parvez', '3333333@', 'admin'),
(66, 'a@u.co', 'dasd', '456', 'seeker'),
(67, 'b@u.co', 'edcqwd', '0011', 'seeker'),
(68, 'c@u.co', 'ywrgwrb', '2255', 'seeker'),
(70, 'e@u.co', 'v2', '10', 'seeker'),
(71, 'mehedi@gmail.com', 'mehedi556', '5555555@', 'admin'),
(73, 'nahid@yahoo.com', 'nahid105', '8989898@', 'admin'),
(74, 'rrar@go.com', 'ititit', '2525252@', 'company'),
(75, 'tt@u.co', 'techiii', '666666@@', 'company'),
(77, 'ttt@gmail.com', 'dswdwqdf', '12345678@', 'company'),
(78, 'wqrv@go.com', 'vwqevgwe', '4561230@', 'company'),
(79, 'v@go.com', 'wbqbnw2b', '000000@@', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `seekerappliedjobs`
--

CREATE TABLE `seekerappliedjobs` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `appliedJobs` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerappliedjobs`
--

INSERT INTO `seekerappliedjobs` (`id`, `userID`, `email`, `appliedJobs`) VALUES
(15, 66, 'a@u.co', NULL),
(16, 67, 'b@u.co', NULL),
(17, 68, 'c@u.co', NULL),
(19, 70, 'e@u.co', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seekereducation`
--

CREATE TABLE `seekereducation` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `deg_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `yeartoyear` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ins_name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekereducation`
--

INSERT INTO `seekereducation` (`id`, `userID`, `email`, `deg_name`, `yeartoyear`, `ins_name`) VALUES
(18, 66, 'a@u.co', NULL, NULL, NULL),
(19, 67, 'b@u.co', NULL, NULL, NULL),
(20, 68, 'c@u.co', NULL, NULL, NULL),
(22, 70, 'e@u.co', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seekerinfo`
--

CREATE TABLE `seekerinfo` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prof_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `experience` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aboutMe` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `projects` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `picture` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerinfo`
--

INSERT INTO `seekerinfo` (`id`, `userID`, `name`, `prof_title`, `gender`, `age`, `cgpa`, `salary`, `experience`, `website`, `aboutMe`, `phone`, `email`, `address`, `city`, `google`, `twitter`, `facebook`, `linkedin`, `projects`, `file_name`, `picture`) VALUES
(15, 66, 'eqfeqfeafasdc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a@u.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 67, 'eqwdfaswfq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b@u.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 68, 'dqwrwqgdfsg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'c@u.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 70, 'qev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e@u.co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seekerskill`
--

CREATE TABLE `seekerskill` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `skill` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerskill`
--

INSERT INTO `seekerskill` (`id`, `userID`, `email`, `skill`) VALUES
(15, 66, 'a@u.co', NULL),
(16, 67, 'b@u.co', NULL),
(17, 68, 'c@u.co', NULL),
(19, 70, 'e@u.co', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seekerworkexperience`
--

CREATE TABLE `seekerworkexperience` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerworkexperience`
--

INSERT INTO `seekerworkexperience` (`id`, `userID`, `email`, `year`, `designation`, `description`) VALUES
(15, 66, 'a@u.co', NULL, NULL, NULL),
(16, 67, 'b@u.co', NULL, NULL, NULL),
(17, 68, 'c@u.co', NULL, NULL, NULL),
(19, 70, 'e@u.co', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekereducation`
--
ALTER TABLE `seekereducation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekerskill`
--
ALTER TABLE `seekerskill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seekereducation`
--
ALTER TABLE `seekereducation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seekerskill`
--
ALTER TABLE `seekerskill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
