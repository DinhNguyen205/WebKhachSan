-- Bước 1: Tạo cơ sở dữ liệu nếu chưa tồn tại và sử dụng nó
CREATE DATABASE IF NOT EXISTS `quanlyphong`
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `quanlyphong`;

-- =======================================================
-- 1. Bảng ROOMS (Quản Lý Phòng)
-- =======================================================
CREATE TABLE IF NOT EXISTS `rooms` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID tự tăng',
    `room_number` VARCHAR(10) NOT NULL UNIQUE COMMENT 'Số phòng (ví dụ: 101, 203)',
    `room_type` VARCHAR(50) NOT NULL COMMENT 'Loại phòng (Standard, Deluxe, Suite)',
    `price` DECIMAL(10, 2) NOT NULL DEFAULT 0.00 COMMENT 'Giá phòng/đêm (VND)',
    `capacity` INT UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Sức chứa tối đa (người)',
    `status` ENUM('Available', 'Occupied', 'Cleaning', 'Maintenance') NOT NULL DEFAULT 'Available' COMMENT 'Trạng thái hiện tại của phòng',
    `description` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- DỮ LIỆU MẪU CẬP NHẬT cho ROOMS
INSERT INTO `rooms` (`room_number`, `room_type`, `price`, `capacity`, `status`) VALUES 
('101', 'Standard', 800000.00, 2, 'Available'), 
('203', 'Deluxe', 1500000.00, 3, 'Occupied'), 
('301', 'Suite', 3000000.00, 4, 'Cleaning')
ON DUPLICATE KEY UPDATE room_type=VALUES(room_type);


-- =======================================================
-- 2. Bảng CUSTOMERS (Quản Lý Khách Hàng)
-- =======================================================
CREATE TABLE IF NOT EXISTS `customers` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID tự tăng (Khóa chính)',
    `customer_id` VARCHAR(10) UNIQUE NOT NULL COMMENT 'Mã khách hàng (ví dụ: KH001)',
    `name` VARCHAR(150) NOT NULL COMMENT 'Họ và tên khách hàng',
    `phone` VARCHAR(15) NOT NULL UNIQUE COMMENT 'Số điện thoại',
    `email` VARCHAR(100) NULL UNIQUE COMMENT 'Email khách hàng',
    `total_bookings` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Tổng số lần đặt phòng', 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- DỮ LIỆU MẪU CẬP NHẬT cho CUSTOMERS
INSERT INTO `customers` (`customer_id`, `name`, `phone`, `email`, `total_bookings`) VALUES
('KH001', 'Nguyễn Thị Đào', '0912345678', 'dao.nguyen@email.com', 5),
('KH002', 'Phạm Văn Kiên', '0987654321', 'kien.pham@email.com', 2)
ON DUPLICATE KEY UPDATE name=VALUES(name);


-- =======================================================
-- 3. Bảng EMPLOYEES (Quản Lý Nhân Viên)
-- =======================================================
CREATE TABLE IF NOT EXISTS `employees` (
    `employee_id` VARCHAR(10) NOT NULL PRIMARY KEY COMMENT 'Mã nhân viên (ví dụ: NV001)',
    `name` VARCHAR(100) NOT NULL COMMENT 'Tên nhân viên',
    `position` VARCHAR(50) NULL COMMENT 'Chức vụ',
    `phone` VARCHAR(15) NULL COMMENT 'Số điện thoại',
    `email` VARCHAR(100) NULL UNIQUE COMMENT 'Email nhân viên',
    `salary` DECIMAL(10, 2) NOT NULL DEFAULT 0.00 COMMENT 'Mức lương cơ bản',
    `hired_date` DATE NULL COMMENT 'Ngày vào làm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- DỮ LIỆU MẪU CẬP NHẬT cho EMPLOYEES
INSERT INTO `employees` (`employee_id`, `name`, `position`, `phone`, `email`, `salary`) VALUES 
('NV001', 'Nguyễn Văn A', 'Lễ Tân', '0901112222', 'vana.le@hotel.com', 8500000.00), 
('NV002', 'Trần Thị B', 'Buồng Phòng', '0903334444', 'thib.bp@hotel.com', 7000000.00), 
('NV003', 'Lê Văn C', 'Bảo Vệ', '0905556666', 'vanc.bv@hotel.com', 7500000.00) 
ON DUPLICATE KEY UPDATE name=VALUES(name);