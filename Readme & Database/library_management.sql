-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 05:02 PM
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
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `releases` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `writer_id`, `name`, `releases`, `description`, `image`, `created_at`) VALUES
(6, 8, 'Korunna (or Karuna)', '1877-1878', 'We know you are a human but unfortunately our system does not satisfy. So please late us a moment to verify using the captcha code below for download Karuna.', '6500777d416d3.png', '2023-09-12 14:36:45'),
(7, 9, 'Himu', '1990', 'The real name of the character is Himalay, a name given by his father. He follows a lifestyle that was instructed by his psychopathic father who wanted him to be a great man.', '65007822ec3d1.png', '2023-09-12 14:39:30'),
(8, 10, 'Bulbul (1st Part)', '1928', 'Nazrul Islam studied up to grade 10 but did not appear for the matriculation pre-test examination; instead in 1917, he joined the British Indian Army at the age of eighteen.', '6500795a75fb1.png', '2023-09-12 14:44:42'),
(9, 11, 'Yugma', '1973', 'Gupta\'s stories had been published in periodicals like Bharati, Bijoli, Uttara, Kali-Kalam and Kallol. His first novel Asadhu Siddhartha was published in 1928.', '650079dd08018.png', '2023-09-12 14:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surename` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `massage` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first-name` text NOT NULL,
  `last-name` text NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `phone` int(11) NOT NULL,
  `dipartment` varchar(128) NOT NULL,
  `semister` varchar(120) NOT NULL,
  `roll` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `role` set('admin','students') NOT NULL DEFAULT 'students',
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first-name`, `last-name`, `username`, `email`, `password`, `phone`, `dipartment`, `semister`, `roll`, `image`, `role`, `created_time`) VALUES
(5, 'Pranta', 'Deb', 'PrantaDeb', 'pranta@gmail.com', '123', 1644218455, 'Computer Science And Engineering', '1st', '03108135', '64fdb57c6f28f.png', 'admin', '2023-09-10 12:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `born` varchar(128) NOT NULL,
  `died` varchar(128) NOT NULL,
  `nationality` varchar(128) NOT NULL,
  `total_books` varchar(128) NOT NULL,
  `novels` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `name`, `born`, `died`, `nationality`, `total_books`, `novels`, `image`, `created_at`) VALUES
(8, 'Rabindranath Tagore', '7 May 1861', '8 August 1941', 'Indian', '1', '4', '64ff3bb571e39.png', '2023-09-11 16:09:25'),
(9, 'Humayun Ahmed', '13 November 1948', '19 July 2012', 'Bangladesh', '3', '3', '64ff3c6c887f2.png', '2023-09-11 16:12:28'),
(10, 'Kazi Nazrul Islam', '24 May 1899', '29 August 1976', 'Indian', '1', '5', '64ff3cec1482f.png', '2023-09-11 16:14:36'),
(11, 'Jagadish Gupta', '5 July 1886', '15 April 1957', 'Bangladesh', '4', '2', '64ff3d56e519e.png', '2023-09-11 16:16:22'),
(12, 'Bankim Chandra Chatterjee', '26 June 1838', '	8 April 1894', 'West Bengal', '1', '3', '64ff3db554bcd.png', '2023-09-11 16:17:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
