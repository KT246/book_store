-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2024 at 05:42 AM
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
  `type` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`id_book`, `name_book`, `qty`, `price`, `image`, `describes`, `type`, `status`) VALUES
(10, 'Math Book ', 10, 500, 'https://m.media-amazon.com/images/I/91BhWx8qMQL._AC_UF1000,1000_QL80_.jpg', 'This is a great book for developers.\r\nbut are you ok chứ , no i\'m ok i\'m fire thank you and you', 'math', 1),
(11, 'One piec book', 15, 600, 'https://m.media-amazon.com/images/I/915MMiqLEcL._AC_UF1000,1000_QL80_.jpg', 'This book is a must-read for all developers.', 'cartoon', 1),
(12, 'PHP beginer', 20, 300, 'https://media.springernature.com/full/springer-static/cover-hires/book/978-1-4302-6814-7', 'This is a fun and engaging animated book.', 'developer', 1),
(13, 'Doraemon book', 25, 350, 'https://m.media-amazon.com/images/I/51sgwXH1JxL._AC_UF1000,1000_QL80_.jpg', 'Kids will love this animated book.', 'cartoon', 1);

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
