-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 09:25 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `memberid` int(11) NOT NULL,
  `creator` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `perperson` decimal(50,2) NOT NULL,
  `groupid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`memberid`, `creator`, `user`, `userid`, `perperson`, `groupid`) VALUES
(113, 9, 'jaimin', 10, '-1250.00', 41),
(114, 9, 'meet', 9, '-4700.00', 41),
(115, 9, 'jaimin', 10, '-1250.00', 42),
(116, 9, 'meet', 9, '-4700.00', 42),
(125, 10, 'jaimin', 10, '-1250.00', 45),
(126, 10, 'meet', 9, '-4700.00', 45),
(127, 9, 'jaimin', 10, '-1250.00', 46),
(128, 9, 'meet', 9, '-4700.00', 46),
(189, 9, 'meet', 9, '0.00', 84),
(190, 9, 'meet', 9, '750.00', 86),
(191, 9, 'jaimin', 10, '750.00', 86);

-- --------------------------------------------------------

--
-- Table structure for table `group1`
--

CREATE TABLE `group1` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `members` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group1`
--

INSERT INTO `group1` (`groupid`, `groupname`, `members`) VALUES
(41, 'friends', 2),
(42, 'gaand ', 2),
(45, 'Mygroup1', 2),
(46, 'friends', 2),
(47, 'Mygroup2', 2),
(48, 'hee', 2),
(83, 'raand ', 2),
(84, 'lolol', 2),
(85, 'lolol', 2),
(86, 'tum', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ispaid` tinyint(1) NOT NULL DEFAULT 0,
  `transactionid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`id`, `userid`, `ispaid`, `transactionid`, `groupid`) VALUES
(1, 10, 1, 104, 48),
(45, 9, 1, 139, 80),
(46, 9, 1, 140, 84),
(47, 10, 1, 89, 46);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trasactionid` int(11) NOT NULL,
  `totalamount` int(50) NOT NULL,
  `members` int(50) NOT NULL,
  `perperson` decimal(50,2) NOT NULL,
  `moneyfor` varchar(50) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `file_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trasactionid`, `totalamount`, `members`, `perperson`, `moneyfor`, `is_paid`, `date`, `id`, `groupid`, `file_name`) VALUES
(88, 400, 2, '200.00', 'asdasd', 0, '2023-06-03 10:37:15', 10, 45, ''),
(89, 500, 2, '250.00', 'food', 0, '2023-06-03 10:37:15', 9, 46, 'phto.jpg'),
(90, 500, 2, '250.00', 'food', 0, '2023-06-03 10:37:15', 9, 46, ''),
(109, 200, 2, '100.00', 'mejhkjh', 0, '2023-06-03 10:37:15', 10, 48, ''),
(110, 500, 2, '250.00', 'food', 0, '2023-06-03 10:37:15', 11, 49, ''),
(143, 500, 2, '250.00', 'food', 0, '2023-06-06 00:44:35', 9, 86, ''),
(144, 2000, 2, '1000.00', 'mejhkjh', 0, '2023-06-06 00:52:59', 10, 73, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(9, 'meet', 'meet@gmail.com', '123'),
(10, 'jaimin', 'jaimin@gmail.com', '123'),
(11, 'prashant', 'prashant@gmail.com', '123'),
(12, 'sarthak', 'sarthak@gmail.com', '123'),
(13, 'nitya12', 'nitya@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`memberid`),
  ADD KEY `transactionid` (`groupid`),
  ADD KEY `groupid` (`groupid`);

--
-- Indexes for table `group1`
--
ALTER TABLE `group1`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trasactionid`),
  ADD KEY `id` (`id`),
  ADD KEY `groupid` (`groupid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `group1`
--
ALTER TABLE `group1`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trasactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
