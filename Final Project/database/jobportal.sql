-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2023 at 08:11 PM
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
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fileMetaData` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `userID`, `username`, `fileMetaData`) VALUES
(5, 86, 'Shahriar25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `license` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `approval` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `userID`, `name`, `email`, `type`, `contact`, `location`, `website`, `license`, `approval`) VALUES
(42, 84, 'Agro Limited', 'dd@gmail.com', 'Others', '25978452163', 'Dhaka', 'www.agro.com', '254796314875', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int NOT NULL,
  `comp_id` int NOT NULL,
  `comp_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `vacancy` int NOT NULL,
  `salary` int NOT NULL,
  `experience` int NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usertype` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `password`, `usertype`) VALUES
(84, 'dd@gmail.com', 'shamim55', '123456@@', 'company'),
(85, 'aa@gmail.com', 'shamim66', 'Ab2222@@', 'seeker'),
(86, 'kk@gmail.com', 'Shahriar25', '020202@@', 'admin'),
(87, 'ff@gmail.com', 'fahim55', 'Ab2222@@', 'seeker'),
(89, 'rr@gmail.com', 'rahim225', 'Ac1111@@', 'seeker');

-- --------------------------------------------------------

--
-- Table structure for table `seekerappliedjobs`
--

CREATE TABLE `seekerappliedjobs` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `comp_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salary` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `approval` int DEFAULT NULL,
  `comp_mail` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comp_number` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerappliedjobs`
--

INSERT INTO `seekerappliedjobs` (`id`, `userID`, `comp_name`, `salary`, `title`, `category`, `type`, `approval`, `comp_mail`, `comp_number`) VALUES
(34, 89, 'Agro Limited', '25000', 'HR', 'Management', 'full-time', 1, 'dd@gmail.com', '25978452163'),
(35, 89, 'Agro Limited', '10000', 'CEO', 'Management', 'full-time', 1, 'dd@gmail.com', '25978452163');

-- --------------------------------------------------------

--
-- Table structure for table `seekereducation`
--

CREATE TABLE `seekereducation` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deg_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `yeartoyear` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ins_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekereducation`
--

INSERT INTO `seekereducation` (`id`, `userID`, `email`, `deg_name`, `yeartoyear`, `ins_name`) VALUES
(25, 85, 'aa@gmail.com', NULL, NULL, NULL),
(26, 87, 'ff@gmail.com', 'Bsc in CSE', '2023', 'AIUB'),
(28, 89, 'rr@gmail.com', 'Bsc in EEE', '2016', 'AIUB');

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
  `cgpa` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `experience` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aboutMe` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
(22, 85, 'Shahriar Parvez', 'Engineer', 'Male', 24, '3', 25000, '12', 'www.s.com', 'ddsadsafsagvgetvdsf', '12432345671', 'aa@gmail.com', 'Dhaka', 'Kuril', 'www.google.com', 'www.twitter.com', 'www.fb.com', 'www.linkedlin.com', NULL, 'Circuit.png', 'ddd.jpg'),
(23, 87, 'Faiaz Rahman', 'Engineer', 'Male', 25, '3', 25000, '2', 'www.s.com', 'gshsrhsdghsdgsdg', '01258749638', 'ff@gmail.com', 'Dhaks', 'Dhhh', 'www.google.com', 'www.twitter.com', 'www.fb.com', 'www.linkedlin.com', NULL, 'ddd.jpg', 'Circuit.png'),
(25, 89, 'Abdur Rahim', 'Engineer', 'Male', 25, '3', 15000, '5', 'www.s.com', 'fafggawgsdfefsdfcddw', '01547896325', 'rr@gmail.com', 'Dhaka', 'Mohakhali', 'www.google.com', 'www.twitter.com', 'www.fb.com', 'www.linkedlin.com', NULL, 'ddd.jpg', 'Circuit.png');

-- --------------------------------------------------------

--
-- Table structure for table `seekerskill`
--

CREATE TABLE `seekerskill` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skill` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerskill`
--

INSERT INTO `seekerskill` (`id`, `userID`, `email`, `skill`) VALUES
(22, 85, 'aa@gmail.com', 'IT, 60'),
(23, 87, 'ff@gmail.com', 'IT,SQL, 70,60'),
(25, 89, 'rr@gmail.com', 'SQL, 60');

-- --------------------------------------------------------

--
-- Table structure for table `seekerworkexperience`
--

CREATE TABLE `seekerworkexperience` (
  `id` int NOT NULL,
  `userID` int DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerworkexperience`
--

INSERT INTO `seekerworkexperience` (`id`, `userID`, `email`, `year`, `designation`, `description`) VALUES
(22, 85, 'aa@gmail.com', '2012 - 2015', 'Senior', 'AKK'),
(23, 87, 'ff@gmail.com', '2012 - 2015', 'Senior', 'AIUB'),
(25, 89, 'rr@gmail.com', '2012 - 2015', 'SeniorDev', 'AHHHH');

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
-- Indexes for table `job`
--
ALTER TABLE `job`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `seekereducation`
--
ALTER TABLE `seekereducation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `seekerskill`
--
ALTER TABLE `seekerskill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
