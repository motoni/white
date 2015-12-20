-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2015 at 05:42 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nolimitb_white`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alertID` int(11) UNSIGNED NOT NULL,
  `noticeID` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `usertype` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`alertID`, `noticeID`, `username`, `usertype`) VALUES
(1, 1, 'felix', 'Admin'),
(2, 1, 'tobio', 'Student'),
(3, 1, 'tobi', 'Parent'),
(4, 2, 'felix', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `classes_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `status`, `classes_id`, `student_id`, `date`) VALUES
(1, 2, 1, 1, '2015-12-16'),
(2, 1, 1, 2, '2015-12-16'),
(3, 2, 1, 3, '2015-12-16'),
(4, 1, 1, 4, '2015-12-16'),
(5, 2, 2, 1, '2015-12-17'),
(6, 1, 2, 2, '2015-12-17'),
(7, 2, 2, 3, '2015-12-17'),
(8, 2, 2, 4, '2015-12-17'),
(9, 1, 3, 1, '2015-12-18'),
(10, 2, 3, 2, '2015-12-18'),
(11, 2, 3, 3, '2015-12-18'),
(12, 2, 3, 4, '2015-12-18'),
(21, 1, 1, 3, '2015-12-19'),
(22, 1, 1, 2, '2015-12-19'),
(23, 1, 1, 1, '2015-12-19'),
(24, 1, 1, 10, '2015-12-19'),
(25, 1, 1, 3, '2015-12-20'),
(26, 2, 1, 2, '2015-12-20'),
(27, 1, 1, 1, '2015-12-20'),
(28, 2, 1, 10, '2015-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `automation_rec`
--

CREATE TABLE `automation_rec` (
  `automation_recID` int(11) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `nofmodule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `automation_shudulu`
--

CREATE TABLE `automation_shudulu` (
  `automation_shuduluID` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `automation_shudulu`
--

INSERT INTO `automation_shudulu` (`automation_shuduluID`, `date`, `day`, `month`, `year`) VALUES
(1, '2015-09-29', '29', '09', 2015),
(2, '2015-10-06', '06', '10', 2015),
(3, '2015-11-07', '07', '11', 2015),
(4, '2015-12-05', '05', '12', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) UNSIGNED NOT NULL,
  `book` varchar(60) NOT NULL,
  `subject_code` tinytext NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `due_quantity` int(11) NOT NULL,
  `rack` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) UNSIGNED NOT NULL,
  `hostelID` int(11) NOT NULL,
  `class_type` varchar(60) NOT NULL,
  `hbalance` varchar(20) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classesID` int(11) UNSIGNED NOT NULL,
  `classes` varchar(60) NOT NULL,
  `classes_numeric` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classesID`, `classes`, `classes_numeric`, `teacherID`, `note`) VALUES
(1, 'Primary 1', 1, 10, ''),
(2, 'Primary 2', 2, 2, ''),
(3, 'Primary 3', 3, 3, ''),
(4, 'Secondary 1', 4, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `eattendance`
--

CREATE TABLE `eattendance` (
  `eattendanceID` int(200) UNSIGNED NOT NULL,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `s_name` varchar(60) DEFAULT NULL,
  `eattendance` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `eextra` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `event` text NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `title`, `event`, `year`, `date`, `create_date`) VALUES
(2, 'School Christmas and end of year party', 'School Christmas and End of year party holds at the school auditorium', 2015, '2015-12-17', '2015-12-13 07:47:27'),
(3, 'School Vacation', 'School vacates for the year', 2015, '2015-12-18', '2015-12-13 07:46:23'),
(4, 'Merry Christmas!', 'Merry Christmas to Everyone!!!!!<br>', 2015, '2015-12-25', '2015-12-13 09:52:38'),
(5, 'New Year''s Eve', 'Happy count down to a wonderful new Year!', 2015, '2015-12-31', '2015-12-13 10:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examID` int(11) UNSIGNED NOT NULL,
  `termID` int(11) UNSIGNED NOT NULL,
  `exam` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examID`, `termID`, `exam`, `date`, `note`) VALUES
(1, 1, 'Continuous Assessment 1 First Term 2015', '2015-12-02', 'Continuous Assesment Test'),
(2, 1, 'Continuous Assessment 2 First Term 2015', '2015-12-02', 'Continuous Assessment Test'),
(3, 1, 'Main Exam FT', '2015-12-02', 'Final Exams'),
(4, 2, 'Continuous Assessment 1 Second Term 2015', '2016-02-18', 'Continuous Assessment Test'),
(5, 2, 'Continuous Assessment 2 Second Term 2015', '2016-03-16', 'Continuous Assessment Test'),
(6, 2, 'Main Exam ST', '2016-03-08', 'Final Exams'),
(7, 3, 'Continuous Assessment 1 Third Term 2015', '2016-05-16', 'Continuous Assessment Tests'),
(8, 3, 'Continuous Assessment 2 Third Term 2015', '2016-06-20', 'Continuous Assessment Tests'),
(9, 3, 'Main Exam TT', '2016-08-22', 'Final Exams');

-- --------------------------------------------------------

--
-- Table structure for table `examschedule`
--

CREATE TABLE `examschedule` (
  `examscheduleID` int(11) UNSIGNED NOT NULL,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `edate` date NOT NULL,
  `examfrom` varchar(10) NOT NULL,
  `examto` varchar(10) NOT NULL,
  `room` tinytext,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expenseID` int(11) UNSIGNED NOT NULL,
  `create_date` date NOT NULL,
  `date` date NOT NULL,
  `expense` varchar(128) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `expenseyear` year(4) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expenseID`, `create_date`, `date`, `expense`, `amount`, `userID`, `uname`, `usertype`, `expenseyear`, `note`) VALUES
(1, '2015-10-09', '2015-10-08', 'test', '2000', 1, 'Felix', 'Admin', 2015, 'to be deleted'),
(2, '2015-10-09', '2015-10-09', 'test2', '40000', 1, 'Felix', 'Admin', 2015, ''),
(3, '2015-10-09', '2015-09-22', 'felix', '30000', 1, 'Felix', 'Admin', 2015, '');

-- --------------------------------------------------------

--
-- Table structure for table `feetype`
--

CREATE TABLE `feetype` (
  `feetypeID` int(11) UNSIGNED NOT NULL,
  `feetype` varchar(60) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feetype`
--

INSERT INTO `feetype` (`feetypeID`, `feetype`, `note`) VALUES
(1, 'Tuition Fee Pre-Primary', 'Pre-Primary Section Nusery K1 and K2'),
(2, 'Tuition Fee Primary', 'Primary Section (I - V)'),
(3, 'Tuition Fee Secondary', 'Secondary School (VI - X)'),
(4, 'Registration Fee', 'At the time of admission'),
(5, 'Caution Fees', 'At the time of admission (One time refundable)'),
(6, 'School Bus', 'Optional Per Term'),
(7, 'Lunch', 'Optional Per Term'),
(8, 'Annual School Charges', 'Materials for class activities, Library fee, School Books, Lab fees and Uniforms, Extra-Curiculum Activities');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeID` int(11) UNSIGNED NOT NULL,
  `grade` varchar(60) NOT NULL,
  `point` varchar(11) NOT NULL,
  `gradefrom` int(11) NOT NULL,
  `gradeupto` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeID`, `grade`, `point`, `gradefrom`, `gradeupto`, `note`) VALUES
(1, 'A+', '5', 80, 100, 'A PLUS'),
(2, 'A', '4', 70, 79, 'A GRADE'),
(3, 'A-', '3.5', 60, 69, 'A MINUS'),
(4, 'B', '3', 50, 59, 'B GRADE'),
(5, 'C', '2', 40, 49, 'C GRADE'),
(6, 'D', '1', 33, 39, 'D GRADE'),
(7, 'F', '0', 0, 32, 'F GRADE');

-- --------------------------------------------------------

--
-- Table structure for table `hmember`
--

CREATE TABLE `hmember` (
  `hmemberID` int(11) UNSIGNED NOT NULL,
  `hostelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `hbalance` varchar(20) DEFAULT NULL,
  `hjoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostelID` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `htype` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ini_config`
--

CREATE TABLE `ini_config` (
  `configID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ini_config`
--

INSERT INTO `ini_config` (`configID`, `type`, `config_key`, `value`) VALUES
(1, 'paypal', 'paypal_api_username', ''),
(2, 'paypal', 'paypal_api_password', ''),
(3, 'paypal', 'paypal_api_signature', ''),
(4, 'paypal', 'paypal_email', ''),
(5, 'paypal', 'paypal_demo', ''),
(6, 'stripe', 'stripe_private_key', ''),
(7, 'stripe', 'stripe_public_key', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `termID` int(11) NOT NULL,
  `feetypeID` int(11) NOT NULL,
  `classes` varchar(128) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student` varchar(128) NOT NULL,
  `roll` varchar(128) NOT NULL,
  `feetype` varchar(128) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `paidamount` varchar(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `uname` varchar(60) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `paymenttype` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `paiddate` date DEFAULT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `classesID`, `termID`, `feetypeID`, `classes`, `studentID`, `student`, `roll`, `feetype`, `amount`, `paidamount`, `userID`, `usertype`, `uname`, `status`, `paymenttype`, `date`, `paiddate`, `year`) VALUES
(9, 1, 1, 2, 'Primary 1', 3, 'john Terry', '105', 'Tuition Fee Primary', '100000', NULL, NULL, NULL, NULL, 0, NULL, '2015-12-08', NULL, 2015),
(10, 1, 1, 2, 'Primary 1', 2, 'Diego Costa', '109', 'Tuition Fee Primary', '100000', NULL, NULL, NULL, NULL, 0, NULL, '2015-12-08', NULL, 2015),
(11, 1, 1, 2, 'Primary 1', 1, 'Eden Hazard', '110', 'Tuition Fee Primary', '100000', NULL, NULL, NULL, NULL, 0, NULL, '2015-12-08', NULL, 2015),
(12, 1, 1, 2, 'Primary 1', 10, 'tobi', '123', 'Tuition Fee Primary', '100000', '40000', 1, 'Admin', 'felix', 1, 'Cash', '2015-12-08', '2015-12-09', 2015),
(13, 2, 1, 2, 'Primary 2', 11, 'Kemi', '124', 'Tuition Fee Primary', '100000', '40000', 1, 'Admin', 'felix', 1, 'Cash', '2015-12-08', '2015-12-09', 2015),
(14, 2, 1, 2, 'Primary 2', 6, 'luke shaw', '203', 'Tuition Fee Primary', '100000', '100000', 1, 'Admin', 'felix', 2, 'Cheque', '2015-12-08', '2015-12-09', 2015),
(15, 2, 1, 2, 'Primary 2', 5, 'wayne rooney', '210', 'Tuition Fee Primary', '100000', '100000', 1, 'Admin', 'felix', 2, 'Cash', '2015-12-08', '2015-12-09', 2015),
(16, 2, 1, 2, 'Primary 2', 4, 'Juan Mata', '211', 'Tuition Fee Primary', '100000', '100000', 1, 'Admin', 'felix', 2, 'Cash', '2015-12-08', '2015-12-09', 2015),
(17, 3, 1, 2, 'Primary 3', 8, 'Mesut ozil', '311', 'Tuition Fee Primary', '100000', '100000', 1, 'Admin', 'felix', 2, 'Cash', '2015-12-08', '2015-12-12', 2015),
(18, 3, 1, 1, 'Primary 3', 7, 'Theo Walcott', '314', 'Tuition Fee Pre-Primary', '50000', '35000', 1, 'Admin', 'felix', 1, 'Cheque', '2015-12-08', '2015-12-09', 2015),
(19, 3, 1, 2, 'Primary 3', 9, 'Alexis Sanchez', '317', 'Tuition Fee Primary', '100000', '100000', 1, 'Admin', 'felix', 2, 'Cash', '2015-12-08', '2015-12-09', 2015),
(20, 4, 1, 3, 'Secondary 1', 12, 'Sola Martins', '301', 'Tuition Fee Secondary', '250000', '60000', 1, 'Admin', 'felix', 1, 'Cash', '2015-12-09', '2015-12-09', 2015),
(21, 1, 1, 4, 'Primary 1', 3, 'john Terry', '105', 'Registration Fee', '5000', NULL, NULL, NULL, NULL, 0, NULL, '2015-12-10', NULL, 2015),
(22, 1, 1, 5, 'Primary 1', 3, 'john Terry', '105', 'Caution Fees', '20000', NULL, NULL, NULL, NULL, 0, NULL, '2015-12-10', NULL, 2015),
(23, 1, 1, 4, 'Primary 1', 1, 'Eden Hazard', '110', 'Registration Fee', '5000', NULL, NULL, NULL, NULL, 0, NULL, '2015-12-10', NULL, 2015),
(24, 1, 1, 2, 'Primary 1', 10, 'tobi', '123', 'Tuition Fee Primary', '100000', '100000', 1, 'Admin', 'felix', 2, 'Cash', '2015-12-13', '2015-12-13', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issueID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(128) NOT NULL,
  `bookID` int(11) NOT NULL,
  `book` varchar(60) NOT NULL,
  `author` varchar(100) NOT NULL,
  `serial_no` varchar(40) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `fine` varchar(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lmember`
--

CREATE TABLE `lmember` (
  `lmemberID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(40) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `lbalance` varchar(20) DEFAULT NULL,
  `ljoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailandsms`
--

CREATE TABLE `mailandsms` (
  `mailandsmsID` int(11) UNSIGNED NOT NULL,
  `users` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailandsmstemplate`
--

CREATE TABLE `mailandsmstemplate` (
  `mailandsmstemplateID` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `user` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL,
  `template` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailandsmstemplatetag`
--

CREATE TABLE `mailandsmstemplatetag` (
  `mailandsmstemplatetagID` int(11) UNSIGNED NOT NULL,
  `usersID` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `tagname` varchar(128) NOT NULL,
  `mailandsmstemplatetag_extra` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mailandsmstemplatetag`
--

INSERT INTO `mailandsmstemplatetag` (`mailandsmstemplatetagID`, `usersID`, `name`, `tagname`, `mailandsmstemplatetag_extra`, `create_date`) VALUES
(1, 1, 'student', '[student_name]', NULL, '2015-06-30 17:44:10'),
(2, 1, 'student', '[student_class]', NULL, '2015-06-30 17:43:56'),
(3, 1, 'student', '[student_roll]', NULL, '2015-06-30 17:44:21'),
(4, 1, 'student', '[student_dob]', NULL, '2015-06-30 17:45:24'),
(5, 1, 'student', '[student_gender]', NULL, '2015-06-30 17:47:01'),
(6, 1, 'student', '[student_religion]', NULL, '2015-06-30 17:47:01'),
(7, 1, 'student', '[student_email]', NULL, '2015-06-30 17:47:40'),
(8, 1, 'student', '[student_phone]', NULL, '2015-06-30 17:47:40'),
(9, 1, 'student', '[student_section]', NULL, '2015-06-30 17:48:47'),
(10, 1, 'student', '[student_username]', NULL, '2015-06-30 17:48:47'),
(11, 2, 'parents', '[guardian_name]', NULL, '2015-07-06 09:09:16'),
(12, 2, 'parents', '[father''s_name]', NULL, '2015-07-06 09:11:42'),
(13, 2, 'parents', '[mother''s_name]', NULL, '2015-07-06 09:11:42'),
(14, 2, 'parents', '[father''s_profession]', NULL, '2015-07-06 09:14:32'),
(15, 2, 'parents', '[mother''s_profession]', NULL, '2015-07-06 09:14:32'),
(16, 2, 'parents', '[parents_email]', NULL, '2015-07-06 09:20:37'),
(17, 2, 'parents', '[parents_phone]', NULL, '2015-07-06 09:20:44'),
(18, 2, 'parents', '[parents_address]', NULL, '2015-07-06 09:20:53'),
(19, 2, 'parents', '[parents_username]', NULL, '2015-07-06 09:21:00'),
(20, 3, 'teacher', '[teacher_name]\r\n', NULL, '2015-07-06 09:41:13'),
(21, 3, 'teacher', '[teacher_designation]', NULL, '2015-07-06 09:41:13'),
(22, 3, 'teacher', '[teacher_dob]', NULL, '2015-07-06 09:41:13'),
(23, 3, 'teacher', '[teacher_gender]', NULL, '2015-07-06 09:41:13'),
(24, 3, 'teacher', '[teacher_religion]', NULL, '2015-07-06 09:41:13'),
(25, 3, 'teacher', '[teacher_email]', NULL, '2015-07-06 09:41:13'),
(26, 3, 'teacher', '[teacher_phone]\r\n', NULL, '2015-07-06 09:41:13'),
(27, 3, 'teacher', '[teacher_address]', NULL, '2015-07-06 09:41:13'),
(28, 3, 'teacher', '[teacher_jod]', NULL, '2015-07-06 11:25:07'),
(29, 3, 'teacher', '[teacher_username]', NULL, '2015-07-06 09:41:13'),
(30, 4, 'librarian', '[librarian_name]', NULL, '2015-07-06 10:05:44'),
(31, 4, 'librarian', '[librarian_dob]', NULL, '2015-07-06 10:05:48'),
(32, 4, 'librarian', '[librarian_gender]', NULL, '2015-07-06 10:05:52'),
(33, 4, 'librarian', '[librarian_religion]', NULL, '2015-07-06 10:05:55'),
(34, 4, 'librarian', '[librarian_email]', NULL, '2015-07-06 10:05:59'),
(35, 4, 'librarian', '[librarian_phone]', NULL, '2015-07-06 10:06:20'),
(36, 4, 'librarian', '[librarian_address]', NULL, '2015-07-06 10:06:27'),
(37, 4, 'librarian', '[librarian_jod]', NULL, '2015-07-06 11:25:17'),
(38, 4, 'librarian', '[librarian_username]', NULL, '2015-07-06 10:06:36'),
(39, 5, 'accountant', '[accountant_name]', NULL, '2015-07-06 10:06:59'),
(40, 5, 'accountant', '[accountant_dob]', NULL, '2015-07-06 10:07:02'),
(41, 5, 'accountant', '[accountant_gender]', NULL, '2015-07-06 10:07:04'),
(42, 5, 'accountant', '[accountant_religion]', NULL, '2015-07-06 10:07:07'),
(43, 5, 'accountant', '[accountant_email]', NULL, '2015-07-06 10:07:10'),
(44, 5, 'accountant', '[accountant_phone]', NULL, '2015-07-06 10:07:13'),
(45, 5, 'accountant', '[accountant_address]', NULL, '2015-07-06 10:07:15'),
(46, 5, 'accountant', '[accountant_jod]', NULL, '2015-07-06 11:25:24'),
(47, 5, 'accountant', '[accountant_username]', NULL, '2015-07-06 10:07:21'),
(48, 1, 'student', '[student_result_table]', NULL, '2015-09-08 03:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `markID` int(200) UNSIGNED NOT NULL,
  `examID` int(11) NOT NULL,
  `exam` varchar(60) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`markID`, `examID`, `exam`, `studentID`, `classesID`, `subjectID`, `subject`, `mark`, `year`) VALUES
(5, 1, 'Continuous Assessment 1 First Term 2015', 3, 1, 1, 'ENGLISH', 55, 2015),
(6, 1, 'Continuous Assessment 1 First Term 2015', 2, 1, 1, 'ENGLISH', 75, 2015),
(7, 1, 'Continuous Assessment 1 First Term 2015', 1, 1, 1, 'ENGLISH', 70, 2015),
(8, 1, 'Continuous Assessment 1 First Term 2015', 10, 1, 1, 'ENGLISH', 87, 2015),
(9, 1, 'Continuous Assessment 1 First Term 2015', 3, 1, 2, 'MATHS', 59, 2015),
(10, 1, 'Continuous Assessment 1 First Term 2015', 2, 1, 2, 'MATHS', 87, 2015),
(11, 1, 'Continuous Assessment 1 First Term 2015', 1, 1, 2, 'MATHS', 60, 2015),
(12, 1, 'Continuous Assessment 1 First Term 2015', 10, 1, 2, 'MATHS', 96, 2015),
(13, 1, 'Continuous Assessment 1 First Term 2015', 3, 1, 3, 'MUSIC', 63, 2015),
(14, 1, 'Continuous Assessment 1 First Term 2015', 2, 1, 3, 'MUSIC', 77, 2015),
(15, 1, 'Continuous Assessment 1 First Term 2015', 1, 1, 3, 'MUSIC', 82, 2015),
(16, 1, 'Continuous Assessment 1 First Term 2015', 10, 1, 3, 'MUSIC', 75, 2015),
(17, 1, 'Continuous Assessment 1 First Term 2015', 3, 1, 4, 'BIOLOGY', 80, 2015),
(18, 1, 'Continuous Assessment 1 First Term 2015', 2, 1, 4, 'BIOLOGY', 98, 2015),
(19, 1, 'Continuous Assessment 1 First Term 2015', 1, 1, 4, 'BIOLOGY', 78, 2015),
(20, 1, 'Continuous Assessment 1 First Term 2015', 10, 1, 4, 'BIOLOGY', 99, 2015),
(21, 2, 'Continuous Assessment 2 First Term 2015', 3, 1, 1, 'ENGLISH', 65, 2015),
(22, 2, 'Continuous Assessment 2 First Term 2015', 2, 1, 1, 'ENGLISH', 77, 2015),
(23, 2, 'Continuous Assessment 2 First Term 2015', 1, 1, 1, 'ENGLISH', 74, 2015),
(24, 2, 'Continuous Assessment 2 First Term 2015', 10, 1, 1, 'ENGLISH', 65, 2015),
(25, 2, 'Continuous Assessment 2 First Term 2015', 3, 1, 2, 'MATHS', 60, 2015),
(26, 2, 'Continuous Assessment 2 First Term 2015', 2, 1, 2, 'MATHS', 78, 2015),
(27, 2, 'Continuous Assessment 2 First Term 2015', 1, 1, 2, 'MATHS', 66, 2015),
(28, 2, 'Continuous Assessment 2 First Term 2015', 10, 1, 2, 'MATHS', 75, 2015),
(29, 2, 'Continuous Assessment 2 First Term 2015', 3, 1, 3, 'MUSIC', 77, 2015),
(30, 2, 'Continuous Assessment 2 First Term 2015', 2, 1, 3, 'MUSIC', 86, 2015),
(31, 2, 'Continuous Assessment 2 First Term 2015', 1, 1, 3, 'MUSIC', 74, 2015),
(32, 2, 'Continuous Assessment 2 First Term 2015', 10, 1, 3, 'MUSIC', 96, 2015),
(33, 2, 'Continuous Assessment 2 First Term 2015', 3, 1, 4, 'BIOLOGY', 73, 2015),
(34, 2, 'Continuous Assessment 2 First Term 2015', 2, 1, 4, 'BIOLOGY', 77, 2015),
(35, 2, 'Continuous Assessment 2 First Term 2015', 1, 1, 4, 'BIOLOGY', 79, 2015),
(36, 2, 'Continuous Assessment 2 First Term 2015', 10, 1, 4, 'BIOLOGY', 70, 2015),
(37, 3, 'Main Exam FT', 3, 1, 1, 'ENGLISH', 62, 2015),
(38, 3, 'Main Exam FT', 2, 1, 1, 'ENGLISH', 60, 2015),
(39, 3, 'Main Exam FT', 1, 1, 1, 'ENGLISH', 75, 2015),
(40, 3, 'Main Exam FT', 10, 1, 1, 'ENGLISH', 78, 2015),
(41, 3, 'Main Exam FT', 3, 1, 2, 'MATHS', 65, 2015),
(42, 3, 'Main Exam FT', 2, 1, 2, 'MATHS', 79, 2015),
(43, 3, 'Main Exam FT', 1, 1, 2, 'MATHS', 60, 2015),
(44, 3, 'Main Exam FT', 10, 1, 2, 'MATHS', 84, 2015),
(45, 3, 'Main Exam FT', 3, 1, 3, 'MUSIC', 53, 2015),
(46, 3, 'Main Exam FT', 2, 1, 3, 'MUSIC', 55, 2015),
(47, 3, 'Main Exam FT', 1, 1, 3, 'MUSIC', 60, 2015),
(48, 3, 'Main Exam FT', 10, 1, 3, 'MUSIC', 78, 2015),
(49, 3, 'Main Exam FT', 3, 1, 4, 'BIOLOGY', 49, 2015),
(50, 3, 'Main Exam FT', 2, 1, 4, 'BIOLOGY', 55, 2015),
(51, 3, 'Main Exam FT', 1, 1, 4, 'BIOLOGY', 54, 2015),
(52, 3, 'Main Exam FT', 10, 1, 4, 'BIOLOGY', 65, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `mcategoryID` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_name_display` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_category`
--

CREATE TABLE `media_category` (
  `mcategoryID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_share`
--

CREATE TABLE `media_share` (
  `shareID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `file_or_folder` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) UNSIGNED NOT NULL,
  `email` varchar(128) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `receiverType` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attach` text,
  `attach_file_name` text,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `useremail` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` tinyint(1) NOT NULL,
  `from_status` int(11) NOT NULL,
  `to_status` int(11) NOT NULL,
  `fav_status` tinyint(1) NOT NULL,
  `fav_status_sent` tinyint(1) NOT NULL,
  `reply_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(46);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `noticeID` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `notice` text NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeID`, `title`, `notice`, `year`, `date`, `create_date`) VALUES
(1, 'CALENDAR NOW DISPLAYS EVENTS.', 'Hurray!!! Calendar now displays Events, Add events to calendar by clicking the Event menu on the side menu bar<br>', 2015, '2015-10-03', '2015-12-13 09:49:26'),
(2, 'Christmas party dress code', 'Dress code for the Christmas Party is informal and colors are Red, White and Green<br>', 2015, '2015-12-21', '2015-12-13 09:33:46'),
(3, 'Closing and resumption dates', 'School vacates for Christmas holidays on Friday 18th Decmber 2015 and resumes on the 11th January 2016<br>', 2015, '2015-12-13', '2015-12-13 09:38:15'),
(4, 'Children pickup time after closing hours', 'Parents are reminded that pick up time for students are 1pm for Nusery, K1 and K2, and 4pm for Primary and Secondary<br>', 2015, '2015-12-13', '2015-12-13 09:40:45'),
(5, 'School Bus Services Closes', 'This is to inform parents that our school bus services closes from 17th December 2015.<br>', 2015, '2015-12-13', '2015-12-13 09:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parentID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `father_profession` varchar(40) NOT NULL,
  `mother_profession` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `photo` varchar(200) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parentID`, `name`, `father_name`, `mother_name`, `father_profession`, `mother_profession`, `email`, `phone`, `address`, `photo`, `username`, `password`, `usertype`) VALUES
(1, 'Hazard', 'Papa Hazard', 'Mama Hazard', 'Baller', 'Baller', 'hazard@hazard.com', '', '', 'defualt.png', 'hazard', 'bbe6e1b2bae9608d247124d552d9ab8c6227ac436aa55669bcc4388f6def50b91e63933c82a45be1066bc9560e6c9093c4efebdc39c371e8f4dffd350cfefde9', 'Parent'),
(2, 'Terry', 'papa Terry', 'mama terry', 'Baller', 'Baller', 'terry@terry.com', '234 8011111111', '', 'defualt.png', 'Terry', 'e15620d051ed6b1511b3fab4b658be5ee33802338eb166581e3a5146cad7ac3721a2e7f70b9767b8777a5c92722ab3ba7ac9c35e95ea2573cbf6da101b8a8371', 'Parent'),
(3, 'Costa', 'papa Costa', 'mama Costa', 'Baller', 'Baller', 'costa@costa.com', '', '', 'defualt.png', 'costa', '4c54f1f5558f7e9cc791ae71f710c3215feaf59ed367c88c26143059c8502d5ae0ab6a36654d8587e2f86c86c0ece25ad1f7d9b0f87fbb66e815c1b6ccba9b92', 'Parent'),
(4, 'Rooney', 'papa Rooney', 'mama rooney', 'Baller', 'Baller', 'rooney@rooney.com', '', '', 'defualt.png', 'rooney', 'a46ffbbc444ede439ff33d359661fefb5860a467cdb22aa0890eef5137ecdaae1782eddf88d1a08993f75dea0d6925cc17af697b3362ffdebcf9ca02cac1ccca', 'Parent'),
(5, 'Mata', 'papa mata', 'mama mata', 'Baller', 'Baller', 'mata@mata.com', '', '', 'defualt.png', 'mata', 'e6c9df5d6ed7302185e82689e458672f9668a94c69babfdde98c3b0e48206c6031a01a01c5e4232000c312c4dfd0751a9b02d7defd974cffc862726ff5ea6179', 'Parent'),
(6, 'Shaw', 'papa shaw', 'mama shaw', 'Baller', 'Baller', 'shaw@shaw.com', '', '', 'defualt.png', 'shaw', 'd8fcad78a581a1c3b0b1eff6166a9c364e6184552c2a8bac09c871633476e5a23103317f2c7cf40e80b8079ba4e2ead1c9f16c13c4c54a8b057bcca4450d1c97', 'Parent'),
(7, 'Walcott', 'papa walcott', 'mama walcott', 'Baller', 'Baller', 'walcott@walcott.com', '', '', 'defualt.png', 'walcott', 'f7426ae593d402a57c9f3725208237db5ad6859e09a27c01e16274d9b09fe1eb0841f035ce4db6a125c2b1f411b16c1092da8b1955cab24cd936bf504263b7f5', 'Parent'),
(8, 'ozil', 'papa ozil', 'mama ozil', 'Baller', 'Baller', 'ozil@ozil.com', '', '', 'defualt.png', 'ozil', '1ee516f6877e3fa5ebcbccd86b7a754a027d8e8846f9e83f569ca06e64a04ff91ef97bc040c74e8196c73175e8fac5528083ff89462cf1d665c2514415cce160', 'Parent'),
(9, 'Sanchez', 'papa sanchez', 'mama sanchez', 'Baller', 'Baller', 'sanchez@sanchez.com', '', '', 'defualt.png', 'sanchez', '4418dd010f11ebc40a7b7b7a1168376a46d19200dc7cf23407f5d76c03a897f0df4d953ba4b3565678e99d88ab2ad74ca43948eca85197fce46334fada11f507', 'Parent'),
(10, 'Mr. Ona', 'Mr. Ona', 'Mrs Ona', 'Doctor', 'Nurse', 'tobi@ona.com', '08093699678', '22 Alhaji Muili Street', 'defualt.png', 'tobi', '1a3025321b702f31a5b78cff1566e6e406485dff6e77cea8813060ce05002ec30c8f010be5bc8c93d5578d53394ce65725705ad287c11700847cc9f6c3f288a6', 'Parent'),
(11, 'Maggy', 'Paul', 'Sarah', 'Engineer', 'Nurse', 'paul@yahoo.com', '08097651290', 'West coast', 'defualt.png', 'paul', '31110cc74c07327b42806263493ef6be4e0f8955025330ff9e51e6261d0f7548fe9c72e03f9b1f70649c244b203dc9d5f074ec42a28cadcecec185eff50d4814', 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `paymentamount` varchar(20) NOT NULL,
  `paymenttype` varchar(128) NOT NULL,
  `paymentdate` date NOT NULL,
  `paymentmonth` varchar(10) NOT NULL,
  `paymentyear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `invoiceID`, `studentID`, `paymentamount`, `paymenttype`, `paymentdate`, `paymentmonth`, `paymentyear`) VALUES
(1, 3, 1, '200000', 'Cheque', '2015-09-29', 'Sep', 2015),
(2, 4, 6, '230000', 'Cash', '2015-09-29', 'Sep', 2015),
(3, 1, 3, '180000', 'Cheque', '2015-09-29', 'Sep', 2015),
(4, 6, 4, '220000', 'Cash', '2015-10-09', 'Oct', 2015),
(5, 8, 3, '1000', 'Cash', '2015-12-08', 'Dec', 2015),
(6, 4, 6, '20000', 'Cash', '2015-12-08', 'Dec', 2015),
(7, 19, 9, '50000', 'Cash', '2015-12-09', 'Dec', 2015),
(8, 18, 7, '35000', 'Cheque', '2015-12-09', 'Dec', 2015),
(9, 16, 4, '50000', 'Cash', '2015-12-09', 'Dec', 2015),
(10, 15, 5, '50000', 'Cash', '2015-12-09', 'Dec', 2015),
(11, 14, 6, '50000', 'Cheque', '2015-12-09', 'Dec', 2015),
(12, 13, 11, '40000', 'Cash', '2015-12-09', 'Dec', 2015),
(13, 12, 10, '40000', 'Cash', '2015-12-09', 'Dec', 2015),
(14, 20, 12, '60000', 'Cash', '2015-12-09', 'Dec', 2015),
(15, 17, 8, '50000', 'Cash', '2015-12-12', 'Dec', 2015),
(16, 24, 10, '100000', 'Cash', '2015-12-13', 'Dec', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `promotionsubject`
--

CREATE TABLE `promotionsubject` (
  `promotionSubjectID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subjectCode` tinytext NOT NULL,
  `subjectMark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotionsubject`
--

INSERT INTO `promotionsubject` (`promotionSubjectID`, `classesID`, `subjectID`, `subjectCode`, `subjectMark`) VALUES
(1, 1, 1, '023', 25);

-- --------------------------------------------------------

--
-- Table structure for table `reply_msg`
--

CREATE TABLE `reply_msg` (
  `replyID` int(11) UNSIGNED NOT NULL,
  `messageID` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `resetID` int(11) UNSIGNED NOT NULL,
  `keyID` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `routineID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `day` varchar(60) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `room` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sattendance`
--

CREATE TABLE `sattendance` (
  `attendanceID` int(200) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sattendance`
--

INSERT INTO `sattendance` (`attendanceID`, `studentID`, `classesID`, `userID`, `usertype`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`) VALUES
(1, 3, 1, 1, 'Admin', '09-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL),
(2, 2, 1, 1, 'Admin', '09-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, 1, 'Admin', '09-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL),
(4, 3, 1, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, 'P', NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, 'P', NULL),
(5, 2, 1, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, 'P', 'P', NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, 'P', NULL),
(6, 1, 1, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, 'P', 'P', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL),
(7, 10, 1, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11, 2, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL),
(9, 6, 2, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL),
(10, 5, 2, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, 2, 1, 'Admin', '11-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, 1, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, 'P', NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2, 1, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 1, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 10, 1, 1, 'Admin', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 11, 2, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 6, 2, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 5, 2, 1, 'Admin', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 4, 2, 1, 'Admin', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 8, 3, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 7, 3, 1, 'Admin', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 9, 3, 1, 'Admin', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_sessions`
--

CREATE TABLE `school_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_sessions`
--

INSERT INTO `school_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0c2ed216f268ed1f0e9a079959d2c145', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450586268, 'a:8:{s:9:"user_data";s:0:"";s:4:"name";s:5:"felix";s:5:"email";s:22:"felixmails22@gmail.com";s:8:"usertype";s:5:"Admin";s:8:"username";s:5:"felix";s:5:"photo";s:8:"site.png";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;}'),
('3f4698923e02d8a07cd58e1f063fecc0', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450586439, ''),
('783243f19da47eaccd662d121b0b265e', '0.0.0.0', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1561580923, 'a:8:{s:9:"user_data";s:0:"";s:4:"name";s:5:"Dipok";s:5:"email";s:16:"info@inilabs.net";s:8:"usertype";s:5:"Admin";s:8:"username";s:5:"admin";s:5:"photo";s:8:"site.png";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;}'),
('e2b859503e08846447e2a47247ed98d3', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450586175, 'a:8:{s:9:"user_data";s:0:"";s:4:"name";s:5:"felix";s:5:"email";s:22:"felixmails22@gmail.com";s:8:"usertype";s:5:"Admin";s:8:"username";s:5:"felix";s:5:"photo";s:8:"site.png";s:4:"lang";s:7:"english";s:8:"loggedin";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(11) UNSIGNED NOT NULL,
  `section` varchar(60) NOT NULL,
  `category` varchar(128) NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text,
  `extra` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `section`, `category`, `classesID`, `teacherID`, `note`, `extra`) VALUES
(1, 'a', 'science', 1, 1, '', NULL),
(2, 'b', 'art', 1, 1, '', NULL),
(3, 'a', 'science', 2, 3, '', NULL),
(4, 'b', 'art', 2, 3, '', NULL),
(5, 'a', 'science', 3, 2, '', NULL),
(6, 'b', 'art', 3, 2, '', NULL),
(7, '1', 'Secondary School', 4, 2, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `settingID` int(11) UNSIGNED NOT NULL,
  `sname` text,
  `name` varchar(60) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `email` varchar(40) DEFAULT NULL,
  `automation` int(11) DEFAULT NULL,
  `currency_code` varchar(11) DEFAULT NULL,
  `currency_symbol` text,
  `footer` text,
  `photo` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(128) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingID`, `sname`, `name`, `phone`, `address`, `email`, `automation`, `currency_code`, `currency_symbol`, `footer`, `photo`, `username`, `password`, `usertype`, `purchase_code`) VALUES
(1, 'white', 'felix', '2348057096624', '', 'felixmails22@gmail.com', 5, '', '', NULL, 'site.png', 'felix', '01476b6d1ca524481a4ac00f4c414fe02c5cb6b74a9c194b8c370957edcec11923772d6e2621d8ff84aab990ccb0fdaeec68c1ff944bcfefb9a9390c5509b40b', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `smssettings`
--

CREATE TABLE `smssettings` (
  `smssettingsID` int(11) UNSIGNED NOT NULL,
  `types` varchar(255) DEFAULT NULL,
  `field_names` varchar(255) DEFAULT NULL,
  `field_values` varchar(255) DEFAULT NULL,
  `smssettings_extra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smssettings`
--

INSERT INTO `smssettings` (`smssettingsID`, `types`, `field_names`, `field_values`, `smssettings_extra`) VALUES
(1, 'clickatell', 'clickatell_username', '', NULL),
(2, 'clickatell', 'clickatell_password', '', NULL),
(3, 'clickatell', 'clickatell_api_key', '', NULL),
(4, 'twilio', 'twilio_accountSID', '', NULL),
(5, 'twilio', 'twilio_authtoken', '', NULL),
(6, 'twilio', 'twilio_fromnumber', '', NULL),
(7, 'bulk', 'bulk_username', '', NULL),
(8, 'bulk', 'bulk_password', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `section` varchar(60) NOT NULL,
  `roll` tinytext NOT NULL,
  `library` int(11) NOT NULL,
  `hostel` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `totalamount` varchar(128) DEFAULT NULL,
  `paidamount` varchar(128) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `parentID` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `classesID`, `sectionID`, `section`, `roll`, `library`, `hostel`, `transport`, `create_date`, `totalamount`, `paidamount`, `photo`, `parentID`, `year`, `username`, `password`, `usertype`) VALUES
(1, 'Eden Hazard', '2000-03-09', 'Male', '', 'eden@hazard.com', '', '', 1, 1, 'a', '110', 0, 0, 0, '2015-09-29', '252000', '200000', 'defualt.png', 1, 2015, 'edenhazard', '70aa5b0e3be39d688a77dec43fee8a7ff51a9ccc57f3766981fb89302a2cb9a80c1939868a80999588d5a1be6a451b2001b84f46e503b6df8e56eb09d72b7407', 'Student'),
(2, 'Diego Costa', '2000-02-01', 'Male', '', 'diego@costa.com', '', '', 1, 2, 'b', '109', 0, 0, 0, '2015-09-29', '250000', '0', 'defualt.png', 3, 2015, 'diegocosta', '34f9427e8a71f6b4ee391af09669b8e136548b4ae505b3052b90463317a9ec74c84887f88b3e077525ccfef9947e51b1cb245e2c3dff53400debbf83e1d7098c', 'Student'),
(3, 'john Terry', '2004-06-08', 'Male', '', 'john@terry.com', '', '', 1, 1, 'a', '105', 0, 0, 0, '2015-09-29', '385000', '181000', 'defualt.png', 11, 2015, 'johnterry', '2f43f95ee360750fa5d19fa8fc85484166c13c7f1fd5633d999dc26a65485e0bafdab59a68bd775b28678f0992a2dd936e20b084cf618a820aec569c0e00f0a2', 'Student'),
(4, 'Juan Mata', '2012-03-30', 'Male', '', 'juan@mata.com', '', '', 2, 3, 'a', '211', 0, 0, 0, '2015-09-29', '350000', '270000', 'defualt.png', 5, 2015, 'juanmata', '9c20399c90d143817968400d1297662ebbd0cb0a2be1988452ed66080e7fa01e5e99e1b66ee8cf60c8f21b61d058b376e731e54f8a9e737ad6a9b1af221d9ae2', 'Student'),
(5, 'wayne rooney', '1999-01-12', 'Male', '', 'wayne@rooney.com', '', '', 2, 4, 'b', '210', 0, 0, 0, '2015-09-29', '350000', '50000', 'defualt.png', 4, 2015, 'waynerooney', '43300be3d1582f466bcbab1e83969958ca93ead1d78a4896a9b2ab88ed47bd301e922a27063af06aadeb86709e9f609e361649721d74f9d600378f49c5942560', 'Student'),
(6, 'luke shaw', '2004-06-08', 'Male', '', 'luke@shaw.com', '', '', 2, 3, 'a', '203', 0, 0, 0, '2015-09-29', '350000', '300000', 'defualt.png', 6, 2015, 'lukeshaw', 'efeb9a617ead7d15f317096403e4c4b3fe6e5b29aedfc7fb6cda7469fef5f8e61152ae9157621afec055696561ad790ab89343b6c3f4b4dc6e98eae0d4365a87', 'Student'),
(7, 'Theo Walcott', '2004-06-08', 'Male', '', 'theo@walcott.com', '', '', 3, 5, 'a', '314', 0, 0, 0, '2015-09-29', '100000', '35000', 'defualt.png', 7, 2015, 'theowalcott', 'b39ec3bdae2f98d7ebcd6f70a1c381324d14eca792deaf5686626b74148ad4de6bd683eac1bd85126ac24b3662d5b1652a633aa0afb4a7d510691ec47ebe6581', 'Student'),
(8, 'Mesut ozil', '1995-07-05', 'Male', '', 'mesut@ozil.com', '', '', 3, 5, 'a', '311', 0, 0, 0, '2015-09-29', '50000', '50000', 'defualt.png', 8, 2015, 'mesutozil', 'c8ab2718e08ca2f04e507e18ba1b1990a69682bd5cf929538ac09d799c546ebdb5a0c6b20badb297c7625fde71b903d8c94d59f3c76b81e8ecee565140b730d4', 'Student'),
(9, 'Alexis Sanchez', '2000-02-01', 'Male', '', 'alexis@sanzhez.com', '', '', 3, 6, 'b', '317', 0, 0, 0, '2015-09-29', '50000', '50000', 'defualt.png', 9, 2015, 'alexissanchez', '9d35e5fdcd9e22ca559b9a135476291a295c07e2a43a8adae294583b7694892e889bbb3fac8555afde0868db1c1fe5bfdce4126d0304b9ef92ba9cab33309578', 'Student'),
(10, 'tobi', '2009-02-09', 'Male', 'Christian', 'tobio@ona.com', '08093699678', '22 Alhaji Muili Street', 1, 1, 'a', '123', 0, 0, 0, '2015-11-13', '330000', '140000', 'defualt.png', 10, 2015, 'tobio', '1a3025321b702f31a5b78cff1566e6e406485dff6e77cea8813060ce05002ec30c8f010be5bc8c93d5578d53394ce65725705ad287c11700847cc9f6c3f288a6', 'Student'),
(11, 'Kemi', '2010-02-02', 'Male', 'Christian', 'kemi@ona.com', '08023226728', '22 Alhaji Muili Street', 2, 3, 'a', '124', 0, 0, 0, '2015-11-13', '50000', '40000', 'defualt.png', 10, 2015, 'kemi', '1a3025321b702f31a5b78cff1566e6e406485dff6e77cea8813060ce05002ec30c8f010be5bc8c93d5578d53394ce65725705ad287c11700847cc9f6c3f288a6', 'Student'),
(12, 'Sola Martins', '2002-04-05', 'Male', '', 'sola@example.com', '', '', 4, 7, '1', '301', 0, 0, 0, '2015-12-09', '70000', '60000', 'defualt.png', 2, 2015, 'sola', '7a8f12d80e1a6b1a8b6cc3fd4cae04e0ae3a0ffeac5e41cd5e1f6979d5b3ea6590d9e9548283c844276f9ac2d164a2c24dc2fb73972c18d2e06048e555e70c2d', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `subject_author` varchar(100) DEFAULT NULL,
  `subject_code` tinytext NOT NULL,
  `teacher_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `classesID`, `teacherID`, `subject`, `subject_author`, `subject_code`, `teacher_name`) VALUES
(1, 1, 10, 'ENGLISH', 'DUNNO', '023', 'Bukola Saraki'),
(2, 1, 2, 'MATHS', 'DUNNO', '024', 'Bola Tinubu'),
(3, 1, 3, 'MUSIC', 'DUNNO', '025', 'Emeka Ofor'),
(4, 1, 4, 'BIOLOGY', 'DUNNO', '026', 'Popoola');

-- --------------------------------------------------------

--
-- Table structure for table `tattendance`
--

CREATE TABLE `tattendance` (
  `tattendanceID` int(200) UNSIGNED NOT NULL,
  `teacherID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tattendance`
--

INSERT INTO `tattendance` (`tattendanceID`, `teacherID`, `usertype`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`) VALUES
(1, 1, 'Teacher', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Teacher', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Teacher', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'Teacher', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'Teacher', '12-2015', NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'Teacher', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 'Teacher', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'Teacher', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, 'Teacher', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, 'Teacher', '12-2015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `name`, `designation`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `jod`, `photo`, `username`, `password`, `usertype`) VALUES
(2, 'Bola Tinubu', 'Class teacher', '1960-02-02', 'Male', '', 'bola@tinubu.com', '234 8011111111', 'Lagos', '2015-01-01', 'defualt.png', 'jagaban', '90f27ad661ca04a413c983140c7cef80b78243894443f9ec90ff6272b11f5201e29dccdaec0d0bf254601206f66d88c11087d7dd1af78f9c2093abbe35a35eca', 'Teacher'),
(3, 'Emeka Ofor', 'Class teacher', '1970-07-09', 'Male', '', 'emeka@ofor.com', '234 8011111111', 'Abuja', '2015-02-01', 'defualt.png', 'emeka', '2b81f230cd8e1623bdb3613e4ec74a0b528ed8e98c50c5cec97aa6e8b96384eb0bd2ff2fbed51d8b270f03d097cde346044bd13c1f0f3c994f57b8f5fea5e9f6', 'Teacher'),
(4, '\r\n\r\nPopoola\r\n\r\n', '\r\nMr.\r\n\r\n', '1980-10-01', '\r\nFemale\r\n', '\r\nChristianity\r\n\r\n', '\r\npopoola@yahoo.com\r\n\r\n', '\r\n8029059277\r\n\r\n', '\r\n21, Alh. Mail Street\r\n\r\n', '2015-10-01', '\r\npops.jpg\r\n\r\n', '\r\npos\r\n\r\n', '123456', 'Teacher'),
(5, 'Tolu Sola', 'Mrs', '1998-07-01', 'Female', 'Islamic', 'tolu@yahoo.com', '8029059277', 'Oregun rd', '2015-10-01', '', 'tolusola', '123456', 'Teacher'),
(6, 'Ade Bantu', 'Mr', '1970-08-01', 'Male', 'Christianity', 'ade@yahoo.com', '8032075070', 'Ikosi rd', '2015-10-02', 'ade.jpg', 'tolusola', '123456', 'Teacher'),
(7, 'Tolu Sola', 'Mrs', '1998-07-01', 'Female', 'Islamic', 'tolu@yahoo.com', '8029059277', 'Oregun rd', '2015-10-01', '', 'tolusola', '123456', 'Teacher'),
(8, 'Ade Bantu', 'Mr', '1970-08-01', 'Male', 'Christianity', 'ade@yahoo.com', '8032075070', 'Ikosi rd', '2015-10-02', 'ade.jpg', 'tolusola', '123456', 'Teacher'),
(9, 'Babajide Ibiayo', 'ICT Teacher', '1979-03-16', 'Male', '', 'babajideibiayo@yahoo.com', '+2348057096624', '', '2015-11-26', 'defualt.png', 'babajide', 'ff11daa8de8c46784b24e89553b14906a4201dbdabde9b04624cc0c72f70bf394891d10da94cd12177d90880c03e7bf986927431c76719f14059f8ef4ea3c08c', 'Teacher'),
(10, 'Bukola Saraki', 'Teacher', '2000-02-08', 'Male', '', 'bukola@saraki.com', '0809765321', '', '2015-12-03', 'defualt.png', 'bukola', 'd81726e37c4256f30ac60e53d0836f9bbd1e14808c43741fe4f6cc9ac9e172eb1552bbd0c8767de28cc242e5c017796290af3daae6d0a2abceb51ee817209d5d', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `termID` int(11) UNSIGNED NOT NULL,
  `term` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`termID`, `term`, `date`, `note`) VALUES
(1, '1st Term', '2015-11-02', ''),
(2, '2nd Term', '2015-11-02', ''),
(3, '3rd Term', '2015-11-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmember`
--

CREATE TABLE `tmember` (
  `tmemberID` int(11) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `transportID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `tbalance` varchar(11) DEFAULT NULL,
  `tjoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transportID` int(11) UNSIGNED NOT NULL,
  `route` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `fare` varchar(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `jod`, `photo`, `username`, `password`, `usertype`) VALUES
(1, 'Sanusi Lamido', '1994-06-07', 'Male', '', 'sanusi@lamido.com', '', '', '2015-04-27', 'defualt.png', 'sanusi', 'eb975c009dcd0410453aa9f50ad1e80be387235aada7466fc38e80834d649621c97d2db3e77a22b1ec1a1c7faf51558a7d759f73377b50c7e374ff31dac6b1d8', 'Accountant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alertID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `automation_rec`
--
ALTER TABLE `automation_rec`
  ADD PRIMARY KEY (`automation_recID`);

--
-- Indexes for table `automation_shudulu`
--
ALTER TABLE `automation_shudulu`
  ADD PRIMARY KEY (`automation_shuduluID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classesID`);

--
-- Indexes for table `eattendance`
--
ALTER TABLE `eattendance`
  ADD PRIMARY KEY (`eattendanceID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `examschedule`
--
ALTER TABLE `examschedule`
  ADD PRIMARY KEY (`examscheduleID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expenseID`);

--
-- Indexes for table `feetype`
--
ALTER TABLE `feetype`
  ADD PRIMARY KEY (`feetypeID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `hmember`
--
ALTER TABLE `hmember`
  ADD PRIMARY KEY (`hmemberID`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostelID`);

--
-- Indexes for table `ini_config`
--
ALTER TABLE `ini_config`
  ADD PRIMARY KEY (`configID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issueID`);

--
-- Indexes for table `lmember`
--
ALTER TABLE `lmember`
  ADD PRIMARY KEY (`lmemberID`);

--
-- Indexes for table `mailandsms`
--
ALTER TABLE `mailandsms`
  ADD PRIMARY KEY (`mailandsmsID`);

--
-- Indexes for table `mailandsmstemplate`
--
ALTER TABLE `mailandsmstemplate`
  ADD PRIMARY KEY (`mailandsmstemplateID`);

--
-- Indexes for table `mailandsmstemplatetag`
--
ALTER TABLE `mailandsmstemplatetag`
  ADD PRIMARY KEY (`mailandsmstemplatetagID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`markID`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indexes for table `media_category`
--
ALTER TABLE `media_category`
  ADD PRIMARY KEY (`mcategoryID`);

--
-- Indexes for table `media_share`
--
ALTER TABLE `media_share`
  ADD PRIMARY KEY (`shareID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parentID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `promotionsubject`
--
ALTER TABLE `promotionsubject`
  ADD PRIMARY KEY (`promotionSubjectID`);

--
-- Indexes for table `reply_msg`
--
ALTER TABLE `reply_msg`
  ADD PRIMARY KEY (`replyID`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`routineID`);

--
-- Indexes for table `school_sessions`
--
ALTER TABLE `school_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `smssettings`
--
ALTER TABLE `smssettings`
  ADD PRIMARY KEY (`smssettingsID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `tattendance`
--
ALTER TABLE `tattendance`
  ADD PRIMARY KEY (`tattendanceID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`termID`);

--
-- Indexes for table `tmember`
--
ALTER TABLE `tmember`
  ADD PRIMARY KEY (`tmemberID`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transportID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alertID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `automation_rec`
--
ALTER TABLE `automation_rec`
  MODIFY `automation_recID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `automation_shudulu`
--
ALTER TABLE `automation_shudulu`
  MODIFY `automation_shuduluID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classesID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `eattendance`
--
ALTER TABLE `eattendance`
  MODIFY `eattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `examschedule`
--
ALTER TABLE `examschedule`
  MODIFY `examscheduleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expenseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `feetype`
--
ALTER TABLE `feetype`
  MODIFY `feetypeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hmember`
--
ALTER TABLE `hmember`
  MODIFY `hmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostelID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ini_config`
--
ALTER TABLE `ini_config`
  MODIFY `configID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issueID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lmember`
--
ALTER TABLE `lmember`
  MODIFY `lmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailandsms`
--
ALTER TABLE `mailandsms`
  MODIFY `mailandsmsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailandsmstemplate`
--
ALTER TABLE `mailandsmstemplate`
  MODIFY `mailandsmstemplateID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mailandsmstemplatetag`
--
ALTER TABLE `mailandsmstemplatetag`
  MODIFY `mailandsmstemplatetagID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `markID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_category`
--
ALTER TABLE `media_category`
  MODIFY `mcategoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_share`
--
ALTER TABLE `media_share`
  MODIFY `shareID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `promotionsubject`
--
ALTER TABLE `promotionsubject`
  MODIFY `promotionSubjectID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reply_msg`
--
ALTER TABLE `reply_msg`
  MODIFY `replyID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `resetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `routineID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `settingID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smssettings`
--
ALTER TABLE `smssettings`
  MODIFY `smssettingsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tattendance`
--
ALTER TABLE `tattendance`
  MODIFY `tattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `termID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tmember`
--
ALTER TABLE `tmember`
  MODIFY `tmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transportID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
