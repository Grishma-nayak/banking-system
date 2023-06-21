-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 02:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `account_no` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL, 
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Users` (`account_no`, `name`, `email_id`, `balance` ) VALUES
(67981, 'Rivqah Norm' , 'qwerty@gmail.com' ,45000),
(24567, 'Ann Patrice' ,'asdf@gmail.com', 10000),
(67893, 'Julia Dipak' ,'lmnk@gmail.com',12000),
(41265, 'Veronica Kenneth' ,'gfhij@gmail.com',35000),
(56892, 'Fátima Mithra' ,'hjkl@gmail.com', 62000),
(21247, 'Ann Patrice' ,'asdf@gmail.com', 10000),
(934567, 'Ann Patrice' ,'asdf@gmail.com', 10000),
(27545, 'Ann Patrice' ,'asdf@gmail.com', 10000),
(46767, 'Ann Patrice' ,'asdf@gmail.com', 10000),
(83428, 'Kayla Casey' ,'tyuio@gmail.com', 32000);

ALTER TABLE `Users`
  ADD PRIMARY KEY (`account_no`);
  
ALTER TABLE `Users`
  MODIFY `account_no` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

-- Table structure for table `Transactions`

CREATE TABLE `Transactions` (
  `Srno` int(2) NOT NULL ,
  `sender_account_id` int(5) NOT NULL,
  `recipient_account_id` int(5) NOT NULL, 
  `amount` int(10) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`Srno`);
  
ALTER TABLE `Transactions`
  MODIFY `Srno` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;
  
INSERT INTO `Transactions` (`Srno`, `sender_account_id`, `recipient_account_id`, `amount` ,`transaction_date`) VALUES
(1, 67981 , 24896 ,5000, '2023-01-30 19:45:48');