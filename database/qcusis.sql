-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 11:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcusis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `username`, `password`) VALUES
(1, 'admin1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(16) NOT NULL,
  `course_description` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course_description`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology'),
(2, 'BSEE', 'Bachelor of Science in Electronics Engineering'),
(3, 'BSIE', 'Bachelor of Science in Industrial Engineering'),
(4, 'BSE', 'Bachelor of Science in Entrepreneurship'),
(5, 'BSA', 'Bachelor of Science in Accountancy');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(12) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `sex` varchar(16) NOT NULL,
  `age` int(4) NOT NULL,
  `civil_status` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `department` varchar(60) NOT NULL,
  `employment_status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fullname`, `sex`, `age`, `civil_status`, `email`, `department`, `employment_status`) VALUES
(1, 'Juan Luna', 'Male', 32, 'Single', 'juan.luna@gmail.com', 'Department of Information Technology', 'Full-time'),
(3, 'Cristy Reyes', 'Female', 27, 'Single', 'reyes.cristy@gmail.com', 'Department of Information Technology', 'Full-time'),
(4, 'Somi Chua', 'Female', 34, 'Married', 'somi.chua@gmail.com', 'Department of Accountancy', 'Full-time'),
(5, 'Juan Dela Cruz', 'Male', 27, 'Single', 'juan.delacruz@gmail.com', 'Department of Information Technology', 'Full-time'),
(6, 'Niki Santos', 'Female', 25, 'Single', 'santos.niki@gmail.com', 'Department of Information Technology', 'Part-time'),
(7, 'Tobias Ferrer', 'Male', 30, 'Married', 'ferrer.t@gmail.com', 'Department of Information Technology', 'Full-time'),
(8, 'Luna Rivera', 'Female', 26, 'Single', 'lunarivera12@gmail.com', 'Department of Information Technology', 'Full-time');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `Room` varchar(11) NOT NULL,
  `Day` varchar(12) NOT NULL,
  `Time` varchar(16) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `section_id`, `course_id`, `subject_id`, `Room`, `Day`, `Time`, `faculty_id`, `student_id`) VALUES
(6, 6, 5, 1, 'IC307a', 'W', '8:00AM-9:30AM', 4, 0),
(9, 7, 1, 3, 'IB106a', 'M', '1:00PM-3:00PM', 1, NULL),
(10, 7, 1, 1, 'IC307a', 'F', '11:00AM-2:00PM', 4, NULL),
(11, 7, 1, 5, 'IC307a', 'F', '7:00AM-9:00AM', 3, NULL),
(12, 7, 1, 6, 'IC305a', 'S', '7:00AM-9:00AM', 5, NULL),
(13, 7, 1, 9, 'IB207b', 'TH', '1:00PM-3:00PM', 6, NULL),
(14, 7, 1, 8, 'IB104a', 'T', '7:00AM-9:00AM', 7, NULL),
(15, 7, 1, 7, 'IB104a', 'T', '11:00AM-2:00PM', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section` varchar(12) NOT NULL,
  `campus` varchar(32) NOT NULL,
  `course_id` varchar(12) NOT NULL,
  `year` varchar(12) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `school_year` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `campus`, `course_id`, `year`, `semester`, `school_year`) VALUES
(3, 'SBIT-3A', 'San Bartolome', 'BSIT', '3rd Year', '1st', '2021-2022'),
(5, 'SBIT-2D', 'San Bartolome', 'BSIT', '2nd Year', '1st', '2020-2021'),
(6, 'SBA-1A', 'San Bartolome', 'BSA', '1st Year', '1st', '2021-2022'),
(7, 'SBIT-3A', 'San Bartolome', 'BSIT', '3rd Year', '1st', '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_no` varchar(7) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `middlename` varchar(32) NOT NULL,
  `extname` varchar(16) NOT NULL,
  `sex` varchar(12) NOT NULL,
  `age` int(3) NOT NULL,
  `birthday` varchar(12) NOT NULL,
  `birthplace` varchar(32) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `height` varchar(16) NOT NULL,
  `weight` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `civil_status` varchar(16) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `password` varchar(12) NOT NULL,
  `add_unit_no` int(4) NOT NULL,
  `add_street` varchar(32) NOT NULL,
  `add_brgy` varchar(32) NOT NULL,
  `add_city` varchar(32) NOT NULL,
  `add_district` varchar(32) NOT NULL,
  `add_zip_code` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_no`, `lastname`, `firstname`, `middlename`, `extname`, `sex`, `age`, `birthday`, `birthplace`, `religion`, `height`, `weight`, `email`, `contact_no`, `civil_status`, `course_id`, `section_id`, `password`, `add_unit_no`, `add_street`, `add_brgy`, `add_city`, `add_district`, `add_zip_code`) VALUES
(8, '19-0000', 'Styles', 'Harry', 'Harold', 'N/A', 'Male', 21, '12/1/2000', 'Palawan', 'Catholic', '185cm', '57kg', 'harry.styles@gmail.com', '09123456789', 'Single', 1, 3, '12345', 23, 'Holy Spirit', 'Fairview', 'Quezon City', 'District 2', 1127);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subj_code` varchar(16) NOT NULL,
  `subj_description` varchar(60) NOT NULL,
  `unit` int(3) NOT NULL,
  `course_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subj_code`, `subj_description`, `unit`, `course_id`) VALUES
(1, 'MS101', 'Discrete Mathematics', 3, 'BSIT'),
(3, 'IPT101', 'Integrating Programming Technologies 1', 3, 'BSIT'),
(5, 'SPI101', 'Social Professional Issues 1', 3, 'BSIT'),
(6, 'SIA101', 'Systems Integration and Architecture 1', 3, 'BSIT'),
(7, 'RIZAL', 'The Life and Works of Rizal', 3, 'BSIT'),
(8, 'SOCSCI 3', 'The Contemporary World', 3, 'BSIT'),
(9, 'AR101', 'Architecture and Organization', 3, 'BSIT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `schedule_ibfk_6` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
