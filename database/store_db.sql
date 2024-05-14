-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2024 at 08:56 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

DROP TABLE IF EXISTS `tb_bill`;
CREATE TABLE IF NOT EXISTS `tb_bill` (
  `id_bill` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `date_create` date NOT NULL,
  `total` float NOT NULL,
  `pay` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_bill`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill_detail`
--

DROP TABLE IF EXISTS `tb_bill_detail`;
CREATE TABLE IF NOT EXISTS `tb_bill_detail` (
  `id_bill_detail` int NOT NULL AUTO_INCREMENT,
  `id_book` int NOT NULL,
  `id_bill` int NOT NULL,
  `qty` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_bill_detail`),
  KEY `id_bill` (`id_bill`),
  KEY `id_book` (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

DROP TABLE IF EXISTS `tb_book`;
CREATE TABLE IF NOT EXISTS `tb_book` (
  `id_book` int NOT NULL AUTO_INCREMENT,
  `name_book` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `qty` int NOT NULL,
  `price` float NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `describes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `phone`, `address`) VALUES
(1, 'khamtay', '1234567@', 'admin', '0833825469', 'Ký túc xá C2, trường Đại học Quy Nhơn');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD CONSTRAINT `tb_bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_bill_detail`
--
ALTER TABLE `tb_bill_detail`
  ADD CONSTRAINT `tb_bill_detail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `tb_bill` (`id_bill`),
  ADD CONSTRAINT `tb_bill_detail_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `tb_book` (`id_book`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
