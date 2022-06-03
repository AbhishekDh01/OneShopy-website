-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2022 at 12:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1
-- Name your database as oneshopy_project otherwise your have to change each mysql query

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `avails`
--

CREATE TABLE `avails` (
  `serId` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `availed_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `added_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` char(20) NOT NULL,
  `email` char(30) NOT NULL,
  `contactNo` bigint(10) NOT NULL,
  `cid` int(11) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `contactNo`, `cid`, `pass`) VALUES
('Customer1', 'customer1@gmail.com', 9876543210, 41, '1c92c8e905686e222359909f861fd499'),
('Anita', 'snita@gmail.com', 1234567890, 42, '0ce922433d771bfa4a5dfd6b4c8fe48e'),
('Abhinav Dhiman', 'Ashu@gmail.com', 8218460980, 43, 'fa4d1d1cdc535c796fa84a818cc6df7e'),
('Abhishek', 'temp1@gmail.com', 3535234, 49, '1c92c8e905686e222359909f861fd499');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `cid` int(11) NOT NULL,
  `pri_add` char(100) DEFAULT NULL,
  `home_add` char(100) DEFAULT NULL,
  `work_add` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`cid`, `pri_add`, `home_add`, `work_add`) VALUES
(41, 'Pune', 'Rv/300', ''),
(42, 'Hssjjs', 'Sjsksjs', 'Ndkdkdn'),
(43, 'ROOP VIHAR COLONY NAWADA ROAD SAHARANPUR', '', ''),
(49, 'ROOP VIHAR COLONY NAWADA ROAD SAHARANPUR', 'Uttar Pradesh', '247004');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `shopId` int(11) NOT NULL,
  `productName` char(20) NOT NULL,
  `productCategory` char(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) DEFAULT NULL,
  `img3` varchar(100) DEFAULT NULL,
  `info` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`shopId`, `productName`, `productCategory`, `pid`, `price`, `img1`, `img2`, `img3`, `info`) VALUES
(13, 'Electrical Fan', 'Electrical', 21, 1200, '2.jpg', '', '', 'Bajaj 100w fan 5 star rating'),
(14, 'Akash Tv', 'Electrical', 24, 22000, 'tc.jpg', 'tv.jpg', '', '4 star Tv by akash'),
(15, 'Shirts', 'Garments', 26, 300, 'pro.jpg', 't3.jpg', '', 'Red shirt size Xl '),
(15, 'Black Bag', 'Garments', 27, 1000, 'b5.jpg', '', '', 'it is a very rich bag'),
(13, 'Table Lamp', 'Electrical', 51, 200, 'img8.jpg', '', '', 'Blue color beautiful lamp'),
(13, 'Tube light', 'Electrical', 52, 150, 'img5.jpg', '', '', 'Hand carry Tube light'),
(13, 'Blubs', 'Electrical', 53, 800, 'img7.jpg', '', '', '10 watt blub set of 10');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `name` char(20) NOT NULL,
  `email` char(30) NOT NULL,
  `contactNO` bigint(20) NOT NULL,
  `sid` int(11) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `balance` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`name`, `email`, `contactNO`, `sid`, `pass`, `balance`) VALUES
('test1', 'test1@gmail.com', 234235, 5, '1c92c8e905686e222359909f861fd499', 0),
('Abhishek', 'abhiclass01@gmail.com', 9876543210, 8, '1c92c8e905686e222359909f861fd499', 138000),
('Aakash', 'Akash@gmail.com', 8218460980, 9, '1c92c8e905686e222359909f861fd499', 7200),
('Test2', 'test2@gmail.com', 4546, 10, '1c92c8e905686e222359909f861fd499', 0),
('temp1', 'temp1@gmail.com', 8218460989, 11, '1c92c8e905686e222359909f861fd499', 0),
('seller1', 'seller1@gmail.com', 8218460999, 12, '1c92c8e905686e222359909f861fd499', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `shopId` int(11) NOT NULL,
  `serName` char(30) NOT NULL,
  `serId` int(11) NOT NULL,
  `category` char(20) NOT NULL,
  `baseCharge` int(11) NOT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `img2` varchar(200) DEFAULT NULL,
  `info` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`shopId`, `serName`, `serId`, `category`, `baseCharge`, `img1`, `img2`, `info`) VALUES
(13, 'Light blub repair', 7, 'Electrical', 300, '3.jpg', '', 'We repair light blubs');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ownerSid` int(11) NOT NULL,
  `shopName` char(30) NOT NULL,
  `shopCategory` char(20) NOT NULL,
  `shopInfo` char(200) DEFAULT NULL,
  `shopId` int(11) NOT NULL,
  `shopAddress` char(50) NOT NULL,
  `shopEmail` char(30) NOT NULL,
  `shopContact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ownerSid`, `shopName`, `shopCategory`, `shopInfo`, `shopId`, `shopAddress`, `shopEmail`, `shopContact`) VALUES
(8, 'Abhi Electricals', 'Electrical', 'We sell various electrical items at very low costs', 13, 'Roop Vihar Colony Nawada Road', 'abhiclass01@gmail.com', 9876543210),
(8, 'Akash Electrical', 'Electrical', 'This shop is all about Electrical', 14, 'Pune, MH', 'akash5u@gmail.com', 8765432190),
(9, 'Akash Garments', 'Garments', 'We sell various cloth items', 15, 'Pune, MH', 'akash5u@gmail.com', 8218460890);

-- --------------------------------------------------------

--
-- Table structure for table `shopimage`
--

CREATE TABLE `shopimage` (
  `shopId` int(11) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `img5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopimage`
--

INSERT INTO `shopimage` (`shopId`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(13, 'eletrical.jpg', NULL, NULL, NULL, NULL),
(14, 'images.jpg', NULL, NULL, NULL, NULL),
(15, 'garment.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `shopName` varchar(200) NOT NULL,
  `proName` varchar(200) NOT NULL,
  `trans_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sid`, `pid`, `cid`, `shopName`, `proName`, `trans_time`, `price`) VALUES
(8, 21, 49, 'Abhi Electricals', 'Electrical Fan', '2022-05-22 21:56:37', 1200),
(8, 21, 49, 'Abhi Electricals', 'Electrical Fan', '2022-05-22 22:04:43', 1200),
(9, 26, 49, 'Akash Garments', 'Shirts', '2022-05-22 22:06:20', 300),
(8, 24, 49, 'Akash Electrical', 'Akash Tv', '2022-05-22 22:07:53', 22000),
(8, 21, 49, 'Abhi Electricals', 'Electrical Fan', '2022-05-22 22:07:53', 1200),
(9, 27, 49, 'Akash Garments', 'Black Bag', '2022-05-23 21:12:33', 1000),
(9, 27, 49, 'Akash Garments', 'Black Bag', '2022-05-28 21:42:53', 1000),
(9, 26, 49, 'Akash Garments', 'Shirts', '2022-05-28 21:57:08', 300),
(8, 24, 49, 'Akash Electrical', 'Akash Tv', '2022-05-28 21:57:51', 22000),
(9, 27, 49, 'Akash Garments', 'Black Bag', '2022-05-28 21:57:51', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avails`
--
ALTER TABLE `avails`
  ADD PRIMARY KEY (`serId`,`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_no` (`contactNo`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `shopId` (`shopId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_no` (`contactNO`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serId`),
  ADD KEY `shopId` (`shopId`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shopId`),
  ADD KEY `ownerSid` (`ownerSid`);

--
-- Indexes for table `shopimage`
--
ALTER TABLE `shopimage`
  ADD PRIMARY KEY (`shopId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `pid` (`pid`),
  ADD KEY `sid` (`sid`,`pid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shopId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avails`
--
ALTER TABLE `avails`
  ADD CONSTRAINT `avails_ibfk_1` FOREIGN KEY (`serId`) REFERENCES `service` (`serId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avails_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`ownerSid`) REFERENCES `seller` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopimage`
--
ALTER TABLE `shopimage`
  ADD CONSTRAINT `shopimage_ibfk_1` FOREIGN KEY (`shopId`) REFERENCES `shop` (`shopId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `seller` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
