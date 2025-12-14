-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 12:29 PM
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
-- Database: `webkhachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `ngaydat` date NOT NULL,
  `ngaytra` date DEFAULT NULL,
  `sophong` int(11) NOT NULL,
  `songuoi` tinyint(4) NOT NULL,
  `dichvu` varchar(255) DEFAULT NULL,
  `choxacnhan` tinyint(1) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `thoigian_dat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datphong`
--

INSERT INTO `datphong` (`id`, `ten`, `sodienthoai`, `ngaydat`, `ngaytra`, `sophong`, `songuoi`, `dichvu`, `choxacnhan`, `user_id`, `thoigian_dat`) VALUES
(14, 'phong', '0111111111', '2025-12-18', '2026-01-02', 101, 1, 'Ăn sáng miễn phí, Wifi, Hồ bơi', 0, 1, '2025-12-14 11:11:43'),
(15, 'nguyen', '0234325357', '2025-12-15', '2025-12-17', 404, 2, 'Ăn sáng, Wifi, Phòng gym', 0, 1, '2025-12-14 11:17:22'),
(16, 'dss', '0862891272', '2025-12-25', '2025-12-27', 403, 4, 'Ăn sáng, Spa, Hồ bơi, Phòng gym', 0, 1, '2025-12-14 11:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datphong`
--
ALTER TABLE `datphong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
