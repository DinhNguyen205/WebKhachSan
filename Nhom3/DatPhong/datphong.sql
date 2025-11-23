-- Tạo database (nếu chưa có)
CREATE DATABASE IF NOT EXISTS webkhachsan
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE webkhachsan;

-- Bảng lưu đơn đặt phòng
CREATE TABLE IF NOT EXISTS datphong (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    sodienthoai VARCHAR(20) NOT NULL,
    ngaydat DATE NOT NULL,
    sophong INT NOT NULL,
    dichvu VARCHAR(255),
    songuoi INT NOT NULL,
    choxacnhan TINYINT(1) DEFAULT 0,
    user_id INT NOT NULL,
    thoigian_dat TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
