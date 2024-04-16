-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Apr 16, 2024 at 05:01 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_issuance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_issuance`
--

CREATE TABLE `asset_issuance` (
  `id` int NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `issuance_date` date NOT NULL,
  `asset_type` varchar(50) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `asset_condition` varchar(255) NOT NULL,
  `employee_signature` varchar(255) NOT NULL,
  `employee_signature_date` date NOT NULL,
  `laptop_bag` enum('Yes','No') NOT NULL,
  `device_model` varchar(100) DEFAULT NULL,
  `service_tag` varchar(100) DEFAULT NULL,
  `mouse` enum('Yes','No') NOT NULL,
  `connector` enum('Yes','No') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `asset_issuance`
--

INSERT INTO `asset_issuance` (`id`, `employee_name`, `department`, `position`, `issuance_date`, `asset_type`, `serial_number`, `asset_condition`, `employee_signature`, `employee_signature_date`, `laptop_bag`, `device_model`, `service_tag`, `mouse`, `connector`, `created_at`) VALUES
(24, 'John Doe', 'IT', 'Manager', '2022-01-01', 'Laptop', 'ABC123', 'Good', 'John Doe', '2022-01-01', 'Yes', 'Lenovo', '123456', 'Yes', 'Yes', '2024-04-16 15:34:23'),
(25, 'Jane Smith', 'Finance', 'Accountant', '2022-01-02', 'Desktop', 'DEF456', 'Excellent', 'Jane Smith', '2022-01-02', 'No', 'HP', '789012', 'No', 'No', '2024-04-16 15:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `asset_stock`
--

CREATE TABLE `asset_stock` (
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Serial_number` varchar(255) DEFAULT NULL,
  `Configuration` varchar(255) DEFAULT NULL,
  `Performance` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `asset_stock`
--

INSERT INTO `asset_stock` (`Name`, `Type`, `Serial_number`, `Configuration`, `Performance`, `Status`, `Comments`) VALUES
('Name', 'Type', 'Serial number', 'Configuration', 'Performance', 'Status', 'Comments'),
('Laptop', 'HP', '123456', 'Core i5', '8GB RAM', 'Active', 'Good condition'),
('Desktop', 'Dell', '789012', 'Core i7', '16GB RAM', 'Inactive', 'Needs maintenance'),
('Printer', 'Epson', '345678', 'N/A', 'N/A', 'Active', 'Working fine'),
('Name', 'Type', 'Serial number', 'Configuration', 'Performance', 'Status', 'Comments'),
('Laptop', 'HP', '123456', 'Core i5', '8GB RAM', 'Active', 'Good condition'),
('Desktop', 'Dell', '789012', 'Core i7', '16GB RAM', 'Inactive', 'Needs maintenance'),
('Printer', 'Epson', '345678', 'N/A', 'N/A', 'Active', 'Working fine'),
('Name', 'Type', 'Serial number', 'Configuration', 'Performance', 'Status', 'Comments'),
('Laptop', 'HP', '123456', 'Core i5', '8GB RAM', 'Active', 'Good condition'),
('Desktop', 'Dell', '789012', 'Core i7', '16GB RAM', 'Inactive', 'Needs maintenance'),
('Printer', 'Epson', '345678', 'N/A', 'N/A', 'Active', 'Working fine'),
('Temp', 'Mobile', '78965413.0', '16+512', 'Performance', 'Good', ''),
('Name', 'Type', 'Serial number', 'Configuration', 'Performance', 'Status', 'Comments'),
('Laptop', 'HP', '123456', 'Core i5', '8GB RAM', 'Active', 'Good condition'),
('Desktop', 'Dell', '789012', 'Core i7', '16GB RAM', 'Inactive', 'Needs maintenance'),
('Printer', 'Epson', '345678', 'N/A', 'N/A', 'Active', 'Working fine');

-- --------------------------------------------------------

--
-- Table structure for table `stock_update`
--

CREATE TABLE `stock_update` (
  `id` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Serial_number` varchar(255) DEFAULT NULL,
  `Configuration` varchar(255) DEFAULT NULL,
  `Performance` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock_update`
--

INSERT INTO `stock_update` (`id`, `Name`, `Type`, `Serial_number`, `Configuration`, `Performance`, `Status`, `Comments`) VALUES
(4, 'Printer', 'Epson', '345678', 'N/A', 'N/A', 'Active', 'Working fine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_issuance`
--
ALTER TABLE `asset_issuance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_update`
--
ALTER TABLE `stock_update`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_issuance`
--
ALTER TABLE `asset_issuance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stock_update`
--
ALTER TABLE `stock_update`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
