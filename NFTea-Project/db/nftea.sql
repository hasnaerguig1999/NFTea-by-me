-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 04:58 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nftea`
--

-- --------------------------------------------------------

--
-- Table structure for table `nft`
--

CREATE TABLE `nft` (
  `ID` int(11) NOT NULL,
  `NFT__name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `NFT__description` text DEFAULT NULL,
  `NFT__IMG` text NOT NULL,
  `Collection__ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nft`
--

INSERT INTO `nft` (`ID`, `NFT__name`, `price`, `NFT__description`, `NFT__IMG`, `Collection__ID`) VALUES
(1, 'faergeagaerg', 200, 'eghtzeathehaeh', 'monkey-4.jpg', NULL),
(2, 'zfergzregzerg', 1213, 'zeafzergtzetar', 'monkey.jpg', 22),
(3, 'verveqrvqe', 1234, 'zefgaergaerh', 'cat-2.jpg', 23);

-- --------------------------------------------------------

--
-- Table structure for table `nft__collection`
--

CREATE TABLE `nft__collection` (
  `ID` int(11) NOT NULL,
  `collection__name` varchar(255) NOT NULL,
  `Collection__description` text NOT NULL,
  `collection__img` text NOT NULL,
  `artist__ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nft__collection`
--

INSERT INTO `nft__collection` (`ID`, `collection__name`, `Collection__description`, `collection__img`, `artist__ID`) VALUES
(22, 'hey', 'zgtgzrhtzr', 'monkey-4.jpg', 8),
(23, 'me', 'aergzergzeg', 'cat-2.jpg', 8),
(24, 'ana', 'greaghaerh', 'monkey-2.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user__password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_name`, `user__password`) VALUES
(8, 'hamza', 'hamza2002'),
(9, 'hasna', 'hasna2000'),
(11, 'haaamza', 'hamza2002'),
(12, 'cqscs', 'sqccqercv'),
(14, 'youcode', 'youcode2018'),
(15, 'youcode1', 'hamza'),
(16, 'account', 'account'),
(17, 'abdelrahmane', 'codecode'),
(18, 'tobana', 'tobana'),
(19, 'kamal', 'kamal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nft`
--
ALTER TABLE `nft`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NFT__name` (`NFT__name`),
  ADD UNIQUE KEY `NFT__IMG` (`NFT__IMG`) USING HASH,
  ADD KEY `Collection__ID` (`Collection__ID`);

--
-- Indexes for table `nft__collection`
--
ALTER TABLE `nft__collection`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `collection__name` (`collection__name`),
  ADD KEY `artist__ID` (`artist__ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nft`
--
ALTER TABLE `nft`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nft__collection`
--
ALTER TABLE `nft__collection`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nft`
--
ALTER TABLE `nft`
  ADD CONSTRAINT `nft_ibfk_1` FOREIGN KEY (`Collection__ID`) REFERENCES `nft__collection` (`ID`);

--
-- Constraints for table `nft__collection`
--
ALTER TABLE `nft__collection`
  ADD CONSTRAINT `nft__collection_ibfk_1` FOREIGN KEY (`artist__ID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
