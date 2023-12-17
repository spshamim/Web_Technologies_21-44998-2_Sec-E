-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2023 at 07:08 AM
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
-- Database: `persondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'shahriar shahriar', '01XXXXXYYYY', 'abc@gmail.com', '1234567@'),
(2, 'Parvez shamim', '01UUUUUUFGD', 'cdf@gmail.com', '12345678@'),
(5, 'Shamim Shahriar', '01OOOOOOPSRDC', 'jkl@gmail.com', '232323@@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
