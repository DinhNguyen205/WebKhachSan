<?php
session_start();
require '../connect/connect.php';

$conn->exec("SET NAMES 'utf8mb4'");

if (!isset($_SESSION['username'])) {
    echo "Bạn chưa đăng nhập.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $fullname = trim($_POST['fullname'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $gioitinh = trim($_POST['gioitinh'] ?? '');

    if ($fullname === '' || $dob === '' || $gioitinh === '') {
        echo "Vui lòng nhập đầy đủ thông tin cá nhân.";
        exit;
    }

    try {
        $stmt = $conn->prepare("UPDATE nguoidung SET fullname = ?, dob = ?, gioitinh = ? WHERE username = ?");
        $stmt->execute([$fullname, $dob, $gioitinh, $username]);

        $_SESSION['fullname'] = $fullname;

        header("Location: ../../../index.php");
        exit;

    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "Phương thức không hợp lệ.";
}
