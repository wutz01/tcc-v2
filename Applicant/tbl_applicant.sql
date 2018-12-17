-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 05:17 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, '2017-07-11', '1', '1', '1', '1', '1', '1', '1997-02-02', '1', '1', 'Male', 1, '1', 'Single', 1, '1', 'Living', '1', '1', '1', '1', '1', 'Living', '1', '1', '1', '1', '1', 'below 5,000', 'Array', 'Array', 'Array', 'Array', 'Array', 'Array', '1', 'Living', '1', '1', '1', '1', '1', 'Local', 'Array', 'Array', 0, '0000-00-00', 'Array', 'Array', '1', '1', '1', 'Local', '1', '1', '1', 1, '1', '1', '1', '1', 'Local', '1', '1', '1', '11', '1', 'Abroad', '1', '1', '1', '1', '1', 'Local', '1', '11', '1', '1', '1', 'Abroad', '1', '1', '1', '1', 'Yes', '1', 'No', '1', 'Yes', '1', 'No', '1', '', '', '', '', ''),
(2, '2017-07-11', '1', '1', '1', '1', '1', '1', '0001-01-01', '1', '1', 'Male', 1, '', 'Married', 1, '1', 'Living', '1', '1', '1', '1', '1', 'Living', '1', '1', '1', '1', '1', '20,000- 24,999', '1', '1', '1', '1', '1', '1', '1', 'Living', '1', '1', '1', '1', '1', 'Abroad', '1', '', 1, '0001-01-01', '1', '1', '1', '1', '1', 'Local', '1', '1', '1', 1, '1', '1', '1', '1', 'Abroad', '1', '1', '1', '1', '1', 'Local', '1', '1', '1', '1', '1', 'Abroad', '1', '1', '1', '1', '1', 'Local', '1', '1', '1', '1', 'Yes', '1', 'No', '1', 'Yes', '1', 'No', '1', '', '', '', '', ''),
(3, '2017-07-11', '1', '1', '1', '1', '1', '1', '0001-01-01', '', '1', 'Male', 1, '1', 'Married', 1, '1', 'Living', '1', '1', '1', '1', '1', 'Deceased', '1', '1', '1', '1', '1', '25,000- 29,999', '1', '1', '1', '1', '1', '1', '1', 'Living', '1', '1', '1', '1', '1', 'Local', '1', '1', 1, '2017-01-01', '1', '1', '1', '1', '1', 'Abroad', '1', '1', '1', 1, '1', '1', '1', '1', 'Abroad', '1', '1', '1', '1', '1', 'Local', '1', '1', '1', '1', '1', 'Abroad', '1', '1', '1', '1', '1', 'Local', '1', '1', '1', '1', 'No', '1', 'Yes', '1', 'No', '1', 'Yes', '1', '', '', '', '', ''),
(4, '2017-07-11', 'Jeremy', '', 'Librea', 'Brgy. Calamias, Lipa City, Batangas', 'jeremylibrea23@gmail.com', 'Tanay, Rizal', '1997-04-23', '09062893336', '', 'Male', 167, 'O', 'Single', 60, 'Roman Catholic', 'Living', 'Fernando Librea', 'Brgy. Calamias, Lipa City, Batangas', 'Caretaker', '09062813456', 'College', 'Living', 'Maribeth Librea', 'Brgy. Calamias, Lipa City, Batangas', 'Housewife', '09065789036', 'College', '15,000- 19,999', 'James Librea,Jeff Librea,Jenelle Librea,Joi Librea', '28,26,24,22', 'College,n/a,College,College', 'WCC,n/a,Teletech,UPLB', '15000,n/a,20000,n/a', 'Single,Single,Married,Single', '', 'Living', '', '', '', '', '', 'Local', '', '', 0, '0000-00-00', '', '', '', '', '', 'Local', 'Maribeth Librea', 'Mother', 'Brgy. Calamias, Lipa City, Batangas', 4217, '', '09065789036', 'maribeth.librea@gmail.com', 'GMS', 'Abroad', '', 'Tanay, Rizal', 'IV-A', '2008', 'DJAPMNHS', 'Local', '', 'Ibaan, Batangas', 'IV-A', '2013', 'DLSL', 'Abroad', '', 'Lipa City, Batangas', 'IV-A', '2017', '', 'Abroad', '', '', '', '', 'No', '', 'No', '', 'No', '', 'No', '', '', '', '', '', ''),
(5, '2017-07-11', '1', '1', '1', '1', '1', '1', '0001-01-01', '1', '1', 'Male', 11, '1', 'Married', 1, '1', 'Deceased', '2', '2', '2', '2', '2', 'Deceased', '2', '2', '2', '2', '2', 'above 45,000', '2', '2', '2', '2', '2', '2', '3', 'Deceased', '3', '3', '3', '3', '3', 'Abroad', '3', '3', 3, '0003-03-03', '3', '3', '4', '4', '4', 'Abroad', '4', '4', '4', 4, '4', '4', '4', '7', 'Local', '7', '7', '7', '7', '7', 'Abroad', '7', '7', '7', '7', '9', 'Local', '7', '7', '7', '7', '9', 'Abroad', '7', '7', '7', '9', 'No', '', 'No', '', 'No', '', 'No', '', '', '', '', '', ''),
(6, '2017-07-11', '1', '1', '1', '1', 'jeremylibrea23@gmail.com', '1', '0001-01-01', '1', '1', 'Male', 11, '1', 'Married', 1, '1', 'Deceased', '2', '2', '2', '2', '2', 'Deceased', '2', '2', '2', '2', '2', 'above 45,000', '2', '2', '2', '2', '2', '2', '3', 'Deceased', '3', '3', '3', '3', '3', 'Abroad', '3', '3', 3, '0003-03-03', '3', '3', '4', '4', '4', 'Abroad', '4', '4', '4', 4, '4', '4', '4', '7', 'Local', '7', '7', '7', '7', '7', 'Abroad', '7', '7', '7', '7', '9', 'Local', '7', '7', '7', '7', '9', 'Abroad', '7', '7', '7', '9', 'No', '', 'No', '', 'No', '', 'No', '', '', '', '', '', ''),
(7, '2017-07-11', 'kj7', '7', '7', '7', '7@gmail.com', '7', '0007-07-01', '7', '7', 'Male', 7, 'O', 'Single', 7, '7', 'Living', 'awd', '', '', '', '', 'Living', 'aa', '', '', '', '', '20,000- 24,999', '', '', '', '', '', '', '', 'Living', '', '', '', '', '', 'Local', '', '', 0, '0000-00-00', '', '', '', '', '', 'Local', '1', '', '', 0, '', '', '', '1', 'Local', '1', '1', '1', '1', '1', 'Local', '1', '1', '1', '1', '', 'Local', '', '', '', '', '', 'Local', '', '', '', '', 'No', '', 'No', '', 'No', '', 'No', '', '', '', '', '', ''),
(8, '2017-07-11', '1', '1', '1', '1', '1@gmail.com', '1', '0001-01-01', '1', '1', 'Male', 1, '1', 'Married', 1, '1', 'Living', '7', '7', '7', '7', '7', 'Deceased', '7', '7', '7', '7', '7', '25,000- 29,999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', '7', '7', '7', 7, '7', '7', '7', '7', 'Local', '7', '7', '7', '7', '7', 'Abroad', '7', '7', '7', '7', '', '', '', '', '', '', '', '', '', '', '', '', 'No', '', 'No', '', 'No', '', 'No', '', '', '', '', '', ''),
(9, '2017-07-11', 'Van', 'Monastrial', 'Lumban', 'Lipa City', 'lumban.vjm@dlsl.edu.ph', 'Lipa City', '1997-04-11', '09266870932', '7564631', 'Male', 182, 'A', 'Single', 70, 'Roman Catholic', 'Living', 'Julio Lumban', 'Lipa City', 'none', '7564631', 'Colllege', 'Living', 'Violeta Lumban', 'Lipa City', 'none', '7564631', 'Colllege', '20,000- 24,999', 'John Lumban', '25', 'College', 'Puta', '1000', 'Single', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 'Vilma Monastrial', 'Aunt', 'Lipa City', 4217, '7562193', '09266870932', 'vilma@gmail.com', 'St. Joseph School', 'Abroad', '', 'Lipa City', '4-a', '2009', 'Canossa Academy', 'Abroad', '', 'Lipa City', '4-a', '2013', '', '', '', '', '', '', '', '', '', '', '', '', 'No', '', 'No', '', 'No', '', 'No', '', '', '', '', '', ''),
(10, '2017-07-11', '5', '5', '5', '5', '5@gmail.com', '5', '0005-05-05', '5', '5', 'Male', 5, '5', 'Married', 5, '5', 'Deceased', '5', '5', '5', '5', '5', 'Deceased', '5', '5', '5', '5', '5', '30,000- 34,999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '', '', '', '5', '5', '5', 5, '5', '5', '5', '45', 'Private', '5', '5', '5', '5', '5', 'Public', '5', '5', '5', '5', '5', 'Private', '5', '5', '5', '5', '5', 'Public', '5', '5', '5', '5', 'No', '', 'No', '', 'No', '', 'No', '', 'No', '', '1,2,3', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`fld_applicantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `fld_applicantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
