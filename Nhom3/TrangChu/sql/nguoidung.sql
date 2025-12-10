CREATE TABLE nguoidung (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    fullname VARCHAR(100),
    dob DATE,
    gioitinh VARCHAR(10) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'khachhang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;