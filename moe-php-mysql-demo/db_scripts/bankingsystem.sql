-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2020 at 02:35 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_no` int(25) NOT NULL,
  `accountPass` varchar(20) NOT NULL,
  `IBN` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `Amount` double NOT NULL,
  `cnic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_no`, `accountPass`, `IBN`, `status`, `userName`, `date`, `Amount`, `cnic`) VALUES
(111, 'ali', '111', 'Approved', 'ali', '2019-02-11', 1488, '111'),
(121, 'deen', '121', 'Approved', 'deen', '2020-02-01', 1522, '121'),
(12345, '12345', '12345', 'Approved', 'DRGhulam', '2020-01-01', 9990, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `username`, `pass`) VALUES
(1, 'deen', 'deen');

-- --------------------------------------------------------

--
-- Table structure for table `bill_gass`
--

CREATE TABLE `bill_gass` (
  `billNo` int(11) NOT NULL,
  `account_no` int(25) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_ke`
--

CREATE TABLE `bill_ke` (
  `billNo` int(11) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `account_no` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chequerequest`
--

CREATE TABLE `chequerequest` (
  `id` int(25) NOT NULL,
  `account_no` int(25) NOT NULL,
  `pagescount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chequerequest`
--

INSERT INTO `chequerequest` (`id`, `account_no`, `pagescount`) VALUES
(1, 111, 12),
(2, 111, 5),
(3, 111, 6),
(4, 12345, 4),
(15, 121, 40);

-- --------------------------------------------------------

--
-- Table structure for table `money_transfer`
--

CREATE TABLE `money_transfer` (
  `Reci_acc_no` int(25) NOT NULL,
  `account_no` int(25) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `cnic` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `mobileNumber` varchar(11) NOT NULL,
  `Carrier` varchar(15) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`cnic`, `date`, `mobileNumber`, `Carrier`, `userName`, `pass`) VALUES
('111', '2020-02-12', '11111111111', '1', 'ali', '$2y$10$oBpO559XhwiO5blQiiVLcO03M6ABa09B4JsWLW8PY7ZTCT6f5gtp.'),
('121', '2020-02-05', '121', '3', 'deen', '$2y$10$Hxa/myoB.tPLKAszH8RGGu20tVQHYg0CI.Wl16.N1taR7.XRD3ajW'),
('12345', '2020-04-17', '03043931008', '2', 'DRGhulam', '$2y$10$9YuU5IRJC1AHV/Jebd1hqO2b65ybTBj9cTFprdST9gEv2GXy/trTu');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sno` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `amount` double NOT NULL,
  `sender_acc_no` int(25) NOT NULL,
  `receiver_acc_no` int(25) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sno`, `type`, `amount`, `sender_acc_no`, `receiver_acc_no`, `date`) VALUES
(1, 'transfer money', 5, 121, 111, '2020-02-27'),
(2, 'transfer money', 500, 111, 121, '2020-03-01'),
(3, 'transfer money', 100, 111, 121, '2020-03-01'),
(4, 'transfer money', 50, 111, 121, '2020-03-01'),
(5, 'transfer money', 7, 111, 121, '2020-03-01'),
(6, 'transfer money', 10, 111, 121, '2020-03-06'),
(7, 'transfer money', 12, 111, 121, '2020-03-15'),
(8, 'transfer money', 26, 111, 121, '2020-03-15'),
(9, 'transfer money', 12, 111, 121, '2020-03-15'),
(10, 'transfer money', 5, 111, 111, '2020-04-27'),
(11, 'transfer money', 10, 12345, 121, '2020-04-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_gass`
--
ALTER TABLE `bill_gass`
  ADD PRIMARY KEY (`billNo`),
  ADD KEY `account_no` (`account_no`);

--
-- Indexes for table `bill_ke`
--
ALTER TABLE `bill_ke`
  ADD PRIMARY KEY (`billNo`),
  ADD KEY `account_no` (`account_no`);

--
-- Indexes for table `chequerequest`
--
ALTER TABLE `chequerequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userName`) USING BTREE,
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD KEY `cnic_2` (`cnic`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `sender_acc_no` (`sender_acc_no`),
  ADD KEY `receiver_acc_no` (`receiver_acc_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chequerequest`
--
ALTER TABLE `chequerequest`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_gass`
--
ALTER TABLE `bill_gass`
  ADD CONSTRAINT `bill_gass_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `account` (`account_no`);

--
-- Constraints for table `bill_ke`
--
ALTER TABLE `bill_ke`
  ADD CONSTRAINT `bill_ke_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `account` (`account_no`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`sender_acc_no`) REFERENCES `account` (`account_no`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`receiver_acc_no`) REFERENCES `account` (`account_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
