-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 05:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sslog`
--

-- --------------------------------------------------------

--
-- Table structure for table `chungtuloaiphi`
--

CREATE TABLE `chungtuloaiphi` (
  `maChungTu` varchar(20) NOT NULL,
  `maLoaiPhi` varchar(20) NOT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chungtuloaiphi`
--

INSERT INTO `chungtuloaiphi` (`maChungTu`, `maLoaiPhi`, `gia`) VALUES
('Yen', 'BDF', NULL),
('Yen', 'Buy', NULL),
('Yen', 'CEF', NULL),
('Yen', 'Sales', NULL),
('Yen', 'TF', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaiphi`
--

CREATE TABLE `loaiphi` (
  `maLoaiPhi` varchar(20) NOT NULL,
  `tenloaiphi` varchar(200) NOT NULL,
  `hienthi` int(1) NOT NULL DEFAULT '0',
  `ghichu` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `thutu` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaiphi`
--

INSERT INTO `loaiphi` (`maLoaiPhi`, `tenloaiphi`, `hienthi`, `ghichu`, `thutu`) VALUES
('AEF', 'AMS/AFR/AFS/ENS Fee', 1, NULL, 4),
('AF', 'Air Freight', 1, NULL, 26),
('AmF', 'Amend Fee', 1, NULL, 9),
('BD', 'Phi boi duong', 1, NULL, 33),
('BDF', 'Bill/Documents fee', 1, NULL, 1),
('Buy', 'Gia Mua/Buy', 0, 'khong cho phep hien thi voi role1, role2', 42),
('BXC', 'Phi boc xep tai cang', 1, NULL, 21),
('BXK', 'Phi boc xep tai kho', 1, NULL, 25),
('C/O', 'C/O Fee', 1, NULL, 19),
('CD', 'Can doi', 1, NULL, 40),
('CEF', 'CIC/EBS/Xray Fee', 1, NULL, 3),
('CF', 'CFS/Luu kho/lao vu Fee', 1, NULL, 6),
('Com', 'Tien hoa hong', 0, NULL, 41),
('Cuoc', 'Phi Cuoc Cont', 1, NULL, 35),
('DCC', 'Phi dao chuyen cont', 1, NULL, 29),
('FF', 'Fumigation Fee', 1, NULL, 14),
('ForF', 'Forklifr Fee', 1, NULL, 18),
('GH1', 'Gia han lan 1', 1, NULL, 36),
('GH2', 'Gia han lan 2', 1, NULL, 37),
('HDL', 'Handling Fee', 1, NULL, 8),
('HQ', 'Le phi Hai Quan', 1, NULL, 31),
('IMO', 'IMO Fee', 1, NULL, 20),
('ISF', 'ISF Fee', 1, NULL, 10),
('KT', 'Khen Thuong', 1, NULL, 38),
('LSS', 'LSS Fee', 1, NULL, 11),
('Neo', 'Phi Neo xe', 1, NULL, 32),
('OF', 'Ocean Freight', 1, NULL, 22),
('OFF', 'Lift Off fee', 1, NULL, 13),
('ON', 'Lift On Fee', 1, NULL, 12),
('PAF', 'Phytosanitary/Animal Fee', 1, NULL, 15),
('PF', 'Packing Fee', 1, NULL, 17),
('PGD', 'Phi giam dinh', 1, NULL, 28),
('PK1', 'phi phat sinh khac 1', 1, NULL, 23),
('PK2', 'phi phat sinh khac 2', 1, NULL, 24),
('Sales', 'Gia Ban/Sales', 0, NULL, 43),
('SCT', 'Phi sua chung tu', 1, NULL, 34),
('SF', 'Seal Fee', 1, NULL, 5),
('TeF', 'Telex Fee', 1, NULL, 7),
('TesF', 'Test Fee', 1, NULL, 16),
('TF', 'THC/TCS Fee', 1, NULL, 2),
('TU', 'Tam ung', 1, NULL, 39),
('TXK', 'Thue XNK', 1, NULL, 30),
('VSC', 'Phi sua chua/ Ve sinh cont', 1, NULL, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tblchungtu`
--

CREATE TABLE `tblchungtu` (
  `id` varchar(20) NOT NULL,
  `docName` varchar(30) NOT NULL,
  `theDayReceived` date NOT NULL,
  `theCustomersName` varchar(50) NOT NULL,
  `theCommodity` varchar(50) NOT NULL,
  `theDeclarationsNo` varchar(30) NOT NULL,
  `filesNo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `portOfDestination` varchar(200) CHARACTER SET utf8 NOT NULL,
  `portOfLoading` varchar(30) NOT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `salesName` varchar(250) DEFAULT NULL,
  `logisticsName` varchar(10) NOT NULL COMMENT '0: chung tu, 1: giao nhan, 2: sale, 3: ke toan',
  `transportaionsName` varchar(50) NOT NULL,
  `theDayComplete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblchungtu`
--

INSERT INTO `tblchungtu` (`id`, `docName`, `theDayReceived`, `theCustomersName`, `theCommodity`, `theDeclarationsNo`, `filesNo`, `portOfDestination`, `portOfLoading`, `volume`, `salesName`, `logisticsName`, `transportaionsName`, `theDayComplete`) VALUES
('1', '', '2020-01-01', 'GN', '', 'tct', 'abc', 'Giay', '001', '2020-01-21', '', '', '', NULL),
('100', '', '2020-02-12', 'GN', '', 'tct', 'abc', 'giay2', '0123456789', NULL, '', '', '', NULL),
('2', '', '2020-01-15', 'GN', '', 'tct', 'abc2', 'giay2', '12-2', NULL, '', '', '', NULL),
('3', '', '2020-01-15', 'GN', '', 'tct', 'abc3', 'giay23', '12-23', NULL, '', '', '', NULL),
('9990', '', '2020-02-25', 'GN', '', 'tct', 'viet chem', 'hc thuoc da', '9876', NULL, '', '', '', NULL),
('abc', '', '2020-02-25', 'GN', '', 'tct', 'viet chem', 'hc thuoc da', '0123', NULL, '', '', '', NULL),
('Yen', '', '2020-02-25', 'GN', '', 'tct', 'khx', 'thuy san', '963', NULL, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `idRole` int(10) NOT NULL,
  `ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`idRole`, `ten`) VALUES
(1, 'Tao CT'),
(2, 'Giao Nhan'),
(3, 'Sale'),
(4, 'Ke Toan');

-- --------------------------------------------------------

--
-- Table structure for table `tblthuchien`
--

CREATE TABLE `tblthuchien` (
  `id` int(10) NOT NULL,
  `idChungtu` varchar(20) NOT NULL,
  `idUser` varchar(30) NOT NULL,
  `trangThai` int(11) NOT NULL,
  `ngayNhan` varchar(6) NOT NULL,
  `ngayHoanThanh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblthuchien`
--

INSERT INTO `tblthuchien` (`id`, `idChungtu`, `idUser`, `trangThai`, `ngayNhan`, `ngayHoanThanh`) VALUES
(1, '1', 'u2_1', 0, '02-14', '2020-02-22'),
(2, '100', 'u2_1', 0, '2/4', '2020-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `idUser` varchar(30) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `idRole` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`idUser`, `ten`, `pass`, `idRole`) VALUES
('u1_1', 'Yen', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('u1_2', 'Thu', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('u2_1', 'Duong', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('u2_2', 'My', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('u2_3', 'Hau', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('u3_1', 'Sale1', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('u3_2', 'Sale2', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('u3_3', 'Sale', '827ccb0eea8a706c4c34a16891f84e7b', 3),
('u4_1', 'KToan 1', '827ccb0eea8a706c4c34a16891f84e7b', 4),
('u4_2', 'KToan 2', '827ccb0eea8a706c4c34a16891f84e7b', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chungtuloaiphi`
--
ALTER TABLE `chungtuloaiphi`
  ADD PRIMARY KEY (`maChungTu`,`maLoaiPhi`),
  ADD KEY `maloaiphi` (`maLoaiPhi`);

--
-- Indexes for table `loaiphi`
--
ALTER TABLE `loaiphi`
  ADD PRIMARY KEY (`maLoaiPhi`);

--
-- Indexes for table `tblchungtu`
--
ALTER TABLE `tblchungtu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `tblthuchien`
--
ALTER TABLE `tblthuchien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idChungtu` (`idChungtu`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblthuchien`
--
ALTER TABLE `tblthuchien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chungtuloaiphi`
--
ALTER TABLE `chungtuloaiphi`
  ADD CONSTRAINT `chungtuloaiphi_ibfk_3` FOREIGN KEY (`machungtu`) REFERENCES `tblchungtu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chungtuloaiphi_ibfk_4` FOREIGN KEY (`maloaiphi`) REFERENCES `loaiphi` (`maloaiphi`);

--
-- Constraints for table `tblthuchien`
--
ALTER TABLE `tblthuchien`
  ADD CONSTRAINT `tblthuchien_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `tbluser` (`idUser`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblthuchien_ibfk_2` FOREIGN KEY (`idChungtu`) REFERENCES `tblchungtu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `tblrole` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
