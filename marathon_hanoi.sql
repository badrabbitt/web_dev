-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 26, 2023 lúc 12:19 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `marathon_hanoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `marathon`
--

DROP TABLE IF EXISTS `marathon`;
CREATE TABLE IF NOT EXISTS `marathon` (
  `MarathonID` int NOT NULL AUTO_INCREMENT,
  `Race` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`MarathonID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `marathon`
--

INSERT INTO `marathon` (`MarathonID`, `Race`, `Date`) VALUES
(3, 'Hanoi', '2024-05-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `participate`
--

DROP TABLE IF EXISTS `participate`;
CREATE TABLE IF NOT EXISTS `participate` (
  `EntryNO` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `MarathonID` int NOT NULL,
  `Hotel` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Standings` int DEFAULT NULL,
  PRIMARY KEY (`EntryNO`),
  KEY `userID` (`userID`),
  KEY `MarathonID` (`MarathonID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `participate`
--

INSERT INTO `participate` (`EntryNO`, `userID`, `MarathonID`, `Hotel`, `Time`, `Standings`) VALUES
(11, 35, 3, 'Hyatt', '10:10:10', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bestRecord` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `sex` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `name`, `bestRecord`, `nationality`, `passport`, `sex`, `age`, `email`, `phone`, `address`) VALUES
(35, 'Nguyen Thai Son', '01:00:59', 'Vietnam', '024203000191', 'Male', '8', 's@gmail.com', '0865271698', 'Hanoi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
