-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2022 at 10:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwpprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `CustomerOrder`
--

CREATE TABLE `CustomerOrder` (
  `OrderID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `OrderPrice` int(11) NOT NULL,
  `OrderAmount` int(200) NOT NULL,
  `OrderAddress` varchar(500) NOT NULL,
  `OrderDate` date NOT NULL,
  `shippingfee` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CustomerOrder`
--

INSERT INTO `CustomerOrder` (`OrderID`, `OrderPrice`, `OrderAmount`, `OrderAddress`, `OrderDate`, `shippingfee`, `total`) VALUES
(0000000001, 5000, 1, 'Jakarta Barat', '2022-04-28', 0, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PaymentID` int(11) NOT NULL,
  `PaymentMethod` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`PaymentID`, `PaymentMethod`) VALUES
(1, 'Bank Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idproduct` char(10) NOT NULL,
  `CategoriesID` char(20) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productdescription` varchar(1000) DEFAULT NULL,
  `productprice` int(11) NOT NULL,
  `productphoto` varchar(255) DEFAULT NULL,
  `proquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idproduct`, `CategoriesID`, `productname`, `productdescription`, `productprice`, `productphoto`, `proquantity`) VALUES
('Card001', 'CatProd2', 'Glossy Laminating Card', NULL, 2000, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ProductCategories`
--

CREATE TABLE `ProductCategories` (
  `CategoriesID` char(20) NOT NULL,
  `CategoriesName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ProductCategories`
--

INSERT INTO `ProductCategories` (`CategoriesID`, `CategoriesName`) VALUES
('CatProd01', 'Sticker'),
('CatProd03', 'Tes'),
('CatProd2', 'Card');

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `TransactionID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `userid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `idproduct` char(10) NOT NULL,
  `OrderID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `StatusID` char(5) NOT NULL,
  `TransactionDate` date NOT NULL,
  `PaymentAmount` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentProof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Transaction`
--

INSERT INTO `Transaction` (`TransactionID`, `userid`, `idproduct`, `OrderID`, `PaymentID`, `StatusID`, `TransactionDate`, `PaymentAmount`, `PaymentDate`, `PaymentProof`) VALUES
(0000000001, 0000000005, 'Card001', 0000000001, 1, 'St004', '2022-04-28', 5000, '2022-04-28', ''),
(0000000002, 0000000005, 'Card001', 0000000001, 1, 'St006', '2022-04-27', 10000, '2022-04-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `TransactionStatus`
--

CREATE TABLE `TransactionStatus` (
  `StatusID` char(5) NOT NULL,
  `TransStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TransactionStatus`
--

INSERT INTO `TransactionStatus` (`StatusID`, `TransStatus`) VALUES
('St001', 'Waiting for Payment'),
('St002', 'Payment Confirmation'),
('St003', 'Order on Progress'),
('St004', 'Order on Delivery'),
('St005', 'Order Complete'),
('St006', 'Order Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `profilepict` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `password`, `address`, `phonenumber`, `profilepict`, `role`) VALUES
(0000000004, 'kevin2', 'kevingabriel2@gmail.com', '$2y$10$idYwDBNzo8Hal5R93fM1LemWUnEhGZITCpyDFDqcknd8tfRoG2f5u', NULL, NULL, NULL, 'admin'),
(0000000005, 'jaya', 'jayajaya@gmail.com', '$2y$10$FLklabMnVn6DI8ADBaOneuQqbYWje9M1/tpLvRMQh37udd4C2fucG', 'jagaraksa', '08123456789', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD KEY `CategoriesID` (`CategoriesID`);

--
-- Indexes for table `ProductCategories`
--
ALTER TABLE `ProductCategories`
  ADD PRIMARY KEY (`CategoriesID`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `userid` (`userid`),
  ADD KEY `idproduct` (`idproduct`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `PaymentID` (`PaymentID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `TransactionStatus`
--
ALTER TABLE `TransactionStatus`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CustomerOrder`
--
ALTER TABLE `CustomerOrder`
  MODIFY `OrderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `TransactionID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoriesID`) REFERENCES `ProductCategories` (`CategoriesID`);

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `CustomerOrder` (`OrderID`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`PaymentID`) REFERENCES `Payment` (`PaymentID`),
  ADD CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`StatusID`) REFERENCES `TransactionStatus` (`StatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
