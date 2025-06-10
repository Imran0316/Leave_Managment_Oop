-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 01:26 PM
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
-- Database: `leavesys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_action`
--

CREATE TABLE `admin_action` (
  `id` int(11) NOT NULL,
  `leaves_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT 'waiting for approval',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_action`
--

INSERT INTO `admin_action` (`id`, `leaves_id`, `status_id`, `remarks`, `time`) VALUES
(15, 48, 2, 'approved successully', '2025-06-08 13:18:25'),
(16, 49, 2, 'congratulation', '2025-06-08 13:23:17'),
(17, 52, 1, '', '2025-06-08 13:18:52'),
(18, 53, 3, 'you have alot of late arrivals', '2025-06-08 13:17:36'),
(19, 56, 2, 'application approved', '2025-06-10 09:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `deptsname` varchar(50) NOT NULL,
  `deptcode` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptname`, `deptsname`, `deptcode`, `time`) VALUES
(1, 'information technology', 'IT', 'IT001', '2025-05-21 06:37:10'),
(2, 'Human Resources', 'HR', 'HR001', '2025-05-21 05:44:25'),
(1003, 'Manager', 'M', 'M001', '2025-05-23 04:30:23'),
(1004, 'sales', 'sales', 'S001', '2025-05-23 04:35:05'),
(1005, 'Accounting', 'AC', 'AC001', '2025-05-23 04:35:25'),
(1006, 'customer services', 'CS', 'CS001', '2025-05-23 04:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `empcode` varchar(50) NOT NULL,
  `empgender` enum('Male','Female','Other') NOT NULL,
  `empdob` date NOT NULL,
  `empfname` varchar(100) NOT NULL,
  `emplname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `empcode`, `empgender`, `empdob`, `empfname`, `emplname`, `department_id`, `address`, `email`, `city`, `country`, `password`, `phone`, `cpassword`, `created_at`, `status`) VALUES
(14, '1202', 'Male', '2004-01-21', 'Muhhammad', 'hussain', 1, 'street ,block', 'mh001@gmail.com', 'lahore', 'Pakistan', 'mh031628', '035651561', '', '2025-05-21 06:41:26', 'Active'),
(16, '245214', 'Male', '1997-01-06', 'kamran', 'basti', 2, 'Mpr colony block c near alshifa hospital monghopir road orangi town Karachi', 'kamran001@gmail.com', 'karachi', 'Pakistan', 'kk031628', '03162811932', '', '2025-05-21 07:49:21', 'Active'),
(19, '465465', 'Male', '1999-07-14', 'sohail', 'ahmed', 1006, 'defense phase 4 ', 'sohail@gmail.com', 'lahore', 'Pakistan', 'sa0316', '0246546898', '', '2025-05-23 04:38:16', 'Inactive'),
(22, '565464', 'Male', '2000-07-18', 'subhan', 'ansari', 1003, 'gulberg town block d karachi.', 'subhan@gmail.com', 'karachi', 'pakistan', 'subhan123', '03182243809', '', '2025-05-23 05:12:55', 'Active'),
(26, '565655', 'Male', '2008-02-06', 'ishfaq', 'ahmed', 2, 'borad offfice north nazimabad.', 'ishfaq@gmail.com', 'peshaware', 'Pakistan', 'ia0316', '035646465', '', '2025-05-23 05:28:45', 'Active'),
(27, '685454', 'Male', '2025-06-05', 'kashif', 'hussain', 1003, 'gulberg town karachi', 'kashif@gmail.com', 'karachi', 'Pakistan', 'kh0316', '0354654654', '', '2025-05-30 15:17:09', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `leavetype_id` int(11) NOT NULL,
  `employ_id` int(11) NOT NULL,
  `department_name` int(11) NOT NULL,
  `lev_status_id` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `description` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leavetype_id`, `employ_id`, `department_name`, `lev_status_id`, `fromdate`, `todate`, `description`, `time`) VALUES
(48, 2, 26, 2, 2, '2025-06-06', '2025-06-08', 'suffering from fever', '2025-06-08 13:18:25'),
(49, 2, 22, 1003, 2, '2025-06-06', '2025-06-08', 'suffering from fever\r\n                         ', '2025-06-08 13:23:17'),
(52, 6, 16, 2, 1, '2025-06-09', '2025-06-20', 'my exam are starting soon\r\n                         ', '2025-06-08 10:37:22'),
(53, 7, 19, 1, 3, '2025-06-11', '2025-06-15', 'going to northern areas\r\n                         ', '2025-06-08 13:17:36'),
(56, 2, 27, 1003, 2, '2025-06-09', '2025-06-16', 'suffering from malaria\r\n                         ', '2025-06-10 09:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `leavestype`
--

CREATE TABLE `leavestype` (
  `id` int(11) NOT NULL,
  `lev_type` varchar(50) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavestype`
--

INSERT INTO `leavestype` (`id`, `lev_type`, `discription`, `created_at`) VALUES
(1, 'Sick Leave', 'sick leave', '2025-05-23 02:47:31'),
(2, 'Medical Leave', 'for health issues & diseases', '2025-05-23 03:16:50'),
(6, 'study leave', 'for exams and project', '2025-05-23 03:45:21'),
(7, 'casual leave', 'for events and rest', '2025-05-23 03:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `lev_status`
--

CREATE TABLE `lev_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lev_status`
--

INSERT INTO `lev_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_action`
--
ALTER TABLE `admin_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_leave_id` (`leaves_id`),
  ADD KEY `fk_status_id` (`status_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_department` (`department_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_leavetype` (`leavetype_id`),
  ADD KEY `fk_employee` (`employ_id`),
  ADD KEY `fk_deptname` (`department_name`);

--
-- Indexes for table `leavestype`
--
ALTER TABLE `leavestype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lev_status`
--
ALTER TABLE `lev_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_action`
--
ALTER TABLE `admin_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `leavestype`
--
ALTER TABLE `leavestype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lev_status`
--
ALTER TABLE `lev_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_action`
--
ALTER TABLE `admin_action`
  ADD CONSTRAINT `fk_leave_id` FOREIGN KEY (`leaves_id`) REFERENCES `leaves` (`id`),
  ADD CONSTRAINT `fk_status_id` FOREIGN KEY (`status_id`) REFERENCES `lev_status` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `fk_deptname` FOREIGN KEY (`department_name`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `fk_employee` FOREIGN KEY (`employ_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_leavetype` FOREIGN KEY (`leavetype_id`) REFERENCES `leavestype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
