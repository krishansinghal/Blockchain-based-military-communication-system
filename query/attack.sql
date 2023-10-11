-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 08:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attack`
--

-- --------------------------------------------------------

--
-- Table structure for table `border`
--

CREATE TABLE `border` (
  `Id` int(50) NOT NULL,
  `FName` varchar(256) NOT NULL,
  `LName` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Designation` varchar(256) NOT NULL,
  `Rank` int(100) NOT NULL,
  `IsLoggedIn` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `border`
--

INSERT INTO `border` (`Id`, `FName`, `LName`, `Email`, `Password`, `Designation`, `Rank`, `IsLoggedIn`) VALUES
(0, 'Anjali', 'Khandelwal', 'anjalikhandelwal1999@gmail.com', 'Anjali@12345', 'Lieutenant', 2, 1),
(1, 'Krishan', 'Kumar', 'krishanrsinghal@gmail.com', 'Kutts@12345', 'Captain', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ccofficer`
--

CREATE TABLE `ccofficer` (
  `Id` int(50) NOT NULL,
  `FName` varchar(256) NOT NULL,
  `LName` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Designation` varchar(256) NOT NULL,
  `Rank` int(100) NOT NULL,
  `IsLoggedIn` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ccofficer`
--

INSERT INTO `ccofficer` (`Id`, `FName`, `LName`, `Email`, `Password`, `Designation`, `Rank`, `IsLoggedIn`) VALUES
(0, 'Anamika', 'Khandelwal', 'anamikakhandelwal1111@gmail.com', 'Anamika@12345', 'Captain', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `Id` int(50) NOT NULL,
  `FName` varchar(256) NOT NULL,
  `LName` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Designation` varchar(256) NOT NULL,
  `Rank` int(100) NOT NULL,
  `IsLoggedIn` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`Id`, `FName`, `LName`, `Email`, `Password`, `Designation`, `Rank`, `IsLoggedIn`) VALUES
(0, 'Tarushi', 'Khandelwal', 'tarushikhandelwal1954@gmail.com', 'Tarushi@12345', 'Captain', 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `border`
--
ALTER TABLE `border`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ccofficer`
--
ALTER TABLE `ccofficer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
