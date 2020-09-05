-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 10:04 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offerID` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` varchar(25) NOT NULL,
  `transID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerID`, `description`, `price`, `status`, `transID`, `userID`) VALUES
(1, 'Plain cyan shirt, cotton', '60000', 'Unselected', 1, 1),
(2, '1 year use, good condition', '1500000', 'Selected', 2, 1),
(3, 'Brand new panasonic microwave', '500000', 'Active', 3, 1),
(4, 'Plain shirt, cotton', '45000', 'Selected', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `minbudget` decimal(10,0) NOT NULL,
  `maxbudget` decimal(10,0) NOT NULL,
  `status` varchar(25) NOT NULL,
  `userID` int(11) NOT NULL,
  `selectedOffer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transID`, `name`, `category`, `description`, `minbudget`, `maxbudget`, `status`, `userID`, `selectedOffer`) VALUES
(1, 'Plain Shirt', 'Fashion', 'Plain shirt, any color, size M', '50000', '80000', 'Done', 6, 0),
(2, 'XBOX', 'Gadget', 'Any XBOX in good condition', '1500000', '2500000', 'Done', 6, 0),
(3, 'Microwave', 'Appliances', 'Any microwave in good condition', '400000', '600000', 'Active', 6, 0),
(4, 'Abstract Painting', 'Art', 'Any abstract painting, size 50x50', '500000', '2000000', 'Active', 6, 0),
(5, 'Small Block Chevy Head', 'Other', 'Valve Sizes : 2.02/1.60\r\nIntake Port : 180cc\r\nChamber : 64cc\r\nValvesprings : 1.250-inch single spring', '9000000', '11000000', 'Active', 6, 0),
(6, 'Racing Helmet', 'Other', 'Meet snell standard', '4000000', '6000000', 'Active', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `phoneNumber`) VALUES
(1, 'dziem', '123', 'dziem@email.com', '+62812345678900'),
(6, 'dude', 'qwe', 'dude@email.com', '+62809876543211'),
(7, 'james', 'james', 'james@email.com', '+6281234543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offerID`),
  ADD KEY `transID` (`transID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`transID`) REFERENCES `transaction` (`transID`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
