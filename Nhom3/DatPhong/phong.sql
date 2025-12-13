-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2025 lúc 05:14 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webkhachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `sophong` int(11) NOT NULL,
  `loaiphong` varchar(50) DEFAULT NULL,
  `songuoi_toida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`sophong`, `loaiphong`, `songuoi_toida`) VALUES
(101, 'Phòng đơn', 2),
(102, 'Phòng đôi', 4),
(103, 'Phòng đơn', 2),
(104, 'Phòng đôi', 4),
(201, 'VIP', 6),
(202, 'VIP', 6),
(203, 'VIP', 6),
(204, 'Phòng đôi', 4),
(301, 'View biển', 2),
(302, 'View biển', 4),
(303, 'View biển', 2),
(304, 'View biển', 4),
(401, 'Phòng đơn', 2),
(402, 'VIP', 2),
(403, 'VIP', 2),
(404, 'Phòng đôi', 4),
(501, 'VIP', 2),
(502, 'View biển', 4),
(503, 'VIP', 2),
(504, 'View biển', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`sophong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
