-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 11:20 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activatorsy`
--

CREATE TABLE `tbl_activatorsy` (
  `fld_SYID` int(11) NOT NULL,
  `fld_startSY` int(11) NOT NULL,
  `fld_endSY` int(11) NOT NULL,
  `fld_semester` int(11) NOT NULL,
  `fld_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activatorsy`
--

INSERT INTO `tbl_activatorsy` (`fld_SYID`, `fld_startSY`, `fld_endSY`, `fld_semester`, `fld_status`) VALUES
(1, 2017, 2018, 1, 'ACTIVATED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `fld_applicantID` int(11) NOT NULL,
  `fld_applicationDate` date NOT NULL,
  `fld_firstName` varchar(250) NOT NULL,
  `fld_middleName` varchar(250) NOT NULL,
  `fld_lastName` varchar(250) NOT NULL,
  `fld_homeAddress` varchar(250) NOT NULL,
  `fld_emailAddress` varchar(250) NOT NULL,
  `fld_birthPlace` varchar(250) NOT NULL,
  `fld_birthDate` date NOT NULL,
  `fld_mobilePhoneNo` varchar(250) NOT NULL,
  `fld_telNo` varchar(250) NOT NULL,
  `fld_sex` varchar(250) NOT NULL,
  `fld_height` float NOT NULL,
  `fld_bloodType` varchar(250) NOT NULL,
  `fld_civilStatus` varchar(250) NOT NULL,
  `fld_weight` float NOT NULL,
  `fld_religion` varchar(250) NOT NULL,
  `fld_fatherStatus` varchar(250) NOT NULL,
  `fld_fatherName` varchar(250) NOT NULL,
  `fld_fatherAddress` varchar(250) NOT NULL,
  `fld_fatherOccupation` varchar(250) NOT NULL,
  `fld_fatherContactNumber` varchar(250) NOT NULL,
  `fld_fatherEducationalAttainment` varchar(250) NOT NULL,
  `fld_motherStatus` varchar(250) NOT NULL,
  `fld_motherName` varchar(250) NOT NULL,
  `fld_motherAddress` varchar(250) NOT NULL,
  `fld_motherOccupation` varchar(250) NOT NULL,
  `fld_motherContactNumber` varchar(250) NOT NULL,
  `fld_motherEducationalAttainment` varchar(250) NOT NULL,
  `fld_income` varchar(250) NOT NULL,
  `fld_siblingName` varchar(250) NOT NULL,
  `fld_siblingAge` varchar(250) NOT NULL,
  `fld_siblingEducationalAttainment` varchar(250) NOT NULL,
  `fld_siblingSchool` varchar(250) NOT NULL,
  `fld_siblingIncome` varchar(250) NOT NULL,
  `fld_siblingStatus` varchar(250) NOT NULL,
  `fld_spouseName` varchar(250) NOT NULL,
  `fld_spouseStatus` varchar(250) NOT NULL,
  `fld_spouseAddress` varchar(250) NOT NULL,
  `fld_spouseContactNo` varchar(250) NOT NULL,
  `fld_spouseOccupation` varchar(250) NOT NULL,
  `fld_spouseEmployer` varchar(250) NOT NULL,
  `fld_spouseEmployerAddress` varchar(250) NOT NULL,
  `fld_spouseOccupationLocation` varchar(250) NOT NULL,
  `fld_childrenName` varchar(250) NOT NULL,
  `fld_childrenSex` varchar(250) NOT NULL,
  `fld_childrenAge` int(11) NOT NULL,
  `fld_childrenBirthDate` date NOT NULL,
  `fld_childrenBirthPlace` varchar(250) NOT NULL,
  `fld_childrenEducationalAttainment` varchar(250) NOT NULL,
  `fld_studentOccupation` varchar(250) NOT NULL,
  `fld_studentEmployer` varchar(250) NOT NULL,
  `fld_studentEmployerAddress` varchar(250) NOT NULL,
  `fld_studentOccupationLocation` varchar(250) NOT NULL,
  `fld_guardianName` varchar(250) NOT NULL,
  `fld_guardianRelation` varchar(250) NOT NULL,
  `fld_guardianAddress` varchar(250) NOT NULL,
  `fld_guardianZipCode` int(11) NOT NULL,
  `fld_guardianTelNo` varchar(250) NOT NULL,
  `fld_guardianMobileNo` varchar(250) NOT NULL,
  `fld_guardianEmailAddress` varchar(250) NOT NULL,
  `fld_elementaryName` varchar(250) NOT NULL,
  `fld_elementaryType` varchar(250) NOT NULL,
  `fld_elementaryAward` varchar(250) NOT NULL,
  `fld_elementaryAddress` varchar(250) NOT NULL,
  `fld_elementaryRegion` varchar(250) NOT NULL,
  `fld_elementaryGraduated` varchar(250) NOT NULL,
  `fld_secondaryName` varchar(250) NOT NULL,
  `fld_secondaryType` varchar(250) NOT NULL,
  `fld_secondaryAward` varchar(250) NOT NULL,
  `fld_secondaryAddress` varchar(250) NOT NULL,
  `fld_secondaryRegion` varchar(250) NOT NULL,
  `fld_secondaryGraduated` varchar(250) NOT NULL,
  `fld_collegeName` varchar(250) NOT NULL,
  `fld_collegeType` varchar(250) NOT NULL,
  `fld_collegeAward` varchar(250) NOT NULL,
  `fld_collegeAddress` varchar(250) NOT NULL,
  `fld_collegeRegion` varchar(250) NOT NULL,
  `fld_collegeGraduated` varchar(250) NOT NULL,
  `fld_vocationalName` varchar(250) NOT NULL,
  `fld_vocationalType` varchar(250) NOT NULL,
  `fld_vocationalAward` varchar(250) NOT NULL,
  `fld_vocationalAddress` varchar(250) NOT NULL,
  `fld_vocationalRegion` varchar(250) NOT NULL,
  `fld_vocationalGraduated` varchar(250) NOT NULL,
  `fld_discontinuanceOfStudy` varchar(250) NOT NULL,
  `fld_discontinuanceOfStudyReason` varchar(250) NOT NULL,
  `fld_academicProblemFail` varchar(250) NOT NULL,
  `fld_academicProblemFailReason` varchar(250) NOT NULL,
  `fld_academicProblemRepeat` varchar(250) NOT NULL,
  `fld_academicProblemRepeatReason` varchar(250) NOT NULL,
  `fld_disciplinaryRecord` varchar(250) NOT NULL,
  `fld_disciplinaryRecordReason` varchar(250) NOT NULL,
  `fld_transferee` varchar(250) NOT NULL,
  `fld_yearLevel` varchar(250) NOT NULL,
  `fld_prefferedPrograms` varchar(250) NOT NULL,
  `fld_recommendedProgram` varchar(250) NOT NULL,
  `fld_working` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`fld_applicantID`, `fld_applicationDate`, `fld_firstName`, `fld_middleName`, `fld_lastName`, `fld_homeAddress`, `fld_emailAddress`, `fld_birthPlace`, `fld_birthDate`, `fld_mobilePhoneNo`, `fld_telNo`, `fld_sex`, `fld_height`, `fld_bloodType`, `fld_civilStatus`, `fld_weight`, `fld_religion`, `fld_fatherStatus`, `fld_fatherName`, `fld_fatherAddress`, `fld_fatherOccupation`, `fld_fatherContactNumber`, `fld_fatherEducationalAttainment`, `fld_motherStatus`, `fld_motherName`, `fld_motherAddress`, `fld_motherOccupation`, `fld_motherContactNumber`, `fld_motherEducationalAttainment`, `fld_income`, `fld_siblingName`, `fld_siblingAge`, `fld_siblingEducationalAttainment`, `fld_siblingSchool`, `fld_siblingIncome`, `fld_siblingStatus`, `fld_spouseName`, `fld_spouseStatus`, `fld_spouseAddress`, `fld_spouseContactNo`, `fld_spouseOccupation`, `fld_spouseEmployer`, `fld_spouseEmployerAddress`, `fld_spouseOccupationLocation`, `fld_childrenName`, `fld_childrenSex`, `fld_childrenAge`, `fld_childrenBirthDate`, `fld_childrenBirthPlace`, `fld_childrenEducationalAttainment`, `fld_studentOccupation`, `fld_studentEmployer`, `fld_studentEmployerAddress`, `fld_studentOccupationLocation`, `fld_guardianName`, `fld_guardianRelation`, `fld_guardianAddress`, `fld_guardianZipCode`, `fld_guardianTelNo`, `fld_guardianMobileNo`, `fld_guardianEmailAddress`, `fld_elementaryName`, `fld_elementaryType`, `fld_elementaryAward`, `fld_elementaryAddress`, `fld_elementaryRegion`, `fld_elementaryGraduated`, `fld_secondaryName`, `fld_secondaryType`, `fld_secondaryAward`, `fld_secondaryAddress`, `fld_secondaryRegion`, `fld_secondaryGraduated`, `fld_collegeName`, `fld_collegeType`, `fld_collegeAward`, `fld_collegeAddress`, `fld_collegeRegion`, `fld_collegeGraduated`, `fld_vocationalName`, `fld_vocationalType`, `fld_vocationalAward`, `fld_vocationalAddress`, `fld_vocationalRegion`, `fld_vocationalGraduated`, `fld_discontinuanceOfStudy`, `fld_discontinuanceOfStudyReason`, `fld_academicProblemFail`, `fld_academicProblemFailReason`, `fld_academicProblemRepeat`, `fld_academicProblemRepeatReason`, `fld_disciplinaryRecord`, `fld_disciplinaryRecordReason`, `fld_transferee`, `fld_yearLevel`, `fld_prefferedPrograms`, `fld_recommendedProgram`, `fld_working`) VALUES
(1, '2017-08-28', 'John Dominique', 'Rosa', 'Fedelino', 'Alitagtag, Batangas', 'jdrosa@gmail.com', 'Alitagtag', '1997-05-07', '09151212321', '12313131', 'Male', 168, 'A', 'Single', 55, 'Roman Catholic', 'Living', 'John Fedelino', 'Alitagtag, Batangas', 'Worker', '098907012', 'High School', 'Living', 'Elsa Fedelino', 'Alitagtag, Batangas', 'Caretaker', '1987978491', 'High School', '15,000- 19,999', 'Ineng', '21', 'College', 'SBC', '10000', 'Single', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 'Elsa Fedelino', 'Mother', 'Alitagtag, Batangas', 4217, '', '09151581515', '', 'Alitagtag Elementary School', 'Public', 'Valedictorian', 'Alitagtag, Batangas', 'IV-A', '2005', 'Saint Bridget College Alitagtag', 'Private', 'Valedictorian', 'Alitagtag, Batangas', 'IV-A', '2011', '', '', '', '', '', '', '', '', '', '', '', '', 'No', '', 'No', '', 'No', '', 'No', '', 'No', '1st', '2,3', '2', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicantchecklist`
--

CREATE TABLE `tbl_applicantchecklist` (
  `fld_applicantchecklistID` int(11) NOT NULL,
  `fld_applicantID` int(11) NOT NULL,
  `fld_applicationForm` varchar(250) NOT NULL,
  `fld_examResult` varchar(250) NOT NULL,
  `fld_submissionOfRequirements` varchar(250) NOT NULL,
  `fld_interviewResultGuidance` varchar(250) NOT NULL,
  `fld_interviewResultVPAA` varchar(250) NOT NULL,
  `fld_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicantchecklist`
--

INSERT INTO `tbl_applicantchecklist` (`fld_applicantchecklistID`, `fld_applicantID`, `fld_applicationForm`, `fld_examResult`, `fld_submissionOfRequirements`, `fld_interviewResultGuidance`, `fld_interviewResultVPAA`, `fld_status`) VALUES
(1, 1, 'done', 'Failed', 'partial', 'Passed', 'Passed', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_availablecourse`
--

CREATE TABLE `tbl_availablecourse` (
  `fld_availableCourseID` int(11) NOT NULL,
  `fld_subjectID` varchar(250) NOT NULL,
  `fld_sectionID` varchar(250) NOT NULL,
  `fld_room` varchar(250) NOT NULL,
  `fld_day` varchar(300) NOT NULL,
  `fld_startTime` varchar(100) NOT NULL,
  `fld_endTime` varchar(100) NOT NULL,
  `fld_availableSlots` int(11) NOT NULL,
  `fld_staffId` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_availablecourse`
--

INSERT INTO `tbl_availablecourse` (`fld_availableCourseID`, `fld_subjectID`, `fld_sectionID`, `fld_room`, `fld_day`, `fld_startTime`, `fld_endTime`, `fld_availableSlots`, `fld_staffId`) VALUES
(1, '204', '6', 'ROOM 103', 'M', '1:30 ', ' 4:00', 40, '92'),
(2, '204', '6', 'ROOM 103', 'T', '1:30 ', ' 4:00', 40, '92'),
(3, '204', '5', 'ROOM 103', 'S', '1:30 ', ' 3:30', 40, '92'),
(4, '204', '5', 'ROOM 103', 'S', '3:30 ', ' 6:30', 40, '92'),
(5, '292', '4', 'ROOM 104', 'M', '5:30 ', ' 8:30', 41, '107'),
(6, '292', '4', 'ROOM 104', 'T', '5:30 ', ' 8:30', 40, '107'),
(7, '292', '3', 'ROOM 104', 'F', '5:30 ', ' 8:30', 40, '112'),
(8, '292', '3', 'ROOM 104', 'S', '5:30 ', ' 8:30', 40, '112'),
(9, '196', '10', 'ROOM 105', 'M', '5:30 ', ' 7:00', 39, '118'),
(10, '196', '10', 'ROOM 105', 'T', '5:30 ', ' 7:00', 40, '118'),
(11, '196', '11', 'ROOM 105', 'M', '5:30 ', ' 7:00', 40, '118'),
(12, '196', '11', 'ROOM 105', 'T', '5:30 ', ' 7:00', 40, '118'),
(13, '196', '13', 'ROOM 105', 'M', '5:30 ', ' 7:00', 40, '118'),
(14, '196', '13', 'ROOM 105', 'T', '5:30 ', ' 7:00', 40, '118'),
(15, '196', '14', 'ROOM 105', 'M', '5:30 ', ' 7:00', 40, '118'),
(16, '196', '14', 'ROOM 105', 'T', '5:30 ', ' 7:00', 40, '118'),
(17, '196', '16', 'ROOM 105', 'M', '5:30 ', ' 7:00', 40, '118'),
(18, '196', '16', 'ROOM 105', 'T', '5:30 ', ' 7:00', 40, '118'),
(19, '196', '17', 'ROOM 105', 'M', '5:30 ', ' 7:00', 40, '118'),
(20, '196', '17', 'ROOM 105', 'T', '5:30 ', ' 7:00', 40, '118'),
(21, '291', '2', 'ROOM 105', 'M', '7:00 ', ' 8:30', 36, '87'),
(22, '291', '2', 'ROOM 105', 'T', '7:00 ', ' 8:30', 40, '87'),
(23, '172', '2', 'ROOM 201', 'M', '4:00 ', ' 5:30', 41, '122'),
(24, '172', '2', 'ROOM 201', 'T', '4:00 ', ' 5:30', 40, '122'),
(25, '173', '2', 'ROOM 201', 'M', '5:30 ', ' 7:00', 41, '111'),
(26, '173', '2', 'ROOM 201', 'T', '5:30 ', ' 7:00', 40, '111'),
(27, '186', '2', 'ROOM 201', 'W', '4:00 ', ' 5:30', 40, '92'),
(28, '186', '2', 'ROOM 201', 'TH', '4:00 ', ' 5:30', 40, '92'),
(29, '173', '6', 'ROOM 201', 'W', '5:30 ', ' 7:00', 40, '123'),
(30, '173', '6', 'ROOM 201', 'TH', '5:30 ', ' 7:00', 40, '123'),
(31, '182', '2', 'ROOM 201', 'F', '4:30 ', ' 5:30', 39, '109'),
(32, '182', '2', 'ROOM 201', 'S', '4:30 ', ' 5:30', 40, '109'),
(33, '290', '2', 'ROOM 201', 'F', '5:30 ', ' 7:00', 45, '97'),
(34, '290', '2', 'ROOM 201', 'S', '5:30 ', ' 7:00', 40, '97'),
(35, '194', '2', 'ROOM 201', 'F', '7:00 ', ' 8:30', 41, '97'),
(36, '194', '2', 'ROOM 201', 'S', '7:00 ', ' 8:30', 40, '97'),
(37, '302', '3', 'ROOM 202', 'M', '4:00 ', ' 5:30', 40, '87'),
(38, '302', '3', 'ROOM 202', 'T', '4:00 ', ' 5:30', 40, '87'),
(39, '179', '3', 'ROOM 202', 'W', '4:00 ', ' 5:30', 39, '118'),
(40, '179', '3', 'ROOM 202', 'TH', '4:00 ', ' 5:30', 40, '118'),
(41, '186', '3', 'ROOM 202', 'W', '5:30 ', ' 7:00', 40, '92'),
(42, '186', '3', 'ROOM 202', 'TH', '5:30 ', ' 7:00', 40, '92'),
(43, '301', '4', 'ROOM 202', 'F', '5:30 ', ' 7:00', 40, '114'),
(44, '301', '4', 'ROOM 202', 'S', '5:30 ', ' 7:00', 40, '114'),
(45, '179', '4', 'ROOM 203', 'W', '5:30 ', ' 7:00', 40, '89'),
(46, '179', '4', 'ROOM 203', 'TH', '5:30 ', ' 7:00', 40, '89'),
(47, '186', '4', 'ROOM 203', 'W', '7:00 ', ' 8:30', 40, '92'),
(48, '186', '4', 'ROOM 203', 'TH', '7:00 ', ' 8:30', 40, '92'),
(49, '179', '13', 'ROOM 203', 'F', '4:00 ', ' 5:30', 40, '104'),
(50, '179', '13', 'ROOM 203', 'S', '4:00 ', ' 5:30', 40, '104'),
(51, '179', '14', 'ROOM 203', 'F', '4:00 ', ' 5:30', 40, '104'),
(52, '179', '14', 'ROOM 203', 'S', '4:00 ', ' 5:30', 40, '104'),
(53, '197', '4', 'ROOM 203', 'F', '7:00 ', ' 8:30', 40, '93'),
(54, '197', '4', 'ROOM 203', 'S', '7:00 ', ' 8:30', 40, '93'),
(55, '195', '14', 'ROOM 205', 'M', '4:00 ', ' 5:30', 40, '101'),
(56, '195', '14', 'ROOM 205', 'T', '4:00 ', ' 5:30', 40, '101'),
(57, '195', '17', 'ROOM 205', 'M', '4:00 ', ' 5:30', 40, '101'),
(58, '195', '17', 'ROOM 205', 'T', '4:00 ', ' 5:30', 40, '101'),
(59, '263', '7', 'ROOM 205', 'M', '5:30 ', ' 7:00', 40, '99'),
(60, '263', '7', 'ROOM 205', 'T', '5:30 ', ' 7:00', 40, '99'),
(61, '193', '7', 'ROOM 205', 'M', '7:00 ', ' 8:30', 40, '111'),
(62, '193', '7', 'ROOM 205', 'T', '7:00 ', ' 8:30', 40, '111'),
(63, '193', '8', 'ROOM 205', 'M', '7:00 ', ' 8:30', 40, '111'),
(64, '193', '8', 'ROOM 205', 'T', '7:00 ', ' 8:30', 40, '111'),
(65, '262', '7', 'ROOM 205', 'W', '7:00 ', ' 8:30', 40, '94'),
(66, '262', '7', 'ROOM 205', 'TH', '7:00 ', ' 8:30', 40, '94'),
(67, '260', '7', 'ROOM 205', 'F', '4:00 ', ' 5:30', 40, '114'),
(68, '260', '7', 'ROOM 205', 'S', '4:00 ', ' 5:30', 40, '114'),
(69, '197', '7', 'ROOM 205', 'F', '5:30 ', ' 7:00', 40, '93'),
(70, '197', '7', 'ROOM 205', 'S', '5:30 ', ' 7:00', 40, '93'),
(71, '260', '8', 'ROOM 206', 'M', '5:30 ', ' 7:00', 40, '117'),
(72, '260', '8', 'ROOM 206', 'T', '5:30 ', ' 7:00', 40, '117'),
(73, '262', '8', 'ROOM 206', 'W', '5:30 ', ' 7:00', 40, '94'),
(74, '262', '8', 'ROOM 206', 'TH', '5:30 ', ' 7:00', 40, '94'),
(75, '174', '8', 'ROOM 206', 'W', '7:00 ', ' 8:30', 37, '107'),
(76, '174', '8', 'ROOM 206', 'TH', '7:00 ', ' 8:30', 40, '107'),
(77, '182', '15', 'ROOM 301', 'M', '5:30 ', ' 6:30', 40, '91'),
(78, '182', '15', 'ROOM 301', 'T', '5:30 ', ' 6:30', 40, '91'),
(79, '179', '15', 'ROOM 301', 'M', '7:00 ', ' 8:30', 40, '119'),
(80, '179', '15', 'ROOM 301', 'T', '7:00 ', ' 8:30', 40, '119'),
(81, '172', '15', 'ROOM 301', 'W', '4:00 ', ' 5:30', 40, '113'),
(82, '172', '15', 'ROOM 301', 'TH', '4:00 ', ' 5:30', 40, '113'),
(83, '173', '15', 'ROOM 301', 'W', '7:00 ', ' 8:30', 40, '93'),
(84, '173', '15', 'ROOM 301', 'TH', '7:00 ', ' 8:30', 40, '93'),
(85, '182', '12', 'ROOM 302', 'M', '4:30 ', ' 5:30', 40, '91'),
(86, '182', '12', 'ROOM 302', 'T', '4:30 ', ' 5:30', 40, '91'),
(87, '179', '12', 'ROOM 302', 'M', '5:30 ', ' 7:00', 40, '119'),
(88, '179', '12', 'ROOM 302', 'T', '5:30 ', ' 7:00', 40, '119'),
(89, '174', '12', 'ROOM 302', 'M', '7:00 ', ' 8:30', 40, '112'),
(90, '174', '12', 'ROOM 302', 'T', '7:00 ', ' 8:30', 40, '112'),
(91, '173', '12', 'ROOM 302', 'W', '4:00 ', ' 5:30', 40, '123'),
(92, '173', '12', 'ROOM 302', 'TH', '4:00 ', ' 5:30', 40, '123'),
(93, '172', '12', 'ROOM 302', 'W', '5:30 ', ' 7:00', 40, '113'),
(94, '172', '12', 'ROOM 302', 'TH', '5:30 ', ' 7:00', 40, '113'),
(95, '175', '6', 'ROOM 302', 'F', '4:00 ', ' 5:30', 41, '95'),
(96, '175', '6', 'ROOM 302', 'S', '4:00 ', ' 5:30', 40, '95'),
(97, '182', '6', 'ROOM 302', 'F', '5:30 ', ' 6:30', 40, '109'),
(98, '182', '6', 'ROOM 302', 'S', '5:30 ', ' 6:30', 40, '109'),
(99, '179', '9', 'ROOM 303', 'M', '4:00 ', ' 5:30', 40, '118'),
(100, '179', '9', 'ROOM 303', 'T', '4:00 ', ' 5:30', 40, '118'),
(101, '174', '9', 'ROOM 303', 'M', '5:30 ', ' 7:00', 40, '112'),
(102, '174', '9', 'ROOM 303', 'T', '5:30 ', ' 7:00', 40, '112'),
(103, '182', '9', 'ROOM 303', 'M', '7:00 ', ' 8:00', 40, '91'),
(104, '182', '9', 'ROOM 303', 'T', '7:00 ', ' 8:00', 40, '91'),
(105, '175', '9', 'ROOM 303', 'W', '4:00 ', ' 5:30', 40, '95'),
(106, '175', '9', 'ROOM 303', 'TH', '4:00 ', ' 5:30', 40, '95'),
(107, '173', '9', 'ROOM 303', 'W', '5:30 ', ' 7:00', 40, '93'),
(108, '173', '9', 'ROOM 303', 'TH', '5:30 ', ' 7:00', 40, '93'),
(109, '172', '9', 'ROOM 303', 'W', '7:00 ', ' 8:30', 40, '113'),
(110, '172', '9', 'ROOM 303', 'TH', '7:00 ', ' 8:30', 40, '113'),
(111, '172', '5', 'ROOM 304', 'M', '5:30 ', ' 7:00', 40, '122'),
(112, '172', '5', 'ROOM 304', 'T', '5:30 ', ' 7:00', 40, '122'),
(113, '174', '5', 'ROOM 304', 'W', '4:00 ', ' 5:30', 40, '107'),
(114, '174', '5', 'ROOM 304', 'TH', '4:00 ', ' 5:30', 40, '107'),
(115, '182', '5', 'ROOM 304', 'W', '7:00 ', ' 8:00', 40, '109'),
(116, '182', '5', 'ROOM 304', 'TH', '7:00 ', ' 8:00', 40, '109'),
(117, '172', '6', 'ROOM 305', 'M', '4:00 ', ' 5:30', 40, '117'),
(118, '172', '6', 'ROOM 305', 'T', '4:00 ', ' 5:30', 40, '117'),
(119, '193', '10', 'ROOM 305', 'M', '7:00 ', ' 8:30', 40, '122'),
(120, '193', '10', 'ROOM 305', 'T', '7:00 ', ' 8:30', 40, '122'),
(121, '193', '11', 'ROOM 305', 'M', '7:00 ', ' 8:30', 40, '122'),
(122, '193', '11', 'ROOM 305', 'T', '7:00 ', ' 8:30', 40, '122'),
(123, '193', '13', 'ROOM 305', 'M', '7:00 ', ' 8:30', 40, '122'),
(124, '193', '13', 'ROOM 305', 'T', '7:00 ', ' 8:30', 40, '122'),
(125, '193', '14', 'ROOM 305', 'M', '7:00 ', ' 8:30', 40, '122'),
(126, '193', '14', 'ROOM 305', 'T', '7:00 ', ' 8:30', 40, '122'),
(127, '193', '16', 'ROOM 305', 'M', '7:00 ', ' 8:30', 40, '122'),
(128, '193', '16', 'ROOM 305', 'T', '7:00 ', ' 8:30', 40, '122'),
(129, '193', '17', 'ROOM 305', 'M', '7:00 ', ' 8:30', 40, '122'),
(130, '193', '17', 'ROOM 305', 'T', '7:00 ', ' 8:30', 40, '122'),
(131, '174', '10', 'ROOM 305', 'W', '5:30 ', ' 7:00', 40, '107'),
(132, '174', '10', 'ROOM 305', 'TH', '5:30 ', ' 7:00', 40, '107'),
(133, '174', '11', 'ROOM 305', 'W', '5:30 ', ' 7:00', 40, '107'),
(134, '174', '11', 'ROOM 305', 'TH', '5:30 ', ' 7:00', 40, '107'),
(135, '174', '7', 'ROOM 305', 'W', '5:30 ', ' 7:00', 40, '107'),
(136, '174', '7', 'ROOM 305', 'TH', '5:30 ', ' 7:00', 40, '107'),
(137, '179', '10', 'ROOM 305', 'W', '7:00 ', ' 8:30', 40, '89'),
(138, '179', '10', 'ROOM 305', 'TH', '7:00 ', ' 8:30', 40, '89'),
(139, '179', '11', 'ROOM 305', 'W', '7:00 ', ' 8:30', 40, '89'),
(140, '179', '11', 'ROOM 305', 'TH', '7:00 ', ' 8:30', 40, '89'),
(141, '197', '11', 'ROOM 305', 'F', '4:00 ', ' 5:30', 40, '102'),
(142, '197', '11', 'ROOM 305', 'S', '4:00 ', ' 5:30', 40, '102'),
(143, '195', '11', 'ROOM 305', 'F', '5:30 ', ' 7:00', 40, '102'),
(144, '195', '11', 'ROOM 305', 'S', '5:30 ', ' 7:00', 40, '102'),
(145, '197', '14', 'ROOM 305', 'F', '7:00 ', ' 8:30', 40, '102'),
(146, '197', '14', 'ROOM 305', 'S', '7:00 ', ' 8:30', 40, '102'),
(147, '197', '17', 'ROOM 305', 'F', '7:00 ', ' 8:30', 40, '102'),
(148, '197', '17', 'ROOM 305', 'S', '7:00 ', ' 8:30', 40, '102'),
(149, '198', '10', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(150, '198', '10', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(151, '198', '11', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(152, '198', '11', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(153, '198', '13', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(154, '198', '13', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(155, '198', '14', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(156, '198', '14', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(157, '198', '16', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(158, '198', '16', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(159, '198', '17', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(160, '198', '17', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(161, '198', '7', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(162, '198', '7', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(163, '198', '8', 'ROOM 306', 'M', '4:00 ', ' 5:30', 40, '92'),
(164, '198', '8', 'ROOM 306', 'T', '4:00 ', ' 5:30', 40, '92'),
(165, '179', '16', 'ROOM 306', 'F', '5:30 ', ' 7:00', 40, '104'),
(166, '179', '16', 'ROOM 306', 'S', '5:30 ', ' 7:00', 40, '104'),
(167, '179', '17', 'ROOM 306', 'F', '5:30 ', ' 7:00', 40, '104'),
(168, '179', '17', 'ROOM 306', 'S', '5:30 ', ' 7:00', 40, '104'),
(169, '199', '10', 'AMS LAB', 'W', '8:00 ', ' 9:00', 40, '121'),
(170, '199', '10', 'AMS LAB', 'W', '9:00 ', '12:00', 40, '121'),
(171, '199', '11', 'AMS LAB', 'W', '8:00 ', ' 9:00', 40, '121'),
(172, '199', '11', 'AMS LAB', 'W', '9:00 ', '12:00', 40, '121'),
(173, '201', '10', 'AMS LAB', 'W', '1:00 ', ' 2:00', 40, '121'),
(174, '201', '10', 'AMS LAB', 'TH', '1:00 ', ' 2:00', 40, '121'),
(175, '201', '10', 'AMS LAB', 'W', '2:00 ', ' 5:00', 40, '121'),
(176, '201', '10', 'AMS LAB', 'TH', '2:00 ', ' 5:00', 40, '121'),
(177, '201', '11', 'AMS LAB', 'W', '1:00 ', ' 2:00', 40, '121'),
(178, '201', '11', 'AMS LAB', 'TH', '1:00 ', ' 2:00', 40, '121'),
(179, '201', '11', 'AMS LAB', 'W', '2:00 ', ' 5:00', 40, '121'),
(180, '201', '11', 'AMS LAB', 'TH', '2:00 ', ' 5:00', 40, '121'),
(181, '200', '10', 'AMS LAB', 'TH', '8:00 ', ' 9:00', 40, '121'),
(182, '200', '10', 'AMS LAB', 'TH', '9:00 ', '12:00', 40, '121'),
(183, '200', '11', 'AMS LAB', 'TH', '8:00 ', ' 9:00', 40, '121'),
(184, '200', '11', 'AMS LAB', 'TH', '9:00 ', '12:00', 40, '121'),
(185, '176', '9', 'AMS LAB', 'F', '9:00 ', ' 10:00', 37, '121'),
(186, '177', '9', 'AMS LAB', 'F', '10:00 ', ' 12:00', 40, '121'),
(187, '177', '9', 'AMS LAB', 'F', '1:00 ', ' 7:00', 40, '121'),
(188, '178', '9', 'AMS LAB', 'S', '1:00 ', ' 3:00', 40, '121'),
(189, '178', '9', 'AMS LAB', 'S', '3:00 ', ' 6:00', 40, '121'),
(190, '299', '3', 'EIS LAB', 'M', '1:00 ', ' 4:00', 40, '87'),
(191, '299', '3', 'EIS LAB', 'T', '1:00 ', ' 4:00', 40, '87'),
(192, '238', '13', 'EIS LAB', 'W', '10:00 ', ' 12:00', 40, '100'),
(193, '238', '13', 'EIS LAB', 'W', '1:00 ', ' 4:00', 40, '100'),
(194, '238', '14', 'EIS LAB', 'W', '10:00 ', ' 12:00', 40, '100'),
(195, '238', '14', 'EIS LAB', 'W', '1:00 ', ' 4:00', 40, '100'),
(196, '239', '13', 'EIS LAB', 'W', '4:30 ', ' 5:30', 40, '100'),
(197, '239', '13', 'EIS LAB', 'TH', '4:30 ', ' 5:30', 40, '100'),
(198, '239', '13', 'EIS LAB', 'W', '5:30 ', ' 8:30', 40, '100'),
(199, '239', '13', 'EIS LAB', 'TH', '5:30 ', ' 8:30', 40, '100'),
(200, '239', '14', 'EIS LAB', 'W', '4:30 ', ' 5:30', 40, '100'),
(201, '239', '14', 'EIS LAB', 'TH', '4:30 ', ' 5:30', 40, '100'),
(202, '239', '14', 'EIS LAB', 'W', '5:30 ', ' 8:30', 40, '100'),
(203, '239', '14', 'EIS LAB', 'TH', '5:30 ', ' 8:30', 40, '100'),
(204, '240', '13', 'EIS LAB', 'TH', '10:00 ', ' 12:00', 40, '100'),
(205, '240', '13', 'EIS LAB', 'TH', '1:00 ', ' 4:00', 40, '100'),
(206, '240', '14', 'EIS LAB', 'TH', '10:00 ', ' 12:00', 40, '100'),
(207, '240', '14', 'EIS LAB', 'TH', '1:00 ', ' 4:00', 40, '100'),
(208, '232', '12', 'EIS LAB', 'F', '10:00 ', ' 11:00', 40, '1'),
(209, '234', '12', 'EIS LAB', 'F', '11:00 ', ' 12:00', 40, '1'),
(210, '234', '12', 'EIS LAB', 'F', '1:00 ', ' 4:00', 40, '1'),
(211, '233', '12', 'EIS LAB', 'S', '1:00 ', ' 2:00', 40, '124'),
(212, '233', '12', 'EIS LAB', 'S', '2:00 ', ' 5:00', 40, '124'),
(213, '233', '12', 'EIS LAB', 'S', '5:30 ', ' 8:30', 40, '124'),
(214, '251', '16', 'EPAS LAB', 'W', '9:00 ', ' 12:00', 40, '103'),
(215, '251', '16', 'EPAS LAB', 'W', '1:00 ', ' 4:00', 40, '103'),
(216, '251', '16', 'EPAS LAB', 'W', '4:30 ', ' 7:30', 40, '103'),
(217, '251', '17', 'EPAS LAB', 'W', '9:00 ', ' 12:00', 40, '103'),
(218, '251', '17', 'EPAS LAB', 'W', '1:00 ', ' 4:00', 40, '103'),
(219, '251', '17', 'EPAS LAB', 'W', '4:30 ', ' 7:30', 40, '103'),
(220, '252', '16', 'EPAS LAB', 'TH', '9:00 ', ' 12:00', 40, '103'),
(221, '252', '16', 'EPAS LAB', 'TH', '1:00 ', ' 4:00', 40, '103'),
(222, '252', '16', 'EPAS LAB', 'TH', '4:30 ', ' 7:30', 40, '103'),
(223, '252', '17', 'EPAS LAB', 'TH', '9:00 ', ' 12:00', 40, '103'),
(224, '252', '17', 'EPAS LAB', 'TH', '1:00 ', ' 4:00', 40, '103'),
(225, '252', '17', 'EPAS LAB', 'TH', '4:30 ', ' 7:30', 40, '103'),
(226, '248', '15', 'EPAS LAB', 'M', '1:30 ', ' 3:30', 40, '90'),
(227, '248', '15', 'EPAS LAB', 'F', '5:00 ', ' 8:00', 40, '90'),
(228, '246', '15', 'EPAS LAB', 'S', '1:00 ', ' 2:00', 40, '1'),
(229, '247', '15', 'EPAS LAB', 'S', '2:00 ', ' 4:00', 40, '1'),
(230, '247', '15', 'EPAS LAB', 'S', '4:30 ', ' 7:30', 40, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compliance`
--

CREATE TABLE `tbl_compliance` (
  `fld_id` int(11) NOT NULL,
  `fld_studentNo` varchar(255) NOT NULL,
  `fld_dateOfRegistration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compliance`
--

INSERT INTO `tbl_compliance` (`fld_id`, `fld_studentNo`, `fld_dateOfRegistration`) VALUES
(1, '', '2017-08-27 17:38:36'),
(2, '', '2017-08-27 17:39:44'),
(3, '', '2017-08-27 17:42:56'),
(4, '', '2017-08-27 17:43:16'),
(5, 'TCC-000002-2017', '2017-08-27 17:43:30'),
(6, 'TCC-000002-2017', '2017-08-27 17:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_connection`
--

CREATE TABLE `tbl_connection` (
  `fld_connectionID` int(11) NOT NULL,
  `fld_applicantID` int(11) NOT NULL,
  `fld_studentNo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_connection`
--

INSERT INTO `tbl_connection` (`fld_connectionID`, `fld_applicantID`, `fld_studentNo`) VALUES
(1, 0, ''),
(2, 1, 'TCC-000002-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_creditedsubjects`
--

CREATE TABLE `tbl_creditedsubjects` (
  `fld_creditedsubjectsID` int(11) NOT NULL,
  `fld_applicantID` int(11) NOT NULL,
  `fld_coursecode` varchar(250) NOT NULL,
  `fld_coursedescription` varchar(250) NOT NULL,
  `fld_units` varchar(250) NOT NULL,
  `fld_grades` varchar(250) NOT NULL,
  `fld_subjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrolledsubjects`
--

CREATE TABLE `tbl_enrolledsubjects` (
  `fld_ID` int(11) NOT NULL,
  `fld_studentNo` varchar(250) NOT NULL,
  `fld_subjectID` varchar(250) NOT NULL,
  `fld_startSY` int(11) NOT NULL,
  `fld_endSY` int(11) NOT NULL,
  `fld_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enrolledsubjects`
--

INSERT INTO `tbl_enrolledsubjects` (`fld_ID`, `fld_studentNo`, `fld_subjectID`, `fld_startSY`, `fld_endSY`, `fld_semester`) VALUES
(1, 'TCC-000002-2017', '23', 2017, 2018, 1),
(2, 'TCC-000002-2017', '25', 2017, 2018, 1),
(3, 'TCC-000002-2017', '75', 2017, 2018, 1),
(4, 'TCC-000002-2017', '95', 2017, 2018, 1),
(5, 'TCC-000002-2017', '228', 2017, 2018, 1),
(6, 'TCC-000002-2017', '229', 2017, 2018, 1),
(7, 'TCC-000002-2017', '226', 2017, 2018, 1),
(8, 'TCC-000002-2017', '39', 2017, 2018, 1),
(9, 'TCC-000002-2017', '31', 2017, 2018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_examresult`
--

CREATE TABLE `tbl_examresult` (
  `fld_examResultID` int(11) NOT NULL,
  `fld_applicantID` int(11) NOT NULL,
  `fld_english` int(11) NOT NULL,
  `fld_mathematics` int(11) NOT NULL,
  `fld_science` int(11) NOT NULL,
  `fld_abstractReasoning` int(11) NOT NULL,
  `fld_examResult` int(11) NOT NULL,
  `fld_comments` varchar(250) NOT NULL,
  `fld_dateOfExam` varchar(250) NOT NULL,
  `fld_remarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_examresult`
--

INSERT INTO `tbl_examresult` (`fld_examResultID`, `fld_applicantID`, `fld_english`, `fld_mathematics`, `fld_science`, `fld_abstractReasoning`, `fld_examResult`, `fld_comments`, `fld_dateOfExam`, `fld_remarks`) VALUES
(1, 1, 62, 63, 58, 75, 64, ' ', '2017-08-02', 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `fld_gradeID` int(100) NOT NULL,
  `fld_studentNo` varchar(100) NOT NULL,
  `fld_subjectID` varchar(100) NOT NULL,
  `fld_midtermGrade` varchar(100) NOT NULL,
  `fld_finalsGrade` varchar(100) NOT NULL,
  `fld_finalcourseGrade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interviewquestions`
--

CREATE TABLE `tbl_interviewquestions` (
  `fld_ID` int(11) NOT NULL,
  `fld_question` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interviewquestions`
--

INSERT INTO `tbl_interviewquestions` (`fld_ID`, `fld_question`) VALUES
(1, 'Ability to convey the unique ability and passions'),
(2, 'Answered question seriously and sincerely'),
(3, 'Applied entirely because of his/her personal reasons and not of a parent or counselor\'s recommendation'),
(4, 'Realize the value of time'),
(5, 'Possible contribution to the campus community'),
(6, 'Indentify his/her contribution to the community'),
(7, 'Punctuality'),
(8, 'Personality'),
(9, 'Preparedness'),
(10, 'Communication Skills'),
(11, 'Courteousness');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interviewresults`
--

CREATE TABLE `tbl_interviewresults` (
  `fld_id` int(11) NOT NULL,
  `fld_applicantID` int(20) NOT NULL,
  `fld_questionId` varchar(200) NOT NULL,
  `fld_ratings` varchar(200) NOT NULL,
  `fld_averageRating` double NOT NULL,
  `fld_remarks` varchar(10) NOT NULL,
  `fld_comments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interviewresults`
--

INSERT INTO `tbl_interviewresults` (`fld_id`, `fld_applicantID`, `fld_questionId`, `fld_ratings`, `fld_averageRating`, `fld_remarks`, `fld_comments`) VALUES
(1, 1, '1,2,3,4,5,6,7,8,9,10,11', '8,2,6,6,8,8,8,6,8,10,10', 7.2727272727272725, 'Passed', 'Very good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `fld_programID` int(11) NOT NULL,
  `fld_programName` varchar(300) NOT NULL,
  `fld_programCode` varchar(300) NOT NULL,
  `fld_pathName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`fld_programID`, `fld_programName`, `fld_programCode`, `fld_pathName`) VALUES
(1, 'Bachelor of Technical Teacher Education Major in Electrical Technology', 'BTTE-ETRI', 'BTTE-ETRI.pdf'),
(2, 'Bachelor of Technical Teacher Education\nMajor in Electronics Technology', 'BTTE-ETRO', 'BTTE-ETRO.pdf'),
(3, 'Bachelor of Technical Teacher Education Major in Automotive Technology', 'BTTE-AUTO', 'BTTE-AUTO.pdf'),
(4, 'Bachelor of Science In Entrepreneurship', 'BS-ENTREP', 'BS-ENTREP.pdf'),
(5, 'Bachelor of Science In Computer Engineering', 'BS-CpE', 'BS-CpE.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prospectus`
--

CREATE TABLE `tbl_prospectus` (
  `fld_prospectusID` int(11) NOT NULL,
  `fld_prospectusName` varchar(100) NOT NULL,
  `fld_maxUnits` int(100) NOT NULL,
  `fld_programID` int(100) NOT NULL,
  `fld_subjlist` varchar(100) NOT NULL,
  `fld_status` varchar(100) NOT NULL,
  `fld_year` varchar(250) NOT NULL,
  `fld_semester` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prospectus`
--

INSERT INTO `tbl_prospectus` (`fld_prospectusID`, `fld_prospectusName`, `fld_maxUnits`, `fld_programID`, `fld_subjlist`, `fld_status`, `fld_year`, `fld_semester`) VALUES
(74, 'BTTE-AUTO 2016-2017', 7, 3, '172,173,174,175,176,177,178,179,180,181,182', 'Active', '1st', 'First'),
(75, 'BTTE-AUTO 2016-2017', 0, 3, '183,184,185,186,187,188,189,190,191,192', 'Active', '1st', 'Second'),
(76, 'BTTE-AUTO 2016-2017', 0, 3, '193,194,195,196,197,198,199,200,201,202', 'Active', '2nd', 'First'),
(77, 'BTTE-AUTO 2016-2017', 0, 3, '203,204,205,206,207,208,209,210', 'Active', '2nd', 'Second'),
(78, 'BTTE-AUTO 2016-2017', 0, 3, '211', 'Active', '2nd', 'Summer'),
(79, 'BTTE-AUTO 2016-2017', 0, 3, '212,213,214,215,216,217,218,219,220', 'Active', '3rd', 'First'),
(80, 'BTTE-AUTO 2016-2017', 0, 3, '221', 'Active', '3rd', 'Second'),
(81, 'BTTE-AUTO 2016-2017', 0, 3, '222,223,224,225,226,227,228,229,230', 'Active', '4th', 'First'),
(82, 'BTTE-AUTO 2016-2017', 0, 3, '231', 'Active', '4th', 'Second'),
(83, 'BTTE-ETRI 2016-2017', 0, 1, '172,173,174,175,232,233,234,179,180,181,182', 'Active', '1st', 'First'),
(84, 'BTTE-ETRI 2016-2017', 0, 1, '183,184,185,186,235,236,237,190,191,192', 'Active', '1st', 'Second'),
(85, 'BTTE-ETRI 2016-2017', 0, 1, '193,194,195,196,197,198,238,239,240,202', 'Active', '2nd', 'First'),
(86, 'BTTE-ETRI 2016-2017', 0, 1, '203,204,205,206,241,242,243,210', 'Active', '2nd', 'Second'),
(87, 'BTTE-ETRI 2016-2017', 0, 1, '211', 'Active', '2nd', 'Summer'),
(88, 'BTTE-ETRI 2016-2017', 0, 1, '244,245,214,215,216,217,218,219,220', 'Active', '3rd', 'First'),
(89, 'BTTE-ETRI 2016-2017', 0, 1, '221', 'Active', '3rd', 'Second'),
(90, 'BTTE-ETRI 2016-2017', 0, 1, '222,223,224,225,226,227,228,229,230', 'Active', '4th', 'First'),
(91, 'BTTE-ETRI 2016-2017', 0, 1, '231', 'Active', '4th', 'Second'),
(92, 'BTTE-ETRO 2016-2017', 0, 2, '172,173,174,175,246,247,248,179,180,181,182', 'Active', '1st', 'First'),
(93, 'BTTE-ETRO 2016-2017', 0, 2, '183,184,185,186,249,250,190,191,192', 'Active', '1st', 'Second'),
(94, 'BTTE-ETRO 2016-2017', 0, 2, '193,194,195,196,197,198,251,252,202', 'Active', '2nd', 'First'),
(95, 'BTTE-ETRO 2016-2017', 0, 2, '203,204,205,206,253,254,210', 'Active', '2nd', 'Second'),
(96, 'BTTE-ETRO 2016-2017', 0, 2, '211', 'Active', '2nd', 'Summer'),
(97, 'BTTE-ETRO 2016-2017', 0, 2, '255,256,214,215,216,217,218,219,220', 'Active', '3rd', 'First'),
(98, 'BTTE-ETRO 2016-2017', 0, 2, '221', 'Active', '3rd', 'Second'),
(99, 'BTTE-ETRO 2016-2017', 0, 2, '222,223,224,225,226,227,228,229,230', 'Active', '4th', 'First'),
(100, 'BTTE-ETRO 2016-2017', 0, 2, '231', 'Active', '4th', 'Second'),
(101, 'BS ENTREP 2016-2017', 0, 4, '172,173,174,175,204,257,180,181,182', 'Inactive', '1st', 'First'),
(102, 'BS ENTREP 2016-2017', 0, 4, '183,184,185,186,258,259,190,191,192', 'Inactive', '1st', 'Second'),
(103, 'BS ENTREP 2016-2017', 0, 4, '193,260,197,261,198,262,263,264,202', 'Inactive', '2nd', 'First'),
(104, 'BS ENTREP 2016-2017', 0, 4, '265,205,266,267,268,269,210', 'Inactive', '2nd', 'Second'),
(105, 'BS ENTREP 2016-2017', 0, 4, '270,271,272,273,274,275', 'Inactive', '3rd', 'First'),
(106, 'BS ENTREP 2016-2017', 0, 4, '276,206,277,278,279,280,281', 'Inactive', '3rd', 'Second'),
(107, 'BS ENTREP 2016-2017', 0, 4, '225,282,283,284,285', 'Inactive', '4th', 'First'),
(108, 'BS ENTREP 2016-2017', 0, 4, '286,287,288,289', 'Inactive', '4th', 'Second'),
(109, 'BSCpE 2016-2017', 30, 5, '290,194,291,292,172,173,186,182,181,180', 'Active', '1st', 'First'),
(110, 'BSCpE 2016-2017', 0, 5, '293,294,295,183,184,296,205,297,191,190,192', 'Active', '1st', 'Second'),
(111, 'BSCpE 2016-2017', 0, 5, '298,299,300,301,197,198,179,302,202', 'Active', '2nd', 'First'),
(112, 'BSCpE 2016-2017', 0, 5, '303,266,304,305,276,306,210', 'Active', '2nd', 'Second'),
(113, 'BSCpE 2016-2017', 0, 5, '307,308,309,310,311,312,313', 'Active', '3rd', 'First'),
(114, 'BSCpE 2016-2017', 0, 5, '314,315,316,317,318,319,320,321', 'Active', '3rd', 'Second'),
(115, 'BSCpE 2016-2017', 0, 5, '322,323,324,325,326,327', 'Active', '4th', 'First'),
(116, 'BSCpE 2016-2017', 0, 5, '328,329,330,331,332,333', 'Active', '4th', 'Second'),
(117, 'BSCpE 2016-2017', 0, 5, '334', 'Active', '4th', 'Summer'),
(118, 'BSCpE 2016-2017', 0, 5, '335,336,337,225,338,339', 'Active', '5th', 'First'),
(119, 'BSCpE 2016-2017', 0, 5, '340,341,342,206,343,344', 'Active', '5th', 'Second'),
(120, 'BTTE-AUTO 2020-2021', 0, 3, '172,173,174,175,176,177,178,179,180,181,182', 'Inactive', '1st', 'First');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `fld_ID` int(11) NOT NULL,
  `fld_applicantID` int(11) NOT NULL,
  `fld_listOfRequirements` varchar(255) NOT NULL,
  `fld_dateSubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`fld_ID`, `fld_applicantID`, `fld_listOfRequirements`, `fld_dateSubmitted`) VALUES
(1, 1, 'GMC,Form 137,Certificate of Indigency', '2017-08-27 17:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `fld_roomID` int(11) NOT NULL,
  `fld_roomName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`fld_roomID`, `fld_roomName`) VALUES
(1, 'MB110'),
(2, 'MB101');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schoolfees`
--

CREATE TABLE `tbl_schoolfees` (
  `fld_id` int(11) NOT NULL,
  `fld_feeName` varchar(250) NOT NULL,
  `fld_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schoolfees`
--

INSERT INTO `tbl_schoolfees` (`fld_id`, `fld_feeName`, `fld_price`) VALUES
(1, 'Tuition Fee', 200),
(2, 'Registration', 500),
(3, 'Lab Fee', 500),
(4, 'Computer Fee', 300),
(5, 'Library Fee', 200),
(6, 'Guidance Fee', 300),
(7, 'Athletic Fee', 300),
(9, 'Medical/ Dental Fee', 100),
(10, 'Cultural Fee', 100),
(11, 'Exam Materials', 500),
(12, 'School ID Card', 150),
(13, 'Student Parliament', 100),
(14, 'Student Publication', 200),
(15, 'Student Activities', 500),
(16, 'NSTP', 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `fld_sectionID` int(11) NOT NULL,
  `fld_sectionName` varchar(300) NOT NULL,
  `fld_programID` int(11) NOT NULL,
  `fld_yearLevel` varchar(250) NOT NULL,
  `fld_maxNoOfStudents` int(11) NOT NULL,
  `fld_staffId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`fld_sectionID`, `fld_sectionName`, `fld_programID`, `fld_yearLevel`, `fld_maxNoOfStudents`, `fld_staffId`) VALUES
(1, 'IT4A', 13, '', 0, 87),
(2, 'BS CpE A', 3, '1st', 5, 87),
(3, 'BS CpE B', 3, '1st', 10, 88),
(4, 'BS CpE irreg 2', 5, '', 0, 90),
(5, 'BS ENTREP A', 4, '', 0, 88),
(6, 'BS ENTREP B', 4, '', 0, 89),
(7, 'BS ENTREP irreg 1', 4, '', 0, 87),
(8, 'BS ENTREP irreg 2', 4, '', 0, 87),
(9, 'BTTE- AUTO A', 3, '', 0, 87),
(10, 'BTTE- AUTO irreg 1', 3, '', 0, 87),
(11, 'BTTE- AUTO irreg 2', 3, '', 0, 87),
(12, 'BTTE- ETRI A', 1, '', 0, 87),
(13, 'BTTE- ETRI irreg 1', 1, '', 0, 88),
(14, 'BTTE- ETRI irreg 2', 1, '', 0, 87),
(15, 'BTTE- ETRO A', 2, '', 0, 87),
(16, 'BTTE- ETRO irreg 1', 2, '', 0, 87),
(17, 'BTTE- ETRO irreg 2', 2, '', 0, 87),
(18, 'IT4B', 5, '5th', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `staffId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `employmentType` varchar(100) NOT NULL,
  `maxUnits` int(11) NOT NULL,
  `availableSchedule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`staffId`, `firstName`, `middleName`, `lastName`, `employmentType`, `maxUnits`, `availableSchedule`) VALUES
(1, 'Van', 'Monastrial', 'Lumban', '1', 100, ''),
(2, 'Jeremy', 'Rances', 'Librea', '1', 100, ''),
(3, 'Jerry', 'Harris', 'Mora', '1', 100, ''),
(4, 'Jed', 'Klarence', 'Gonzales', '1', 0, ''),
(5, 'G', 'Rances', 'Alcober', '1', 100, ''),
(6, 'John', 'Dominique', 'Fedelino', '1', 100, ''),
(87, 'Juliet', '', 'Niega', '1', 100, 'NA'),
(88, 'Rionel Belen', '', 'Caldo', '1', 100, 'NA'),
(89, 'Adelio', '', 'Balbin', '1', 100, 'NA'),
(90, 'Apolinar', '', 'Dimaala', '1', 100, 'NA'),
(91, 'Benjamin', '', 'Carandang', '1', 100, 'NA'),
(92, 'Carlo', '', 'Malizon', '1', 100, ''),
(93, 'Diosdado', '', 'Melanio', '1', 100, ''),
(94, 'Fernando', '', 'Manzanero', '1', 100, ''),
(95, 'Jojiemar', '', 'Obligar', '1', 100, ''),
(96, 'Julius Ceasar', '', 'Javier', '1', 100, ''),
(97, 'Leomel', '', 'Abas', '1', 100, ''),
(98, 'Liel Roe', '', 'Salazar', '1', 100, ''),
(99, 'Michael', '', 'Lirio', '1', 100, ''),
(100, 'Nicodemo', '', 'Bron', '1', 100, ''),
(101, 'Phillip', '', 'Gallendez', '1', 100, ''),
(102, 'Pio', '', 'Platon', '1', 100, ''),
(103, 'Renz', '', 'Baldovino', '1', 100, ''),
(104, 'Rodrigo', '', 'Rodriguez', '1', 100, ''),
(105, 'Rolando', '', 'Tasico', '1', 100, ''),
(106, 'Ryan Jerome', '', 'Sales', 'NA', 0, 'NA'),
(107, 'Eleonor', '', 'Bautista', '1', 100, ''),
(108, 'Gerry', '', 'Magpantay', '1', 100, ''),
(109, 'Glaiza', '', 'Enriquez', '1', 100, ''),
(110, 'Grace Ann', '', 'Matanguihan', '1', 100, ''),
(111, 'Grace', '', 'Tuiza', '1', 100, ''),
(112, 'Irma', '', 'Nemis', '1', 100, ''),
(113, 'Jascelynn', '', 'Olimpiada', '1', 100, ''),
(114, 'Laarni', '', 'Caguicla', '1', 100, ''),
(115, 'Ma. Belen', '', 'Manglo', '1', 100, ''),
(116, 'Mary Grace', '', 'Alloro', '1', 100, ''),
(117, 'Myrna', '', 'Atienza', '1', 100, ''),
(118, 'Myrna', '', 'Naling', '1', 100, ''),
(119, 'Susan', '', 'Ignacio', '1', 100, ''),
(120, 'Susan', '', 'Velasco', '1', 100, ''),
(121, 'Trisha', '', 'Houghton', '1', 100, ''),
(122, 'Venice', '', 'Pagaspas', '1', 100, ''),
(123, 'Ybette', '', 'Quine', '1', 100, ''),
(124, 'Rommel', '', 'Fanoga', '1', 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `fld_studentNo` varchar(100) NOT NULL,
  `fld_firstName` varchar(100) NOT NULL,
  `fld_middleName` varchar(100) NOT NULL,
  `fld_lastName` varchar(100) NOT NULL,
  `fld_sex` varchar(1) NOT NULL,
  `fld_homeAddress` varchar(255) NOT NULL,
  `fld_guardianName` varchar(255) NOT NULL,
  `fld_mobilePhoneNo` varchar(255) NOT NULL,
  `fld_yearLevel` varchar(100) NOT NULL,
  `fld_program` varchar(100) NOT NULL,
  `fld_section` varchar(100) NOT NULL,
  `fld_prospectusName` varchar(100) NOT NULL,
  `fld_status` varchar(300) NOT NULL,
  `fld_new` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`fld_studentNo`, `fld_firstName`, `fld_middleName`, `fld_lastName`, `fld_sex`, `fld_homeAddress`, `fld_guardianName`, `fld_mobilePhoneNo`, `fld_yearLevel`, `fld_program`, `fld_section`, `fld_prospectusName`, `fld_status`, `fld_new`) VALUES
('TCC-000002-2017', 'John Dominique', 'Rosa', 'Fedelino', 'M', 'Alitagtag, Batangas', 'Elsa Fedelino', '09151212321', '1st', '2', '', 'BTTE-ETRO 2016-2017', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `fld_subjectID` int(11) NOT NULL,
  `fld_subCode` varchar(250) NOT NULL,
  `fld_description` varchar(250) NOT NULL,
  `fld_units` int(11) NOT NULL,
  `fld_lecHrs` double NOT NULL,
  `fld_labHrs` double NOT NULL,
  `fld_preReq` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`fld_subjectID`, `fld_subCode`, `fld_description`, `fld_units`, `fld_lecHrs`, `fld_labHrs`, `fld_preReq`) VALUES
(172, 'ENGL1', 'Study and Thinking Skills', 3, 3, 0, 'None'),
(173, 'FILI1', 'Komunikasyon sa Akademikong Filipino', 3, 3, 0, 'None'),
(174, 'NSCI1', 'Biological Science', 3, 3, 0, 'None'),
(175, 'MATH1', 'Fundamentals of Math including College Algebra', 3, 3, 0, 'None'),
(176, 'AUTO1', 'Occupational Health and Safety Practices', 1, 1, 0, 'None'),
(177, 'AUTO2', 'Internal Combustion Engine Servicing, Repair, and Maintenance', 4, 2, 6, 'None'),
(178, 'AUTO3', 'Preventive Maintenance and Gas/Diesel Engine Tune-up ', 3, 2, 3, 'None'),
(179, 'HUMA1', 'Philosophy (Logic)', 3, 3, 0, 'None'),
(180, 'PHED1', 'Self Testing Activities', 2, 2, 0, 'None'),
(181, 'NSTP1', 'LTS/MS 11', 3, 3, 0, 'None'),
(182, 'TCCR1', 'Mabini\'s Life, Works and Writings', 2, 2, 0, 'None'),
(183, 'ENGL2', 'Speech and Oral Communication', 3, 3, 0, 'ENGL1'),
(184, 'FILI2', 'Pagbasa at Pagsulat sa iba\'t ibang Disiplina', 3, 3, 0, 'FILI1'),
(185, 'NSCI2', 'Earth Science', 3, 3, 0, 'none'),
(186, 'SSCI1', 'General Psychology including Population Education', 3, 3, 0, 'None'),
(187, 'AUTO4', 'Automotive Body Electrical System Service, Repair and Maintenance', 5, 3, 6, 'None'),
(188, 'AUTO5', 'Under Chassis Components  Servicing, Repairing and Maintenance', 4, 2, 6, 'None'),
(189, 'AUTO6', 'Automotive Service Shop Management and Maintenance', 1, 1, 0, 'None'),
(190, 'NSTP2', 'CWS/ MS 12', 3, 3, 0, 'None'),
(191, 'TCCR2', 'Laurel\'s Life, Works  and Writings', 2, 2, 0, 'None'),
(192, 'PHED2', 'Rythmic Activities', 2, 2, 0, 'PHED1'),
(193, 'LITE1', 'Panitikan ng Filipinas', 3, 3, 0, 'None'),
(194, 'MATH4', 'Plane and Spherical Trigonometry', 3, 3, 0, 'MATH1'),
(195, 'ENGL3', 'Technical Writing in the Discipline', 3, 3, 0, 'ENGL2'),
(196, 'HUMA4', 'Fundamentals of Drawing', 3, 1.5, 1.5, 'None'),
(197, 'FILI3', 'Masining na Pagpapahayag', 3, 3, 0, 'FILI2'),
(198, 'SSCI3', 'Politics & Governance with Philippine Constitution', 3, 3, 0, 'None'),
(199, 'AUTO7', 'Automotive Air-conditioning Servicing, Repair,and Maintenance', 2, 1, 3, 'None'),
(200, 'AUTO8', 'Motor Cycle and Small Engine Servicing, Repairing and Maintenance', 2, 1, 3, 'None'),
(201, 'AUTO9', 'Automotive Body Repair and Substrate Preparation', 4, 2, 6, 'None'),
(202, 'PHED3', 'Fundamentals of Games & Sports', 2, 2, 0, 'PHED2'),
(203, 'NSCI3', 'Physics ', 3, 3, 0, 'None'),
(204, 'ESCI1', 'Information & Communication Technology', 3, 2, 1, 'None'),
(205, 'SSCI2', 'Basic Economics with TAR, Entrepreneurship and Work Ethics', 3, 3, 0, 'None'),
(206, 'RIZA1', 'Rizal\'s Life, Works & Writings', 3, 3, 0, 'None'),
(207, 'AUTO10', 'Engine Overhauling and Rebuilding', 5, 3, 6, 'None'),
(208, 'AUTO11', 'Metallic and Solid Color Painting Applications and Techniques', 3, 2, 3, 'None'),
(209, 'AUTO12', 'Basic Driving', 2, 1, 3, 'None'),
(210, 'PHED4', 'Recreational Activities for College Students', 2, 2, 0, 'PHED3'),
(211, 'INIM1', 'Industry Immersion 1*', 5, 0, 30, '3rd. Yr. Standing'),
(212, 'AUTO13', 'Basic Power Conversion System Service, Repair and Maintenance', 3, 2, 3, 'None'),
(213, 'AUTO14', 'Basic Electronics Engine Management System Operation and Servicing', 3, 2, 3, 'None'),
(214, 'PCTC1', 'Adolescent Psychology', 3, 3, 0, 'None'),
(215, 'PCTC2', 'Facilitating Learning', 3, 3, 0, 'None'),
(216, 'PCTC3', 'Social Dimension of Education', 3, 3, 0, 'None'),
(217, 'PCMS1', 'Principles of Teaching', 3, 3, 0, 'None'),
(218, 'PCMS2', 'Educational Technology 1', 3, 3, 0, 'None'),
(219, 'PCMS3', 'Assessment of Student Learning 1', 3, 3, 0, 'None'),
(220, 'PCFS1', 'Field Study 1-3', 3, 3, 0, 'None'),
(221, 'INIM2', 'Industry Immersion 2', 10, 0, 30, 'InIm122'),
(222, 'PCTC4', 'The Teaching Profession including Code of Ethics', 3, 3, 0, 'None '),
(223, 'PCMS4', 'Strategies of Teaching', 3, 3, 0, 'None '),
(224, 'PCMS5', 'Educational Technology 2', 3, 3, 0, 'PCMS2'),
(225, 'HIST1', 'Philippine History', 3, 3, 0, 'None'),
(226, 'PCTC5', 'Curriculum Development including Project Development', 3, 3, 0, 'None '),
(227, 'PCMS6', 'Assessment of Students Learning 2', 3, 3, 0, 'PCMS3'),
(228, 'PCMS7', 'Career Guidance and Counselling', 3, 3, 0, 'None '),
(229, 'PCFS2', 'Field Study 4-6', 3, 3, 0, 'PCFS1'),
(230, 'PCSR1', 'Special Research Project', 3, 3, 0, 'ENGL3'),
(231, 'PCPT1', 'Practice Teaching', 6, 24, 0, 'INIM2'),
(232, 'ETRI1', 'Occupational Health and Safety Practices', 1, 1, 0, 'None'),
(233, 'ETRI2', 'Fundamentals of Electricity', 3, 1, 6, 'None'),
(234, 'ETRI3', 'Electrical and Electronics Circuit & Devices', 3, 1, 6, 'None'),
(235, 'ETRI4', 'Electrical Wiring System and Design ', 4, 2, 6, 'Elct211 '),
(236, 'ETRI5', 'Signal and Communication System', 3, 2, 3, 'Elct211 '),
(237, 'ETRI6', 'Industrial Motor Controller', 3, 2, 3, 'Elct211 '),
(238, 'ETRI7', 'Direct Current Machines', 3, 2, 3, 'None'),
(239, 'ETRI8', 'Alternating Current Machine*', 4, 2, 6, 'None'),
(240, 'ETRI9', 'Logic Circuit Controller', 3, 2, 3, 'None'),
(241, 'ETRI10', 'Industrial Electronics Circuits and Devices', 3, 2, 3, 'None'),
(242, 'ETRI11', 'Pneumatic and Hydraulic System', 3, 2, 3, 'None'),
(243, 'ETRI12', 'PLC System and Programming', 3, 1, 6, 'ETRI7'),
(244, 'ETRI13', 'Industrial Process Controller', 3, 2, 3, 'None'),
(245, 'ETRI14', 'Automation Control System', 3, 2, 3, 'None'),
(246, 'ETRO1', 'Occupational Health and Safety Practice', 1, 1, 0, 'None'),
(247, 'ETRO2', 'Basic Electronics', 3, 2, 3, 'None'),
(248, 'ETRO3', 'Digital Electronics', 3, 2, 3, 'None'),
(249, 'ETRO4', 'Power Electronics', 3, 2, 3, 'None'),
(250, 'ETRO5', 'Electronically-Controlled Domestic Household Appliances Repair and Maintenance', 4, 2, 6, 'None'),
(251, 'ETRO6', 'Audio System Repair and Maintenance', 5, 3, 6, 'None'),
(252, 'ETRO7', 'Cellular Phone Repair and Maintenance', 5, 3, 6, 'None'),
(253, 'ETRO8', 'Video System Repair and Maintenance', 5, 3, 6, 'None'),
(254, 'ETRO9', 'Instrumentation and Process Control', 5, 3, 6, 'None'),
(255, 'ETRO10', 'Instrumentation Trouble shooting and Maintenance', 3, 2, 3, 'None'),
(256, 'ETRO11', 'Industrial Automation and Control Electronics', 5, 3, 6, 'None'),
(257, 'MNGT1', 'Principles of Management and Organization', 3, 3, 0, 'None'),
(258, 'ENTR1', 'Entrepreneurial Behavior', 3, 3, 0, 'None'),
(259, 'ESCI3', 'Integrated Office and Productivity Software', 3, 2, 3, 'ESCI1'),
(260, 'ENGL5', 'Business Communications', 3, 3, 0, 'ENGL1'),
(261, 'MNGT2', 'Human Behavior in Organization', 3, 3, 0, 'SSCI1'),
(262, 'MKTG1', 'Principles of Marketing', 3, 3, 0, 'None'),
(263, 'ACTG1', 'Financial Accounting', 3, 3, 0, 'MATH1'),
(264, 'ENTR2', 'Math of Investment', 3, 3, 0, 'MATH1'),
(265, 'MNGT3', 'Strategic Management', 3, 3, 0, 'MNGT2'),
(266, 'MATH8', 'Probability and Statistics', 3, 3, 0, 'MATH1'),
(267, 'ENTR4', 'Management Accounting', 3, 3, 0, 'ACTG1'),
(268, 'ETRR5', 'Operations Research', 3, 3, 0, 'MATH1'),
(269, 'ENTR6', 'Business Opportunities 1', 3, 3, 0, 'MNGT1, ENTR1'),
(270, 'HUMA2', 'Introduction to Humanities', 3, 3, 0, 'None'),
(271, 'ENTR3', 'Microeconomis', 3, 3, 0, 'MATH1'),
(272, 'ENTR7', 'Cost Accounting', 3, 3, 0, 'ACTG1'),
(273, 'ENTR8', 'Taxation', 3, 3, 0, 'None'),
(274, 'FINA1', 'Basic Finance', 3, 3, 0, 'None'),
(275, 'ENTR9', 'Business Plan 1', 3, 3, 0, 'ENTR6'),
(276, 'HUMA3', 'Philosophy and Ethics', 3, 3, 0, 'None'),
(277, 'ENTR10', 'Business Law', 3, 3, 0, 'Engl1'),
(278, 'ENTR11', 'Production and Operations Management', 3, 3, 0, 'ETRR5'),
(279, 'BLEC1', 'E-Commerce', 3, 3, 0, 'MKTG1'),
(280, 'ENTR12', 'Business Plan 2', 3, 3, 0, 'ENTR9'),
(281, 'ENTR13', 'Business Opportunities 2', 3, 3, 0, 'ENTR6'),
(282, 'ENTR14', 'Business Policy', 3, 3, 0, 'MNGT1'),
(283, 'BLEC2', 'Hospitality Management', 3, 3, 0, 'None'),
(284, 'BLEC3', 'Convention and Meeting Management', 3, 3, 0, 'None'),
(285, 'ENTR15', 'Business Plan Implementation 1', 5, 5, 0, 'ENTR6'),
(286, 'ENTR16', 'Business Plan Implementation 2', 5, 5, 0, 'ENTR15'),
(287, 'ENTR17', 'Entrepreneurship Integration', 3, 3, 0, 'ENTR12, MATH1'),
(288, 'BLEC4', 'Medical Tourism', 3, 3, 0, 'None'),
(289, 'BLEC5', 'Event Management', 3, 3, 0, 'None'),
(290, 'MATH2', 'College Algebra', 3, 3, 0, 'None'),
(291, 'BENG1', 'Engineering Drawing', 1, 0, 3, 'None'),
(292, 'NSCI4', 'General Chemistry ', 4, 3, 3, 'None'),
(293, 'MATH3', 'Advanced Algebra ', 2, 2, 0, 'MATH2'),
(294, 'MATH5', 'Analytic Geometry', 2, 2, 0, 'MATH4'),
(295, 'MATH7', 'Solid Mensuration ', 2, 2, 0, 'MATH4'),
(296, 'PHYS1', 'Physics 1 ', 4, 3, 3, 'MATH2'),
(297, 'CPEN1', 'Computer Hardware and Fundamentals', 1, 0, 3, 'None'),
(298, 'MATH9', 'Differential Calculus', 4, 4, 0, 'Math3, Math5, Math7'),
(299, 'PHYS2', 'Physics 2', 4, 3, 3, 'PHYS1'),
(300, 'BENG3', 'Computer Fundamentals and Programming ', 2, 0, 6, 'NONE'),
(301, 'ENGL4', 'Technical Communication', 3, 3, 0, 'ENGL2'),
(302, 'CPEN2', 'Discrete Mathematics ', 3, 3, 0, 'MATH2'),
(303, 'MATH10', 'Integral Calculus', 4, 4, 0, 'MATH9'),
(304, 'BENG2', 'Computer Aided Drafting', 1, 0, 3, 'BENG3'),
(305, 'SSCI5', 'Society and Culture', 3, 3, 0, 'None'),
(306, 'CPEN3', 'Data Structures and Algorithms Analysis ', 4, 3, 3, 'BENG3'),
(307, 'MATH11', 'Differential Equations', 3, 3, 0, 'MATH10'),
(308, 'BENG4', 'Statics of Rigid Bodies', 3, 3, 0, 'MATH10'),
(309, 'BENG5', 'Safety Management', 1, 1, 0, 'NONE'),
(310, 'AENG7', 'Circuits 1 ', 4, 3, 3, 'Phys2, Math10/ AEng7'),
(311, 'AENG8', 'Electronics Devices and Circuits', 4, 3, 3, 'Phys2, Math10/ AEng7'),
(312, 'CPEN4', 'Computer System Organization with Assembly Languange - Lec', 4, 3, 3, 'CpEN3/ CpEn4'),
(313, 'HUMA5', 'Arts Appreciation', 3, 3, 0, 'None'),
(314, 'CPEN5', 'Advanced Engineering Mathematics for CpE', 3, 3, 0, 'MATH11'),
(315, 'BENG6', 'Dynamics of Rigid Bodies', 2, 2, 0, 'BENG4'),
(316, 'BENG7', 'Mechanics of Deformable Bodies', 3, 3, 0, 'BENG4'),
(317, 'BENG8', 'Engineering Economy', 3, 3, 0, 'NONE'),
(318, 'BENG9', 'Engineering Management', 3, 3, 0, 'NONE'),
(319, 'AENG9', 'Circuits 2', 4, 3, 3, 'AENG7'),
(320, 'AENG10', 'Electronics Circuits Analysis and Design', 4, 3, 3, 'AEng8/ AEng10'),
(321, 'CPEN6', 'Logic Circuits and Switching Theory', 3, 3, 0, 'AEng8/ CpE6'),
(322, 'BENG10', 'Environmental Engineering ', 2, 2, 0, 'NSci4'),
(323, 'CPEN7', 'Advanced Logic Circuit ', 4, 3, 3, 'CpEN6/CpEN7'),
(324, 'CPEN8', 'Digital Signal Processing ', 4, 3, 3, 'CpEN5/ CpEN8'),
(325, 'CPEN9', 'Principles of Communications', 3, 3, 0, 'AEng9,AEng10'),
(326, 'CPEN10', 'Control Systems ', 4, 3, 3, 'AEng9,AEng10/ CpEN10'),
(327, 'CPEN11', 'Computer Engineering Drafting and Design ', 1, 0, 3, 'CPEN3'),
(328, 'CPEN12', 'Operating Systems', 4, 3, 3, 'CpEN4/ CpEN12'),
(329, 'CPEN13', 'Computer System Architecture', 4, 3, 3, 'CpEN4, CpEN7/ CpEN13'),
(330, 'CPE14', 'Data Communications', 3, 3, 0, 'CpEN9'),
(331, 'CPEN15', 'Microprocessor System', 4, 3, 3, 'CpEN4,CpEN6/CpEN15'),
(332, 'CPEN16', 'Object Oriented Programming ', 3, 2, 3, 'CpEN3/CpEN16'),
(333, 'CLEC1', 'Embedded Systems', 3, 3, 0, 'None'),
(334, 'CPEOJT', 'OJT (240 hrs)', 2, 2, 0, '5th year Standing'),
(335, 'CPEN20', 'Computer Networks', 4, 3, 1, 'CPEN13'),
(336, 'CPEN17', 'Design Project 1 (Methods of Research)', 2, 2, 0, 'CpEN15'),
(337, 'CPEN22', 'Software Engineering', 3, 3, 0, 'CpEN3'),
(338, 'CLEC2', 'Microelectronics', 3, 3, 0, 'None'),
(339, 'CPEN18', 'System Analysis Design ', 3, 2, 3, 'CPEN16'),
(340, 'CPEN19', 'Design Project 2 (Project Implementation) ', 2, 0, 6, 'CPEN17'),
(341, 'AENG11', 'Entrepreneurship', 3, 3, 0, '5th Year Standing'),
(342, 'CPEN21', 'Engineering Ethics & Computer Laws', 2, 2, 0, '5th Year Standing'),
(343, 'CPEN23', 'Seminars and Field Trips', 1, 0, 3, '5th Year Standing'),
(344, 'CLEC3', 'Instrumentation and Control', 3, 3, 0, '4th Year Standing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjectareas`
--

CREATE TABLE `tbl_subjectareas` (
  `fld_ID` int(11) NOT NULL,
  `fld_subject` varchar(250) NOT NULL,
  `fld_noOfItems` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjectareas`
--

INSERT INTO `tbl_subjectareas` (`fld_ID`, `fld_subject`, `fld_noOfItems`) VALUES
(1, 'English', 50),
(2, 'Mathematics', 200),
(3, 'Science', 300),
(4, 'Abstract Reasoning', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `fld_usersID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `passwordPlain` varchar(100) NOT NULL,
  `passwordSalt` varchar(100) NOT NULL,
  `staffId` varchar(100) NOT NULL,
  `accessType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`fld_usersID`, `Username`, `passwordPlain`, `passwordSalt`, `staffId`, `accessType`) VALUES
(1, 'Admin', 'aeb8463987d2cd26cb4e8e2836fee171', '$2a$10$2Qag3ZpvPfcE4LbOxlxtkw==', '1', 'Admin'),
(2, 'Admission', 'b2bca6d599c6188017c333f908f16c86', '$2a$10$bCSK/rJ/ADWGd/ZmhugHMg==', '2', 'Admission'),
(3, 'Registrar4old', '35bea036080257d58ee37bf7822cb850', '$2a$10$67xnGSoXG5Gg0bn/WH7tzQ==', '3', 'Registrar4old'),
(4, 'VP for Acad', 'bb41a9c24452482a5ca9376add9ff870', '$2a$10$yroiYPICiY1961rgO8WkUQ==', '4', 'VP for Acad'),
(5, 'Guidance', 'aeb8463987d2cd26cb4e8e2836fee171', '$2a$10$2Qag3ZpvPfcE4LbOxlxtkw==', '5', 'Guidance'),
(6, 'Registrar4new', '35bea036080257d58ee37bf7822cb850', '$2a$10$67xnGSoXG5Gg0bn/WH7tzQ==', '6', 'Registrar4new'),
(11, 'niega.juliet', '1a289c11bbd8248b4c15f97d03d63190', '$2a$10$lgMtQgp9mywdHU66zE1taA==', '1', 'Faculty'),
(12, 'caldo.rionel', '594f4ee896cde11e2cafe6f98ea3f05b', '$2a$10$AR8ATgouJ1lGA0g659XdOQ==', '88', 'Faculty'),
(13, 'balbin.adelio', 'c842781d0f8322e96549685fcefc47c8', '$2a$10$xCGSup8Thh9KCiEMMVV15w==', '89', 'Faculty'),
(14, 'dimaala.aplinar', '841254b7f1703f4bd3c374cea9365bd0', '$2a$10$YIGf1Gwo4ruKXy7xoAab/w==', '90', 'Faculty'),
(15, 'ryanjerome.sales', 'ff45d69c225608cae29216cc69af72a4', '$2a$10$zjStDbenfmk/eGHwjQB7gA==', '106', 'Admission'),
(21, 'benjamin.carandang', '5ed2bb2403cc244ef122ae3c37fda42a', '$2a$10$dOX3kHsnIAK/74FkmQk0/A==', '111', 'Faculty'),
(22, 'johndominique.fedelino', '733dbe37637560949fd3a724bed07575', '$2a$10$MD4lqoHeyfVK70F1GCrUJg==', 'TCC-000002-2017', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activatorsy`
--
ALTER TABLE `tbl_activatorsy`
  ADD PRIMARY KEY (`fld_SYID`);

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`fld_applicantID`);

--
-- Indexes for table `tbl_applicantchecklist`
--
ALTER TABLE `tbl_applicantchecklist`
  ADD PRIMARY KEY (`fld_applicantchecklistID`);

--
-- Indexes for table `tbl_availablecourse`
--
ALTER TABLE `tbl_availablecourse`
  ADD PRIMARY KEY (`fld_availableCourseID`);

--
-- Indexes for table `tbl_compliance`
--
ALTER TABLE `tbl_compliance`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_connection`
--
ALTER TABLE `tbl_connection`
  ADD PRIMARY KEY (`fld_connectionID`);

--
-- Indexes for table `tbl_creditedsubjects`
--
ALTER TABLE `tbl_creditedsubjects`
  ADD PRIMARY KEY (`fld_creditedsubjectsID`);

--
-- Indexes for table `tbl_enrolledsubjects`
--
ALTER TABLE `tbl_enrolledsubjects`
  ADD PRIMARY KEY (`fld_ID`);

--
-- Indexes for table `tbl_examresult`
--
ALTER TABLE `tbl_examresult`
  ADD PRIMARY KEY (`fld_examResultID`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`fld_gradeID`);

--
-- Indexes for table `tbl_interviewquestions`
--
ALTER TABLE `tbl_interviewquestions`
  ADD PRIMARY KEY (`fld_ID`);

--
-- Indexes for table `tbl_interviewresults`
--
ALTER TABLE `tbl_interviewresults`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`fld_programID`);

--
-- Indexes for table `tbl_prospectus`
--
ALTER TABLE `tbl_prospectus`
  ADD PRIMARY KEY (`fld_prospectusID`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`fld_ID`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`fld_roomID`);

--
-- Indexes for table `tbl_schoolfees`
--
ALTER TABLE `tbl_schoolfees`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`fld_sectionID`);

--
-- Indexes for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`fld_studentNo`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`fld_subjectID`);

--
-- Indexes for table `tbl_subjectareas`
--
ALTER TABLE `tbl_subjectareas`
  ADD PRIMARY KEY (`fld_ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`fld_usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activatorsy`
--
ALTER TABLE `tbl_activatorsy`
  MODIFY `fld_SYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `fld_applicantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_applicantchecklist`
--
ALTER TABLE `tbl_applicantchecklist`
  MODIFY `fld_applicantchecklistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_availablecourse`
--
ALTER TABLE `tbl_availablecourse`
  MODIFY `fld_availableCourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `tbl_compliance`
--
ALTER TABLE `tbl_compliance`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_connection`
--
ALTER TABLE `tbl_connection`
  MODIFY `fld_connectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_creditedsubjects`
--
ALTER TABLE `tbl_creditedsubjects`
  MODIFY `fld_creditedsubjectsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_enrolledsubjects`
--
ALTER TABLE `tbl_enrolledsubjects`
  MODIFY `fld_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_examresult`
--
ALTER TABLE `tbl_examresult`
  MODIFY `fld_examResultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_interviewquestions`
--
ALTER TABLE `tbl_interviewquestions`
  MODIFY `fld_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_interviewresults`
--
ALTER TABLE `tbl_interviewresults`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `fld_programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_prospectus`
--
ALTER TABLE `tbl_prospectus`
  MODIFY `fld_prospectusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `fld_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `fld_roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_schoolfees`
--
ALTER TABLE `tbl_schoolfees`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `fld_sectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `fld_subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;
--
-- AUTO_INCREMENT for table `tbl_subjectareas`
--
ALTER TABLE `tbl_subjectareas`
  MODIFY `fld_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `fld_usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
