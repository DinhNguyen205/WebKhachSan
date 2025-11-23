USE webkhachsan;

CREATE TABLE datphong (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ten VARCHAR(100) NOT NULL,
    sodienthoai VARCHAR(20) NOT NULL,
    ngaydat DATE NOT NULL,
    sophong INT NOT NULL,
    dichvu VARCHAR(255),
    songuoi INT NOT NULL,
    choxacnhan TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
