-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 07:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `name`, `email`, `password`) VALUES
(1, 'admin 01', 'tina', 'tina@gmail.com', '1234567890'),
(2, 'Admin 02', 'Fredrick', 'fred@gmail.com', '1qa2ws3ed');

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `user_id`, `code`) VALUES
(1, '368987679', '1615162263'),
(2, '241478663', '785494895'),
(3, '53987833', '181462557'),
(4, '138041216', '1415655792');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `d_o_g` varchar(255) NOT NULL,
  `from_goods` varchar(255) NOT NULL,
  `to_goods` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `d_o_g`, `from_goods`, `to_goods`, `number`, `code`, `driver`) VALUES
(169, 'Festo', 'f@gmail.com', 'kinondoni', 'Tv', 'kaliakoo', 'tegeta', '0756789032', 'none', '241478663'),
(212, 'fred', 'fred@gmail.com', 'tabata', 'document', 'mwa', 'dar', '0712345678', 'seen', '241478663');

-- --------------------------------------------------------

--
-- Table structure for table `seen`
--

CREATE TABLE `seen` (
  `id` int(255) NOT NULL,
  `descripty` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `driver_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seen`
--

INSERT INTO `seen` (`id`, `descripty`, `code`, `driver_id`) VALUES
(1, 'document', '569001', '241478663'),
(2, 'document', '569001', '241478663'),
(3, 'document', '569001', 'Driver'),
(4, 'Tv', '123455', '241478663'),
(5, 'Tv', '123455', '241478663'),
(6, 'Tv', 'none', '241478663'),
(7, 'document', 'seen', '138041216'),
(8, 'document', 'seen', '241478663');

-- --------------------------------------------------------

--
-- Table structure for table `shippment`
--

CREATE TABLE `shippment` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `d_o_g` varchar(255) NOT NULL,
  `from_goods` varchar(255) NOT NULL,
  `to_goods` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippment`
--

INSERT INTO `shippment` (`id`, `name`, `email`, `address`, `d_o_g`, `from_goods`, `to_goods`, `number`, `code`) VALUES
(10, 'Festo', 'f@gmail.com', 'kinondoni', 'Tv', 'kaliakoo', 'tegeta', '0756789032', 'none'),
(11, 'fred', 'fred@gmail.com', 'tabata', 'document', 'mwa', 'dar', '0712345678', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `number`, `password`, `profile_img`, `status`) VALUES
(1, '344700439', 'Jgwara284', 'Jgwara284@gmail.com', '0712345678', '1234567890', '16865071752pac.jpg', 'User'),
(6, '736538712', 'EmerChriss', 'EmerChriss@gmail.com', '0754123456', 'EmerChriss', '168645715510.jpg', 'User'),
(8, '222492641', 'Festo', 'f@gmail.com', '0756789032', '1234567890', '1686550609255688181686_status_349d6967c2354d1c875a006265abeec5.jpg', 'User'),
(10, '1304103679', 'fred', 'fred@gmail.com', '0712345678', '123456789', '16865885156.jpg', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `user_id`, `name`, `email`, `number`, `password`, `profile_img`) VALUES
(1, '331724986', 'Jgwara284', 'Jgwara284@gmail.com', '0712345678', '1qa2ws3ed', '1686387406nike (6).PNG'),
(11, '368987679', 'Jgwara284', 'Jgwara284@gmail.com', '0683213456', '1qa2ws3ed', '1686387406nike (6)'),
(12, '241478663', 'Respicious', 'J@gmail.com', '0623123451', 'Respicious', '16864196632pac.jpg'),
(13, '53987833', 'AYB', 'Ayub@gmail.com', '0712345678', '1qaz2wsx3edc', '16865068876.jpg'),
(14, '138041216', 'juma', 'j@gmail.com', '0687654321', 'zxcvbnml', '16865881822pac.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seen`
--
ALTER TABLE `seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippment`
--
ALTER TABLE `shippment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `seen`
--
ALTER TABLE `seen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shippment`
--
ALTER TABLE `shippment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
