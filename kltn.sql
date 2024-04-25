-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 05:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kltn`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(11) NOT NULL,
  `Classify_ID` int(11) NOT NULL,
  `Acc_name` varchar(50) NOT NULL,
  `Acc_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Classify_ID`, `Acc_name`, `Acc_pass`) VALUES
(1, 1, 'CEO#001', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `classify`
--

CREATE TABLE `classify` (
  `Classify_ID` int(11) NOT NULL,
  `Classify_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classify`
--

INSERT INTO `classify` (`Classify_ID`, `Classify_name`) VALUES
(1, 'CEO'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `Customer_phone` varchar(11) NOT NULL,
  `Customer_email` varchar(50) NOT NULL,
  `Customer_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_name`, `Customer_phone`, `Customer_email`, `Customer_address`) VALUES
(1, 'Nguyễn Văn Khách', '0332280971', 'abcd@gmail.com', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL,
  `Department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_name`) VALUES
(1, 'Ban kỹ thuật '),
(2, 'Ban điều hành');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Position_ID` int(11) NOT NULL,
  `Position_name` varchar(50) NOT NULL,
  `Position_des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Position_ID`, `Position_name`, `Position_des`) VALUES
(1, 'Giám đốc', 'Chịu trách nhiệm điều hành'),
(2, 'Nhân viên', 'Bán mình cho tư bản');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_ID` int(11) NOT NULL,
  `PT_ID` int(11) NOT NULL,
  `Project_name` varchar(100) NOT NULL,
  `Project_status` varchar(50) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Project_time_start` date NOT NULL,
  `Project_manager` varchar(50) NOT NULL,
  `Project_gudget` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `PT_ID`, `Project_name`, `Project_status`, `Customer_ID`, `Project_time_start`, `Project_manager`, `Project_gudget`) VALUES
(3, 1, 'Dự án 3', 'Đã hoàn thành', 1, '2024-04-22', 'Phạm Văn D', '12.500.000'),
(4, 1, 'Dự án 1', 'Chưa hoàn thành', 1, '2024-04-24', 'Nguyễn Văn A', '10.100.000');

-- --------------------------------------------------------

--
-- Table structure for table `projecttype`
--

CREATE TABLE `projecttype` (
  `PT_ID` int(11) NOT NULL,
  `PT_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projecttype`
--

INSERT INTO `projecttype` (`PT_ID`, `PT_name`) VALUES
(1, 'Xã hội'),
(2, 'Nội bộ');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `Task_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Task_name` varchar(50) NOT NULL,
  `Task_status` varchar(50) NOT NULL,
  `Task_time_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`Task_ID`, `User_ID`, `Project_ID`, `Task_name`, `Task_status`, `Task_time_create`) VALUES
(2, 1, 4, 'Lập test plan', 'Chưa hoàn thành', '2024-04-24'),
(3, 1, 4, 'tạo mindmap', 'Chưa hoàn thành', '2024-04-18'),
(4, 1, 4, 'Lập trình Frontend', 'Chưa hoàn thành', '2024-04-20'),
(5, 1, 4, 'Lập trình backend', 'Chưa hoàn thành', '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Position_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Account_ID` int(11) NOT NULL,
  `User_address` varchar(100) NOT NULL,
  `User_birth` date NOT NULL,
  `User_gender` varchar(10) NOT NULL,
  `User_Town` varchar(100) NOT NULL,
  `User_phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Position_ID`, `Department_ID`, `User_name`, `Account_ID`, `User_address`, `User_birth`, `User_gender`, `User_Town`, `User_phone`) VALUES
(1, 1, 2, 'Trần Văn B', 1, 'cầu giấy - Hà Nội', '1994-04-16', 'Nam', 'Hà nội', '0332280972');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `Classify_ID` (`Classify_ID`);

--
-- Indexes for table `classify`
--
ALTER TABLE `classify`
  ADD PRIMARY KEY (`Classify_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_ID`),
  ADD KEY `project_ibfk_1` (`PT_ID`),
  ADD KEY `project_ibfk_2` (`Customer_ID`);

--
-- Indexes for table `projecttype`
--
ALTER TABLE `projecttype`
  ADD PRIMARY KEY (`PT_ID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`Task_ID`),
  ADD KEY `task_ibfk_1` (`Project_ID`),
  ADD KEY `task_ibfk_2` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `user_ibfk_2` (`Position_ID`),
  ADD KEY `user_ibfk_3` (`Account_ID`),
  ADD KEY `user_ibfk_4` (`Department_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classify`
--
ALTER TABLE `classify`
  MODIFY `Classify_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `Position_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projecttype`
--
ALTER TABLE `projecttype`
  MODIFY `PT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `Task_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Classify_ID`) REFERENCES `classify` (`Classify_ID`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`PT_ID`) REFERENCES `projecttype` (`PT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Position_ID`) REFERENCES `position` (`Position_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`Account_ID`) REFERENCES `account` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
