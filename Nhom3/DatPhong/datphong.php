<?php
session_start();
require __DIR__ . '/connect.php';

if (!isset($_SESSION['id'])) {
    header("Location: dangnhap.php");
    exit;
}

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: timphong.php");
    exit;
}

$ten         = trim($_POST['ten'] ?? '');
$sodienthoai = trim($_POST['sodienthoai'] ?? '');
$songuoi     = (int)($_POST['songuoi'] ?? 1);
$ngaydat     = $_POST['ngaydat'] ?? '';
$ngaytra     = $_POST['ngaytra'] ?? '';
$dichvu      = trim($_POST['dichvu'] ?? '');
$sophong = (int)($_POST['sophong'] ?? 0);


$errors = [];
if (!preg_match('/^0[0-9]{9}$/', $sodienthoai)) 
    $errors[] = "Số điện thoại không hợp lệ (phải đủ 10 chữ số, bắt đầu bằng 0).";
;
if ($ten === '')         $errors[] = "Vui lòng nhập họ và tên.";
if ($sodienthoai === '') $errors[] = "Vui lòng nhập số điện thoại.";
if ($ngaydat === '')     $errors[] = "Vui lòng chọn ngày nhận phòng.";

$today = date('Y-m-d');
if ($ngaydat < $today) {
    $errors[] = "Ngày nhận phòng không được nhỏ hơn ngày hiện tại.";
}
$today = date("Y-m-d");

if ($ngaydat < $today) {
    $errors[] = "Ngày nhận phòng không được nhỏ hơn ngày hiện tại.";
}

if ($ngaytra === '') {
    $errors[] = "Vui lòng chọn ngày trả phòng.";
} elseif ($ngaytra <= $ngaydat) {
    $errors[] = "Ngày trả phòng phải sau ngày nhận phòng.";
}

if (!empty($errors)) {
    $_SESSION['thong_bao'] = implode(" ", $errors);
    header("Location: timphong.php");
    exit;
}

$stmt = $conn->prepare("
    INSERT INTO datphong 
    (ten, sodienthoai, ngaydat, ngaytra, sophong, dichvu, songuoi, choxacnhan, user_id)
    VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?)
");

$stmt->bind_param(
    "ssssisii",
    $ten,
    $sodienthoai,
    $ngaydat,
    $ngaytra,
    $sophong,
    $dichvu,
    $songuoi,
    $user_id
);

if ($stmt->execute()) {
    $_SESSION['thong_bao'] = "Đặt phòng thành công! Cảm ơn bạn đã lựa chọn Khách Sạn Quy Nhơn.";
} else {
    $_SESSION['thong_bao'] = "Lỗi hệ thống khi lưu dữ liệu, vui lòng thử lại.";
}

$stmt->close();
header("Location: timphong.php");
exit;
