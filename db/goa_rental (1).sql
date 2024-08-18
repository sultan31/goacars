-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 09:53 PM
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
-- Database: `goa_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `pickup_time` varchar(255) NOT NULL,
  `drop_off_date` varchar(255) NOT NULL,
  `drop_off_time` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `price`, `image`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'activa', 1500.00, 'download.jpg', '2024-08-18 18:19:41', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE `estimate` (
  `id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `pickup_time` varchar(255) NOT NULL,
  `drop_off_date` varchar(255) NOT NULL,
  `drop_off_time` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `days` int(11) NOT NULL,
  `cgst_amt` decimal(10,2) NOT NULL,
  `sgst_amt` decimal(10,2) NOT NULL,
  `final_total` decimal(10,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `voucher_no`, `car_id`, `pickup_location`, `pickup_date`, `pickup_time`, `drop_off_date`, `drop_off_time`, `full_name`, `phone_number`, `email`, `price`, `amount`, `days`, `cgst_amt`, `sgst_amt`, `final_total`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 1, 1, '', '2024-08-21', '', '2024-08-29', '', '', 0, '', 1500.00, 12000.00, 0, 720.00, 720.00, 13440.00, '2024-08-18 19:42:39', 1, '', 0),
(2, 2, 1, '', '2024-08-20', '', '2024-08-24', '', '', 0, '', 1500.00, 6000.00, 4, 360.00, 360.00, 6720.00, '2024-08-18 19:51:31', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'sultan', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estimate`
--
ALTER TABLE `estimate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
