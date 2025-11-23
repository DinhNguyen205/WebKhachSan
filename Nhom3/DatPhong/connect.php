<?php
// Thông tin kết nối
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "webkhachsan";

// Kiểm tra extension mysqli
if (!function_exists('mysqli_connect')) {
    die("Lỗi: PHP chưa bật extension mysqli (mysqli). Hãy bật trong php.ini.");
}

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

// Kiểm tra lỗi
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
