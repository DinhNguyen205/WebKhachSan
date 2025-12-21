<?php
session_start();
require __DIR__ . "/connect.php";

if (!isset($_SESSION['id'])) {
    header("Location: ../TrangChu/mainpage/dangnhap.php");
    exit;
}

$user_id = $_SESSION['id'];

if (!isset($_GET['id'])) {
    header("Location: lichsu_datphong.php");
    exit;
}

$datphong_id = (int)$_GET['id'];

$stmt = $conn->prepare("
    DELETE FROM datphong 
    WHERE id = ? AND user_id = ? AND choxacnhan = 0
");
$stmt->bind_param("ii", $datphong_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['thong_bao'] = "Đã hủy đặt phòng";
} else {
    $_SESSION['thong_bao'] = "Không thể hủy đơn này";
}

$stmt->close();

// ✅ QUAN TRỌNG: redirect đúng
header("Location: lichsu_datphong.php");
exit;
