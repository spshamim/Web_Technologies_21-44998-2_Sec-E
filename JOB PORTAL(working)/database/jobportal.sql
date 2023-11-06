-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 04:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `license` varchar(100) NOT NULL,
  `approval` int(1) DEFAULT 0,
  `userID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `type`, `contact`, `location`, `website`, `license`, `approval`, `userID`) VALUES
(13, 'Nazmul Shanto', 'shanto@gmail.com', 'IT', '123123123', 'kuril', 'abc', '4567', 0, 21),
(14, 'Liton Das', 'das@gmail.com', 'Agro', '0123123123', 'kazipara', 'asdc', '4455', 0, 22),
(15, 'Tanzid Tamim', 'tamim@gmail.com', 'Accounting', '0123123123', 'birampur', 'asdcb', '7878', 0, 23),
(16, 'Mehedy Miraz', 'miraz@gmail.com', 'drafter', '0123123158', 'Dinajpur', 'dhfhc', '8598', 0, 24),
(17, 'Shkib Hasan', 'hasan@gmail.com', 'manager', '0123123123', 'Magura', 'hgfjgn', '4542', 1, 25),
(18, 'Mahmud Riad', 'riad@gmail.com', 'database analyst', '0123123123', 'Dhaka', 'htfhn', '8547', 0, 26),
(19, 'Tanzim Shakib', 'shakib@gmail.com', 'Developer', '0214875154', 'Bogura', 'ghkhk', '6589', 1, 27),
(20, 'Taskin Ahmed', 'ahmed@gmail.com', 'Counselor', '0214875154', 'Rangpur', 'hhjgj', '5478', 0, 28),
(21, 'Mosta Fizz', 'fizz@gmail.com', 'Deputy Manager', '0123123123', 'Satkhira', 'gjug', '5656', 0, 29),
(22, 'Tawhid Hridoy', 'hridoy@gmail.com', 'Game Developer', '0214875154', 'Bogura', 'ygik', '4545', 0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `password`, `usertype`) VALUES
(21, 'shanto@gmail.com', 'shanto', '1122', 'company'),
(22, 'das@gmail.com', 'das', '1222', 'company'),
(23, 'tamim@gmail.com', 'tamim', '2233', 'company'),
(24, 'miraz@gmail.com', 'miraz', '2121', 'company'),
(25, 'hasan@gmail.com', 'hasan', '7575', 'company'),
(26, 'riad@gmail.com', 'riad', '2323', 'company'),
(27, 'shakib@gmail.com', 'shakib', '1212', 'company'),
(28, 'ahmed@gmail.com', 'ahmed', '2121', 'company'),
(29, 'fizz@gmail.com', 'fizz', '8989', 'company'),
(30, 'hridoy@gmail.com', 'hridoy', '5123', 'company'),
(31, 'mostak@gmail.com', 'mostak', '7890', 'seeker'),
(32, 'shajib@gmail.com', 'shajib', '1230', 'seeker'),
(33, 'khan@gmail.com', 'khan', '4569', 'seeker'),
(34, 'anam@gmail.com', 'anam', '1478', 'seeker'),
(35, 'miya@gmail.com', 'miya', '9632', 'seeker'),
(36, 'rana@gmail.com', 'rana', '2589', 'seeker'),
(37, 'ali@gmail.com', 'ali', '4563', 'seeker'),
(38, 'uddin@gmail.com', 'uddin', '9874', 'seeker'),
(39, 'mohosin@gmail.com', 'mohosin', '8523', 'seeker'),
(40, 'shamim@gmail.com', 'shamim', '774411', 'admin'),
(41, 'fahim@gmail.com', 'fahim', '885522', 'admin'),
(42, 'nahid@gmail.com', 'nahid', '778899', 'admin'),
(43, 'rony@gmail.com', 'rony', '123654', 'admin'),
(44, 'shaon@gmail.com', 'shaon', '147852', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `seekerappliedjobs`
--

CREATE TABLE `seekerappliedjobs` (
  `id` int(10) NOT NULL,
  `userID` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `appliedJobs` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerappliedjobs`
--

INSERT INTO `seekerappliedjobs` (`id`, `userID`, `email`, `appliedJobs`) VALUES
(3, 31, 'mostak@gmail.com', ''),
(4, 32, 'shajib@gmail.com', ''),
(5, 33, 'khan@gmail.com', ''),
(6, 34, 'anam@gmail.com', ''),
(7, 35, 'miya@gmail.com', ''),
(8, 36, 'rana@gmail.com', ''),
(9, 37, 'ali@gmail.com', ''),
(10, 38, 'uddin@gmail.com', ''),
(11, 39, 'mohosin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `seekereducation`
--

CREATE TABLE `seekereducation` (
  `id` int(10) NOT NULL,
  `userID` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `history` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekereducation`
--

INSERT INTO `seekereducation` (`id`, `userID`, `email`, `history`) VALUES
(3, 31, 'mostak@gmail.com', ''),
(4, 32, 'shajib@gmail.com', ''),
(5, 33, 'khan@gmail.com', ''),
(6, 34, 'anam@gmail.com', ''),
(7, 35, 'miya@gmail.com', ''),
(8, 36, 'rana@gmail.com', ''),
(9, 37, 'ali@gmail.com', ''),
(10, 38, 'uddin@gmail.com', ''),
(11, 39, 'mohosin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `seekerinfo`
--

CREATE TABLE `seekerinfo` (
  `id` int(10) NOT NULL,
  `userID` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `experience` varchar(500) NOT NULL,
  `salary` int(30) NOT NULL,
  `aboutMe` mediumtext NOT NULL,
  `title` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `projects` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `google` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerinfo`
--

INSERT INTO `seekerinfo` (`id`, `userID`, `email`, `name`, `cgpa`, `experience`, `salary`, `aboutMe`, `title`, `facebook`, `linkedin`, `twitter`, `projects`, `age`, `website`, `phone`, `city`, `address`, `google`, `gender`, `file_name`, `picture`) VALUES
(3, 31, 'mostak@gmail.com', 'Mostak Ahmed', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(4, 32, 'shajib@gmail.com', 'Shajib Ahmed', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(5, 33, 'khan@gmail.com', 'Rahat Khan', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(6, 34, 'anam@gmail.com', 'Anam Dari', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(7, 35, 'miya@gmail.com', 'Mahim Miya', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(8, 36, 'rana@gmail.com', 'Masud Rana', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(9, 37, 'ali@gmail.com', 'Momin Ali', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(10, 38, 'uddin@gmail.com', 'Aslam Uddin', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(11, 39, 'mohosin@gmail.com', 'Mohosin Ali', 0, '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seekerskill`
--

CREATE TABLE `seekerskill` (
  `id` int(10) NOT NULL,
  `userID` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `skill` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerskill`
--

INSERT INTO `seekerskill` (`id`, `userID`, `email`, `skill`) VALUES
(3, 31, 'mostak@gmail.com', ''),
(4, 32, 'shajib@gmail.com', ''),
(5, 33, 'khan@gmail.com', ''),
(6, 34, 'anam@gmail.com', ''),
(7, 35, 'miya@gmail.com', ''),
(8, 36, 'rana@gmail.com', ''),
(9, 37, 'ali@gmail.com', ''),
(10, 38, 'uddin@gmail.com', ''),
(11, 39, 'mohosin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `seekerworkexperience`
--

CREATE TABLE `seekerworkexperience` (
  `id` int(10) NOT NULL,
  `userID` int(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `history` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekerworkexperience`
--

INSERT INTO `seekerworkexperience` (`id`, `userID`, `email`, `year`, `designation`, `description`, `history`) VALUES
(3, 31, 'mostak@gmail.com', '', '', '', ''),
(4, 32, 'shajib@gmail.com', '', '', '', ''),
(5, 33, 'khan@gmail.com', '', '', '', ''),
(6, 34, 'anam@gmail.com', '', '', '', ''),
(7, 35, 'miya@gmail.com', '', '', '', ''),
(8, 36, 'rana@gmail.com', '', '', '', ''),
(9, 37, 'ali@gmail.com', '', '', '', ''),
(10, 38, 'uddin@gmail.com', '', '', '', ''),
(11, 39, 'mohosin@gmail.com', '', '', '', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seekereducation`
--
ALTER TABLE `seekereducation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seekerskill`
--
ALTER TABLE `seekerskill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
