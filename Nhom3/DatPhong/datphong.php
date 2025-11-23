<?php
session_start();
require __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: timphong.php");
    exit;
}

$ten         = trim($_POST['ten'] ?? '');
$sodienthoai = trim($_POST['sodienthoai'] ?? '');
$songuoi     = (int)($_POST['songuoi'] ?? 1);
$ngaydat     = $_POST['ngaydat'] ?? '';
$dichvu      = trim($_POST['dichvu'] ?? '');
$sophong     = trim($_POST['sophong'] ?? '');

$errors = [];

if ($ten === '')         $errors[] = "Vui lòng nhập họ và tên.";
if ($sodienthoai === '') $errors[] = "Vui lòng nhập số điện thoại.";
if ($ngaydat === '')     $errors[] = "Vui lòng chọn ngày nhận phòng.";
if ($sophong === '')     $errors[] = "Thiếu thông tin số phòng.";

if (!empty($errors)) {
    $_SESSION['thong_bao'] = implode(" ", $errors);
    header("Location: timphong.php");
    exit;
}

// Lưu vào DB
$stmt = $conn->prepare("
    INSERT INTO datphong (ten, sodienthoai, ngaydat, sophong, dichvu, songuoi, choxacnhan)
    VALUES (?, ?, ?, ?, ?, ?, 0)
");
$stmt->bind_param("sssisi", $ten, $sodienthoai, $ngaydat, $sophong, $dichvu, $songuoi);

if ($stmt->execute()) {
    $_SESSION['thong_bao'] = "Đặt phòng thành công! Cảm ơn bạn đã lựa chọn Khách Sạn Quy Nhơn.";
} else {
    $_SESSION['thong_bao'] = "Lỗi hệ thống khi lưu dữ liệu, vui lòng thử lại.";
}

$stmt->close();
header("Location: timphong.php");
exit;
