-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 09:39 AM
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
-- Database: `ticrou`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `user_name`, `product_name`, `product_price`) VALUES
(8, 10, 10, 'ronak', 'kaju curry', 220),
(10, 9, 8, 'krunal', 'punjabi full thali', 220),
(13, 10, 8, 'ronak', 'punjabi full thali', 220);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(8, 'punjabi full thali', 'AdobeStock_228280764_Preview-transformed.jpeg', 220),
(9, 'rooti', 'AdobeStock_549782059_Preview.jpeg', 80),
(10, 'kaju curry', 'DeWatermark.ai_1724153406090.png', 220),
(12, 'maggi', 'main-img-5.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `ragistration`
--

CREATE TABLE `ragistration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `age` int(3) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ragistration`
--

INSERT INTO `ragistration` (`id`, `firstname`, `lastname`, `email`, `gender`, `age`, `phonenumber`, `password`, `confirmpassword`) VALUES
(9, 'krunal', 'vaghasiya', 'vaghasiyakrunal117@gmail.com', 'm', 20, 9979303515, 'krusha@1411', 'krusha@1411'),
(10, 'ronak', 'hapani', 'hapanironak117@gmail.com', 'm', 20, 9979303515, 'dimp', 'dimp'),
(15, 'krunal', 'vaghasiya', 'admin@gmail.com', '', 20, 9979303515, 'krusha@1411', 'krusha@1411'),
(18, 'keval', 'sondigra', 'keval@gmail.com', 'm', 234, 9979303515, 'keval@!32', 'keval@!32'),
(20, 'kushal', 'kalsariya', 'kalsariya@gmail.com', 'm', 20, 9979303515, 'kushal@123', 'kushal@123'),
(21, 'sanjay', 'vaghasiya', 'sv97237@gmail.com', 'm', 30, 9723797828, 'sanjay@12', 'sanjay@12');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `tabelnumber` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `bookingdate` date NOT NULL,
  `bookingtime` time NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `mobilenumber`, `tabelnumber`, `person`, `bookingdate`, `bookingtime`, `request`) VALUES
(1, 'krunal', 'vaghasiyakrunal117@gmail.com', '09979303515', 1, 2, '2024-08-30', '21:00:00', 'noting to say'),
(4, 'krunal', 'vaghasiyakrunal117@gmail.com', '09979303515', 2, 4, '2024-09-13', '19:46:00', 'book my tabel i weel give more money'),
(5, 'krunal', 'vaghasiyakrunal117@gmail.com', '09979303515', 2, 3, '2024-09-26', '18:03:00', 'not special');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ragistration`
--
ALTER TABLE `ragistration`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `ragistration` ADD FULLTEXT KEY `confirmpassword` (`confirmpassword`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ragistration`
--
ALTER TABLE `ragistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
