-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 05:52 AM
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
-- Database: `dashboard-act`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`, `status`) VALUES
(1, 'drey', '123123', 'Admin'),
(2, 'aerol', 'AEROL123', 'Admin'),
(3, 'marcus', 'marcus123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `Name`, `age`, `gender`, `contact`, `address`, `status`, `course`, `year`, `section`) VALUES
(1, 'Jhon Darriz E Dreu', '20', 'Male', '09109860928', 'malabon city', 'College', 'BSIT', '3rd', 'C'),
(2, 'aerol M tameta', '21', 'Male', '91098609281', 'Caloocan city', 'College', 'BSIT', '2nd', 'C'),
(3, 'Marcus  Jimeno Pogi', '22', 'Male', '09227241646', 'sangandaan malabon', 'College', 'BSIT', '4th', 'C'),
(5, 'angela  bajan', '21', 'Female', '9444111223', 'caloocan city', 'College', 'BSIT', '3rd', 'C'),
(6, 'dave  pasqual', '22', 'Male', '9445566777', 'bulacan province', 'College', 'BSIT', '1st', 'B'),
(7, 'joshua  caranay', '23', 'Male', '9558877999', 'caloocan city', 'College', 'BSIT', '3rd', 'A'),
(8, 'ivan   de leon', '22', 'Female', '9456456456', 'caloocan city', 'College', 'BSIT', '', 'B'),
(9, 'kitty  bermoy', '20', 'Female', '9123123123', 'sangandaan', 'College', 'BSBA', '', 'B'),
(11, 'jester  longcop', '22', 'Male', '9664466555', 'navotas city', 'College', 'BSIT', '', 'A'),
(12, 'russel D sotito', '21', 'Male', '09254585654', 'cavite city', 'SHS', 'ICT', '12', 'B'),
(13, 'khen d sotito', '19', 'Male', '09452138321', 'cavite city', 'SHS', 'GAS', '11', 'A'),
(14, 'ella mae d sotito', '23', 'Female', '09451681321', 'manila', 'SHS', 'ABM', '12', 'B'),
(15, 'jeramel d sotito', '25', 'Male', '09321358413', 'cavite city', 'College', 'BSOA', '4th', 'C'),
(17, 'Selwy B Tolentino', '21', 'Male', '09878685854', 'Tayuman Street', 'SHS', 'GAS', '12', 'B'),
(18, 'Marcus F Jimeno', '22', 'Male', '12312312312', 'ASDJASOIDHLASHDLIAnd', 'College', 'BSIT', '3rd', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
