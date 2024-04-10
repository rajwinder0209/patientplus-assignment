-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 06:36 PM
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
-- Database: `patientplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `AppointmentDate` date NOT NULL,
  `AppointmentTime` time NOT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `FirstName`, `LastName`, `Specialization`, `Phone`, `Email`) VALUES
(1, 'Mary', 'shaywan', 'dentist', '07439034', 'shaywan@gmail.com'),
(2, 'Elon', 'musk', 'pediatrician', '09836728982', 'elonmusk@gmail.com'),
(3, 'Seth', 'mayers', 'surgeon', '03782328792', 'sethmayers@gmail.com'),
(4, 'wayne', 'kelvin', 'surgeon', '0447932470', 'wayne@gmail.com'),
(5, 'cyprian', 'mbugua', 'Dermatologist', '09448793839', 'cyprian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecords`
--

CREATE TABLE `medicalrecords` (
  `RecordID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Diagnosis` text DEFAULT NULL,
  `Treatment` text DEFAULT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `PatientName` varchar(255) DEFAULT NULL,
  `DoctorsName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalrecords`
--

INSERT INTO `medicalrecords` (`RecordID`, `PatientID`, `Date`, `Diagnosis`, `Treatment`, `DoctorID`, `Notes`, `PatientName`, `DoctorsName`) VALUES
(1, 1, '2024-04-02', 'malaria', 'malarial tablets', 1, 'patient was in critacal condition', NULL, NULL),
(2, 1, '2024-04-02', 'malaria', 'malarial tablets', 1, 'patient was in critacal condition', NULL, NULL),
(3, 3, '0000-00-00', 'Hiv and aids', 'ARVs', 2, 'have an appointment every month with present doc', NULL, NULL),
(5, 9, '2024-04-06', 'skin Disease', 'quinine\r\ncerave products', 5, 'apply the medicene after washing the skin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `FirstName`, `LastName`, `DateOfBirth`, `Gender`, `Address`, `Phone`, `Email`) VALUES
(1, 'johnte', 'doee', '2013-06-28', 'M', '500 ngong', '03874829092', 'john@gmail.com'),
(3, 'daywane', 'johnson', '2024-04-09', 'F', '298 cicago', '20988939', 'daywane@gmai.com'),
(7, 'trizah', 'shan', '2014-01-22', 'F', 'california street26', '894387202', 'trizah@gmail.com'),
(8, 'Tyla', 'Spice', '1996-06-19', 'F', 'california 49', '302738647848', 'spice@gmail.com'),
(9, 'Brian', 'Toredo', '2024-04-10', 'M', 'newyork street 213', '+0189289538', 'toredo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patienttreatments`
--

CREATE TABLE `patienttreatments` (
  `PatientTreatmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `TreatmentID` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `DoctorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `TreatmentID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `DoctorID` (`DoctorID`),
  ADD KEY `medicalrecords_ibfk_1` (`PatientID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `patienttreatments`
--
ALTER TABLE `patienttreatments`
  ADD PRIMARY KEY (`PatientTreatmentID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `TreatmentID` (`TreatmentID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`TreatmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patienttreatments`
--
ALTER TABLE `patienttreatments`
  MODIFY `PatientTreatmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `TreatmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`);

--
-- Constraints for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD CONSTRAINT `medicalrecords_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicalrecords_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`);

--
-- Constraints for table `patienttreatments`
--
ALTER TABLE `patienttreatments`
  ADD CONSTRAINT `patienttreatments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`),
  ADD CONSTRAINT `patienttreatments_ibfk_2` FOREIGN KEY (`TreatmentID`) REFERENCES `treatments` (`TreatmentID`),
  ADD CONSTRAINT `patienttreatments_ibfk_3` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
