-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 09, 2020 at 02:35 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbackpack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `matkhau` varchar(40) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `quyen` int(2) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `matkhau`, `hoten`, `quyen`) VALUES
('thanhnguyen', '25f9e794323b453885f5181f1b624d0b', 'Thanh Nguyen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `balo`
--

DROP TABLE IF EXISTS `balo`;
CREATE TABLE IF NOT EXISTS `balo` (
  `mabalo` varchar(10) NOT NULL,
  `tenbalo` varchar(30) NOT NULL,
  `mota` text NOT NULL,
  `gia` int(50) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `maloai` varchar(10) NOT NULL,
  PRIMARY KEY (`mabalo`),
  KEY `maloai` (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balo`
--

INSERT INTO `balo` (`mabalo`, `tenbalo`, `mota`, `gia`, `hinh`, `maloai`) VALUES
('001-004', 'classic-X', '', 2990000, 'hs4.jpg', '001'),
('001-006', 'classicZ', '', 499000, 'hs6.jpg', '001'),
('001-01', 'classic', '', 1199000, 'bagsale1.jpg', '001'),
('001-02', 'smallz', '', 199000, 'bagsale2.jpg', '001'),
('001-03', 'mediumz', '', 299000, 'bagsale3', '001'),
('001-05', 'classicY', '', 590000, 'hs5.jpg', '001'),
('002-004', 'vintageX', '', 1999000, 'pl4.jpg', '002'),
('002-005', 'vintagey', '', 1199000, 'pl5.jpg', '002'),
('002-006', 'vintagez', '', 999000, 'pl6.jpg', '002'),
('002-01', 'smallp', '', 1999000, 'pl1.jpg', '002'),
('002-02', 'mediump', '', 1199000, 'pl2.jpg', '002'),
('003-01', 'smallh', '', 899000, 'hg1.jpg', '003'),
('003-02', 'mediumh', '', 799000, 'pl2.jpg', '003'),
('003-03', 'largeh', '', 599000, 'pl3.jpg', '003'),
('003-04', 'kidX', '', 899000, 'hg4.jpg', '003'),
('003-05', 'kidy', '', 799000, 'hg5.jpg', '003'),
('003-06', 'kidz', '', 599000, 'hg6.jpg', '003'),
('004-01', 'smallk', '', 1299000, 'kk1.jpg', '004'),
('004-02', 'mediumk', '', 999000, 'kk2.jpg', '004'),
('004-03', 'largek', '', 4999000, 'kk3.jpg', '004'),
('004-04', 'bluX', '', 1299000, 'kk4.jpg', '004'),
('004-05', 'bluy', '', 999000, 'kk5.jpg', '004'),
('004-06', 'bluz', '', 4999000, 'kk6.jpg', '004'),
('02-003', 'largep', '', 999000, 'pl3.jpg', '002');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(30) NOT NULL,
  `tenloai` varchar(30) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('001', 'HERCHEL'),
('002', 'PARDLAND'),
('003', 'HEDGREN'),
('004', 'KANKEN');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balo`
--
ALTER TABLE `balo`
  ADD CONSTRAINT `balo_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
