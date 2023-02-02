-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 05:25 AM
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
-- Database: `playschool_backup_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `actID` int(11) NOT NULL,
  `actDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `actTitle` text NOT NULL,
  `actDesc` mediumtext NOT NULL,
  `tIC` char(12) DEFAULT NULL,
  `clsName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`actID`, `actDate`, `actTitle`, `actDesc`, `tIC`, `clsName`) VALUES
(2, '2023-01-27 09:33:25', 'Act6', '<p>Hello, World!</p>', '1212', 'Class A1'),
(6, '2023-01-31 12:45:17', 'Act', '<p>Hello, World!</p>', '1212', 'Class A1'),
(7, '2023-01-31 12:48:45', 'Act', '<p>Hello, World!</p>', '1212', 'Class A1'),
(8, '2023-01-31 12:52:28', 'Act', '<p>Hello, World!</p>', '1212', 'Class A1'),
(9, '2023-01-31 14:30:29', 'Act amitofo', '<p>Hello, World!</p>', '1212', 'Class A1'),
(13, '2023-01-31 16:50:33', 'Act 7', '<p>Hello, World!</p>', '1212', 'Class A1');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `annID` int(11) NOT NULL,
  `annDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `annTitle` text NOT NULL,
  `annText` longtext NOT NULL,
  `annStatus` tinyint(1) NOT NULL DEFAULT 0,
  `tIC` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`annID`, `annDate`, `annTitle`, `annText`, `annStatus`, `tIC`) VALUES
(9, '2023-01-31 08:48:31', '2333', '<p>2222Hello, World!</p>', 0, '1212'),
(18, '2023-01-31 09:40:58', 'Some HTML', '<p>Hello, World!</p>', 0, '1212'),
(20, '2023-01-31 09:55:13', 'hha', '<p>Hello, World!</p>', 0, '1212'),
(21, '2023-01-31 09:57:57', 'Activities and Assessment (Assignments & Projects)', '<p>Hello, World!</p>', 1, '1212'),
(22, '2023-01-31 09:59:34', 'Embedded media', '<p>Hello, World!</p>', 0, '1212'),
(59, '2023-01-31 10:18:36', 'Some HTML', '', 0, '1212'),
(63, '2023-01-31 10:24:43', 'Some HTML', '<p>Hello World</p>', 0, '1212'),
(64, '2023-01-31 10:24:46', 'dd', '<p>Hello World</p>', 0, '1212'),
(65, '2023-01-31 10:24:52', 'ddddd', '<p>Hello World</p>', 0, '1212'),
(67, '2023-01-31 10:25:31', 'd', '<p>Hello World</p>', 0, '1212'),
(79, '2023-01-31 11:05:15', 'File(s) to download', '<p>Hello, World!</p>', 0, '1212'),
(89, '2023-01-31 15:31:10', 'Embedded', '<p>Hello, World!</p>', 0, '1212');

-- --------------------------------------------------------

--
-- Table structure for table `attendancestd`
--

CREATE TABLE `attendancestd` (
  `attID` int(11) NOT NULL,
  `attDate` date NOT NULL,
  `stdMKN` char(12) NOT NULL,
  `attReason` varchar(255) DEFAULT NULL,
  `attExpect` tinyint(1) NOT NULL DEFAULT 1,
  `attConfirm` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendancestd`
--

INSERT INTO `attendancestd` (`attID`, `attDate`, `stdMKN`, `attReason`, `attExpect`, `attConfirm`) VALUES
(65, '2023-02-01', '02021', 'hahahahah', 0, 0),
(66, '2023-02-01', '01011', NULL, 2, 1),
(67, '2023-02-01', '02022', NULL, 2, 1),
(68, '2023-01-27', '01012', NULL, 2, 1),
(69, '2023-01-27', '02023', NULL, 2, 1),
(70, '2023-02-02', '01012', 'gerhesrhexth', 1, 1),
(71, '2023-02-01', '01012', 'hi', 1, 1),
(72, '2023-02-01', '02023', NULL, 2, 1),
(73, '2023-01-16', '01011', NULL, 2, 1),
(74, '2023-01-16', '02021', NULL, 2, 1),
(75, '2023-01-16', '02022', NULL, 2, 1),
(76, '2023-01-16', '01012', NULL, 2, 1),
(77, '2023-01-16', '02023', NULL, 2, 1),
(78, '2023-01-31', '01011', '', 1, 1),
(79, '2023-01-30', '01011', NULL, 2, 1),
(80, '2023-01-30', '02021', NULL, 2, 0),
(81, '2023-01-30', '02022', NULL, 2, 0),
(82, '2023-02-02', '01011', 'perut sakit', 0, 0),
(83, '2023-01-30', '010110', NULL, 2, 0),
(84, '2023-01-23', '01011', NULL, 2, 1),
(85, '2023-01-23', '010110', NULL, 2, 1),
(86, '2023-01-23', '02021', NULL, 2, 1),
(87, '2023-01-23', '02022', NULL, 2, 1),
(88, '2023-01-31', '010110', NULL, 2, 1),
(89, '2023-01-31', '02021', NULL, 2, 1),
(90, '2023-01-31', '02022', NULL, 2, 1),
(91, '0000-00-00', '01011', NULL, 2, 0),
(92, '0000-00-00', '010110', NULL, 2, 1),
(93, '0000-00-00', '02021', NULL, 2, 0),
(94, '0000-00-00', '02022', NULL, 2, 0);

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
  `fTot` decimal(8,2) DEFAULT NULL,
  `stdMKN` char(12) NOT NULL,
  `payDate` timestamp NULL DEFAULT NULL,
  `payStatus` tinyint(1) NOT NULL,
  `fPhoto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fID`, `fDate`, `fDesc`, `fTot`, `stdMKN`, `payDate`, `payStatus`, `fPhoto`) VALUES
(299, '2023-01-24', '', '820.00', '01011', NULL, 0, NULL),
(300, '2023-01-24', '', '250.00', '010110', '2023-02-01 08:58:28', 0, 'financialImg/Student Information.png'),
(301, '2023-01-24', NULL, '250.00', '01012', NULL, 0, NULL),
(302, '2023-01-24', NULL, '250.00', '02021', NULL, 0, NULL),
(303, '2023-01-24', NULL, '250.00', '02022', NULL, 0, NULL),
(304, '2023-01-24', NULL, '250.00', '02023', NULL, 0, NULL),
(305, '2023-01-24', NULL, NULL, '01011', NULL, 0, NULL),
(352, '2023-02-03', NULL, '250.00', '01011', NULL, 0, NULL),
(353, '2023-02-03', NULL, '250.00', '010110', NULL, 0, NULL),
(354, '2023-02-03', NULL, '250.00', '01012', NULL, 0, NULL),
(355, '2023-02-03', NULL, '250.00', '02021', NULL, 0, NULL),
(356, '2023-02-03', NULL, '250.00', '02022', NULL, 0, NULL),
(357, '2023-02-03', NULL, '250.00', '02023', NULL, 0, NULL),
(358, '2022-11-28', NULL, '250.00', '01011', NULL, 0, NULL),
(359, '2022-11-28', NULL, '250.00', '010110', NULL, 0, NULL),
(360, '2022-11-28', NULL, '250.00', '01012', NULL, 0, NULL),
(361, '2022-11-28', NULL, '250.00', '02021', NULL, 0, NULL),
(362, '2022-11-28', NULL, '250.00', '02022', NULL, 0, NULL),
(363, '2022-11-28', NULL, '250.00', '02023', NULL, 0, NULL),
(364, '2022-08-28', '', '360.00', '01011', NULL, 0, NULL),
(365, '2022-08-28', NULL, '250.00', '010110', NULL, 0, NULL),
(366, '2022-08-28', NULL, '250.00', '01012', NULL, 0, NULL),
(367, '2022-08-28', NULL, '250.00', '02021', NULL, 0, NULL),
(368, '2022-08-28', NULL, '250.00', '02022', NULL, 0, NULL),
(369, '2022-08-28', NULL, '250.00', '02023', NULL, 0, NULL),
(370, '2023-03-08', NULL, '250.00', '01011', NULL, 0, NULL),
(371, '2023-03-08', NULL, '250.00', '010110', NULL, 0, NULL),
(372, '2023-03-08', NULL, '250.00', '01012', NULL, 0, NULL),
(373, '2023-03-08', NULL, '250.00', '02021', NULL, 0, NULL),
(374, '2023-03-08', NULL, '250.00', '02022', NULL, 0, NULL),
(375, '2023-03-08', NULL, '250.00', '02023', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feesitem`
--

CREATE TABLE `feesitem` (
  `prgsID` int(11) NOT NULL,
  `fID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feesitem`
--

INSERT INTO `feesitem` (`prgsID`, `fID`) VALUES
(1, 300),
(1, 301),
(1, 302),
(1, 303),
(1, 304),
(1, 352),
(1, 353),
(1, 354),
(1, 355),
(1, 356),
(1, 357),
(1, 358),
(1, 359),
(1, 360),
(1, 361),
(1, 362),
(1, 363),
(1, 364),
(1, 365),
(1, 366),
(1, 367),
(1, 368),
(1, 369),
(1, 370),
(1, 371),
(1, 372),
(1, 373),
(1, 374),
(1, 375),
(10, 364),
(13, 364),
(14, 299),
(15, 299);

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
(1, 'visual', 'comment'),
(2, 'audio', 'comment'),
(4, 'bahasa', 'comment'),
(5, 'logik', 'comment'),
(6, 'muzikal', 'comment'),
(8, 'kinestik', 'comment'),
(9, 'interpersonal', 'comment'),
(10, 'intrapersonal', 'comment'),
(11, 'naturals', 'comment'),
(12, 'existentials', 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `indexsubject`
--

CREATE TABLE `indexsubject` (
  `iName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indexsubject`
--

INSERT INTO `indexsubject` (`iName`) VALUES
('audio'),
('bahasa'),
('existentials'),
('interpersonal'),
('intrapersonal'),
('kinestik'),
('logik'),
('muzikal '),
('naturals'),
('visual');

-- --------------------------------------------------------

--
-- Table structure for table `itype`
--

CREATE TABLE `itype` (
  `iType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itype`
--

INSERT INTO `itype` (`iType`) VALUES
('comment');

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
  `pEmail` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pIC`, `pName`, `pPassword`, `pAddress`, `pCity`, `pPostCode`, `pState`, `pOccupation`, `pEmail`) VALUES
('0101', 'Ng Zi Herng', '1', 'harta plazza', 'Pontian Kechil', '82000', 'Johor', 'sdfgp', 'ngxing@graduate.utm.my'),
('0202', 'NG ZI XING', '1', 'harta plazza', 'Pontian Kechil', '82000', 'Johor', 'Students', 'ngzixing@yahoo.com'),
('0303', 'LOO ZHI YUAN', '1', '89', '1212', '1212', '1212', '1212', '1212'),
('0707', 'LOO ZHI LOO', '1', 'xxx', 'Brooklyn', '11206', 'New York', 'Student', 'rihoj47815@covbase.com');

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
(31, '01011', '1', 1, '2023-02-13'),
(32, '01012', '1', 1, '2023-02-13'),
(33, '02021', '1', 1, '2023-02-13'),
(34, '02022', '1', 1, '2023-02-13'),
(35, '02023', '1', 1, '2023-02-13'),
(36, '02024', '1', 1, '2023-02-13'),
(37, '03031', '1', 1, '2023-02-13'),
(38, '07071', '1', 1, '2023-02-13'),
(39, '07072', '1', 1, '2023-02-13'),
(40, '07073', '1', 1, '2023-02-13'),
(41, '07074', '1', 1, '2023-02-13'),
(42, '01011', '1', 1, '2023-02-01'),
(43, '01011', '1', 1, '2023-03-11'),
(44, '01011', '1', 1, '2023-03-11'),
(45, '01011', '2', 1, '2023-03-11'),
(46, '01012', '2', 1, '2023-03-11'),
(47, '02021', '2', 1, '2023-03-11'),
(48, '02022', '2', 1, '2023-03-11'),
(49, '02023', '2', 1, '2023-03-11'),
(50, '02024', '2', 1, '2023-03-11'),
(51, '03031', '2', 1, '2023-03-11'),
(52, '07071', '2', 1, '2023-03-11'),
(53, '07072', '2', 1, '2023-03-11'),
(54, '07073', '2', 1, '2023-03-11'),
(55, '07074', '2', 1, '2023-03-11'),
(56, '01011', '3', 2, '0000-00-00'),
(57, '01012', '3', 2, '0000-00-00'),
(58, '02021', '3', 2, '0000-00-00'),
(59, '02022', '3', 2, '0000-00-00'),
(60, '02023', '3', 2, '0000-00-00'),
(61, '02024', '3', 2, '0000-00-00'),
(62, '03031', '3', 2, '0000-00-00'),
(63, '07071', '3', 2, '0000-00-00'),
(64, '07072', '3', 2, '0000-00-00'),
(65, '07073', '3', 2, '0000-00-00'),
(66, '07074', '3', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `performbased`
--

CREATE TABLE `performbased` (
  `pbID` int(11) NOT NULL,
  `pIName` int(11) NOT NULL,
  `ptName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performbased`
--

INSERT INTO `performbased` (`pbID`, `pIName`, `ptName`) VALUES
(1, 1, 'kecerdasan'),
(2, 1, 'vak'),
(3, 2, 'kecerdasan'),
(4, 2, 'vak'),
(5, 4, 'kecerdasan'),
(6, 5, 'kecerdasan'),
(7, 6, 'kecerdasan'),
(8, 8, 'kecerdasan'),
(9, 8, 'vak'),
(10, 9, 'kecerdasan'),
(11, 10, 'kecerdasan'),
(12, 11, 'kecerdasan'),
(13, 12, 'kecerdasan');

-- --------------------------------------------------------

--
-- Table structure for table `performcomment`
--

CREATE TABLE `performcomment` (
  `performanceID` int(11) NOT NULL,
  `iPerID` int(11) NOT NULL,
  `pcComment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performcomment`
--

INSERT INTO `performcomment` (`performanceID`, `iPerID`, `pcComment`) VALUES
(31, 1, 'w333'),
(31, 2, NULL),
(31, 3, ''),
(31, 4, NULL),
(31, 5, ''),
(31, 6, ''),
(31, 7, ''),
(31, 8, ''),
(31, 9, NULL),
(31, 10, ''),
(31, 11, ''),
(31, 12, ''),
(31, 13, ''),
(32, 1, '1'),
(32, 3, ''),
(32, 5, ''),
(32, 6, ''),
(32, 7, ''),
(32, 8, ''),
(32, 10, ''),
(32, 11, ''),
(32, 12, '6'),
(32, 13, '9'),
(33, 1, '333'),
(33, 2, NULL),
(33, 3, '456'),
(33, 4, NULL),
(33, 5, '3333'),
(33, 6, '66'),
(33, 7, ''),
(33, 8, ''),
(33, 9, NULL),
(33, 10, ''),
(33, 11, ''),
(33, 12, ''),
(33, 13, ''),
(34, 1, NULL),
(34, 2, NULL),
(34, 3, NULL),
(34, 4, NULL),
(34, 5, NULL),
(34, 6, NULL),
(34, 7, NULL),
(34, 8, NULL),
(34, 9, NULL),
(34, 10, NULL),
(34, 11, NULL),
(34, 12, NULL),
(34, 13, NULL),
(35, 1, NULL),
(35, 3, NULL),
(35, 5, NULL),
(35, 6, NULL),
(35, 7, NULL),
(35, 8, NULL),
(35, 10, NULL),
(35, 11, NULL),
(35, 12, NULL),
(35, 13, NULL),
(36, 1, NULL),
(36, 2, NULL),
(36, 3, NULL),
(36, 4, NULL),
(36, 5, NULL),
(36, 6, NULL),
(36, 7, NULL),
(36, 8, NULL),
(36, 9, NULL),
(36, 10, NULL),
(36, 11, NULL),
(36, 12, NULL),
(36, 13, NULL),
(37, 1, '1'),
(37, 2, NULL),
(37, 3, ''),
(37, 4, NULL),
(37, 5, ''),
(37, 6, ''),
(37, 7, '123'),
(37, 8, ''),
(37, 9, NULL),
(37, 10, ''),
(37, 11, ''),
(37, 12, ''),
(37, 13, ''),
(38, 1, '2322'),
(38, 2, NULL),
(38, 3, 'rer3'),
(38, 4, NULL),
(38, 5, '3333'),
(38, 6, ''),
(38, 7, ''),
(38, 8, ''),
(38, 9, NULL),
(38, 10, ''),
(38, 11, ''),
(38, 12, ''),
(38, 13, ''),
(39, 1, NULL),
(39, 2, NULL),
(39, 3, NULL),
(39, 4, NULL),
(39, 5, NULL),
(39, 6, NULL),
(39, 7, NULL),
(39, 8, NULL),
(39, 9, NULL),
(39, 10, NULL),
(39, 11, NULL),
(39, 12, NULL),
(39, 13, NULL),
(40, 1, NULL),
(40, 2, NULL),
(40, 3, NULL),
(40, 4, NULL),
(40, 5, NULL),
(40, 6, NULL),
(40, 7, NULL),
(40, 8, NULL),
(40, 9, NULL),
(40, 10, NULL),
(40, 11, NULL),
(40, 12, NULL),
(40, 13, NULL),
(41, 1, NULL),
(41, 2, NULL),
(41, 3, NULL),
(41, 4, NULL),
(41, 5, NULL),
(41, 6, NULL),
(41, 7, NULL),
(41, 8, NULL),
(41, 9, NULL),
(41, 10, NULL),
(41, 11, NULL),
(41, 12, NULL),
(41, 13, NULL),
(45, 1, NULL),
(45, 2, NULL),
(45, 3, NULL),
(45, 4, NULL),
(45, 5, NULL),
(45, 6, NULL),
(45, 7, NULL),
(45, 8, NULL),
(45, 9, NULL),
(45, 10, NULL),
(45, 11, NULL),
(45, 12, NULL),
(45, 13, NULL),
(46, 1, NULL),
(46, 3, NULL),
(46, 5, NULL),
(46, 6, NULL),
(46, 7, NULL),
(46, 8, NULL),
(46, 10, NULL),
(46, 11, NULL),
(46, 12, NULL),
(46, 13, NULL),
(47, 1, NULL),
(47, 2, NULL),
(47, 3, NULL),
(47, 4, NULL),
(47, 5, NULL),
(47, 6, NULL),
(47, 7, NULL),
(47, 8, NULL),
(47, 9, NULL),
(47, 10, NULL),
(47, 11, NULL),
(47, 12, NULL),
(47, 13, NULL),
(48, 1, NULL),
(48, 2, NULL),
(48, 3, NULL),
(48, 4, NULL),
(48, 5, NULL),
(48, 6, NULL),
(48, 7, NULL),
(48, 8, NULL),
(48, 9, NULL),
(48, 10, NULL),
(48, 11, NULL),
(48, 12, NULL),
(48, 13, NULL),
(49, 1, NULL),
(49, 3, NULL),
(49, 5, NULL),
(49, 6, NULL),
(49, 7, NULL),
(49, 8, NULL),
(49, 10, NULL),
(49, 11, NULL),
(49, 12, NULL),
(49, 13, NULL),
(50, 1, NULL),
(50, 2, NULL),
(50, 3, NULL),
(50, 4, NULL),
(50, 5, NULL),
(50, 6, NULL),
(50, 7, NULL),
(50, 8, NULL),
(50, 9, NULL),
(50, 10, NULL),
(50, 11, NULL),
(50, 12, NULL),
(50, 13, NULL),
(51, 1, NULL),
(51, 2, NULL),
(51, 3, NULL),
(51, 4, NULL),
(51, 5, NULL),
(51, 6, NULL),
(51, 7, NULL),
(51, 8, NULL),
(51, 9, NULL),
(51, 10, NULL),
(51, 11, NULL),
(51, 12, NULL),
(51, 13, NULL),
(52, 1, NULL),
(52, 2, NULL),
(52, 3, NULL),
(52, 4, NULL),
(52, 5, NULL),
(52, 6, NULL),
(52, 7, NULL),
(52, 8, NULL),
(52, 9, NULL),
(52, 10, NULL),
(52, 11, NULL),
(52, 12, NULL),
(52, 13, NULL),
(53, 1, NULL),
(53, 2, NULL),
(53, 3, NULL),
(53, 4, NULL),
(53, 5, NULL),
(53, 6, NULL),
(53, 7, NULL),
(53, 8, NULL),
(53, 9, NULL),
(53, 10, NULL),
(53, 11, NULL),
(53, 12, NULL),
(53, 13, NULL),
(54, 1, NULL),
(54, 2, NULL),
(54, 3, NULL),
(54, 4, NULL),
(54, 5, NULL),
(54, 6, NULL),
(54, 7, NULL),
(54, 8, NULL),
(54, 9, NULL),
(54, 10, NULL),
(54, 11, NULL),
(54, 12, NULL),
(54, 13, NULL),
(55, 1, NULL),
(55, 2, NULL),
(55, 3, NULL),
(55, 4, NULL),
(55, 5, NULL),
(55, 6, NULL),
(55, 7, NULL),
(55, 8, NULL),
(55, 9, NULL),
(55, 10, NULL),
(55, 11, NULL),
(55, 12, NULL),
(55, 13, NULL),
(56, 1, NULL),
(56, 2, NULL),
(56, 3, NULL),
(56, 4, NULL),
(56, 5, NULL),
(56, 6, NULL),
(56, 7, NULL),
(56, 8, NULL),
(56, 9, NULL),
(56, 10, NULL),
(56, 11, NULL),
(56, 12, NULL),
(56, 13, NULL),
(57, 1, NULL),
(57, 3, NULL),
(57, 5, NULL),
(57, 6, NULL),
(57, 7, NULL),
(57, 8, NULL),
(57, 10, NULL),
(57, 11, NULL),
(57, 12, NULL),
(57, 13, NULL),
(58, 1, NULL),
(58, 2, NULL),
(58, 3, NULL),
(58, 4, NULL),
(58, 5, NULL),
(58, 6, NULL),
(58, 7, NULL),
(58, 8, NULL),
(58, 9, NULL),
(58, 10, NULL),
(58, 11, NULL),
(58, 12, NULL),
(58, 13, NULL),
(59, 1, NULL),
(59, 2, NULL),
(59, 3, NULL),
(59, 4, NULL),
(59, 5, NULL),
(59, 6, NULL),
(59, 7, NULL),
(59, 8, NULL),
(59, 9, NULL),
(59, 10, NULL),
(59, 11, NULL),
(59, 12, NULL),
(59, 13, NULL),
(60, 1, NULL),
(60, 3, NULL),
(60, 5, NULL),
(60, 6, NULL),
(60, 7, NULL),
(60, 8, NULL),
(60, 10, NULL),
(60, 11, NULL),
(60, 12, NULL),
(60, 13, NULL),
(61, 1, NULL),
(61, 2, NULL),
(61, 3, NULL),
(61, 4, NULL),
(61, 5, NULL),
(61, 6, NULL),
(61, 7, NULL),
(61, 8, NULL),
(61, 9, NULL),
(61, 10, NULL),
(61, 11, NULL),
(61, 12, NULL),
(61, 13, NULL),
(62, 1, NULL),
(62, 2, NULL),
(62, 3, NULL),
(62, 4, NULL),
(62, 5, NULL),
(62, 6, NULL),
(62, 7, NULL),
(62, 8, NULL),
(62, 9, NULL),
(62, 10, NULL),
(62, 11, NULL),
(62, 12, NULL),
(62, 13, NULL),
(63, 1, NULL),
(63, 2, NULL),
(63, 3, NULL),
(63, 4, NULL),
(63, 5, NULL),
(63, 6, NULL),
(63, 7, NULL),
(63, 8, NULL),
(63, 9, NULL),
(63, 10, NULL),
(63, 11, NULL),
(63, 12, NULL),
(63, 13, NULL),
(64, 1, NULL),
(64, 2, NULL),
(64, 3, NULL),
(64, 4, NULL),
(64, 5, NULL),
(64, 6, NULL),
(64, 7, NULL),
(64, 8, NULL),
(64, 9, NULL),
(64, 10, NULL),
(64, 11, NULL),
(64, 12, NULL),
(64, 13, NULL),
(65, 1, NULL),
(65, 2, NULL),
(65, 3, NULL),
(65, 4, NULL),
(65, 5, NULL),
(65, 6, NULL),
(65, 7, NULL),
(65, 8, NULL),
(65, 9, NULL),
(65, 10, NULL),
(65, 11, NULL),
(65, 12, NULL),
(65, 13, NULL),
(66, 1, NULL),
(66, 2, NULL),
(66, 3, NULL),
(66, 4, NULL),
(66, 5, NULL),
(66, 6, NULL),
(66, 7, NULL),
(66, 8, NULL),
(66, 9, NULL),
(66, 10, NULL),
(66, 11, NULL),
(66, 12, NULL),
(66, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `performrating`
--

CREATE TABLE `performrating` (
  `performanceID` int(11) NOT NULL,
  `sbjPerID` int(11) NOT NULL,
  `pIDesc` varchar(255) DEFAULT NULL,
  `ratingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performrating`
--

INSERT INTO `performrating` (`performanceID`, `sbjPerID`, `pIDesc`, `ratingID`) VALUES
(31, 1, NULL, NULL),
(31, 2, NULL, NULL),
(31, 3, NULL, NULL),
(31, 4, NULL, NULL),
(31, 5, NULL, NULL),
(31, 6, NULL, NULL),
(31, 7, NULL, NULL),
(31, 8, NULL, NULL),
(31, 9, NULL, NULL),
(31, 10, NULL, NULL),
(31, 11, NULL, NULL),
(31, 12, NULL, NULL),
(31, 13, NULL, NULL),
(31, 14, NULL, NULL),
(31, 15, NULL, NULL),
(31, 16, NULL, NULL),
(31, 17, NULL, NULL),
(31, 18, NULL, NULL),
(31, 19, NULL, NULL),
(31, 20, NULL, NULL),
(32, 1, NULL, NULL),
(32, 2, NULL, NULL),
(32, 3, NULL, NULL),
(32, 4, NULL, NULL),
(32, 5, NULL, 6),
(32, 6, NULL, 1),
(32, 7, NULL, 4),
(32, 8, NULL, 4),
(32, 9, NULL, 5),
(32, 10, NULL, 1),
(32, 11, NULL, 1),
(32, 12, NULL, 1),
(32, 13, NULL, NULL),
(32, 14, NULL, NULL),
(32, 15, NULL, NULL),
(32, 16, NULL, NULL),
(32, 17, NULL, NULL),
(32, 18, NULL, NULL),
(32, 19, NULL, NULL),
(32, 20, NULL, NULL),
(33, 1, NULL, NULL),
(33, 2, NULL, NULL),
(33, 3, NULL, NULL),
(33, 4, NULL, NULL),
(33, 5, NULL, NULL),
(33, 6, NULL, NULL),
(33, 7, NULL, NULL),
(33, 8, NULL, NULL),
(33, 9, NULL, NULL),
(33, 10, NULL, NULL),
(33, 11, NULL, NULL),
(33, 12, NULL, NULL),
(33, 13, NULL, NULL),
(33, 14, NULL, NULL),
(33, 15, NULL, NULL),
(33, 16, NULL, NULL),
(33, 17, NULL, NULL),
(33, 18, NULL, NULL),
(33, 19, NULL, NULL),
(33, 20, NULL, NULL),
(34, 1, NULL, NULL),
(34, 2, NULL, NULL),
(34, 3, NULL, NULL),
(34, 4, NULL, NULL),
(34, 5, NULL, NULL),
(34, 6, NULL, NULL),
(34, 7, NULL, NULL),
(34, 8, NULL, NULL),
(34, 9, NULL, NULL),
(34, 10, NULL, NULL),
(34, 11, NULL, NULL),
(34, 12, NULL, NULL),
(34, 13, NULL, NULL),
(34, 14, NULL, NULL),
(34, 15, NULL, NULL),
(34, 16, NULL, NULL),
(34, 17, NULL, NULL),
(34, 18, NULL, NULL),
(34, 19, NULL, NULL),
(34, 20, NULL, NULL),
(35, 1, NULL, NULL),
(35, 2, NULL, NULL),
(35, 3, NULL, NULL),
(35, 4, NULL, NULL),
(35, 5, NULL, 6),
(35, 6, NULL, 1),
(35, 7, NULL, 3),
(35, 8, NULL, 4),
(35, 9, NULL, NULL),
(35, 10, NULL, NULL),
(35, 11, NULL, NULL),
(35, 12, NULL, NULL),
(35, 13, NULL, NULL),
(35, 14, NULL, NULL),
(35, 15, NULL, NULL),
(35, 16, NULL, NULL),
(35, 17, NULL, NULL),
(35, 18, NULL, NULL),
(35, 19, NULL, NULL),
(35, 20, NULL, NULL),
(36, 1, NULL, NULL),
(36, 2, NULL, NULL),
(36, 3, NULL, NULL),
(36, 4, NULL, NULL),
(36, 5, NULL, NULL),
(36, 6, NULL, NULL),
(36, 7, NULL, NULL),
(36, 8, NULL, NULL),
(36, 9, NULL, NULL),
(36, 10, NULL, NULL),
(36, 11, NULL, NULL),
(36, 12, NULL, NULL),
(36, 13, NULL, NULL),
(36, 14, NULL, NULL),
(36, 15, NULL, NULL),
(36, 16, NULL, NULL),
(36, 17, NULL, NULL),
(36, 18, NULL, NULL),
(36, 19, NULL, NULL),
(36, 20, NULL, NULL),
(37, 1, NULL, NULL),
(37, 2, NULL, NULL),
(37, 3, NULL, NULL),
(37, 4, NULL, NULL),
(37, 5, NULL, NULL),
(37, 6, NULL, NULL),
(37, 7, NULL, NULL),
(37, 8, NULL, NULL),
(37, 9, NULL, NULL),
(37, 10, NULL, NULL),
(37, 11, NULL, NULL),
(37, 12, NULL, NULL),
(37, 13, NULL, NULL),
(37, 14, NULL, NULL),
(37, 15, NULL, NULL),
(37, 16, NULL, NULL),
(37, 17, NULL, NULL),
(37, 18, NULL, NULL),
(37, 19, NULL, NULL),
(37, 20, NULL, NULL),
(38, 1, NULL, NULL),
(38, 2, NULL, NULL),
(38, 3, NULL, NULL),
(38, 4, NULL, NULL),
(38, 5, NULL, NULL),
(38, 6, NULL, NULL),
(38, 7, NULL, NULL),
(38, 8, NULL, NULL),
(38, 9, NULL, NULL),
(38, 10, NULL, NULL),
(38, 11, NULL, NULL),
(38, 12, NULL, NULL),
(38, 13, NULL, NULL),
(38, 14, NULL, NULL),
(38, 15, NULL, NULL),
(38, 16, NULL, NULL),
(38, 17, NULL, NULL),
(38, 18, NULL, NULL),
(38, 19, NULL, NULL),
(38, 20, NULL, NULL),
(39, 1, NULL, NULL),
(39, 2, NULL, NULL),
(39, 3, NULL, NULL),
(39, 4, NULL, NULL),
(39, 5, NULL, NULL),
(39, 6, NULL, NULL),
(39, 7, NULL, NULL),
(39, 8, NULL, NULL),
(39, 9, NULL, NULL),
(39, 10, NULL, NULL),
(39, 11, NULL, NULL),
(39, 12, NULL, NULL),
(39, 13, NULL, NULL),
(39, 14, NULL, NULL),
(39, 15, NULL, NULL),
(39, 16, NULL, NULL),
(39, 17, NULL, NULL),
(39, 18, NULL, NULL),
(39, 19, NULL, NULL),
(39, 20, NULL, NULL),
(40, 1, NULL, NULL),
(40, 2, NULL, NULL),
(40, 3, NULL, NULL),
(40, 4, NULL, NULL),
(40, 5, NULL, NULL),
(40, 6, NULL, NULL),
(40, 7, NULL, NULL),
(40, 8, NULL, NULL),
(40, 9, NULL, NULL),
(40, 10, NULL, NULL),
(40, 11, NULL, NULL),
(40, 12, NULL, NULL),
(40, 13, NULL, NULL),
(40, 14, NULL, NULL),
(40, 15, NULL, NULL),
(40, 16, NULL, NULL),
(40, 17, NULL, NULL),
(40, 18, NULL, NULL),
(40, 19, NULL, NULL),
(40, 20, NULL, NULL),
(41, 1, NULL, NULL),
(41, 2, NULL, NULL),
(41, 3, NULL, NULL),
(41, 4, NULL, NULL),
(41, 5, NULL, NULL),
(41, 6, NULL, NULL),
(41, 7, NULL, NULL),
(41, 8, NULL, NULL),
(41, 9, NULL, NULL),
(41, 10, NULL, NULL),
(41, 11, NULL, NULL),
(41, 12, NULL, NULL),
(41, 13, NULL, NULL),
(41, 14, NULL, NULL),
(41, 15, NULL, NULL),
(41, 16, NULL, NULL),
(41, 17, NULL, NULL),
(41, 18, NULL, NULL),
(41, 19, NULL, NULL),
(41, 20, NULL, NULL),
(45, 1, NULL, NULL),
(45, 2, NULL, NULL),
(45, 3, NULL, NULL),
(45, 4, NULL, NULL),
(45, 5, NULL, NULL),
(45, 6, NULL, NULL),
(45, 7, NULL, NULL),
(45, 8, NULL, NULL),
(45, 9, NULL, NULL),
(45, 10, NULL, NULL),
(45, 11, NULL, NULL),
(45, 12, NULL, NULL),
(45, 13, NULL, NULL),
(45, 14, NULL, NULL),
(45, 15, NULL, NULL),
(45, 16, NULL, NULL),
(45, 17, NULL, NULL),
(45, 18, NULL, NULL),
(45, 19, NULL, NULL),
(45, 20, NULL, NULL),
(46, 1, NULL, NULL),
(46, 2, NULL, NULL),
(46, 3, NULL, NULL),
(46, 4, NULL, NULL),
(46, 5, NULL, NULL),
(46, 6, NULL, NULL),
(46, 7, NULL, NULL),
(46, 8, NULL, NULL),
(46, 9, NULL, NULL),
(46, 10, NULL, NULL),
(46, 11, NULL, NULL),
(46, 12, NULL, NULL),
(46, 13, NULL, NULL),
(46, 14, NULL, NULL),
(46, 15, NULL, NULL),
(46, 16, NULL, NULL),
(46, 17, NULL, NULL),
(46, 18, NULL, NULL),
(46, 19, NULL, NULL),
(46, 20, NULL, NULL),
(47, 1, NULL, NULL),
(47, 2, NULL, NULL),
(47, 3, NULL, NULL),
(47, 4, NULL, NULL),
(47, 5, NULL, NULL),
(47, 6, NULL, NULL),
(47, 7, NULL, NULL),
(47, 8, NULL, NULL),
(47, 9, NULL, NULL),
(47, 10, NULL, NULL),
(47, 11, NULL, NULL),
(47, 12, NULL, NULL),
(47, 13, NULL, NULL),
(47, 14, NULL, NULL),
(47, 15, NULL, NULL),
(47, 16, NULL, NULL),
(47, 17, NULL, NULL),
(47, 18, NULL, NULL),
(47, 19, NULL, NULL),
(47, 20, NULL, NULL),
(48, 1, NULL, NULL),
(48, 2, NULL, NULL),
(48, 3, NULL, NULL),
(48, 4, NULL, NULL),
(48, 5, NULL, NULL),
(48, 6, NULL, NULL),
(48, 7, NULL, NULL),
(48, 8, NULL, NULL),
(48, 9, NULL, NULL),
(48, 10, NULL, NULL),
(48, 11, NULL, NULL),
(48, 12, NULL, NULL),
(48, 13, NULL, NULL),
(48, 14, NULL, NULL),
(48, 15, NULL, NULL),
(48, 16, NULL, NULL),
(48, 17, NULL, NULL),
(48, 18, NULL, NULL),
(48, 19, NULL, NULL),
(48, 20, NULL, NULL),
(49, 1, NULL, NULL),
(49, 2, NULL, NULL),
(49, 3, NULL, NULL),
(49, 4, NULL, NULL),
(49, 5, NULL, NULL),
(49, 6, NULL, NULL),
(49, 7, NULL, NULL),
(49, 8, NULL, NULL),
(49, 9, NULL, NULL),
(49, 10, NULL, NULL),
(49, 11, NULL, NULL),
(49, 12, NULL, NULL),
(49, 13, NULL, NULL),
(49, 14, NULL, NULL),
(49, 15, NULL, NULL),
(49, 16, NULL, NULL),
(49, 17, NULL, NULL),
(49, 18, NULL, NULL),
(49, 19, NULL, NULL),
(49, 20, NULL, NULL),
(50, 1, NULL, NULL),
(50, 2, NULL, NULL),
(50, 3, NULL, NULL),
(50, 4, NULL, NULL),
(50, 5, NULL, NULL),
(50, 6, NULL, NULL),
(50, 7, NULL, NULL),
(50, 8, NULL, NULL),
(50, 9, NULL, NULL),
(50, 10, NULL, NULL),
(50, 11, NULL, NULL),
(50, 12, NULL, NULL),
(50, 13, NULL, NULL),
(50, 14, NULL, NULL),
(50, 15, NULL, NULL),
(50, 16, NULL, NULL),
(50, 17, NULL, NULL),
(50, 18, NULL, NULL),
(50, 19, NULL, NULL),
(50, 20, NULL, NULL),
(51, 1, NULL, NULL),
(51, 2, NULL, NULL),
(51, 3, NULL, NULL),
(51, 4, NULL, NULL),
(51, 5, NULL, NULL),
(51, 6, NULL, NULL),
(51, 7, NULL, NULL),
(51, 8, NULL, NULL),
(51, 9, NULL, NULL),
(51, 10, NULL, NULL),
(51, 11, NULL, NULL),
(51, 12, NULL, NULL),
(51, 13, NULL, NULL),
(51, 14, NULL, NULL),
(51, 15, NULL, NULL),
(51, 16, NULL, NULL),
(51, 17, NULL, NULL),
(51, 18, NULL, NULL),
(51, 19, NULL, NULL),
(51, 20, NULL, NULL),
(52, 1, NULL, NULL),
(52, 2, NULL, NULL),
(52, 3, NULL, NULL),
(52, 4, NULL, NULL),
(52, 5, NULL, NULL),
(52, 6, NULL, NULL),
(52, 7, NULL, NULL),
(52, 8, NULL, NULL),
(52, 9, NULL, NULL),
(52, 10, NULL, NULL),
(52, 11, NULL, NULL),
(52, 12, NULL, NULL),
(52, 13, NULL, NULL),
(52, 14, NULL, NULL),
(52, 15, NULL, NULL),
(52, 16, NULL, NULL),
(52, 17, NULL, NULL),
(52, 18, NULL, NULL),
(52, 19, NULL, NULL),
(52, 20, NULL, NULL),
(53, 1, NULL, NULL),
(53, 2, NULL, NULL),
(53, 3, NULL, NULL),
(53, 4, NULL, NULL),
(53, 5, NULL, NULL),
(53, 6, NULL, NULL),
(53, 7, NULL, NULL),
(53, 8, NULL, NULL),
(53, 9, NULL, NULL),
(53, 10, NULL, NULL),
(53, 11, NULL, NULL),
(53, 12, NULL, NULL),
(53, 13, NULL, NULL),
(53, 14, NULL, NULL),
(53, 15, NULL, NULL),
(53, 16, NULL, NULL),
(53, 17, NULL, NULL),
(53, 18, NULL, NULL),
(53, 19, NULL, NULL),
(53, 20, NULL, NULL),
(54, 1, NULL, NULL),
(54, 2, NULL, NULL),
(54, 3, NULL, NULL),
(54, 4, NULL, NULL),
(54, 5, NULL, NULL),
(54, 6, NULL, NULL),
(54, 7, NULL, NULL),
(54, 8, NULL, NULL),
(54, 9, NULL, NULL),
(54, 10, NULL, NULL),
(54, 11, NULL, NULL),
(54, 12, NULL, NULL),
(54, 13, NULL, NULL),
(54, 14, NULL, NULL),
(54, 15, NULL, NULL),
(54, 16, NULL, NULL),
(54, 17, NULL, NULL),
(54, 18, NULL, NULL),
(54, 19, NULL, NULL),
(54, 20, NULL, NULL),
(55, 1, NULL, NULL),
(55, 2, NULL, NULL),
(55, 3, NULL, NULL),
(55, 4, NULL, NULL),
(55, 5, NULL, NULL),
(55, 6, NULL, NULL),
(55, 7, NULL, NULL),
(55, 8, NULL, NULL),
(55, 9, NULL, NULL),
(55, 10, NULL, NULL),
(55, 11, NULL, NULL),
(55, 12, NULL, NULL),
(55, 13, NULL, NULL),
(55, 14, NULL, NULL),
(55, 15, NULL, NULL),
(55, 16, NULL, NULL),
(55, 17, NULL, NULL),
(55, 18, NULL, NULL),
(55, 19, NULL, NULL),
(55, 20, NULL, NULL),
(56, 1, NULL, NULL),
(56, 2, NULL, NULL),
(56, 3, NULL, NULL),
(56, 4, NULL, NULL),
(56, 5, NULL, NULL),
(56, 6, NULL, NULL),
(56, 7, NULL, NULL),
(56, 8, NULL, NULL),
(56, 9, NULL, NULL),
(56, 10, NULL, NULL),
(56, 11, NULL, NULL),
(56, 12, NULL, NULL),
(56, 13, NULL, NULL),
(56, 14, NULL, NULL),
(56, 15, NULL, NULL),
(56, 16, NULL, NULL),
(56, 17, NULL, NULL),
(56, 18, NULL, NULL),
(56, 19, NULL, NULL),
(56, 20, NULL, NULL),
(57, 1, NULL, NULL),
(57, 2, NULL, NULL),
(57, 3, NULL, NULL),
(57, 4, NULL, NULL),
(57, 5, NULL, NULL),
(57, 6, NULL, NULL),
(57, 7, NULL, NULL),
(57, 8, NULL, NULL),
(57, 9, NULL, NULL),
(57, 10, NULL, NULL),
(57, 11, NULL, NULL),
(57, 12, NULL, NULL),
(57, 13, NULL, NULL),
(57, 14, NULL, NULL),
(57, 15, NULL, NULL),
(57, 16, NULL, NULL),
(57, 17, NULL, NULL),
(57, 18, NULL, NULL),
(57, 19, NULL, NULL),
(57, 20, NULL, NULL),
(58, 1, NULL, NULL),
(58, 2, NULL, NULL),
(58, 3, NULL, NULL),
(58, 4, NULL, NULL),
(58, 5, NULL, NULL),
(58, 6, NULL, NULL),
(58, 7, NULL, NULL),
(58, 8, NULL, NULL),
(58, 9, NULL, NULL),
(58, 10, NULL, NULL),
(58, 11, NULL, NULL),
(58, 12, NULL, NULL),
(58, 13, NULL, NULL),
(58, 14, NULL, NULL),
(58, 15, NULL, NULL),
(58, 16, NULL, NULL),
(58, 17, NULL, NULL),
(58, 18, NULL, NULL),
(58, 19, NULL, NULL),
(58, 20, NULL, NULL),
(59, 1, NULL, NULL),
(59, 2, NULL, NULL),
(59, 3, NULL, NULL),
(59, 4, NULL, NULL),
(59, 5, NULL, NULL),
(59, 6, NULL, NULL),
(59, 7, NULL, NULL),
(59, 8, NULL, NULL),
(59, 9, NULL, NULL),
(59, 10, NULL, NULL),
(59, 11, NULL, NULL),
(59, 12, NULL, NULL),
(59, 13, NULL, NULL),
(59, 14, NULL, NULL),
(59, 15, NULL, NULL),
(59, 16, NULL, NULL),
(59, 17, NULL, NULL),
(59, 18, NULL, NULL),
(59, 19, NULL, NULL),
(59, 20, NULL, NULL),
(60, 1, NULL, NULL),
(60, 2, NULL, NULL),
(60, 3, NULL, NULL),
(60, 4, NULL, NULL),
(60, 5, NULL, NULL),
(60, 6, NULL, NULL),
(60, 7, NULL, NULL),
(60, 8, NULL, NULL),
(60, 9, NULL, NULL),
(60, 10, NULL, NULL),
(60, 11, NULL, NULL),
(60, 12, NULL, NULL),
(60, 13, NULL, NULL),
(60, 14, NULL, NULL),
(60, 15, NULL, NULL),
(60, 16, NULL, NULL),
(60, 17, NULL, NULL),
(60, 18, NULL, NULL),
(60, 19, NULL, NULL),
(60, 20, NULL, NULL),
(61, 1, NULL, NULL),
(61, 2, NULL, NULL),
(61, 3, NULL, NULL),
(61, 4, NULL, NULL),
(61, 5, NULL, NULL),
(61, 6, NULL, NULL),
(61, 7, NULL, NULL),
(61, 8, NULL, NULL),
(61, 9, NULL, NULL),
(61, 10, NULL, NULL),
(61, 11, NULL, NULL),
(61, 12, NULL, NULL),
(61, 13, NULL, NULL),
(61, 14, NULL, NULL),
(61, 15, NULL, NULL),
(61, 16, NULL, NULL),
(61, 17, NULL, NULL),
(61, 18, NULL, NULL),
(61, 19, NULL, NULL),
(61, 20, NULL, NULL),
(62, 1, NULL, NULL),
(62, 2, NULL, NULL),
(62, 3, NULL, NULL),
(62, 4, NULL, NULL),
(62, 5, NULL, NULL),
(62, 6, NULL, NULL),
(62, 7, NULL, NULL),
(62, 8, NULL, NULL),
(62, 9, NULL, NULL),
(62, 10, NULL, NULL),
(62, 11, NULL, NULL),
(62, 12, NULL, NULL),
(62, 13, NULL, NULL),
(62, 14, NULL, NULL),
(62, 15, NULL, NULL),
(62, 16, NULL, NULL),
(62, 17, NULL, NULL),
(62, 18, NULL, NULL),
(62, 19, NULL, NULL),
(62, 20, NULL, NULL),
(63, 1, NULL, NULL),
(63, 2, NULL, NULL),
(63, 3, NULL, NULL),
(63, 4, NULL, NULL),
(63, 5, NULL, NULL),
(63, 6, NULL, NULL),
(63, 7, NULL, NULL),
(63, 8, NULL, NULL),
(63, 9, NULL, NULL),
(63, 10, NULL, NULL),
(63, 11, NULL, NULL),
(63, 12, NULL, NULL),
(63, 13, NULL, NULL),
(63, 14, NULL, NULL),
(63, 15, NULL, NULL),
(63, 16, NULL, NULL),
(63, 17, NULL, NULL),
(63, 18, NULL, NULL),
(63, 19, NULL, NULL),
(63, 20, NULL, NULL),
(64, 1, NULL, NULL),
(64, 2, NULL, NULL),
(64, 3, NULL, NULL),
(64, 4, NULL, NULL),
(64, 5, NULL, NULL),
(64, 6, NULL, NULL),
(64, 7, NULL, NULL),
(64, 8, NULL, NULL),
(64, 9, NULL, NULL),
(64, 10, NULL, NULL),
(64, 11, NULL, NULL),
(64, 12, NULL, NULL),
(64, 13, NULL, NULL),
(64, 14, NULL, NULL),
(64, 15, NULL, NULL),
(64, 16, NULL, NULL),
(64, 17, NULL, NULL),
(64, 18, NULL, NULL),
(64, 19, NULL, NULL),
(64, 20, NULL, NULL),
(65, 1, NULL, NULL),
(65, 2, NULL, NULL),
(65, 3, NULL, NULL),
(65, 4, NULL, NULL),
(65, 5, NULL, NULL),
(65, 6, NULL, NULL),
(65, 7, NULL, NULL),
(65, 8, NULL, NULL),
(65, 9, NULL, NULL),
(65, 10, NULL, NULL),
(65, 11, NULL, NULL),
(65, 12, NULL, NULL),
(65, 13, NULL, NULL),
(65, 14, NULL, NULL),
(65, 15, NULL, NULL),
(65, 16, NULL, NULL),
(65, 17, NULL, NULL),
(65, 18, NULL, NULL),
(65, 19, NULL, NULL),
(65, 20, NULL, NULL),
(66, 1, NULL, NULL),
(66, 2, NULL, NULL),
(66, 3, NULL, NULL),
(66, 4, NULL, NULL),
(66, 5, NULL, NULL),
(66, 6, NULL, NULL),
(66, 7, NULL, NULL),
(66, 8, NULL, NULL),
(66, 9, NULL, NULL),
(66, 10, NULL, NULL),
(66, 11, NULL, NULL),
(66, 12, NULL, NULL),
(66, 13, NULL, NULL),
(66, 14, NULL, NULL),
(66, 15, NULL, NULL),
(66, 16, NULL, NULL),
(66, 17, NULL, NULL),
(66, 18, NULL, NULL),
(66, 19, NULL, NULL),
(66, 20, NULL, NULL);

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
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positionID` int(11) NOT NULL,
  `positionName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionID`, `positionName`) VALUES
(0, 'teacher'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pphone`
--

CREATE TABLE `pphone` (
  `phone` varchar(15) NOT NULL,
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

--
-- Dumping data for table `regapp`
--

INSERT INTO `regapp` (`rID`, `tIC`, `stdMKN`, `rTime`) VALUES
(51, '1313', '07076', '2023-02-01 09:17:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stdMKN`, `stdName`, `stdGender`, `stdAge`, `stdDOB`, `stdFavorColor`, `stdDiapers`, `stdSession`, `stdMeal`, `stdPhoto`, `stdRegStatus`, `pIC`, `clsName`, `prgName`) VALUES
('01011', 'ng', 0, '1', '2023-01-19', 'red', 0, 'M', 'M', 'studentImg/WIN_20220725_09_35_34_Pro.jpg', 2, '0101', 'Class A1', 'A'),
('01012', 'diu', 0, '4', '2023-01-13', '222', 0, 'M', 'M', 'studentImg/Screenshot (2).png', 2, '0101', 'Class B1', 'B'),
('02021', '1112', 1, '2', '2023-01-06', 'red', 0, 'M', 'M', 'studentImg/mAO20D.jpg', 2, '0202', 'Class A1', 'A'),
('02022', 'hi', 0, '3', '2023-01-11', 'dhdh', 0, 'M', 'M', 'studentImg/wall_paper_02.jpg', 2, '0202', 'Class A1', 'A'),
('02023', 'haha', 0, '4', '2023-01-31', '2', 0, 'M', 'M', 'studentImg/inline_image_preview.jpg', 2, '0202', 'Class B1', 'B'),
('02024', 'DEMO', 0, '3', '2023-01-05', 'red', 0, 'M', 'M', 'studentImg/Screenshot (1).png', 2, '0202', 'Class A1', 'A'),
('03031', '03031', 0, '3', '2023-01-05', 'red', 1, 'M', 'M', 'studentImg/studentLogical.jpg', 2, '0303', 'Class A1', 'A'),
('07071', 'LOO ZHI YUAN', 1, '4', '2023-01-31', 'Blue', 0, 'MA', 'MA', 'studentImg/about-g2.jpg', 2, '0707', 'Class A1', 'A'),
('07072', 'LOO ZHI XUAN', 1, '4', '2023-01-31', 'Blue', 0, 'M', 'M', 'studentImg/WIN_20220725_09_35_34_Pro.jpg', 2, '0707', 'Class A1', 'A'),
('07073', 'LOO ZHI JUN', 0, '5', '2023-01-31', 'Blue', 0, 'M', 'M', 'studentImg/Screenshot (8).png', 2, '0707', 'Class A1', 'A'),
('07074', 'LOO ZHI XIANG', 1, '5', '2023-01-31', 'Blue', 0, 'M', 'M', 'studentImg/studentLogical.jpg', 2, '0707', 'Class A1', 'A'),
('07076', 'LOO ZHI YING', 0, '4', '2023-02-01', 'Purple', 0, 'MA', 'MA', 'studentImg/mAO20D.jpg', 1, '0707', NULL, 'B'),
('07077', 'LOO ZHI QIN', 0, '4', '2023-02-01', 'Red', 1, 'A', 'MA', 'studentImg/Screenshot (2).png', 0, '0707', NULL, 'B');

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
('1212', 3, 'Class B1'),
('1212', 4, 'Class A1'),
('1212', 4, 'Class B1'),
('1212', 5, 'Class B1'),
('1212', 7, 'Class A1'),
('1313', 1, 'Class A1'),
('1313', 1, 'Class B1'),
('1313', 3, 'Class A1');

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
  `tPhone` varchar(15) NOT NULL,
  `tAddress` varchar(50) NOT NULL,
  `tCity` varchar(20) NOT NULL,
  `tPostcode` decimal(5,0) NOT NULL,
  `tState` varchar(20) NOT NULL,
  `tEmail` varchar(30) DEFAULT NULL,
  `tBasicSalpHour` decimal(8,2) NOT NULL,
  `tOTSalpHour` decimal(8,2) NOT NULL,
  `tPhoto` varchar(40) NOT NULL,
  `tPosition` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tIC`, `tName`, `tPassword`, `tEPF`, `tBank`, `tBankAccount`, `tPhone`, `tAddress`, `tCity`, `tPostcode`, `tState`, `tEmail`, `tBasicSalpHour`, `tOTSalpHour`, `tPhoto`, `tPosition`) VALUES
('1212', 'Hi', '1', '1', 'h', 1, '1', 'h', 'h', '1', 'h', 'h', '1.00', '1.00', 'h', 0),
('1313', 'Hi', '1', '1', 'h', 1, '1', 'h', 'h', '1', 'h', 'h', '1.00', '1.00', 'h', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`actID`),
  ADD KEY `Activity_tIC_fk` (`tIC`),
  ADD KEY `activity_clsName_fk` (`clsName`);

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
  ADD PRIMARY KEY (`attID`),
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
  ADD KEY `fee_stdMKN_fk` (`stdMKN`);

--
-- Indexes for table `feesitem`
--
ALTER TABLE `feesitem`
  ADD PRIMARY KEY (`prgsID`,`fID`),
  ADD KEY `feesitem_feeID_fk` (`fID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fItem`);

--
-- Indexes for table `indexperformance`
--
ALTER TABLE `indexperformance`
  ADD PRIMARY KEY (`iPerID`),
  ADD KEY `indexperformance_itype_fk` (`iType`),
  ADD KEY `indexperformance_iname_fk` (`iName`);

--
-- Indexes for table `indexsubject`
--
ALTER TABLE `indexsubject`
  ADD PRIMARY KEY (`iName`);

--
-- Indexes for table `itype`
--
ALTER TABLE `itype`
  ADD PRIMARY KEY (`iType`);

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
  ADD PRIMARY KEY (`pbID`),
  ADD KEY `PerformBased_ptName_fk` (`ptName`),
  ADD KEY `performBaes_pIName_fk` (`pIName`);

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`);

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
  ADD PRIMARY KEY (`sbjID`,`clsName`),
  ADD KEY `SubjectsTeac_tIC_fk` (`tIC`),
  ADD KEY `subjectsteac_clsName_fk` (`clsName`),
  ADD KEY `subjectsteac_sbjid_fk` (`sbjID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tIC`),
  ADD KEY `teacher_position_fk` (`tPosition`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `annID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `attendancestd`
--
ALTER TABLE `attendancestd`
  MODIFY `attID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `evaltype`
--
ALTER TABLE `evaltype`
  MODIFY `evalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

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
  MODIFY `performanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `performbased`
--
ALTER TABLE `performbased`
  MODIFY `pbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  ADD CONSTRAINT `Activity_clsName_fk` FOREIGN KEY (`clsName`) REFERENCES `class` (`clsName`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Activity_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `Annoucement_tIC_fk` FOREIGN KEY (`tIC`) REFERENCES `teacher` (`tIC`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `indexperformance`
--
ALTER TABLE `indexperformance`
  ADD CONSTRAINT `indexperformance_iname_fk` FOREIGN KEY (`iName`) REFERENCES `indexsubject` (`iName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `indexperformance_itype_fk` FOREIGN KEY (`iType`) REFERENCES `itype` (`iType`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `PerformBased_ptName_fk` FOREIGN KEY (`ptName`) REFERENCES `performtype` (`ptName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performBaes_pIName_fk` FOREIGN KEY (`pIName`) REFERENCES `indexperformance` (`iPerID`);

--
-- Constraints for table `performcomment`
--
ALTER TABLE `performcomment`
  ADD CONSTRAINT `PerformComment_iPerID_fk` FOREIGN KEY (`iPerID`) REFERENCES `performbased` (`pbID`) ON DELETE CASCADE ON UPDATE CASCADE,
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

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_position_fk` FOREIGN KEY (`tPosition`) REFERENCES `position` (`positionID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
