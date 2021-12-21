-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 09:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `C_ID` int(10) NOT NULL,
  `C_Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `account_balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`C_ID`, `C_Name`, `email`, `phone`, `address`, `account_balance`) VALUES
(1, 'Arti Verma', 'Arti_verma@gmail.com', 9013243288, '5453/a bank street karol bagh, New Delhi -110005', 9122),
(2, 'Bhavesh Goyal', 'Bhaveshgoyal25@gmail.com', 9818907922, 'I-33 CSA Colony, Delhi - 110006', 11845),
(3, 'Charu Singhal', 'Singhal.Charu4343@gmail.com', 9664343021, '10598 3rd Floor, Padam Nagar, New Delhi - 110006', 8878),
(4, 'Deeksha Chauhan', 'C_deekahsa@gmail.com', 9999185654, 'EPT-30, PNT Colony, Karol Bagh, New Delhi-110005', 10055),
(5, 'Ekansh Batra', 'Ekansh.batra44@gmail.com', 9876132100, 'H. No. 40, Pitam pura, New Delhi - 110053', 10000),
(6, 'Fiasal Khan', 'KFiasal88@gmail.com', 9932154687, 'N488, Baljeet Nagar, Delhi -110008', 10200),
(7, 'Gaurav Kapoor', 'Gaurav.Kapoor88@gmail.com', 9899104455, 'L-90, Naya Bazaar, Old Delhi - 110006', 10000),
(8, 'Hitesh Kumar', 'Hiteshkr.84@gmail.com', 7894651650, '90/D Lawrence Road, Ashok Vihar, New Delhi - 11007', 9900),
(9, 'Indra Gandhi', 'IG.99@gmail.com', 7975613124, '53, Firoz Shah Road, New Delhi - 110001', 10000),
(10, 'Jatin Miglani', 'Miglani_Jatin@gmail.com', 8645321200, 'I-3431, Karam Pura, West Delhi - 110008 ', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `T_ID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `R_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`T_ID`, `time`, `amount`, `S_ID`, `R_ID`) VALUES
(1, '2021-12-19 17:21:05', 2100, 1, 2),
(2, '2021-12-19 18:25:48', 100, 8, 1),
(3, '2021-12-19 18:44:44', 55, 2, 4),
(4, '2021-12-19 22:34:36', 200, 2, 6),
(5, '2021-12-19 23:23:21', 1122, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
