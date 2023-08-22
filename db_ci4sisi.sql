-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 03:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci4sisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID_ATTENDANCE` int(11) NOT NULL,
  `ID_EMPLOYEE` int(11) NOT NULL,
  `MONTH` varchar(20) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `TOTAL_ATTENTION` int(11) NOT NULL,
  `TOTAL_PERMISSION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID_ATTENDANCE`, `ID_EMPLOYEE`, `MONTH`, `YEAR`, `CREATE_AT`, `UPDATE_AT`, `TOTAL_ATTENTION`, `TOTAL_PERMISSION`) VALUES
(1, 1, 'July', '2023', '2023-08-22 11:46:09', '2023-08-22 11:46:09', 21, 2),
(2, 1, 'Agustus', '2023', '2023-08-22 11:46:28', '2023-08-22 11:46:28', 19, 6),
(4, 6, 'July', '2023', '2023-08-22 12:45:47', '2023-08-22 12:45:47', 21, 2),
(5, 7, 'July', '2023', '2023-08-22 12:46:05', '2023-08-22 12:46:05', 19, 6);

-- --------------------------------------------------------

--
-- Table structure for table `duty`
--

CREATE TABLE `duty` (
  `ID_DUTY` int(10) NOT NULL,
  `NAME_DUTY` varchar(30) NOT NULL,
  `SALARY` int(30) NOT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duty`
--

INSERT INTO `duty` (`ID_DUTY`, `NAME_DUTY`, `SALARY`, `CREATE_AT`, `UPDATE_AT`) VALUES
(1, 'Direktur', 10000000, '2023-08-22 10:37:41', '2023-08-22 10:37:41'),
(2, 'Manajer', 7000000, '2023-08-22 10:37:41', '2023-08-22 10:37:41'),
(3, 'Staff', 5000000, '2023-08-22 10:38:00', '2023-08-22 10:38:00'),
(4, 'Magang', 3000000, '2023-08-22 10:38:00', '2023-08-22 10:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID_EMPLOYEE` int(11) NOT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_USER` varchar(30) NOT NULL,
  `ID_DUTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID_EMPLOYEE`, `CREATE_AT`, `UPDATE_AT`, `ID_USER`, `ID_DUTY`) VALUES
(1, '2023-08-22 10:38:09', '2023-08-22 10:38:09', 'USR0001', 2),
(6, '2023-08-22 12:44:01', '2023-08-22 12:44:01', 'USR0003', 2),
(7, '2023-08-22 12:44:21', '2023-08-22 12:44:21', 'USR0004', 3),
(8, '2023-08-22 12:44:28', '2023-08-22 12:44:28', 'USR0005', 4);

-- --------------------------------------------------------

--
-- Table structure for table `i_error_application`
--

CREATE TABLE `i_error_application` (
  `ERROR_ID` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `ERROR_DATE` varchar(3) DEFAULT NULL,
  `MODULES` varchar(100) DEFAULT NULL,
  `CONTROLLER` varchar(200) DEFAULT NULL,
  `FUNCTION` varchar(200) DEFAULT NULL,
  `ERROR_LINE` varchar(30) DEFAULT NULL,
  `ERROR_MESSAGE` varchar(1000) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `PARAM` varchar(300) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `CREATE_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MENU_ID` varchar(3) NOT NULL,
  `ID_LEVEL` varchar(3) DEFAULT NULL,
  `MENU_NAME` varchar(300) DEFAULT NULL,
  `MENU_LINK` varchar(300) DEFAULT NULL,
  `MENU_ICON` varchar(300) DEFAULT NULL,
  `PARENT_ID` varchar(300) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_level`
--

CREATE TABLE `menu_level` (
  `ID_LEVEL` varchar(3) NOT NULL,
  `LEVEL` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_user`
--

CREATE TABLE `menu_user` (
  `NO_SETTING` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `MENU_ID` varchar(3) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_DATE` varchar(30) DEFAULT NULL,
  `CREATE_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `ID_PAYROLL` int(11) NOT NULL,
  `ID_EMPLOYEE` int(11) NOT NULL,
  `SALARY_DEDUCTION` int(11) NOT NULL,
  `TOTAL_SALARY` int(11) NOT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`ID_PAYROLL`, `ID_EMPLOYEE`, `SALARY_DEDUCTION`, `TOTAL_SALARY`, `CREATE_AT`, `UPDATE_AT`) VALUES
(1, 1, 2000000, 8000000, '2023-08-22 11:40:15', '2023-08-22 11:40:15'),
(2, 6, 20000, 6980000, '2023-08-22 12:44:52', '2023-08-22 12:44:52'),
(3, 7, 20000, 4980000, '2023-08-22 12:45:08', '2023-08-22 12:45:08'),
(4, 8, 20000, 2980000, '2023-08-22 12:45:19', '2023-08-22 12:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE `sppd` (
  `ID_SPPD` int(11) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL,
  `DESTINATION` varchar(50) NOT NULL,
  `DEPARTURE_DATE` date NOT NULL,
  `ARRIVE_DATE` date NOT NULL,
  `CREATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_EMPLOYEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`ID_SPPD`, `DESCRIPTION`, `DESTINATION`, `DEPARTURE_DATE`, `ARRIVE_DATE`, `CREATE_AT`, `UPDATE_AT`, `ID_EMPLOYEE`) VALUES
(1, '                                Meeting Client LN                                ', 'Dunedin', '2023-08-24', '2023-08-29', '2023-08-22 11:20:49', '2023-08-22 11:20:49', 1),
(2, 'check inven', 'Jakarta', '2023-08-31', '2023-09-09', '2023-08-22 13:34:00', '2023-08-22 13:34:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(30) NOT NULL,
  `NAMA_USER` varchar(60) NOT NULL,
  `USERNAME` varchar(60) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `NO_HP` varchar(30) NOT NULL,
  `WA` varchar(30) NOT NULL,
  `PIN` varchar(30) NOT NULL,
  `ID_JENIS_USER` varchar(3) NOT NULL,
  `STATUS_USER` varchar(30) NOT NULL,
  `DELETE_MARK` varchar(1) NOT NULL,
  `CREATE_BY` varchar(30) NOT NULL,
  `CREATED_DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `UPDATE_BY` varchar(30) NOT NULL,
  `UPDATE_DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `sequence` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `USERNAME`, `PASSWORD`, `EMAIL`, `NO_HP`, `WA`, `PIN`, `ID_JENIS_USER`, `STATUS_USER`, `DELETE_MARK`, `CREATE_BY`, `CREATED_DATE`, `UPDATE_BY`, `UPDATE_DATE`, `sequence`) VALUES
('USR0001', 'alexander danuri', 'admin111', '$2y$10$Injm7iyZj6EEDe8AADgVIOPj034yzSSDpNnxgr4OjC2nDeQyDqE5K', 'erfianrio30@gmail.com', '087859984835', '087859984835', '111111', '', 'admin', '', '', '2023-08-22 01:13:18.000000', '', '2023-08-22 03:39:14.000000', 1),
('USR0002', 'rio erfian', 'user111', '$2y$10$hucOhY4UX65jQuvGhdUySeWGSISQKlj6gxOMv94GQP6Qa7Ag7IqB.', 'erfianrio30@gmail.com', '087859984835', '087859984835', '111111', '', 'user', '', '', '2023-08-22 03:59:46.000000', '', '2023-08-22 03:59:46.000000', 2),
('USR0003', 'adam idris', 'adam123', '$2y$10$TJXIEHc98EyEngJTX3OwjOFhcSq/7uQ7R3NPsZS8q/yt6JKjgZzBy', 'erfianrio30@gmail.com', '087859984835', '087859984835', '111111', '', 'admin', '', '', '2023-08-22 05:31:08.000000', '', '2023-08-22 05:43:19.000000', 3),
('USR0004', 'jason kurniawan', 'jason123', '$2y$10$BL2vaEZ4ViepJKC4bhmk.OVZHxr3k02EFAz7b.wJMV5CliNp1fMy.', 'erfianrio30@gmail.com', '087859984835', '087859984835', '111111', '', 'user', '', '', '2023-08-22 05:39:15.000000', '', '2023-08-22 05:43:30.000000', 4),
('USR0005', 'Riri Indrawati', 'riri123', '$2y$10$DpMaqBAXrWADS.sxoCfUGuf4KZWCGHQLPq/n.xbMIvZXkQGt848.a', 'erfianrio30@gmail.com', '087859984835', '087859984835', '111111', '', 'user', '', '', '2023-08-22 05:41:05.000000', '', '2023-08-22 05:41:05.000000', 5);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `generate_user_id` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
    DECLARE next_sequence INT;
    SET next_sequence = (SELECT IFNULL(MAX(sequence), 0) + 1 FROM user);
    SET NEW.ID_USER = CONCAT('USR', LPAD(next_sequence, 4, '0'));
    SET NEW.sequence = next_sequence;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `NO_ACTIVITY` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `DESCRIPTION` varchar(300) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `MENU_ID` varchar(3) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_foto`
--

CREATE TABLE `user_foto` (
  `NO_FOTO` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `FOTO` varchar(30) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID_ATTENDANCE`),
  ADD KEY `ID_EMPLOYEE` (`ID_EMPLOYEE`);

--
-- Indexes for table `duty`
--
ALTER TABLE `duty`
  ADD PRIMARY KEY (`ID_DUTY`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID_EMPLOYEE`),
  ADD KEY `ID_DUTY` (`ID_DUTY`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `i_error_application`
--
ALTER TABLE `i_error_application`
  ADD PRIMARY KEY (`ERROR_ID`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MENU_ID`),
  ADD KEY `ID_LEVEL` (`ID_LEVEL`);

--
-- Indexes for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`ID_LEVEL`);

--
-- Indexes for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`NO_SETTING`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `MENU_ID` (`MENU_ID`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`ID_PAYROLL`),
  ADD KEY `ID_EMPLOYEE` (`ID_EMPLOYEE`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`ID_SPPD`),
  ADD KEY `ID_EMPLOYEE` (`ID_EMPLOYEE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`NO_ACTIVITY`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `user_foto`
--
ALTER TABLE `user_foto`
  ADD PRIMARY KEY (`NO_FOTO`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID_ATTENDANCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `duty`
--
ALTER TABLE `duty`
  MODIFY `ID_DUTY` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID_EMPLOYEE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `ID_PAYROLL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
  MODIFY `ID_SPPD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ID_DUTY`) REFERENCES `duty` (`ID_DUTY`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `menu_level` (`ID_LEVEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
