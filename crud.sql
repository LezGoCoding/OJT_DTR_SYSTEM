-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 08:58 AM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `time_in_morning` time DEFAULT NULL,
  `time_out_morning` time DEFAULT NULL,
  `time_in_afternoon` time DEFAULT NULL,
  `time_out_afternoon` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `emp_id`, `attendance_date`, `time_in_morning`, `time_out_morning`, `time_in_afternoon`, `time_out_afternoon`) VALUES
(1, 1, '2025-02-25', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(2, 2, '2025-02-25', '09:00:00', '12:30:00', '14:00:00', '18:00:00'),
(3, 3, '2025-02-25', '08:30:00', '11:30:00', '13:30:00', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `qr_code` text NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `last_name`, `address`, `contact_number`, `email`, `date_of_birth`, `department`, `position`, `status`, `username`, `password`, `qr_code`, `profile_pic`) VALUES
(1, 'Juan', 'Dela Cruz', '123 Main St, Anytown', '09123456789', 'juan.delacruz@example.com', '2002-05-15', 'IT', 'Web Developer', 'Active', 'jdelacruz', '$2y$10$YOUR_HASHED_PASSWORD_1', '67bc1477ee3a1neil.png', 'man1.jpg'),
(2, 'Maria', 'Santos', '456 Elm Ave, Anytown', '09876543210', 'maria.santos@example.com', '2003-02-20', 'IT', 'Web Developer', 'Active', 'msantos', '$2y$10$YOUR_HASHED_PASSWORD_2', '67bc1477ee3a1neil.png', 'girl2.jpg'),
(3, 'Jose', 'Rizal', '789 Oak St, Anytown', '09998887777', 'jose.rizal@example.com', '2001-11-03', 'IT', 'Web Developer', 'Active', 'jrizal', '$2y$10$YOUR_HASHED_PASSWORD_3', '67bc1477ee3a1neil.png', 'man2.jpg'),
(4, 'Gabriela', 'Silang', '101 Pine Ln, Anytown', '09112233445', 'gabriela.silang@example.com', '2000-08-25', 'IT', 'Web Developer', 'Active', 'gsilang', '$2y$10$YOUR_HASHED_PASSWORD_4', '67bc1477ee3a1neil.png', 'girl1.jpg'),
(5, 'Andres', 'Bonifacio', '222 Maple Dr, Anytown', '09556677889', 'andres.bonifacio@example.com', '2002-01-10', 'IT', 'Web Developer', 'Active', 'abonifacio', '$2y$10$YOUR_HASHED_PASSWORD_5', '67bc1477ee3a1neil.png', 'man1.jpg'),
(6, 'Emilio', 'Aguinaldo', '333 Willow Ct, Anytown', '09445566778', 'emilio.aguinaldo@example.com', '2003-07-08', 'IT', 'Web Developer', 'Active', 'eaguinaldo', '$2y$10$YOUR_HASHED_PASSWORD_6', '67bc1477ee3a1neil.png', 'man2.jpg'),
(7, 'Apolinario', 'Mabini', '444 Cedar Rd, Anytown', '09667788990', 'apolinario.mabini@example.com', '2002-12-12', 'IT', 'Web Developer', 'Active', 'amabini', '$2y$10$YOUR_HASHED_PASSWORD_7', '67bc1477ee3a1neil.png', 'man1.jpg'),
(14, 'Jose', 'Buenabiles', 'Sitio Pucatod, Barangay Payao', '091231', 'joseneilbuenabiles@gmail.com', '2025-02-19', 'IT', 'Web Developer', 'Active', 'admin123', '$2y$10$yAy3fxWQ25klSRtRghChyek07fYV2IQVIWaT9mXWK.LB9mg7mOXyO', '67bc1477ee3a1neil.png', 'man2.jpg'),
(15, 'Jose', 'Buenabiles', 'Sitio Pucatod, Barangay Payao', '09772000155', 'joseneilbuenabiles@gmail.com', '2025-02-27', 'IT', 'Web Developer', 'Active', 'neil', '$2y$10$K.zYRPkC65yr/QXxfK75U.OXCGX9kWlhI5f0KAshDqWGi7tNLIRUi', '67bc1477ee3a1neil.png', 'man1.jpg'),
(26, 'Jose Neil', 'Buenabiles', 'Sitio Pucatod, Barangay Payao', '09772000155', 'joseneilbuenabiles@gmail.com', '2025-02-06', 'IT', 'Web Developer', 'Active', 'joseneil', '$2y$10$x5h.Vk/5Jsc3QxXJghzJ4egOgRK/KU3df3zh4B/9NUpt.D9jsQeNG', '67bd77b1993c8joseneil.png', 'avatar_pp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loginattemp`
--

CREATE TABLE `loginattemp` (
  `ATTEMPID` int(11) NOT NULL,
  `IPADDRESS` varchar(100) DEFAULT NULL,
  `ATTEMPCOUNT` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loginattemp`
--

INSERT INTO `loginattemp` (`ATTEMPID`, `IPADDRESS`, `ATTEMPCOUNT`) VALUES
(976, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE` varchar(100) NOT NULL,
  `SERVICE_FEE` float NOT NULL,
  `DATE_CREATED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`SERVICE_ID`, `SERVICE`, `SERVICE_FEE`, `DATE_CREATED`) VALUES
(2, 'Check Up', 400, '2025-02-20 10:14:55'),
(4, 'fe', 123, '0000-00-00 00:00:00'),
(5, 'fe', 123, '0000-00-00 00:00:00'),
(6, 'eyes car', 2303, '2025-02-21 08:38:09'),
(7, 'fe123', 132, '2025-02-21 08:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `LOGID` int(11) NOT NULL,
  `USERID` varchar(30) DEFAULT NULL,
  `USER_NAME` varchar(60) DEFAULT NULL,
  `ACTION` text DEFAULT NULL,
  `DATELOG` varchar(30) DEFAULT NULL,
  `TIMELOG` varchar(30) DEFAULT NULL,
  `user_ip_address` text DEFAULT NULL,
  `device_used` text DEFAULT NULL,
  `PORTAL` int(11) DEFAULT NULL,
  `AY` varchar(50) DEFAULT NULL,
  `SEMESTER` varchar(50) DEFAULT NULL,
  `COMPANYID` varchar(60) DEFAULT NULL,
  `CAMPUSID` int(11) DEFAULT NULL,
  `IDENTIFIER` varchar(30) DEFAULT NULL,
  `ACCOUNT_ID` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`LOGID`, `USERID`, `USER_NAME`, `ACTION`, `DATELOG`, `TIMELOG`, `user_ip_address`, `device_used`, `PORTAL`, `AY`, `SEMESTER`, `COMPANYID`, `CAMPUSID`, `IDENTIFIER`, `ACCOUNT_ID`) VALUES
(170116, 'admin', 'White, Adam R.', 'Logout to the system.', '2025-01-04', '09:31:12', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170117, 'admin', 'White, Adam R.', 'Login to the system.n', '2025-01-04', '09:31:20', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170118, 'admin', 'White, Adam R.', 'Logout to the system.', '2025-01-04', '09:43:58', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170119, 'admin', 'White, Adam R.', 'Login to the system.', '2025-01-04', '09:47:20', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170120, 'admin', 'White, Adam R.', 'New User has been created successfully!', '2025-01-04', '10:01:19', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170121, 'admin', 'White, Adam R.', 'New User has been updated successfully!', '2025-01-04', '10:08:58', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170122, 'admin', 'White, Adam R.', 'Login to the system.', '2025-01-04', '10:19:41', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170123, 'admin', 'White, Adam R.', 'Logout to the system.', '2025-01-04', '10:19:49', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170124, 'admin', 'White, Adam R.', 'Login to the system.', '2025-01-04', '10:20:20', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170125, 'admin', 'White, Adam R.', 'Logout to the system.', '2025-01-04', '10:22:41', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170126, 'admin', 'White, Adam R.', 'Login to the system.', '2025-01-04', '10:23:00', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170127, 'admin', 'White, Adam R.', 'User with ID admin has been updated successfully!', '2025-01-04', '10:42:51', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170128, 'admin', 'White, Adam R.', 'User with ID admin has been updated successfully!', '2025-01-04', '10:42:56', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170129, 'admin', 'White, Adam R.', 'User with ID admin has been updated successfully!', '2025-01-04', '10:43:25', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170130, 'admin', 'White, Adam R.', 'User with ID admin has been updated successfully!', '2025-01-04', '10:43:29', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170131, 'admin', 'White, Adam R.', 'User with ID admin has been updated successfully!', '2025-01-04', '10:43:32', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170132, 'admin', 'White, Adam R.', 'Logout to the system.', '2025-01-04', '10:57:32', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170133, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-01-04', '10:57:37', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170134, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:08:49', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170135, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:08:53', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170136, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:10:15', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170137, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:10:50', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170138, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:10:53', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170139, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:10:55', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170140, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:11:43', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170141, 'admin', 'White, Adam Ray', 'New User [EMPID: 1] has been created successfully!', '2025-01-04', '11:12:02', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170142, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:12:04', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170143, 'admin', 'White, Adam Ray', 'New User [EMPID: 1] has been created successfully!', '2025-01-04', '11:17:40', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170144, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-01-04', '11:20:14', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170145, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-01-04', '13:06:14', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170146, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:53:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170147, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:53:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170148, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:55:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170149, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:57:43', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170150, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:57:51', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170151, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:57:57', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170152, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:58:32', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170153, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:59:39', '', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170154, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '10:59:54', '', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170155, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '11:00:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170156, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '11:07:29', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170157, '', '', 'Login to the system.', '2025-02-20', '11:17:54', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170158, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '11:19:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170159, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '11:35:55', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170160, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '11:36:32', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170161, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '11:36:50', '', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170162, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '11:36:59', '', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170163, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '11:40:51', '', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170164, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '12:31:27', '', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170165, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '12:32:58', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170166, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '12:34:27', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170167, '', 'White, Adam Ray ', 'Logout to the system.', '2025-02-20', '12:36:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170168, '', 'White, Adam Ray ', 'Login to the system.', '2025-02-20', '12:36:35', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170169, '', 'White, Adam Ray ', 'Logout to the system.', '2025-02-20', '12:38:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170170, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '12:38:36', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170171, 'admin', 'White, Adam Ray', 'New User [EMPID: 12] has been created successfully!', '2025-02-20', '12:48:40', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170172, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '12:48:48', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170173, 'admin', 'White, Adam Ray', 'New User [EMPID: 1] has been created successfully!', '2025-02-20', '12:49:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170174, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '12:49:54', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170175, 'admin', 'White, Adam Ray', 'New User [EMPID: admin] has been created successfully!', '2025-02-20', '12:50:16', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170176, 'admin', 'White, Adam Ray', 'New User [EMPID: employee] has been created successfully!', '2025-02-20', '13:22:59', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170177, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '14:14:49', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170178, 'admin', 'White, Adam Ray', 'New User [EMPID: admin] has been created successfully!', '2025-02-20', '15:28:41', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170179, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-20', '15:59:00', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170180, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '15:59:03', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170181, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:02:24', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170182, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:02:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170183, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:02:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170184, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:02:36', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170185, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:02:37', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170186, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:03:22', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170187, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:03:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170188, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:03:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170189, 'admin', 'White, Adam Ray', 'User has been removed successfully!', '2025-02-20', '17:03:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170190, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:04:43', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170191, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:05:38', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170192, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:13:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170193, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:13:31', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170194, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:13:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170195, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:14:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170196, 'admin', 'White, Adam Ray', 'Service has been removed successfully!', '2025-02-20', '17:22:52', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'DELETE', NULL),
(170197, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-20', '21:27:20', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170198, 'admin', 'White, Adam Ray', 'User with ID 2 has been updated successfully!', '2025-02-20', '21:29:40', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170199, 'admin', 'White, Adam Ray', 'User with ID 2 has been updated successfully!', '2025-02-20', '21:29:46', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170200, 'admin', 'White, Adam Ray', 'User with ID 2 has been updated successfully!', '2025-02-20', '21:29:52', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'UPDATE', NULL),
(170201, 'admin', 'White, Adam Ray', 'New Service has been created successfully!', '2025-02-20', '21:43:34', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170202, 'admin', 'White, Adam Ray', 'New Service has been created successfully!', '2025-02-20', '21:45:07', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170203, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '08:37:50', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170204, 'admin', 'White, Adam Ray', 'New Service has been created successfully!', '2025-02-21', '08:38:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170205, 'admin', 'White, Adam Ray', 'New Service has been created successfully!', '2025-02-21', '08:40:12', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170206, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '09:36:34', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170207, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '09:36:38', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170208, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '09:56:10', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170209, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '09:56:14', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170210, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '10:00:03', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170211, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '10:00:06', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170212, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '13:07:32', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170213, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '13:52:32', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170214, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '14:02:13', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170215, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '14:02:41', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170216, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '14:02:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170217, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '14:28:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170218, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '14:58:46', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170219, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '14:58:49', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170220, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '14:59:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170221, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '15:01:11', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170222, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-21', '16:00:25', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170223, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-21', '16:01:27', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170224, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '16:05:14', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170225, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '16:05:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170226, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-21', '16:07:28', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170227, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-21', '16:07:42', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170228, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-22', '19:09:32', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170229, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '18:23:42', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170230, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:15:02', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170231, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '19:15:11', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170232, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:15:20', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170233, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '19:17:26', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170234, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:17:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170235, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '19:26:57', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170236, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:27:01', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170237, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '19:40:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170238, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:40:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170239, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '19:41:19', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170240, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:41:23', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170241, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '19:41:50', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170242, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '19:41:54', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170243, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '20:10:17', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170244, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '21:26:29', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170245, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '21:30:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170246, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '21:30:31', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170247, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '21:40:33', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170248, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '21:40:39', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170249, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-23', '21:48:37', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170250, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '21:49:37', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170251, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '21:57:53', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170252, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-23', '22:00:20', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170253, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '08:28:50', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170254, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '09:47:41', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170255, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-24', '09:50:06', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170256, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-24', '09:55:54', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170257, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-24', '09:58:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170258, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-24', '10:08:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170259, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-24', '10:10:41', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170260, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '10:13:08', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170261, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '10:22:48', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170262, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '10:23:16', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170263, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '11:25:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170264, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '11:25:58', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170265, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '14:40:25', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170266, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-24', '14:40:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170267, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '14:41:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170268, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '14:55:36', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170269, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '15:29:55', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170270, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '15:30:39', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170271, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '15:35:30', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170272, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '15:38:03', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170273, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '15:40:05', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170274, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-24', '16:19:15', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170275, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-24', '16:19:59', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170276, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '09:10:20', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170277, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-25', '09:29:44', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170278, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '10:51:45', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170279, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '11:24:18', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170280, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '12:54:58', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170281, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '12:59:06', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170282, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:13:49', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170283, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:15:33', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170284, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:17:14', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170285, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:18:29', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170286, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:19:31', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170287, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:20:56', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170288, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:23:09', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170289, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:39:02', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170290, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '13:39:35', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170291, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-25', '13:44:39', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170292, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '13:47:46', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170293, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-25', '13:51:47', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170294, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '14:19:12', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170295, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-25', '14:19:39', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL),
(170296, 'admin', 'White, Adam Ray', 'Login to the system.', '2025-02-25', '15:56:02', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGIN', NULL),
(170297, 'admin', 'White, Adam Ray', 'New Employee has been created successfully!', '2025-02-25', '15:56:33', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'INSERT', NULL),
(170298, 'admin', 'White, Adam Ray', 'Logout to the system.', '2025-02-25', '15:56:40', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 12, '', '', NULL, NULL, 'LOGOUT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERID` int(11) NOT NULL,
  `FULLNAME` text DEFAULT NULL,
  `FNAME` varchar(30) DEFAULT NULL,
  `MNAME` varchar(30) DEFAULT NULL,
  `LNAME` varchar(30) DEFAULT NULL,
  `CONTACT` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(40) DEFAULT NULL,
  `EMPID` varchar(30) NOT NULL,
  `PASSWORD` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERID`, `FULLNAME`, `FNAME`, `MNAME`, `LNAME`, `CONTACT`, `ADDRESS`, `EMPID`, `PASSWORD`) VALUES
(1, 'White, Adam Ray', 'Adam', 'Ray', 'White', '1234567890', 'Bacolod', 'admin', '$2y$10$RlgTUI1wBhDiFaPt24rNuOzxcnePooiDyjJo5DWpMuwojAcaHa2Ri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `loginattemp`
--
ALTER TABLE `loginattemp`
  ADD PRIMARY KEY (`ATTEMPID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`SERVICE_ID`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`LOGID`),
  ADD KEY `USERID` (`USERID`),
  ADD KEY `USER_NAME` (`USER_NAME`),
  ADD KEY `CAMPUSID` (`CAMPUSID`),
  ADD KEY `SEMESTER` (`SEMESTER`),
  ADD KEY `AY` (`AY`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `loginattemp`
--
ALTER TABLE `loginattemp`
  MODIFY `ATTEMPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=977;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `SERVICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `LOGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170299;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
