-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 12, 2023 at 05:35 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'patiphan', 'phengpao', 'patiphan@gmail.com', '$2y$10$LDK38vfAyUjhJ040DRY0ourmpJ73vAs1CUxj860LDqwqTCWsE.Wp.'),
(5, 'john', 'doe', 'johndoe@gmail.com', '$2y$10$EQHc60tAeiJCHEte4NnLpeNFwqhhyIm3M1oMynV6errF65oCkleqi'),
(6, 'jane', 'doe', 'jane@gmail.com', '$2y$10$fMemkiOT5RyzwLcc5lCusOelWZs4tG.SoidJHB4Prikdofsv1ybC2'),
(21, 'pati', 'pon', 'patipon@gmail.com', '$2y$10$PXgz.5aSTIIsdyklIy7zz..TNmVsCtBerxjhjQDZbpm1dqrrC8WZe'),
(22, 'jim', 'doe', 'jim@gmail.com', '$2y$10$xJoWVx.UW.KQSIDJziIDH./RoEvyYKmvGxEz3RvLP/MZ87S5n5MKO'),
(23, 'joe', 'doe', 'joe@gmail.com', '$2y$10$d6.SAd2I0FepGrJ3Q2k0FO1QTBqg/gcjjB9kaXEJJAYRpD4mg0d4K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
