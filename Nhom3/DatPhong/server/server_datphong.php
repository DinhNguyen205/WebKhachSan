<?php
session_start();
require_once __DIR__ . '/../conect/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../datphong.php");
    exit;
}

$errors = [];

$ten         = trim($_POST['ten'] ?? '');
$sodienthoai = trim($_POST['sodienthoai'] ?? '');
$ngaydat     = $_POST['ngaydat'] ?? '';
$sophong     = (int)($_POST['sophong'] ?? 0);
$songuoi     = (int)($_POST['songuoi'] ?? 0);
$dichvu_arr  = $_POST['dichvu'] ?? [];

$dichvu = implode(", ", $dichvu_arr);

if ($ten === '')         $errors[] = "Vui lòng nhập họ tên người đặt.";
if ($sodienthoai === '') $errors[] = "Vui lòng nhập số điện thoại.";
if ($ngaydat === '')     $errors[] = "Vui lòng chọn ngày đặt.";
if ($sophong <= 0)       $errors[] = "Số phòng không hợp lệ.";
if ($songuoi <= 0)       $errors[] = "Số người không hợp lệ.";

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: ../datphong.php");
    exit;
}

$sql = "INSERT INTO datphong (ten, sodienthoai, ngaydat, sophong, songuoi, dichvu)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION['errors'] = ["Lỗi chuẩn bị câu lệnh SQL: " . $conn->error];
    header("Location: ../datphong.php");
    exit;
}

$stmt->bind_param("sssiss", $ten, $sodienthoai, $ngaydat, $sophong, $songuoi, $dichvu);

if ($stmt->execute()) {
    $_SESSION['thong_bao'] = "Đặt phòng thành công!";
    header("Location: ../../index.php");
    exit;
} else {
    $_SESSION['errors'] = ["Lỗi khi lưu dữ liệu: " . $stmt->error];
    header("Location: ../datphong.php");
    exit;
}
