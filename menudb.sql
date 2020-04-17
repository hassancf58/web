-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 12:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `iid` int(11) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `iimg` varchar(200) NOT NULL,
  `iprice` int(11) NOT NULL,
  `icat` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `icode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`iid`, `iname`, `iimg`, `iprice`, `icat`, `qty`, `totalprice`, `icode`) VALUES
(50, 'Orange juice', 'img/Drinks/Orange_juice.jpg', 10, 4, 2, 20, 'DK03'),
(51, 'Steak Eggs', 'img/Breakfast/se.jpg', 29, 1, 3, 87, 'BF03'),
(52, 'Pepperoni_Pizza', 'img/Lunch/Pepperoni_Pizza.jpg', 20, 2, 1, 20, 'L01'),
(53, 'Kabab', 'img/Dinner/Kabab.jpg', 25, 3, 1, 25, 'DN02'),
(54, 'Shawarma', 'img/Dinner/Shawarma.jpg', 20, 3, 1, 20, 'DN03'),
(55, 'Burger', 'img/Dinner/Burger.jpg', 20, 3, 1, 20, 'DN01'),
(56, 'Waffle', 'img/Sweet/Waffle.jpg', 17, 5, 1, 17, 'SW03'),
(57, 'Cocacola', 'img/Drinks/coca.jpg', 5, 4, 1, 5, 'DK02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Drinks'),
(5, 'Sweets');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(11) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `iimg` varchar(200) NOT NULL,
  `iprice` int(11) NOT NULL,
  `icat` int(11) NOT NULL,
  `icode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `iname`, `iimg`, `iprice`, `icat`, `icode`) VALUES
(1, 'Pancake', 'img/Breakfast/pancake.jpg', 16, 1, 'BF01'),
(2, 'arabic breakfast', 'img/Breakfast/ab.jpg', 35, 1, 'BF02'),
(3, 'Steak Eggs', 'img/Breakfast/se.jpg', 29, 1, 'BF03'),
(6, 'Pepperoni_Pizza', 'img/Lunch/Pepperoni_Pizza.jpg', 20, 2, 'L01'),
(7, 'Ceaser salad', 'img/Lunch/cs.jpg', 18, 2, 'L02'),
(8, 'shrimp pasta', 'img/Lunch/shrimp_pasta.jpg', 35, 2, 'L03'),
(9, 'Burger', 'img/Dinner/Burger.jpg', 20, 3, 'DN01'),
(10, 'Kabab', 'img/Dinner/Kabab.jpg', 25, 3, 'DN02'),
(11, 'Shawarma', 'img/Dinner/Shawarma.jpg', 20, 3, 'DN03'),
(12, 'Cappuccino\r\n', 'img/Drinks/cap.jpg', 12, 4, 'DK01'),
(13, 'Cocacola', 'img/Drinks/coca.jpg', 5, 4, 'DK02'),
(14, 'Orange juice', 'img/Drinks/Orange_juice.jpg', 10, 4, 'DK03'),
(15, 'Brownie', 'img/Sweet/brawniz.jpg', 14, 5, 'SW01'),
(16, 'Cream Cramel', 'img/Sweet/Cream_Cramel.jpg', 14, 5, 'SW02'),
(17, 'Waffle', 'img/Sweet/Waffle.jpg', 17, 5, 'SW03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `icat` (`icat`),
  ADD KEY `icode` (`icode`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `icat` (`icat`),
  ADD KEY `icode` (`icode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`icat`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
