-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techfarm_nexus`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer_login`
--

CREATE TABLE `farmer_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_login`
--

INSERT INTO `farmer_login` (`id`, `name`, `phone`, `email`, `password`) VALUES
(4, 'sachin', '9359936568', 'mages@123', '$2y$10$vmLNcF7rlEqBn/dIaiWIpu4fyhHWx7OdXxG/THp.9NTebZYya/MhK'),
(7, 'sachin', '9146313028', 'sachin@gmail.com', '$2y$10$QP3qlxqkgr4L5fIAR4oHKeHwLHl5uGX01nPhaiiKy28k8DcGLN6.u'),
(8, 'sachin', '9322101694', 'sachin@123', '$2y$10$cTuCrCo1s26yUws8PGbn.eb2Npg4FLw4B6m9GcdzKXO0Kxmw5LbgW'),
(9, 'sachin', '9322101695', 'sachin', '$2y$10$sC07a2CkShyUgECRFvhcTOTFZQ8mF8CnEmlBsY7fxVhq/NV8W06e2'),
(10, 'sachin', '9322101697', 'abc@gn', '$2y$10$OI2Vf0EwT.oC.NzFdbwUDetzTkWcdqCbPi.wRRYoJiaRpMRpxf7m2');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`id`, `fullname`, `email`, `message`, `created_at`) VALUES
(1, 'sachin', 'sachin@123', 'qwef', '2023-10-09 15:38:46'),
(2, 'sachin', 'saa@gma', 'dcvvvvv', '2023-10-09 15:40:35'),
(3, 'sachin shinde ', 'sachin@123', 'hi iam sachin', '2023-10-09 16:07:47'),
(4, 'sachin ', 'sachin@123', 'ghihhkhjjnbbb', '2023-10-09 17:48:47'),
(5, 'sachin ', 'sachin@123', 'ghihhkhjjnbbb', '2023-10-09 17:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer_login`
--
ALTER TABLE `farmer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer_login`
--
ALTER TABLE `farmer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
