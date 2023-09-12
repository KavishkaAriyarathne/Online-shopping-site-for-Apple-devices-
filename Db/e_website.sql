-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 02:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `totalCost` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `finished` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `userId`, `pid`, `totalCost`, `quantity`, `finished`) VALUES
(14, 2, 16, 28000, 2, 1),
(15, 2, 18, 200000, 2, 1),
(17, 2, 15, 140000, 1, 1),
(18, 2, 18, 100000, 1, 1),
(19, 2, 17, 480000, 2, 1),
(20, 2, 18, 200000, 2, 1),
(21, 2, 16, 70000, 5, 1),
(24, 2, 15, 280000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `ord_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `dilivery_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`ord_id`, `userID`, `order_date`, `dilivery_status`) VALUES
(1, 4, '2022-12-26 08:59:01', 'Shipped'),
(2, 4, '2022-12-26 09:01:17', 'Shipped'),
(3, 4, '2022-12-26 09:16:26', 'Shipped'),
(4, 4, '2022-12-26 09:16:32', 'Shipped'),
(5, 4, '2022-12-26 09:16:40', 'Shipped'),
(6, 4, '2022-12-26 09:18:52', 'Shipped'),
(7, 4, '2022-12-26 09:19:26', 'Shipped'),
(9, 6, '2022-12-28 01:25:37', 'Shipped'),
(10, 6, '2022-12-28 01:26:54', 'Shipped'),
(11, 6, '2022-12-28 01:43:05', 'Shipped'),
(12, 6, '2022-12-28 02:11:02', 'Shipped'),
(13, 6, '2022-12-28 02:12:56', 'Shipped'),
(14, 6, '2022-12-28 02:23:53', 'Shipped'),
(15, 6, '2022-12-28 02:26:38', 'Shipped'),
(16, 6, '2022-12-28 02:27:34', 'Shipped'),
(17, 6, '2022-12-28 02:28:08', 'Shipped'),
(18, 6, '2022-12-28 02:30:19', 'Shipped'),
(19, 6, '2022-12-28 02:31:21', 'Shipped'),
(20, 6, '2022-12-28 02:31:41', 'Shipped'),
(21, 6, '2022-12-28 02:32:32', 'Shipped'),
(22, 6, '2022-12-28 02:33:36', 'Shipped'),
(23, 6, '2022-12-28 02:34:51', 'Shipped'),
(25, 2, '2022-12-28 09:40:45', 'Shipped'),
(26, 2, '2022-12-28 09:41:25', 'Shipped'),
(27, 2, '2022-12-28 09:41:48', 'Shipped'),
(28, 2, '2022-12-28 09:43:30', 'Shipped'),
(29, 2, '2022-12-28 09:47:09', 'Shipped'),
(30, 2, '2022-12-28 10:26:03', 'Shipped'),
(31, 2, '2022-12-28 10:33:20', 'Shipped'),
(32, 2, '2022-12-29 01:13:22', 'Shipped'),
(33, 2, '2022-12-29 01:14:02', 'Shipped'),
(34, 2, '2022-12-29 01:14:43', 'Shipped'),
(35, 2, '2022-12-29 01:14:53', 'Shipped'),
(36, 2, '2022-12-29 01:21:02', 'Shipped'),
(37, 2, '2022-12-29 01:26:28', 'Shipped'),
(38, 2, '2022-12-29 01:28:42', 'Shipped'),
(39, 2, '2022-12-29 02:05:00', 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `nameOnCard` varchar(255) NOT NULL,
  `cardNumber` int(16) NOT NULL,
  `expMonth` varchar(50) NOT NULL,
  `expYear` year(4) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`id`, `userID`, `name`, `email`, `address`, `city`, `state`, `zip`, `nameOnCard`, `cardNumber`, `expMonth`, `expYear`, `cvv`) VALUES
(4, 6, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'ghffk', '45444', 'vgnhg', 2147483647, 'March', 2022, 544),
(5, 2, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'ghffk', '45444', 'vgnhg', 2147483647, 'April', 2023, 587),
(6, 2, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'vhgh', '45444', 'vgnhg', 2147483647, 'June', 2025, 456),
(7, 2, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'ghffk', '45444', 'vgnhg', 2147483647, 'July', 2026, 456),
(8, 2, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'ghffk', '45444', 'vgnhg', 2147483647, 'cxfvd', 2025, 456),
(9, 2, 'gnhgj', 'abcd@gmail.com', '123e235545', 'hjghjgh', 'fgyf', '1234', 'gbgcfdg', 2147483647, 'March', 2025, 123),
(10, 2, 'gnhgj', 'abcd@gmail.com', '123e235545', 'hjghjgh', 'vhgh', '1234', 'vgnhg', 2147483647, 'april', 2024, 123),
(11, 2, 'gnhgj', 'abcd@gmail.com', '123e235545', 'hjghjgh', 'ghffk', '1234', 'vgnhg', 2147483647, 'march', 2020, 123),
(12, 2, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'dftgd', '45444', '', 2147483647, 'april', 2021, 123),
(13, 2, 'hgg', 'kafilo8439@vysolar.com', 'hgghghgmg', 'hu,ghug', 'ghffk', '45444', 'vgnhg', 2147483647, 'june', 2019, 456);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `productTypeID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `productTypeID`, `name`, `details`, `price`, `quantity`, `stock`, `image`) VALUES
(15, 1, 'Iphone 14', 'vbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht\r\nvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht\r\nvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht', 140000, 8, '', 'Apple-iPhone-14-Pro-Max.jpg'),
(16, 2, 'Air Pod Pro', 'vbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht\r\nvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht', 14000, 0, '', 'Airpods-Pro.jpg'),
(17, 3, 'Mac Book Pro', 'vbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht\r\nvbfgdrfwahfjesiewgwewmkjhtvbfgdrfwahfjesiewgwewmkjht\r\nvbfgdrfwahfjesiewgwewmkjht', 240000, 15, '', 'Mac-Book-Pro.jpg'),
(18, 4, 'apple-watch', 'sfsbhbdamdnhgdabsmnsdjegaws dmzsb sfsbhbdamdnhgdabsmnsdjegaws dmzsb sfsbhbdamdnhgdabsmnsdjegaws dmzsb\r\nsfsbhbdamdnhgdabsmnsdjegaws dmzsb sfsbhbdamdnhgdabsmnsdjegaws dmzsb', 100000, 14, '', 'apple-watch.png'),
(19, 7, 'Ipad pro', 'szfcsdshnsrfjms szfcsdshnsrfjms szfcsdshnsrfjmsszfcsdshnsrfjms szfcsdshnsrfjms\r\nszfcsdshnsrfjms szfcsdshnsrfjms', 150000, 8, '', 'applelogo.jpeg'),
(20, 1, 'Iphone 12', 'szfcsdshnsrfjmsszfcsdshnsrfjmsszfcsdshnsrfjmsszfcsdshnsrfjms szfcsdshnsrfjmsszfcsdshnsrfjmsszfcsdshnsrfjmsszfcsdshnsrfjmsszfcsdshnsrfjmsszfcsdshnsrfjms szfcsdshnsrfjms', 210000, 5, '', 'apple_iphone-12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `type`) VALUES
(1, 'Phone'),
(2, 'AirPode'),
(3, 'Laptop'),
(4, 'Watch'),
(5, 'Tablet'),
(6, 'MacBook'),
(7, 'Ipad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `nic`, `address`, `dob`, `gender`, `phone`, `email`, `password`, `userType`) VALUES
(1, 'admin', 'panel', 'admin-Id', 'Katugasthota', '2022-10-10', 'Male', '07756234523', 'admin@gmail.com', 'admin@Astore', 'admin'),
(2, 'Kavishka', 'Dilshan', '200040603103', 'Katugasthota', '2022-09-28', 'Male', '07756234552', 'kavishka12@gamil.com', '1234', 'cus'),
(4, 'Sehan', 'Fernando', '200020803103', 'Galagedara', '2022-10-02', 'Female', '07756234523', 'sehan@gmail.com', 'sehan$23', 'cus'),
(6, 'Gihan', 'Mangala', '992682224v', 'Matale', '2022-10-13', 'Male', '0715674522', 'Gihan23@gmail.com', '1234', 'cus'),
(7, 'Sehan', 'Fernando', '992222884v', 'Galagedara', '2022-10-11', 'Male', '0715634532', 'Sehanmax@gmail.com', 'sehan', 'cus'),
(8, 'Binuka', 'Lakshan', '20007869567', 'Gampaha', '2022-11-30', 'Male', '0715674544', 'binuka@gmail.com', '1212', 'cus'),
(9, 'Pramodya', 'Shehan', '992222124v', 'Narampanawa', '2022-11-07', 'Male', '0715674532', 'abc@gmail.com', '5656', 'cus'),
(10, 'Binuka', 'Lakshan', '992682884v', 'Gampaha', '2022-11-03', 'Male', '0715674522', 'binuka@gmail.com', '123', 'cus'),
(11, 'Binuka', 'Lakshan', '20007869567', 'Gampaha', '2022-11-21', 'Male', '0715674522', 'binuka@gmail.com', '123', 'cus'),
(12, 'kumara', 'silva', '992682765v', 'kurunagala', '2022-11-27', 'Male', '0772354123', 'abcde@gmail.com', '1234', 'cus'),
(13, 'anjana', 'umendra', '992222884v', 'kandy', '2022-12-05', 'Male', '0715634532', 'anjana@gmail.com', '123', 'cus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `productTypeID` (`productTypeID`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD CONSTRAINT `paymentdetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productTypeID`) REFERENCES `producttype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
