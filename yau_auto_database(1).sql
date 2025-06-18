-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 05:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yau_auto_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CarPlatNumber` varchar(7) NOT NULL,
  `CarBrand` varchar(20) NOT NULL,
  `CarModel` varchar(20) NOT NULL,
  `CarYear` year(4) NOT NULL,
  `CarColour` varchar(20) NOT NULL,
  `CarRemarks` varchar(200) NOT NULL,
  `CarPrice` double NOT NULL,
  `CarStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `IDContract` varchar(8) NOT NULL,
  `CustICNumber` varchar(12) NOT NULL,
  `CusAddress` varchar(200) NOT NULL,
  `CusOccupation` varchar(20) NOT NULL,
  `CusSalary` double NOT NULL,
  `CusDrivingLicense` varchar(20) NOT NULL,
  `ContractType` varchar(20) NOT NULL,
  `CusEmail` varchar(50) NOT NULL,
  `IDEmployee` varchar(8) NOT NULL,
  `CarPlatNumber` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CusEmail` varchar(50) NOT NULL,
  `CusPassword` varchar(20) NOT NULL,
  `CusName` varchar(100) NOT NULL,
  `CusNoTel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `IDEmployee` varchar(8) NOT NULL,
  `EmpPassword` varchar(20) NOT NULL,
  `EmpName` varchar(100) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `EmpStatus` varchar(20) NOT NULL,
  `EmpDrivingLicense` varchar(20) NOT NULL,
  `EmpLicenseExpired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `IDInspection` varchar(8) NOT NULL,
  `InsDate` date NOT NULL,
  `InsTime` time NOT NULL,
  `InsStatus` varchar(20) NOT NULL,
  `InsOfferPrice` double NOT NULL,
  `CusEmail` varchar(50) NOT NULL,
  `IDEmployee` varchar(8) NOT NULL,
  `CarPlatNumber` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `IDPayment` varchar(8) NOT NULL,
  `PayDate` date NOT NULL,
  `PayMethod` varchar(20) NOT NULL,
  `TotalAmount` double NOT NULL,
  `IDContract` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test-drive`
--

CREATE TABLE `test-drive` (
  `IDTDrive` varchar(8) NOT NULL,
  `TDrDate` date NOT NULL,
  `TDrTime` time NOT NULL,
  `TDrStatus` varchar(20) NOT NULL,
  `CarPlatNumber` varchar(7) NOT NULL,
  `CusEmail` varchar(50) NOT NULL,
  `IDEmployee` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarPlatNumber`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`IDContract`),
  ADD UNIQUE KEY `CusEmail` (`CusEmail`,`IDEmployee`,`CarPlatNumber`),
  ADD KEY `IDEmployee` (`IDEmployee`),
  ADD KEY `CarPlatNumber` (`CarPlatNumber`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CusEmail`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`IDEmployee`);

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`IDInspection`),
  ADD UNIQUE KEY `CusEmail` (`CusEmail`,`IDEmployee`,`CarPlatNumber`),
  ADD KEY `CarPlatNumber` (`CarPlatNumber`),
  ADD KEY `IDEmployee` (`IDEmployee`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`IDPayment`),
  ADD UNIQUE KEY `IDContract` (`IDContract`);

--
-- Indexes for table `test-drive`
--
ALTER TABLE `test-drive`
  ADD PRIMARY KEY (`IDTDrive`),
  ADD UNIQUE KEY `CarPlatNumber` (`CarPlatNumber`,`CusEmail`,`IDEmployee`),
  ADD KEY `CusEmail` (`CusEmail`),
  ADD KEY `IDEmployee` (`IDEmployee`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`CusEmail`) REFERENCES `customer` (`CusEmail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`IDEmployee`) REFERENCES `employee` (`IDEmployee`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`CarPlatNumber`) REFERENCES `car` (`CarPlatNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `inspection_ibfk_1` FOREIGN KEY (`CarPlatNumber`) REFERENCES `car` (`CarPlatNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inspection_ibfk_2` FOREIGN KEY (`IDEmployee`) REFERENCES `employee` (`IDEmployee`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inspection_ibfk_3` FOREIGN KEY (`CusEmail`) REFERENCES `customer` (`CusEmail`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`IDContract`) REFERENCES `contract` (`IDContract`) ON UPDATE CASCADE;

--
-- Constraints for table `test-drive`
--
ALTER TABLE `test-drive`
  ADD CONSTRAINT `test-drive_ibfk_1` FOREIGN KEY (`CarPlatNumber`) REFERENCES `car` (`CarPlatNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test-drive_ibfk_2` FOREIGN KEY (`CusEmail`) REFERENCES `customer` (`CusEmail`) ON UPDATE CASCADE,
  ADD CONSTRAINT `test-drive_ibfk_3` FOREIGN KEY (`IDEmployee`) REFERENCES `employee` (`IDEmployee`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
