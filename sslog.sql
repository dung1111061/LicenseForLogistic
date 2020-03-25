-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 14, 2020 lúc 03:33 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sslog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungtu_loaiphi`
--

DROP TABLE IF EXISTS `chungtu_loaiphi`;
CREATE TABLE IF NOT EXISTS `chungtu_loaiphi` (
  `machungtu` varchar(20) NOT NULL,
  `maloaiphi` varchar(20) NOT NULL,
  `gia` int(11) DEFAULT NULL,
  PRIMARY KEY (`machungtu`,`maloaiphi`),
  KEY `maloaiphi` (`maloaiphi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chungtu_loaiphi`
--

INSERT INTO `chungtu_loaiphi` (`machungtu`, `maloaiphi`, `gia`) VALUES
('Yen', 'BDF', NULL),
('Yen', 'Buy', NULL),
('Yen', 'CEF', NULL),
('Yen', 'Sales', NULL),
('Yen', 'TF', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphi`
--

DROP TABLE IF EXISTS `loaiphi`;
CREATE TABLE IF NOT EXISTS `loaiphi` (
  `maloaiphi` varchar(20) NOT NULL,
  `tenloaiphi` varchar(200) NOT NULL,
  `hienthi` int(1) NOT NULL DEFAULT '0',
  `ghichu` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `thutu` int(2) DEFAULT NULL,
  PRIMARY KEY (`maloaiphi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaiphi`
--

INSERT INTO `loaiphi` (`maloaiphi`, `tenloaiphi`, `hienthi`, `ghichu`, `thutu`) VALUES
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
-- Cấu trúc bảng cho bảng `tbl_chungtu`
--

DROP TABLE IF EXISTS `tbl_chungtu`;
CREATE TABLE IF NOT EXISTS `tbl_chungtu` (
  `id` varchar(20) NOT NULL,
  `Doc Name` varchar(30) NOT NULL,
  `The day received` date NOT NULL,
  `The Customers name` varchar(50) NOT NULL,
  `The commodity` varchar(50) NOT NULL,
  `The declarations No` varchar(30) NOT NULL,
  `Files No` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Port of destination` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Port of loading` varchar(30) NOT NULL,
  `Volume` varchar(50) DEFAULT NULL,
  `Sales name` varchar(250) DEFAULT NULL,
  `Logistics name` varchar(10) NOT NULL COMMENT '0: chung tu, 1: giao nhan, 2: sale, 3: ke toan',
  `Transportaions name` varchar(50) NOT NULL,
  `The day complete` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_chungtu`
--

INSERT INTO `tbl_chungtu` (`id`, `Doc Name`, `The day received`, `The Customers name`, `The commodity`, `The declarations No`, `Files No`, `Port of destination`, `Port of loading`, `Volume`, `Sales name`, `Logistics name`, `Transportaions name`, `The day complete`) VALUES
('1', '', '2020-01-01', 'GN', '', 'tct', 'abc', 'Giay', '001', '2020-01-21', '', '', '', NULL),
('100', '', '2020-02-12', 'GN', '', 'tct', 'abc', 'giay2', '0123456789', NULL, '', '', '', NULL),
('2', '', '2020-01-15', 'GN', '', 'tct', 'abc2', 'giay2', '12-2', NULL, '', '', '', NULL),
('3', '', '2020-01-15', 'GN', '', 'tct', 'abc3', 'giay23', '12-23', NULL, '', '', '', NULL),
('9990', '', '2020-02-25', 'GN', '', 'tct', 'viet chem', 'hc thuoc da', '9876', NULL, '', '', '', NULL),
('abc', '', '2020-02-25', 'GN', '', 'tct', 'viet chem', 'hc thuoc da', '0123', NULL, '', '', '', NULL),
('Yen', '', '2020-02-25', 'GN', '', 'tct', 'khx', 'thuy san', '963', NULL, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `idrole` int(10) NOT NULL,
  `ten` varchar(30) NOT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_role`
--

INSERT INTO `tbl_role` (`idrole`, `ten`) VALUES
(1, 'Tao CT'),
(2, 'Giao Nhan'),
(3, 'Sale'),
(4, 'Ke Toan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuchien`
--

DROP TABLE IF EXISTS `tbl_thuchien`;
CREATE TABLE IF NOT EXISTS `tbl_thuchien` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idchungtu` varchar(20) NOT NULL,
  `iduser` varchar(30) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ngaynhan` varchar(6) NOT NULL,
  `ngayhoanthanh` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iduser` (`iduser`),
  KEY `idchungtu` (`idchungtu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_thuchien`
--

INSERT INTO `tbl_thuchien` (`id`, `idchungtu`, `iduser`, `trangthai`, `ngaynhan`, `ngayhoanthanh`) VALUES
(1, '1', 'u2_1', 0, '02-14', '2020-02-22'),
(2, '100', 'u2_1', 0, '2/4', '2020-02-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `iduser` varchar(30) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `idrole` int(10) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `idrole` (`idrole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`iduser`, `Ten`, `pass`, `idrole`) VALUES
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
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chungtu_loaiphi`
--
ALTER TABLE `chungtu_loaiphi`
  ADD CONSTRAINT `chungtu_loaiphi_ibfk_3` FOREIGN KEY (`machungtu`) REFERENCES `tbl_chungtu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chungtu_loaiphi_ibfk_4` FOREIGN KEY (`maloaiphi`) REFERENCES `loaiphi` (`maloaiphi`);

--
-- Các ràng buộc cho bảng `tbl_thuchien`
--
ALTER TABLE `tbl_thuchien`
  ADD CONSTRAINT `tbl_thuchien_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`iduser`),
  ADD CONSTRAINT `tbl_thuchien_ibfk_3` FOREIGN KEY (`idchungtu`) REFERENCES `tbl_chungtu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `tbl_role` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
