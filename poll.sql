-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 10:35 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll_options`
--

CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL,
  `option_text` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL COMMENT 'foreign key',
  `percentage` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_options`
--

INSERT INTO `poll_options` (`id`, `option_text`, `question_id`, `percentage`) VALUES
(1, 'python', 5, 0),
(2, 'javascript', 5, 0),
(3, 'php', 5, 0),
(4, 'c#', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `poll_questions`
--

CREATE TABLE `poll_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_questions`
--

INSERT INTO `poll_questions` (`id`, `question`) VALUES
(5, 'which programming language is better?');

-- --------------------------------------------------------

--
-- Table structure for table `poll_tbl`
--

CREATE TABLE `poll_tbl` (
  `poll_id` int(11) NOT NULL,
  `cms_software` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll_tbl`
--

INSERT INTO `poll_tbl` (`poll_id`, `cms_software`) VALUES
(1, 'Wordpress'),
(2, 'Shopify'),
(3, 'WooCommerce'),
(4, 'Drupal'),
(5, 'Wordpress'),
(6, 'Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `mobile`, `password`, `cpassword`, `token`, `status`) VALUES
(1, 'Jamil', 'jamilmahmud3366@gmail.com', '01521212121', '$2y$10$ArtfJnyLjrP/De3JlTkt.uVHaQiXU4WtHHlgd2HZ6u/an50paS4rm', '$2y$10$vH37wMmAF6.PP8aHdP1/FOA6BGKFFo/67qcPbFN90P.muDAsKUT1.', 'f4bf92b8bc970d9a35722bd975d66b', 'inactive'),
(8, 'Jamil Mahmud Sakib', 'jamilmahmud121@gmail.com', '123456789', '$2y$10$gqqAQSgeB61JZrlXqNFWoewimJbLLbNALsaTyFsJ4ZAIbhM60umba', '$2y$10$vcO901Fsw5Emw5O4yHazheCgRyB/BKseqe3KZ7HxHqpshWc8DBTLC', '1b8b5a43a8d2936ddbabb711ecf91e', 'active'),
(9, 'test', 'test2@mail.com', '01234567800', '$2y$10$ld84ohEc12PfIWivOc.IxupLVDkMp5A2ekIdw3RI.Z9nrOVt8KIiW', '$2y$10$vzUauCl3B9H9bZA3ljV0du6/W3ttXZs7gkiCGkZFtzzJ290Atuda2', '333633313733393738393937313630', 'active'),
(10, 'admin', 'admin@admin.com', '01234567801', '$2y$10$SLhoovxLtJv4iw1whMejlesy2YxUuArTJM3It2OGBhoXIk4ZORX9O', '$2y$10$1FJ.SIRNoh3I.25P3OxYnecdRx/aZqw/2UNLGEm4TaWDSQ8Af0rtm', '303134353632323433383237363638', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_questions`
--
ALTER TABLE `poll_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_tbl`
--
ALTER TABLE `poll_tbl`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poll_questions`
--
ALTER TABLE `poll_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poll_tbl`
--
ALTER TABLE `poll_tbl`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
