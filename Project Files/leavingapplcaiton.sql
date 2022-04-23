-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 12:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leavingapplcaiton`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `FName` varchar(15) DEFAULT NULL,
  `LName` varchar(15) DEFAULT NULL,
  `sEmail` varchar(30) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `A_UserName` varchar(30) DEFAULT NULL,
  `A_Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FName`, `LName`, `sEmail`, `PhoneNumber`, `A_UserName`, `A_Password`) VALUES
(1, 'Annie', 'Jack', 'Annie@gmail.com', 11645454, 'Annie', 'admin1'),
(2, 'Adam', 'Water', 'Adam@gmail.com', 1165354, 'Adam', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `leavingapplication`
--

CREATE TABLE `leavingapplication` (
  `AppID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `RequestTime` date DEFAULT NULL,
  `BeginingDate` date DEFAULT NULL,
  `EndingDate` date DEFAULT NULL,
  `leavingReason` varchar(50) DEFAULT NULL,
  `applicationDescription` varchar(350) DEFAULT NULL,
  `applicationStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leavingapplication`
--

INSERT INTO `leavingapplication` (`AppID`, `StaffID`, `RequestTime`, `BeginingDate`, `EndingDate`, `leavingReason`, `applicationDescription`, `applicationStatus`) VALUES
(1, 3, '2021-07-01', '2021-07-16', '2021-07-22', 'test', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'approved'),
(3, 4, '2021-07-12', '2021-07-21', '2021-07-31', 'test22', 'test22test22test22test22test22test22test22test22test22test22test22test22test22test22test22test22test22test22test22', 'approved'),
(5, 3, '2017-07-20', '2021-07-21', '2021-07-31', 'test33', 'test33test33test33test33test33test33test33test33test33test33test33', 'Not Approve'),
(7, 3, '2021-07-21', '2021-07-29', '2021-07-31', 'test2243', 'test2243test2243test2243test2243test2243test2243test2243test2243test2243test2243test2243test2243test2243test2243', 'waiting descision'),
(9, 4, '2021-07-31', '2021-08-16', '2021-08-28', 'test5', 'test5test5test5test5test5test5', 'Not Approve'),
(11, 4, '2021-07-29', '2021-09-01', '2021-09-24', 'test6', 'test6test6test6test6test6test6test6test6test6', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `StaffID` int(11) NOT NULL,
  `manager_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`StaffID`, `manager_ID`) VALUES
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `FName` varchar(15) DEFAULT NULL,
  `LName` varchar(15) DEFAULT NULL,
  `sEmail` varchar(30) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `Department` varchar(15) DEFAULT NULL,
  `St_UserName` varchar(30) DEFAULT NULL,
  `St_Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `AdminID`, `FName`, `LName`, `sEmail`, `PhoneNumber`, `Department`, `St_UserName`, `St_Password`) VALUES
(1, 1, 'Bobby', 'Wood', 'Bobby@gmail.com', 1122254, NULL, 'Bobby', 'manager1'),
(2, 1, 'Beth', 'Wec', 'Beth@gmail.com', 1122224, NULL, 'Beth', 'manager2'),
(3, 2, 'Chad', 'Wat', 'Chad@gmail.com', 11232154, NULL, 'Chad', 'staff1'),
(4, 1, 'Cindy', 'Nar', 'Cindy@gmail.com', 1112354, NULL, 'Cindy', 'staff2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `leavingapplication`
--
ALTER TABLE `leavingapplication`
  ADD PRIMARY KEY (`AppID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `manager_ID` (`manager_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leavingapplication`
--
ALTER TABLE `leavingapplication`
  MODIFY `AppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leavingapplication`
--
ALTER TABLE `leavingapplication`
  ADD CONSTRAINT `leavingapplication_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`manager_ID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
