-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 07:08 AM
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
-- Database: `taytaytiangge`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userId` int(11) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `loginTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userId`, `emailAddress`, `password`, `loginTime`) VALUES
(1, 'juansample@gmail.com', 'Juan123', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', 'Juan123', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00'),
(1, 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orderstb`
--

CREATE TABLE `orderstb` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `deliveryAddress` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderstb`
--

INSERT INTO `orderstb` (`orderId`, `productId`, `userId`, `buyerName`, `productName`, `quantity`, `totalPrice`, `deliveryAddress`, `status`) VALUES
(1, 1, 1, 'Juan Dela Cruz', 'Payong', 1, 189, 'Quezon City', 'completed'),
(2, 1, 1, 'Juan Dela Cruz', 'Payong', 1, 142, 'Quezon City', 'To ship'),
(3, 1, 1, 'Juan Dela Cruz', 'Payong', 1, 142, 'Quezon City', 'To ship');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_sale` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `sellerId`, `product_name`, `product_price`, `product_sale`, `product_stock`, `product_image`) VALUES
(1, 1, 'Payong', 142, 14, 64, 0x75706c6f6164732f7061796f6e676269672e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userId`, `firstName`, `lastName`, `username`, `emailAddress`, `password`, `dateCreated`) VALUES
(1, 'Juan', 'Dela Cruz', 'Juan1', 'juansample@gmail.com', '$2y$10$EmRJd4OlgvrLECFEExhZeesuUmZSR1ZHbu7TuDFH3e6.Iu148B4ym', '2024-07-07'),
(2, 'Maria', 'Clara', 'Maria2', 'maria@gmail.com', '$2y$10$rjLrCXEJ2MzpI9BhEhzrWuYvL5UPvUgZ7YfObzK7dA6zmwdIKL752', '2024-07-07'),
(3, 'Jose', 'RIzal', 'Jose1', 'jose@gmail.com', '$2y$10$PWOpOTrNkE4hkW2lONXRf.nobeX4G2PcCh5.5.dX.uOVj6ctx2mfS', '2024-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `sellerdetails`
--

CREATE TABLE `sellerdetails` (
  `sellerId` int(11) NOT NULL,
  `businessName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `ownerName` varchar(100) NOT NULL,
  `ownerEmail` varchar(255) NOT NULL,
  `ownerPhoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellerdetails`
--

INSERT INTO `sellerdetails` (`sellerId`, `businessName`, `email`, `phoneNumber`, `facebook`, `ownerName`, `ownerEmail`, `ownerPhoneNumber`) VALUES
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789'),
(1, '<?php echo htmlspecialchars($businessName); ?>', '<?php echo htmlspecialchars($email); ?>', '<?php echo htmlspeci', '<?php echo htmlspecialchars($facebook); ?>', '<?php echo htmlspecialchars($ownerName); ?>', '<?php echo htmlspecialchars($ownerEmail); ?>', '<?php echo htmlspeci'),
(1, 'asdasdasd', 'asdasdas', 'asdasd', 'asdasd', 'asdasdas', 'asdasd', 'asdasd'),
(1, 'werwerwerwer', 'wrwerwerwer', 'wrwerwer', 'werwerwerwer', 'wqerwerwe', 'werwerwe', 'werwerwer'),
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', 'Ligaya Clothing', 'Juan Dela Cruz', 'juandelacruz@gmail.com', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `sellerlogin`
--

CREATE TABLE `sellerlogin` (
  `sellerId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellerlogin`
--

INSERT INTO `sellerlogin` (`sellerId`, `email`, `password`) VALUES
(1, 'ligayaclothing@gmail.com', '$2y$10$FhBn3j00J.LWmbWh3fMx..Wk7lEGTRAQ81orZEJ2l3PIbbfRg92xC'),
(1, 'ligayaclothing@gmail.com', '$2y$10$FhBn3j00J.LWmbWh3fMx..Wk7lEGTRAQ81orZEJ2l3PIbbfRg92xC'),
(1, 'ligayaclothing@gmail.com', '$2y$10$FhBn3j00J.LWmbWh3fMx..Wk7lEGTRAQ81orZEJ2l3PIbbfRg92xC');

-- --------------------------------------------------------

--
-- Table structure for table `sellerregistration`
--

CREATE TABLE `sellerregistration` (
  `sellerId` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellerregistration`
--

INSERT INTO `sellerregistration` (`sellerId`, `business_name`, `email`, `phone_number`, `password`) VALUES
(1, 'Ligaya Model Clothing', 'ligayaclothing@gmail.com', '09123456789', '$2y$10$FhBn3j00J.LWmbWh3fMx..Wk7lEGTRAQ81orZEJ2l3PIbbfRg92xC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orderstb`
--
ALTER TABLE `orderstb`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `productId` (`productId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `sellerdetails`
--
ALTER TABLE `sellerdetails`
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `sellerlogin`
--
ALTER TABLE `sellerlogin`
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `sellerregistration`
--
ALTER TABLE `sellerregistration`
  ADD PRIMARY KEY (`sellerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderstb`
--
ALTER TABLE `orderstb`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellerregistration`
--
ALTER TABLE `sellerregistration`
  MODIFY `sellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `registration` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderstb`
--
ALTER TABLE `orderstb`
  ADD CONSTRAINT `orderstb_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderstb_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `login` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellerdetails`
--
ALTER TABLE `sellerdetails`
  ADD CONSTRAINT `sellerdetails_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `sellerlogin` (`sellerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellerlogin`
--
ALTER TABLE `sellerlogin`
  ADD CONSTRAINT `sellerlogin_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `sellerregistration` (`sellerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
