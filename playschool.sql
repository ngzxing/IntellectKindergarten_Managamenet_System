-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 05:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `actID` int(11) NOT NULL,
  `actDate` date NOT NULL,
  `actDesc` text NOT NULL,
  `tIC` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annID` int(11) NOT NULL,
  `annDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `annText` text NOT NULL,
  `annType` tinyint(1) NOT NULL DEFAULT 0,
  `tIC` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendancestd`
--

CREATE TABLE `attendancestd` (
  `attDate` date NOT NULL,
  `stdMKN` char(12) NOT NULL,
  `attReason` varchar(255) DEFAULT NULL,
  `attTemparature` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendanceteac`
--

CREATE TABLE `attendanceteac` (
  `attDate` date NOT NULL,
  `tIC` char(12) NOT NULL,
  `attReason` varchar(255) DEFAULT NULL,
  `attTemparature` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `clsName` varchar(20) NOT NULL,
  `prgName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`clsName`, `prgName`) VALUES
('Class A1', 'A'),
('Class B1', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `evaltype`
--

CREATE TABLE `evaltype` (
  `evalID` int(11) NOT NULL,
  `evalType` varchar(20) DEFAULT NULL,
  `rateCtg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaltype`
--

INSERT INTO `evaltype` (`evalID`, `evalType`, `rateCtg`) VALUES
(2, 'Manners', 'Manner'),
(3, 'Writing', 'Achievement'),
(4, 'Reading', 'Achievement'),
(5, 'Counting', 'Achievement');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `fID` int(11) NOT NULL,
  `fDate` date NOT NULL,
  `fDesc` varchar(255) DEFAULT NULL,
  `fTot` decimal(8,2) NOT NULL,
  `stdMKN` char(10) NOT NULL,
  `payDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fItem` varchar(20) NOT NULL,
  `fPrice` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `indexperformance`
--

CREATE TABLE `indexperformance` (
  `iPerID` int(11) NOT NULL,
  `iName` varchar(20) NOT NULL,
  `iType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indexperformance`
--

INSERT INTO `indexperformance` (`iPerID`, `iName`, `iType`) VALUES
(1, 'visual', 'vak'),
(2, 'audio', 'vak'),
(3, 'kinestetik', 'vak'),
(4, 'bahasa', 'kecerdasan'),
(5, 'logik', 'kecerdasan'),
(6, 'muzikal', 'kecerdasan'),
(7, 'visual', 'kecerdasan'),
(8, 'kinestik', 'kecerdasan'),
(9, 'interpersonal', 'kecerdasan'),
(10, 'intrapersonal', 'kecerdasan'),
(11, 'naturals', 'kecerdasan'),
(12, 'existentials', 'kecerdasan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `fItem` varchar(20) DEFAULT NULL,
  `tIC` char(12) DEFAULT NULL,
  `oDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `oQuantity` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `pIC` char(12) NOT NULL,
  `pName` varchar(50) NOT NULL,
  `pPassword` varchar(30) NOT NULL,
  `pAddress` varchar(50) NOT NULL,
  `pCity` varchar(20) NOT NULL,
  `pPostCode` decimal(5,0) NOT NULL,
  `pState` varchar(20) NOT NULL,
  `pOccupation` varchar(20) NOT NULL,
  `pEmail` varchar(30) DEFAULT NULL,
  `pRegStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pIC`, `pName`, `pPassword`, `pAddress`, `pCity`, `pPostCode`, `pState`, `pOccupation`, `pEmail`, `pRegStatus`) VALUES
('0101', 'Ng Zi Herng', '1', 'harta plazza', 'Pontian Kechil', '82000', 'Johor', 'sdfgp', 'ngxing@graduate.utm.my', 0),
('0202', 'NG ZI XING', '1', 'harta plazza', 'Pontian Kechil', '82000', 'Johor', 'Students', 'ngzixing@yahoo.com', 0),
('2023-01-11', '', '', '', '', '0', '', '', '', 0),
('2023-01-17', '', '', '', '', '0', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `performanceID` int(11) NOT NULL,
  `stdMKN` char(12) DEFAULT NULL,
  `spPeriod` decimal(30,0) DEFAULT NULL,
  `spYear` int(2) DEFAULT NULL,
  `spDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`performanceID`, `stdMKN`, `spPeriod`, `spYear`, `spDate`) VALUES
(2, '01011', '1', 1, '2023-01-13'),
(3, '01012', '1', 1, '2023-01-13'),
(4, '02021', '1', 1, '2023-01-13'),
(5, '02022', '1', 1, '2023-01-13'),
(6, '02023', '1', 1, '2023-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `performbased`
--

CREATE TABLE `performbased` (
  `pIName` varchar(20) NOT NULL,
  `ptName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performcomment`
--

CREATE TABLE `performcomment` (
  `performanceID` int(11) NOT NULL,
  `iPerID` int(11) NOT NULL,
  `pcComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performrating`
--

CREATE TABLE `performrating` (
  `performanceID` int(11) NOT NULL,
  `sbjPerID` int(11) NOT NULL,
  `pIDesc` varchar(255) DEFAULT NULL,
  `ratingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performtype`
--

CREATE TABLE `performtype` (
  `ptName` varchar(20) NOT NULL,
  `ptDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performtype`
--

INSERT INTO `performtype` (`ptName`, `ptDesc`) VALUES
('kecerdasan', '-'),
('subject', '-'),
('vak', '-');

-- --------------------------------------------------------

--
-- Table structure for table `picact`
--

CREATE TABLE `picact` (
  `picId` int(11) NOT NULL,
  `actPic` varchar(100) NOT NULL,
  `actID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `picann`
--

CREATE TABLE `picann` (
  `picId` int(11) NOT NULL,
  `annPic` varchar(100) NOT NULL,
  `annID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pphone`
--

CREATE TABLE `pphone` (
  `phone` decimal(15,0) NOT NULL,
  `pIC` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prginclude`
--

CREATE TABLE `prginclude` (
  `prgsItem` varchar(20) NOT NULL,
  `prgName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prgperform`
--

CREATE TABLE `prgperform` (
  `ptName` varchar(20) NOT NULL,
  `prgName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prgperform`
--

INSERT INTO `prgperform` (`ptName`, `prgName`) VALUES
('kecerdasan', 'A'),
('kecerdasan', 'B'),
('subject', 'A'),
('subject', 'B'),
('vak', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `prgsyllabus`
--

CREATE TABLE `prgsyllabus` (
  `prgsItem` varchar(20) NOT NULL,
  `prgsFee` decimal(8,2) NOT NULL,
  `prgsDesc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prgName` varchar(50) NOT NULL,
  `prgDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prgName`, `prgDesc`) VALUES
('A', ''),
('B', '');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ratingID` int(11) NOT NULL,
  `rCategory` varchar(20) DEFAULT NULL,
  `ratingName` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ratingID`, `rCategory`, `ratingName`) VALUES
(1, 'Achievement', 'L1'),
(2, 'Achievement', 'L2'),
(3, 'Achievement', 'L3'),
(4, 'Achievement', 'L4'),
(5, 'Manner', 'G'),
(6, 'Manner', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ratingctg`
--

CREATE TABLE `ratingctg` (
  `rateCtg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingctg`
--

INSERT INTO `ratingctg` (`rateCtg`) VALUES
('Achievement'),
('Manner');

-- --------------------------------------------------------

--
-- Table structure for table `regapp`
--

CREATE TABLE `regapp` (
  `rID` int(11) NOT NULL,
  `tIC` char(12) DEFAULT NULL,
  `stdMKN` char(12) NOT NULL,
  `rTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salID` int(11) NOT NULL,
  `tIC` char(12) NOT NULL,
  `salDate` date NOT NULL,
  `salOthour` int(11) NOT NULL,
  `salAttendance` int(11) NOT NULL,
  `salReplacement` int(11) NOT NULL,
  `salAllowance` decimal(8,2) NOT NULL,
  `salEpf` decimal(8,2) NOT NULL,
  `salTotSalary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sbjperformance`
--

CREATE TABLE `sbjperformance` (
  `sbjPerID` int(11) NOT NULL,
  `evalID` int(11) NOT NULL,
  `sbjID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sbjperformance`
--

INSERT INTO `sbjperformance` (`sbjPerID`, `evalID`, `sbjID`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1),
(4, 5, 1),
(5, 2, 3),
(6, 3, 3),
(7, 4, 3),
(8, 5, 3),
(9, 2, 4),
(10, 3, 4),
(11, 4, 4),
(12, 5, 4),
(13, 2, 5),
(14, 3, 5),
(15, 4, 5),
(16, 5, 5),
(17, 2, 7),
(18, 3, 7),
(19, 4, 7),
(20, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `stdallergy`
--

CREATE TABLE `stdallergy` (
  `stdMKN` char(12) NOT NULL,
  `allergy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stdcovid`
--

CREATE TABLE `stdcovid` (
  `csDate` date NOT NULL,
  `stdMKN` char(12) NOT NULL,
  `csStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stdfavorfood`
--

CREATE TABLE `stdfavorfood` (
  `stdMKN` char(12) NOT NULL,
  `food` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stdfavortoy`
--

CREATE TABLE `stdfavortoy` (
  `stdMKN` char(12) NOT NULL,
  `toy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stdMKN` char(12) NOT NULL,
  `stdName` varchar(50) NOT NULL,
  `stdGender` tinyint(1) NOT NULL,
  `stdAge` decimal(2,0) NOT NULL,
  `stdDOB` date NOT NULL,
  `stdFavorColor` varchar(20) DEFAULT NULL,
  `stdDiapers` tinyint(1) NOT NULL,
  `stdSession` varchar(2) NOT NULL,
  `stdMeal` varchar(2) NOT NULL,
  `stdPhoto` varchar(40) NOT NULL,
  `stdRegStatus` tinyint(2) NOT NULL,
  `pIC` char(12) NOT NULL,
  `clsName` varchar(20) DEFAULT NULL,
  `prgName` varchar(50) DEFAULT NULL
) ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdMKN`, `stdName`, `stdGender`, `stdAge`, `stdDOB`, `stdFavorColor`, `stdDiapers`, `stdSession`, `stdMeal`, `stdPhoto`, `stdRegStatus`, `pIC`, `clsName`, `prgName`) VALUES
('01011', 'ng', 0, '1', '2023-01-19', 'red', 0, 'M', 'M', 'studentImg/WIN_20220725_09_35_34_Pro.jpg', 2, '0101', 'Class A1', 'A'),
('01012', 'diu', 0, '4', '2023-01-13', '222', 0, 'M', 'M', 'studentImg/Screenshot (2).png', 2, '0101', 'Class B1', 'B'),
('02021', '1112', 1, '2', '2023-01-06', 'red', 0, 'M', 'M', 'studentImg/mAO20D.jpg', 2, '0202', 'Class A1', 'A'),
('02022', 'hi', 0, '3', '2023-01-11', 'dhdh', 0, 'M', 'M', 'studentImg/wall_paper_02.jpg', 2, '0202', 'Class A1', 'A'),
('02023', 'haha', 0, '4', '2023-01-31', '2', 0, 'M', 'M', 'studentImg/inline_image_preview.jpg', 2, '0202', 'Class B1', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sbjName` varchar(20) NOT NULL,
  `sbjID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sbjName`, `sbjID`) VALUES
('Bahasa Malaysia', 1),
('Bahasa Malaysia', 2),
('Bahasa Inggeris', 3),
('Bahasa Arab', 4),
('Matematik', 5),
('Sains', 6),
('Arts & Craft', 7),
('Pendidikan Islam & J', 8),
('Sports/ Sensory Gym/', 9);

-- --------------------------------------------------------

--
-- Table structure for table `subjectsteac`
--

CREATE TABLE `subjectsteac` (
  `tIC` char(12) NOT NULL,
  `sbjID` int(11) NOT NULL,
  `clsName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectsteac`
--

INSERT INTO `subjectsteac` (`tIC`, `sbjID`, `clsName`) VALUES
('1313', 1, 'Class A1'),
('1313', 1, 'Class B1'),
('1212', 3, 'Class B1'),
('1313', 3, 'Class A1'),
('1212', 4, 'Class A1'),
('1212', 4, 'Class B1'),
('1212', 5, 'Class B1'),
('1212', 7, 'Class A1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tIC` char(12) NOT NULL,
  `tName` varchar(50) NOT NULL,
  `tPassword` varchar(30) NOT NULL,
  `tEPF` decimal(10,0) NOT NULL,
  `tBank` varchar(50) NOT NULL,
  `tBankAccount` int(20) NOT NULL,
  `tPhone` decimal(15,0) NOT NULL,
  `tAddress` varchar(50) NOT NULL,
  `tCity` varchar(20) NOT NULL,
  `tPostcode` decimal(5,0) NOT NULL,
  `tState` varchar(20) NOT NULL,
  `tEmail` varchar(30) DEFAULT NULL,
  `tBasicSalpHour` decimal(8,2) NOT NULL,
  `tOTSalpHour` decimal(8,2) NOT NULL,
  `tPhoto` varchar(40) NOT NULL,
  `tPosition` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tIC`, `tName`, `tPassword`, `tEPF`, `tBank`, `tBankAccount`, `tPhone`, `tAddress`, `tCity`, `tPostcode`, `tState`, `tEmail`, `tBasicSalpHour`, `tOTSalpHour`, `tPhoto`, `tPosition`) VALUES
('1212', 'Hi', '1', '1', 'h', 1, '1', 'h', 'h', '1', 'h', 'h', '1.00', '1.00', 'h', 'h'),
('1313', 'Hi', '1', '1', 'h', 1, '1', 'h', 'h', '1', 'h', 'h', '1.00', '1.00', 'h', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`actID`),
  ADD KEY `Activity_tIC_fk` (`tIC`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`annID`),
  ADD KEY `Annoucement_tIC_fk` (`tIC`);

--
-- Indexes for table `attendancestd`
--
ALTER TABLE `attendancestd`
  ADD PRIMARY KEY (`attDate`,`stdMKN`),
  ADD KEY `AttendanceStd_stdMKN_fk` (`stdMKN`);

--
-- Indexes for table `attendanceteac`
--
ALTER TABLE `attendanceteac`
  ADD PRIMARY KEY (`attDate`,`tIC`),
  ADD KEY `AttendanceTeac_tIC_fk` (`tIC`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`clsName`),
  ADD KEY `Class_prgName_fk` (`prgName`);

--
-- Indexes for table `evaltype`
--
ALTER TABLE `evaltype`
  ADD PRIMARY KEY (`evalID`),
  ADD KEY `evalType_rateCtg_fk` (`rateCtg`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fID`),
  ADD KEY `Fee_stdMKN_fk` (`stdMKN`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fItem`);

--
-- Indexes for table `indexperformance`
--
ALTER TABLE `indexperformance`
  ADD PRIMARY KEY (`iPerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `Orders_fItem_fk` (`fItem`),
  ADD KEY `Orders_tIC_fk` (`tIC`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`pIC`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`performanceID`),
  ADD KEY `Performance_stdMKN_fk` (`stdMKN`);

--
-- Indexes for table `performbased`
--
ALTER TABLE `performbased`
  ADD PRIMARY KEY (`pIName`),
  ADD KEY `PerformBased_ptName_fk` (`ptName`);

--
-- Indexes for table `performcomment`
--
ALTER TABLE `performcomment`
  ADD PRIMARY KEY (`performanceID`,`iPerID`),
  ADD KEY `PerformComment_iPerID_fk` (`iPerID`);

--
-- Indexes for table `performrating`
--
ALTER TABLE `performrating`
  ADD PRIMARY KEY (`performanceID`,`sbjPerID`),
  ADD KEY `PerformRating_sbjPerID_fk` (`sbjPerID`),
  ADD KEY `PerformRating_ratingID_fk` (`ratingID`);

--
-- Indexes for table `performtype`
--
ALTER TABLE `performtype`
  ADD PRIMARY KEY (`ptName`);

--
-- Indexes for table `picact`
--
ALTER TABLE `picact`
  ADD PRIMARY KEY (`picId`);

--
-- Indexes for table `picann`
--
ALTER TABLE `picann`
  ADD PRIMARY KEY (`picId`);

--
-- Indexes for table `pphone`
--
ALTER TABLE `pphone`
  ADD PRIMARY KEY (`phone`),
  ADD KEY `pphone_pIC_fk` (`pIC`);

--
-- Indexes for table `prginclude`
--
ALTER TABLE `prginclude`
  ADD PRIMARY KEY (`prgsItem`,`prgName`),
  ADD KEY `PrgInclude_fk` (`prgName`);

--
-- Indexes for table `prgperform`
--
ALTER TABLE `prgperform`
  ADD PRIMARY KEY (`ptName`,`prgName`),
  ADD KEY `PrgPerform_prgName_fk` (`prgName`);

--
-- Indexes for table `prgsyllabus`
--
ALTER TABLE `prgsyllabus`
  ADD PRIMARY KEY (`prgsItem`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`prgName`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `rating_rCategory_fk` (`rCategory`);

--
-- Indexes for table `ratingctg`
--
ALTER TABLE `ratingctg`
  ADD PRIMARY KEY (`rateCtg`);

--
-- Indexes for table `regapp`
--
ALTER TABLE `regapp`
  ADD PRIMARY KEY (`rID`),
  ADD KEY `RegApp_tIC_fk` (`tIC`),
  ADD KEY `RegApp_stdMKN_fk` (`stdMKN`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salID`),
  ADD KEY `Salary_tIC_fk` (`tIC`);

--
-- Indexes for table `sbjperformance`
--
ALTER TABLE `sbjperformance`
  ADD PRIMARY KEY (`sbjPerID`),
  ADD KEY `sbjperformance_sbjID_fk` (`sbjID`),
  ADD KEY `sbjperformance_evalID_fk` (`evalID`);

--
-- Indexes for table `stdallergy`
--
ALTER TABLE `stdallergy`
  ADD PRIMARY KEY (`stdMKN`,`allergy`);

--
-- Indexes for table `stdcovid`
--
ALTER TABLE `stdcovid`
  ADD PRIMARY KEY (`csDate`,`stdMKN`),
  ADD KEY `StdCovid_stdMKN_fk` (`stdMKN`);

--
-- Indexes for table `stdfavorfood`
--
ALTER TABLE `stdfavorfood`
  ADD PRIMARY KEY (`stdMKN`,`food`);

--
-- Indexes for table `stdfavortoy`
--
ALTER TABLE `stdfavortoy`
  ADD PRIMARY KEY (`stdMKN`,`toy`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stdMKN`),
  ADD KEY `Student_pIC_fk` (`pIC`),
  ADD KEY `Student_clsName` (`clsName`),
  ADD KEY `Student_prgName_fk` (`prgName`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sbjID`);

--
-- Indexes for table `subjectsteac`
--
ALTER TABLE `subjectsteac`
  ADD PRIMARY KEY (`sbjID`,`tIC`,`clsName`) USING BTREE,
  ADD KEY `SubjectsTeac_tIC_fk` (`tIC`),
  ADD KEY `subjectsteac_clsName_fk` (`clsName`),
  ADD KEY `subjectsteac_sbjid_fk` (`sbjID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tIC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaltype`
--
ALTER TABLE `evaltype`
  MODIFY `evalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indexperformance`
--
ALTER TABLE `indexperformance`
  MODIFY `iPerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `performanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `picact`
--
ALTER TABLE `picact`
  MODIFY `picId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picann`
--
ALTER TABLE `picann`
  MODIFY `picId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regapp`
--
ALTER TABLE `regapp`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sbjperformance`
--
ALTER TABLE `sbjperformance`
  MODIFY `sbjPerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sbjID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `Activity_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `Annoucement_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `attendancestd`
--
ALTER TABLE `attendancestd`
  ADD CONSTRAINT `AttendanceStd_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendanceteac`
--
ALTER TABLE `attendanceteac`
  ADD CONSTRAINT `AttendanceTeac_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `Class_prgName_fk` FOREIGN KEY (`prgName`) REFERENCES `program` (`prgName`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `evaltype`
--
ALTER TABLE `evaltype`
  ADD CONSTRAINT `evalType_rateCtg_fk` FOREIGN KEY (`rateCtg`) REFERENCES `ratingctg` (`rateCtg`) ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `Fee_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_fItem_fk` FOREIGN KEY (`fItem`) REFERENCES `food` (`fItem`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Orders_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `Performance_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performbased`
--
ALTER TABLE `performbased`
  ADD CONSTRAINT `PerformBased_ptName_fk` FOREIGN KEY (`ptName`) REFERENCES `performtype` (`ptName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performcomment`
--
ALTER TABLE `performcomment`
  ADD CONSTRAINT `PerformComment_iPerID_fk` FOREIGN KEY (`iPerID`) REFERENCES `indexperformance` (`iPerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `PerformComment_performanceID_fk` FOREIGN KEY (`performanceID`) REFERENCES `performance` (`performanceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performrating`
--
ALTER TABLE `performrating`
  ADD CONSTRAINT `PerformRating_performanceID_fk` FOREIGN KEY (`performanceID`) REFERENCES `performance` (`performanceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PerformRating_ratingID_fk` FOREIGN KEY (`ratingID`) REFERENCES `rating` (`ratingID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `PerformRating_sbjPerID_fk` FOREIGN KEY (`sbjPerID`) REFERENCES `sbjperformance` (`sbjPerID`) ON UPDATE CASCADE;

--
-- Constraints for table `pphone`
--
ALTER TABLE `pphone`
  ADD CONSTRAINT `pphone_pIC_fk` FOREIGN KEY (`pIC`) REFERENCES `parent` (`pIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prginclude`
--
ALTER TABLE `prginclude`
  ADD CONSTRAINT `PrgInclude_fk` FOREIGN KEY (`prgName`) REFERENCES `program` (`prgName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PrgInclude_prgsItem_fk` FOREIGN KEY (`prgsItem`) REFERENCES `prgsyllabus` (`prgsItem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prgperform`
--
ALTER TABLE `prgperform`
  ADD CONSTRAINT `PrgPerform_prgName_fk` FOREIGN KEY (`prgName`) REFERENCES `program` (`prgName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PrgPerform_ptName_fk` FOREIGN KEY (`ptName`) REFERENCES `performtype` (`ptName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_rCategory_fk` FOREIGN KEY (`rCategory`) REFERENCES `ratingctg` (`rateCtg`) ON UPDATE CASCADE;

--
-- Constraints for table `regapp`
--
ALTER TABLE `regapp`
  ADD CONSTRAINT `RegApp_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RegApp_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `Salary_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sbjperformance`
--
ALTER TABLE `sbjperformance`
  ADD CONSTRAINT `sbjperformance_evalID_fk` FOREIGN KEY (`evalID`) REFERENCES `evaltype` (`evalID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sbjperformance_sbjID_fk` FOREIGN KEY (`sbjID`) REFERENCES `subjects` (`sbjID`) ON UPDATE CASCADE;

--
-- Constraints for table `stdallergy`
--
ALTER TABLE `stdallergy`
  ADD CONSTRAINT `stdAllergy_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stdcovid`
--
ALTER TABLE `stdcovid`
  ADD CONSTRAINT `StdCovid_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stdfavorfood`
--
ALTER TABLE `stdfavorfood`
  ADD CONSTRAINT `stdFavorFood_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stdfavortoy`
--
ALTER TABLE `stdfavortoy`
  ADD CONSTRAINT `stdFavorToy_stdMKN_fk` FOREIGN KEY (`stdMKN`) REFERENCES `student` (`stdMKN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Student_clsName` FOREIGN KEY (`clsName`) REFERENCES `class` (`clsName`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Student_pIC_fk` FOREIGN KEY (`pIC`) REFERENCES `parent` (`pIC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Student_prgName_fk` FOREIGN KEY (`prgName`) REFERENCES `program` (`prgName`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subjectsteac`
--
ALTER TABLE `subjectsteac`
  ADD CONSTRAINT `SubjectsTeac_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectsteac_clsName_fk` FOREIGN KEY (`clsName`) REFERENCES `class` (`clsName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectsteac_sbjid_fk` FOREIGN KEY (`sbjID`) REFERENCES `subjects` (`sbjID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
